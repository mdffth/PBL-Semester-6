"""
m1/recommendML.py

Dipanggil oleh laravel via:
    exec("python3 ml/recommendML.py {user_input_id}")
    
Algoritma: Weighted Cosine Similarity (Content-Based Filtering)
Formula  : final_score = 0.4*sim_skill + 0.3*sim_tech + 0.2*sim_minat + 0.1*score_ipk
"""

import sys
import os
import math
import json
import mysql.connector
from datetime import datetime
from dotenv import dotenv_values


env_path = os.path.join(os.path.dirname(__file__), '..', '.env')
env      = dotenv_values(env_path)

DB_CONFIG = {
    'host'      : env.get('DB_HOST','127.0.0.1'),
    'port'      : int(env.get('DB_PORT', 3306)),
    'user'      : env.get('DB_USERNAME', 'root'),
    'password'  : env.get('DB_PASSWORD', ''),
    'database'  : env.get('DB_DATABASE', 'rekomendasi_magang'),
}


W_SKILL = 0.40
W_TECH  = 0.30
W_MINAT = 0.20
W_IPK   = 0.10

TOP_N = 10






def cosine_similarity(vec_a: list, vec_b: list) -> float:
    """
    Hitung cosine similarity antara dua vektor binary (multi-hot).
    Mengembalikan 0.0 jika salah satu vektor adalah zero vektor.
    """
    dot   = sum(a * b for a, b in zip(vec_a, vec_b))
    mag_a = math.sqrt(sum(a**2 for a in vec_a))
    mag_b = math.sqrt(sum(a**2 for a in vec_b))
    
    if mag_a == 0.0 or mag_b == 0.0:
        return 0.0
    
    return dot / (mag_a * mag_b)


def build_vector(ids: list, universe_size: int) -> list:
    """
    Bangun multi-hot vector berukuran universe_size.
    ID database dimulai dari 1, index vector dari 0.
    
    Contoh ids[2,5], size6 -> [0,1,0,0,1,0]
    """
    vec = [0] * universe_size
    for id_ in ids:
        idx = int(id_) -1
        if 0 <= idx < universe_size:
            vec[idx] = 1
    return vec


def ipk_score(user_ipk: float, min_ipk: float) -> float:
    """
    Skor IPK : 1.0 jika memenui syarat, proporsional jikatidak.
    Jika perusahaan tidak menyaratkan IPK minimum (0), langsung 1,0.    
    """
    if min_ipk <= 0:
        return 1.0
    return min(1.0, user_ipk / min_ipk)
    





def get_user(cursor, user_id: int) -> dict:
    cursor.execute("SELECT id, ipk FROM user_input WHERE id = %s", (user_id,))
    row = cursor.fetchone()
    if not row:
        raise ValueError(f"UserInput dengan id{user_id} tidak ditemukan")
    return {'id': row[0], 'ipk': float(row[1])}


def get_user_skill_ids(cursor, user_id: int) ->list:
    cursor.execute("SELECT skill_id FROM user_skills WHERE user_input_id = %s", (user_id,))
    return [r[0] for r in cursor.fetchall()]


def get_user_technology_ids(cursor, user_id: int) ->list:
    cursor.execute("SELECT technology_id FROM user_technologies WHERE user_input_id = %s", (user_id,))
    return [r[0] for r in cursor.fetchall()]


def get_user_minat_ids(cursor, user_id: int) ->list:
    cursor.execute("SELECT minat_bidang_id FROM user_minat WHERE user_input_id = %s", (user_id,))
    return [r[0] for r in cursor.fetchall()]


def get_universe_sizes(cursor) -> dict:
    cursor.execute("SELECT COUNT(*) FROM skills")
    total_skills = cursor.fetchone()[0]
    
    cursor.execute("SELECT COUNT(*) FROM technologies")
    total_tech = cursor.fetchone()[0]
    
    cursor.execute("SELECT COUNT(*) FROM minat_bidang")
    total_minat = cursor.fetchone()[0]
    
    return {
        'skills'       : total_skills,
        'technologies' : total_tech,
        'minat'        : total_minat,
    }
    
    
def get_all_companies(cursor) -> list:
    cursor.execute("""
        SELECT id, name, min_ipk
        FROM perusahaan
        """)
    return [{'id': r[0], 'name': r[1], 'min_ipk': float(r[2] or 0)} for r in cursor.fetchall()]


def get_company_skill_ids(cursor, company_id: int) -> list:
    cursor.execute("SELECT skill_id FROM perusahaan_skills WHERE perusahaan_id = %s", (company_id,))
    return[r[0] for r in cursor.fetchall()]


