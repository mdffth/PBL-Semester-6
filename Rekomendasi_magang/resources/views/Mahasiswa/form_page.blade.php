<!-- resources/views/mahasiswa/form_page.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekomendasi Magang</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            background: #F5F7FB;
            padding: 40px;
            color: #1E1E1E;
        }

        .container{
            width: 700px;
            margin: auto;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }

        /* HEADER */
        .step-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .step-title{
            font-size: 24px;
            font-weight: bold;
            color: #0242C4;
        }

        .step-percent{
            color: #7C8299;
            font-size: 16px;
        }

        .progress-bar{
            width: 100%;
            height: 12px;
            background: #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 35px;
        }

        .progress-fill{
            width: 50%;
            height: 100%;
            background: #0242C4;
            border-radius: 20px;
        }

        /* CARD */
        .card{
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            padding: 25px;
        }

        .card-title{
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-subtitle{
            color: #7C8299;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* FORM */
        .form-group{
            margin-bottom: 25px;
        }

        label{
            display: block;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            color: #374151;
        }

        .form-control{
            width: 100%;
            padding: 14px;
            border: 1px solid #D1D5DB;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus{
            border-color: #0242C4;
            box-shadow: 0 0 0 3px rgba(2,66,196,0.12);
        }

        /* TAG INPUT */
        .tag-box{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            border: 1px solid #D1D5DB;
            border-radius: 10px;
            padding: 10px;
        }

        .tag-box input{
            border: none;
            outline: none;
            flex: 1;
            min-width: 200px;
            font-size: 15px;
            padding: 8px;
        }

        .tag{
            background: #EEF3FF;
            color: #0242C4;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tag span{
            cursor: pointer;
            font-weight: bold;
        }

        /* BUTTON */
        .btn-submit{
            width: 100%;
            background: #0242C4;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover{
            background: #0136A0;
        }

        @media(max-width:768px){

            body{
                padding: 20px;
            }

            .container{
                width: 100%;
                padding: 25px;
            }

            .card-title{
                font-size: 22px;
            }

        }

    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="step-header">

        <div class="step-title">
            STEP 1 OF 2: YOUR PROFILE
        </div>

        <div class="step-percent">
            50% Complete
        </div>

    </div>

    <!-- PROGRESS -->
    <div class="progress-bar">
        <div class="progress-fill"></div>
    </div>

    <!-- CARD -->
    <div class="card">

        <div class="card-title">
            Lengkapi Data Diri Anda
        </div>

        <div class="card-subtitle">
            Informasi ini membantu sistem mencocokkan Anda
            dengan magang yang paling sesuai.
        </div>

        <form>

            <!-- IPK -->
            <div class="form-group">

                <label>IPK (GPA)</label>

                <input type="text"
                       name="ipk"
                       class="form-control"
                       placeholder="Contoh: 3.80">

            </div>

            <!-- MINAT BIDANG -->
            <div class="form-group">

                <label>MINAT BIDANG</label>

                <input type="text"
                       name="minat_bidang"
                       class="form-control"
                       list="list_minat_bidang"
                       placeholder="Ketik atau pilih bidang yang diminati...">

                <datalist id="list_minat_bidang">

                    <option value="Frontend Developer">
                    <option value="Backend Developer">
                    <option value="Fullstack Developer">
                    <option value="Web Developer">
                    <option value="Mobile Developer">
                    <option value="Game Developer">
                    <option value="UI/UX Designer">
                    <option value="Data Analyst">
                    <option value="Cyber Security">

                </datalist>

            </div>

            <!-- TOOLS -->
            <div class="form-group">

                <label>TOOLS YANG DIKUASAI</label>

                <div class="tag-box" id="tools-container">

                    <input type="text"
                           id="tools-input"
                           list="list_tools"
                           placeholder="Ketik tools lalu tekan Enter">

                </div>

                <datalist id="list_tools">

                    <option value="Figma">
                    <option value="VS Code">
                    <option value="Git">
                    <option value="GitHub">
                    <option value="Postman">
                    <option value="Docker">
                    <option value="Laragon">
                    <option value="XAMPP">
                    <option value="Power BI">
                    <option value="Tableau">

                </datalist>

            </div>

            <!-- SKILLS -->
            <div class="form-group">

                <label>KEAHLIAN (SKILLS)</label>

                <div class="tag-box" id="skills-container">

                    <input type="text"
                           id="skills-input"
                           list="list_skills"
                           placeholder="Ketik skill lalu tekan Enter">

                </div>

                <datalist id="list_skills">

                    <option value="Python">
                    <option value="PHP">
                    <option value="Laravel">
                    <option value="React">
                    <option value="JavaScript">
                    <option value="MySQL">
                    <option value="UI Design">
                    <option value="UX Research">
                    <option value="Data Analysis">
                    <option value="Machine Learning">
                    <option value="Cyber Security">

                </datalist>

            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-submit">
                Lihat Hasil Rekomendasi
            </button>

        </form>

    </div>

</div>

<script>

function createTagInput(inputId, containerId){

    const input = document.getElementById(inputId);
    const container = document.getElementById(containerId);

    input.addEventListener("keydown", function(e){

        if(e.key === "Enter"){

            e.preventDefault();

            const value = input.value.trim();

            if(value !== ""){

                const tag = document.createElement("div");

                tag.classList.add("tag");

                tag.innerHTML = `
                    ${value}
                    <span>&times;</span>
                `;

                tag.querySelector("span").addEventListener("click", function(){
                    tag.remove();
                });

                container.insertBefore(tag, input);

                input.value = "";

            }

        }

    });

}

createTagInput("tools-input", "tools-container");
createTagInput("skills-input", "skills-container");

</script>

</body>
</html>