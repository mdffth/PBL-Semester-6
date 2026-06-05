@extends('layouts.perusahaan')

@section('topbar_title', 'Tambah Perusahaan')

@section('content')

<div class="page-header">
    <div>
        <div class="page-title">
            {{ isset($perusahaan) ? 'Edit Perusahaan Mitra' : 'Tambah Perusahaan Mitra' }}
        </div>
        <div class="page-subtitle">
            @isset($perusahaan)
                Perbarui informasi data mitra, posisi lowongan magang, serta kualifikasi mahasiswa untuk {{ $perusahaan->name }}.
            @else
                Daftarkan perusahaan mitra baru beserta info lowongan, teknologi, dan kualifikasi bidang minat magang.
            @endisset
        </div>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($perusahaan) ? route('perusahaan.update', $perusahaan->id) : route('perusahaan.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        @if(isset($perusahaan))
            @method('PUT')
        @endif

        <input type="hidden" name="page" value="{{ request('page', 1) }}">

        <div class="content-grid">
            <div class="left-column">
                <div class="card">
                    <div class="card-title">
                        <i class="fa-solid fa-building"></i>
                        Identitas Perusahaan
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text"
                                   name="name"
                                   class="input"
                                   value="{{ old('name', $perusahaan->name ?? '') }}"
                                   placeholder="Contoh: PT Teknologi Masa Depan"
                                   required>
                        </div>

                        <div class="form-group">
                        <label>Tipe Industri</label>
                        <input type="text"
                        name="tipe_industri"
                        class="input"
                        value="{{ old('tipe_industri', $perusahaan->tipe_industri ?? '') }}"
                        placeholder="Contoh: Swasta Nasional - IT & Software Development"
                        required>
                    </div>

                        <div class="form-group" id="tipe_industri_lainnya_group" style="display: none;">
                            <label>Industry Type Lainnya</label>
                            <input type="text"
                                   name="tipe_industri_lainnya"
                                   id="tipe_industri_lainnya"
                                   class="input"
                                   value="{{ old('tipe_industri_lainnya', $perusahaan->tipe_industri_lainnya ?? '') }}"
                                   placeholder="Tulis industri lainnya">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Company Profile</label>
                        <textarea name="profile_perusahaan"
                                  class="input"
                                  rows="6"
                                  placeholder="Tuliskan profil perusahaan...">{{ old('profile_perusahaan', $perusahaan->profile_perusahaan ?? '') }}</textarea>
                    </div>
                </div>

                <div class="card">
                    <div class="card-title">
                        <i class="fa-solid fa-file-lines"></i>
                        Deskripsi Lowongan
                    </div>

                    <div class="form-group">
                        <label>Job Description</label>
                        <textarea name="job_description"
                                  class="input"
                                  rows="8"
                                  placeholder="Tuliskan deskripsi pekerjaan, requirement, dan benefit...">{{ old('job_description', $perusahaan->job_description ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Required Skills</label>
                        <div class="tag-box" id="skills-container">
                            <input type="text"
                                   id="skills-input"
                                   list="list_skills"
                                   placeholder="Ketik skill lalu tekan Enter">
                        </div>
                        <div id="skill-hidden-input"></div>
                        <datalist id="list_skills">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->name }}" data-id="{{ $skill->id }}"></option>
                            @endforeach
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label>Tools & Technologies</label>
                        <div class="tag-box" id="tools-container">
                            <input type="text"
                                   id="tools-input"
                                   list="list_tools"
                                   placeholder="Ketik tools lalu tekan Enter">
                        </div>
                        <div id="technology-hidden-input"></div>
                        <datalist id="list_tools">
                            @foreach ($technologies as $technology)
                                <option value="{{ $technology->name }}" data-id="{{ $technology->id }}"></option>
                            @endforeach
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label>Bidang Posisi</label>
                        <div class="tag-box" id="minat-container">
                            <input type="text"
                                   id="minat-input"
                                   list="list_minat"
                                   placeholder="Ketik bidang lalu tekan Enter">
                        </div>
                        <div id="minat-hidden-input"></div>
                        <datalist id="list_minat">
                            @foreach ($minatBidang as $minat)
                                <option value="{{ $minat->name }}" data-id="{{ $minat->id }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
            </div>

            <div class="right-column">
                <div class="card">
                    <div class="card-title">
                        COMPANY LOGO
                    </div>

                    <div class="upload-box">
                        <div class="upload-icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div class="upload-title">
                            Upload Logo
                        </div>
                        <div class="upload-sub">
                            Format: JPG, JPEG, PNG (Max 2MB)
                        </div>
                        <br>
                        <input type="file"
                               name="logo"
                               class="input"
                               accept=".jpg,.jpeg,.png">
                    </div>
                </div>

                <div class="card">
                    <div class="card-title">
                        <i class="fa-solid fa-briefcase"></i>
                        Detail Lowongan
                    </div>

                    <div class="form-group">
                        <label>Benefit</label>
                        <select name="benefit" class="select" required>
                            <option value="Paid" {{ old('benefit', $perusahaan->benefit ?? '') == 'Paid' ? 'selected' : '' }}>Paid</option>
                            <option value="Unpaid" {{ old('benefit', $perusahaan->benefit ?? '') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Duration (Months)</label>
                        <input type="number"
                               name="duration_months"
                               class="input"
                               min="1"
                               max="12"
                               value="{{ old('duration_months', $perusahaan->duration_months ?? '') }}"
                               placeholder="Contoh: 6">
                    </div>

                    <div class="form-group">
                        <label>Min IPK / GPA</label>
                        <input type="number"
                               step="0.01"
                               min="0"
                               max="4"
                               name="min_ipk"
                               class="input"
                               value="{{ old('min_ipk', $perusahaan->min_ipk ?? '') }}"
                               placeholder="3.50"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text"
                               name="kota"
                               class="input"
                               value="{{ old('kota', $perusahaan->kota ?? '') }}"
                               placeholder="Contoh: Malang">
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text"
                               name="provinsi"
                               class="input"
                               value="{{ old('provinsi', $perusahaan->provinsi ?? '') }}"
                               placeholder="Contoh: Jawa Timur">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat"
                                  class="input"
                                  rows="4"
                                  placeholder="Contoh: Jl. Soekarno Hatta No. 9, Lowokwaru, Malang">{{ old('alamat', $perusahaan->alamat ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-actions">
            <div>
                <button type="button" class="btn btn-outline" id="btn-cancel">
                    Cancel
                </button>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ isset($perusahaan) ? 'Update Vacancy' : 'Publish Vacancy' }}
            </button>
        </div>
    </form>
</div>

<style>
    .container {
        width: 100%;
        max-width: none;
        padding: 0 24px 24px 24px;
        box-sizing: border-box;
    }

    .content-grid {
        display: grid !important;
        grid-template-columns: minmax(0, 1.6fr) minmax(0, 1fr) !important;
        gap: 24px !important;
        align-items: start !important;
        width: 100% !important;
    }

    .left-column,
    .right-column {
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .card {
        width: 100%;
        box-sizing: border-box;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .tag-box {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        border: 1px solid #D1D5DB;
        border-radius: 10px;
        padding: 10px;
    }

    .tag-box input {
        border: none;
        outline: none;
        flex: 1;
        min-width: 200px;
        font-size: 14px;
        padding: 8px;
    }

    .tag {
        background: #EEF3FF;
        color: #0242C4;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tag span {
        cursor: pointer;
        font-weight: bold;
    }

    @media (max-width: 992px) {
        .content-grid {
            grid-template-columns: 1fr !important;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    function createTagInput(inputId, containerId, datalistId, hiddenContainerId, inputName) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(containerId);
        const datalist = document.getElementById(datalistId);
        const hiddenContainer = document.getElementById(hiddenContainerId);
        const form = input.closest('form');
        input.setAttribute('required', 'required');

        function checkValidityStatus() {
            const totalTags = hiddenContainer.querySelectorAll('input[type="hidden"]').length;
            if (totalTags > 0) {
                input.removeAttribute('required');
                input.setCustomValidity('');
            } else {
                input.setAttribute('required', 'required');
            }
        }

        if (form) {
            form.addEventListener("submit", function(e) {
                const totalTags = hiddenContainer.querySelectorAll('input[type="hidden"]').length;
                if (totalTags === 0) {
                    e.preventDefault();
                    input.setCustomValidity('Please fill in this field.');
                    input.reportValidity();
                } else {
                    input.setCustomValidity('');
                }
            });
        }

        input.addEventListener('input', function() {
            input.setCustomValidity('');
        });

        input.addEventListener("keydown", function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                const value = input.value.trim();
                if (value === "") return;

                const existingTags = container.querySelectorAll(".tag");
                let isDuplicate = false;

                existingTags.forEach(tag => {
                    const tagText = tag.firstChild.textContent.trim().toLowerCase();
                    if (tagText === value.toLowerCase()) {
                        isDuplicate = true;
                    }
                });

                if (isDuplicate) {
                    input.value = "";
                    return;
                }

                const option = [...datalist.options].find(opt => opt.value === value);

                if (!option) {
                    alert("Data tidak tersedia!");
                    return;
                }

                const id = option.dataset.id;

                const tag = document.createElement("div");
                tag.classList.add("tag");
                tag.innerHTML = `${value}<span>&times;</span>`;

                const hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = inputName + "[]";
                hiddenInput.value = id;
                hiddenContainer.appendChild(hiddenInput);

                tag.querySelector("span").addEventListener("click", function() {
                    tag.remove();
                    hiddenInput.remove();
                    checkValidityStatus();
                });

                container.insertBefore(tag, input);
                input.value = "";
                checkValidityStatus();
            }
        });
    }

    function loadExistingTags(data, containerId, hiddenContainerId, inputName, inputId) {
        const container = document.getElementById(containerId);
        const hiddenContainer = document.getElementById(hiddenContainerId);
        const input = document.getElementById(inputId);

        if (!data || data.length === 0) return;

        data.forEach(item => {
            if (!item || !item.id || !item.name) return;

            const existingTags = container.querySelectorAll(".tag");
            let isDuplicate = false;

            existingTags.forEach(tag => {
                const tagText = tag.firstChild.textContent.trim().toLowerCase();
                if (tagText === item.name.toLowerCase()) {
                    isDuplicate = true;
                }
            });

            if (isDuplicate) return;

            const tag = document.createElement("div");
            tag.classList.add("tag");
            tag.innerHTML = `${item.name}<span>&times;</span>`;

            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = inputName + "[]";
            hiddenInput.value = item.id;
            hiddenContainer.appendChild(hiddenInput);

            tag.querySelector("span").addEventListener("click", function() {
                tag.remove();
                hiddenInput.remove();
                const totalTags = hiddenContainer.querySelectorAll('input[type="hidden"]').length;
                if (totalTags === 0 && input) {
                    input.setAttribute('required', 'required');
                }
            });

            container.insertBefore(tag, container.querySelector("input"));
        });

        if (input) {
            input.removeAttribute('required');
        }
    }

    createTagInput("tools-input", "tools-container", "list_tools", "technology-hidden-input", "technology_id");
    createTagInput("skills-input", "skills-container", "list_skills", "skill-hidden-input", "skill_id");
    createTagInput("minat-input", "minat-container", "list_minat", "minat-hidden-input", "minat_id");

    loadExistingTags(@json($selectedTools ?? []), "tools-container", "technology-hidden-input", "technology_id", "tools-input");
    loadExistingTags(@json($selectedSkills ?? []), "skills-container", "skill-hidden-input", "skill_id", "skills-input");
    loadExistingTags(@json($selectedMinat ?? []), "minat-container", "minat-hidden-input", "minat_id", "minat-input");

    document.getElementById('btn-cancel').addEventListener('click', function() {
        const form = this.closest('form');
        form.reset();

        document.getElementById('skills-container').querySelectorAll('.tag').forEach(el => el.remove());
        document.getElementById('skill-hidden-input').innerHTML = '';

        document.getElementById('tools-container').querySelectorAll('.tag').forEach(el => el.remove());
        document.getElementById('technology-hidden-input').innerHTML = '';

        document.getElementById('minat-container').querySelectorAll('.tag').forEach(el => el.remove());
        document.getElementById('minat-hidden-input').innerHTML = '';
    });

    const tipeIndustri = document.getElementById('tipe_industri');
    const tipeIndustriLainnyaGroup = document.getElementById('tipe_industri_lainnya_group');
    const tipeIndustriLainnyaInput = document.getElementById('tipe_industri_lainnya');

    function toggleIndustryOther() {
        if (tipeIndustri.value === 'Lainnya') {
            tipeIndustriLainnyaGroup.style.display = 'block';
            tipeIndustriLainnyaInput.setAttribute('required', 'required');
        } else {
            tipeIndustriLainnyaGroup.style.display = 'none';
            tipeIndustriLainnyaInput.removeAttribute('required');
            tipeIndustriLainnyaInput.value = '';
        }
    }

    tipeIndustri.addEventListener('change', toggleIndustryOther);
    toggleIndustryOther();
</script>

@endsection