def get_company_technology_ids(cursor, company_id: int) -> list:
    cursor.execute("SELECT technology_id FROM perusahaan_technologies WHERE perusahaan_id = %s", (company_id,))
    return[r[0] for r in cursor.fetchall()]


def get_company_minat_ids(cursor, company_id: int) -> list:
    cursor.execute("SELECT minat_bidang_id FROM perusahaan_posisi WHERE perusahaan_id = %s", (company_id,))
    return[r[0] for r in cursor.fetchall()]


def save_result(cursor, conn, user_id: int, rangked: list):
    #Hapus hasil lama
    cursor.execute("DELETE FROM recommendation_results WHERE user_input_id = %s", (user_id,))
    
    now = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    
    rows = []
    for ranking, item in enumerate(rangked, start=1):
        rows.append((
            user_id,
            item['company_id'],
            item['score_skill'],
            item['score_technology'],
            item['score_minat'],
            item['score_ipk'],
            item['final_score'],
            ranking,
            now,
            now,
        ))

    cursor.executemany("""
        INSERT INTO recommendation_results
            (user_input_id, perusahaan_id, score_skill, score_technology,
             score_minat, score_ipk, final_score, ranking, created_at, updated_at)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """, rows)
    
    conn.commit()
    
    
    
    
    

def main():
    if len(sys.argv) < 2:
        print("ERROR: user_input_id tidak diberikan.", file=sys.stderr)
        sys.exit(1)
        
    user_id = int(sys.argv[1])
    
    conn    = mysql.connector.connect(**DB_CONFIG)
    cursor  = conn.cursor()
    
    try:
        #1. Ambil data pengguna
        user           = get_user(cursor, user_id)
        user_skill_ids = get_user_skill_ids(cursor, user_id)
        user_tech_ids  = get_user_technology_ids(cursor, user_id)
        user_minat_ids = get_user_minat_ids(cursor, user_id)
        
        #2. Ukuran universe vektor
        universe = get_universe_sizes(cursor)
        
        #3. Bangun vektor pengguna (multi-hot encoding)
        vec_user_skill = build_vector(user_skill_ids, universe['skills'])
        vec_user_tech  = build_vector(user_tech_ids, universe['technologies'])
        vec_user_minat = build_vector(user_minat_ids, universe['minat'])
        
        #4 Ambil semua perusahaan dan hitung skor
        companies = get_all_companies(cursor)
        scores = []
        
        for company in companies:
            company_id = company['id']
            min_ipk    = company['min_ipk']
            
            #hard filter: lewati jika IPK pengguna < 80% dari syarat minimmum
            if min_ipk > 0 and user['ipk'] < min_ipk * 0.8:
                continue
            
            #Ambil vektor perusahaan 
            comp_skill_ids = get_company_skill_ids(cursor, company_id)
            comp_tech_ids  = get_company_technology_ids(cursor, company_id)
            comp_minat_ids = get_company_minat_ids(cursor, company_id)
            
            vec_comp_skill = build_vector(comp_skill_ids, universe['skills'])
            vec_comp_tech  = build_vector(comp_tech_ids, universe['technologies'])
            vec_comp_minat = build_vector(comp_minat_ids, universe['minat'])
            
            #Hitung cosine similarity per dimensi
            sim_skill = cosine_similarity(vec_user_skill, vec_comp_skill)
            sim_tech  = cosine_similarity(vec_user_tech, vec_comp_tech)
            sim_minat = cosine_similarity(vec_user_minat, vec_comp_minat)
            sc_ipk    = ipk_score(user['ipk'], min_ipk)
            
            #wight final score
            final = (W_SKILL * sim_skill) + (W_TECH * sim_tech) + \
                    (W_MINAT * sim_minat) + (W_IPK * sc_ipk)
                    
            scores.append({
                'company_id'       : company_id,
                'score_skill'      : round(sim_skill, 4),
                'score_technology' : round(sim_tech, 4),
                'score_minat'      : round(sim_minat, 4),
                'score_ipk'        : round(sc_ipk, 4),
                'final_score'      : round(final, 4),
            })
            
        #5.Urutkan dan ambil Top-N
        ranked = sorted(scores, key=lambda x: x['final_score'], reverse=True)[:TOP_N]
        
        #6 Simpan ke database
        save_result(cursor, conn, user_id, ranked)
        
        print(f"OK: {len(ranked)} rekomendasi disimpan untuk user_input_id={user_id}")
        sys.exit(0)
        
    except Exception as e:
        print(f"ERROR: {e}", file=sys.stderr)
        sys.exit(1)

    finally:
        cursor.close()
        conn.close()


if __name__ == '__main__':
    main()    
    