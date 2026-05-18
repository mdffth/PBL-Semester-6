<div class="content-wrap">

    {{-- PROFILE SUMMARY --}}
    <div class="profile-summary">

        <div class="summary-grid">

            <div class="summary-item">
                <div class="summary-label">IPK</div>
                <div class="summary-value">
                    {{ $user->ipk }}
                </div>
            </div>

            <div class="summary-item">
                <div class="summary-label">Skill</div>
                <div class="summary-value">
                    {{ $user->skills->pluck('name')->join(', ') ?: '-' }}
                </div>
            </div>

            <div class="summary-item">
                <div class="summary-label">Teknologi</div>
                <div class="summary-value">
                    {{ $user->technologies->pluck('name')->join(', ') ?: '-' }}
                </div>
            </div>

            <div class="summary-item">
                <div class="summary-label">Minat Bidang</div>
                <div class="summary-value">
                    {{ $user->minatBidang->pluck('name')->join(', ') ?: '-' }}
                </div>
            </div>

        </div>

    </div>

    <p class="result-info">
        Menampilkan
        <strong>{{ $results->count() }}</strong>
        hasil rekomendasi perusahaan terbaik untuk profilmu.
    </p>

    @foreach ($results as $result)

        @php
            $company = $result->perusahaan;
        @endphp

        <div class="result-card">

            {{-- HEADER --}}
            <div class="result-header">

                <div>

                    <h3>
                        #{{ $result->ranking }}
                        {{ $company->name }}
                    </h3>

                    <p>
                        {{ $company->posisi_magang }}
                    </p>

                </div>

                <div class="score-box">

                    {{ number_format($result->final_score * 100, 1) }}%

                </div>

            </div>

            {{-- INFO --}}
            <div class="company-info">

                <p>
                    <strong>Tipe Industri:</strong>
                    {{ $company->tipe_industri ?? '-' }}
                </p>

                <p>
                    <strong>Status Magang:</strong>
                    {{ $company->status_magang ?? '-' }}
                </p>

                <p>
                    <strong>Minimal IPK:</strong>
                    {{ $company->minimal_ipk ?? '-' }}
                </p>

                <p>
                    <strong>Durasi:</strong>
                    {{ $company->duration_months ?? '-' }} bulan
                </p>

            </div>

            {{-- SCORE --}}
            <div class="score-section">

                <div class="score-item">

                    <div class="score-top">
                        <span>Skill</span>
                        <span>
                            {{ number_format($result->score_skill * 100, 0) }}%
                        </span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ $result->score_skill * 100 }}%">
                        </div>
                    </div>

                </div>

                <div class="score-item">

                    <div class="score-top">
                        <span>Teknologi</span>
                        <span>
                            {{ number_format($result->score_technology * 100, 0) }}%
                        </span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ $result->score_technology * 100 }}%">
                        </div>
                    </div>

                </div>

                <div class="score-item">

                    <div class="score-top">
                        <span>Minat</span>
                        <span>
                            {{ number_format($result->score_minat * 100, 0) }}%
                        </span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ $result->score_minat * 100 }}%">
                        </div>
                    </div>

                </div>

                <div class="score-item">

                    <div class="score-top">
                        <span>IPK</span>
                        <span>
                            {{ number_format($result->score_ipk * 100, 0) }}%
                        </span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ $result->score_ipk * 100 }}%">
                        </div>
                    </div>

                </div>

            </div>

            {{-- DETAIL --}}
            <div class="detail-section">

                <p>
                    <strong>Deskripsi:</strong><br>
                    {{ $company->job_description ?? '-' }}
                </p>

                <br>

                <p>
                    <strong>Skill Dibutuhkan:</strong><br>
                    {{ $company->skills->pluck('name')->join(', ') ?: '-' }}
                </p>

                <br>

                <p>
                    <strong>Teknologi:</strong><br>
                    {{ $company->technologies->pluck('name')->join(', ') ?: '-' }}
                </p>

            </div>

        </div>

    @endforeach

</div>