@extends('layouts.perusahaan')

@section('topbar_title', 'Tambah Perusahaan')

@section('content')

<div class="container">

    {{-- ALERT VALIDASI --}}

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('dashboard.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="content-grid">

            <!-- LEFT -->

            <div>

                <!-- IDENTITAS PERUSAHAAN -->

                <div class="card">

                    <div class="card-title">
                        <i class="fa-solid fa-building"></i>
                        Identitas Perusahaan
                    </div>

                    <div class="form-row">

                        <!-- COMPANY NAME -->

                        <div class="form-group">

                            <label>Company Name</label>

                            <input type="text"
                                   name="name"
                                   class="input"
                                   value="{{ old('name') }}"
                                   placeholder="Contoh: PT Teknologi Masa Depan"
                                   required>

                        </div>

                        <!-- INDUSTRY -->

                        <div class="form-group">

                            <label>Industry Type</label>

                            <select name="tipe_industri"
                                    class="select"
                                    required>

                                <option value="">
                                    Pilih Sektor Industri
                                </option>

                                <option value="Technology"
                                    {{ old('tipe_industri') == 'Technology' ? 'selected' : '' }}>
                                    Technology
                                </option>

                                <option value="Finance"
                                    {{ old('tipe_industri') == 'Finance' ? 'selected' : '' }}>
                                    Finance
                                </option>

                                <option value="Education"
                                    {{ old('tipe_industri') == 'Education' ? 'selected' : '' }}>
                                    Education
                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- PROFILE -->

                    <div class="form-group">

                        <label>Company Profile</label>

                        <textarea name="profile_perusahaan"
                                  class="input"
                                  rows="6"
                                  placeholder="Tuliskan profil perusahaan...">{{ old('profile_perusahaan') }}</textarea>

                    </div>

                </div>

                <!-- DESKRIPSI LOWONGAN -->

                <div class="card">

                    <div class="card-title">
                        <i class="fa-solid fa-file-lines"></i>
                        Deskripsi Lowongan
                    </div>

                    <!-- JOB DESCRIPTION -->

                    <div class="form-group">

                        <label>Job Description</label>

                        <textarea name="job_description"
                                  class="input"
                                  rows="8"
                                  placeholder="Tuliskan deskripsi pekerjaan, requirement, dan benefit...">{{ old('job_description') }}</textarea>

                    </div>

                    <!-- REQUIRED SKILLS -->

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

                                <option value="{{ $skill->name }}"
                                        data-id="{{ $skill->id }}">
                                </option>

                            @endforeach

                        </datalist>

                    </div>

                    <!-- TECHNOLOGIES -->

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

                                <option value="{{ $technology->name }}"
                                        data-id="{{ $technology->id }}">
                                </option>

                            @endforeach

                        </datalist>

                    </div>

                    <!-- MINAT BIDANG -->

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

                                <option value="{{ $minat->name }}"
                                        data-id="{{ $minat->id }}">
                                </option>

                            @endforeach

                        </datalist>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <!-- LOGO -->

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

                <!-- DETAIL LOWONGAN -->

                <div class="card">

                    <div class="card-title">
                        <i class="fa-solid fa-briefcase"></i>
                        Detail Lowongan
                    </div>

                    <!-- POSITION -->

                    <div class="form-group">

                        <label>Position</label>

                        <input type="text"
                               name="posisi_magang"
                               class="input"
                               value="{{ old('posisi_magang') }}"
                               placeholder="Contoh: UI/UX Designer Intern"
                               required>

                    </div>

                    <!-- STATUS -->

                    <div class="form-group">

                        <label>Internship Type</label>

                        <select name="status_magang"
                                class="select"
                                required>

                            <option value="Paid"
                                {{ old('status_magang') == 'Paid' ? 'selected' : '' }}>
                                Paid
                            </option>

                            <option value="Unpaid"
                                {{ old('status_magang') == 'Unpaid' ? 'selected' : '' }}>
                                Unpaid
                            </option>

                        </select>

                    </div>

                    <!-- DURATION -->

                    <div class="form-group">

                        <label>Duration (Months)</label>

                        <input type="number"
                               name="duration_months"
                               class="input"
                               min="1"
                               max="12"
                               value="{{ old('duration_months') }}"
                               placeholder="Contoh: 6">

                    </div>

                    <!-- GPA -->

                    <div class="form-group">

                        <label>Min IPK / GPA</label>

                        <input type="number"
                               step="0.01"
                               min="0"
                               max="4"
                               name="min_ipk"
                               class="input"
                               value="{{ old('min_ipk') }}"
                               placeholder="3.50">

                    </div>

                    <!-- LOCATION -->

                    <div class="form-group">

                        <label>Location</label>

                        <input type="text"
                               name="kota"
                               class="input"
                               value="{{ old('kota') }}"
                               placeholder="Jakarta / Remote">

                    </div>

                </div>

            </div>

        </div>

        <!-- BUTTON -->

        <div class="bottom-actions">

            <div>

                <a href="{{ route('dashboard.index') }}"
                   class="btn btn-outline">

                    Cancel

                </a>

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Publish Vacancy

            </button>

        </div>

    </form>

</div>

{{-- STYLE TAG INPUT --}}

<style>

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

</style>

{{-- SCRIPT TAG INPUT --}}

<script>

    function createTagInput(
        inputId,
        containerId,
        datalistId,
        hiddenContainerId,
        inputName
    ) {

        const input = document.getElementById(inputId);

        const container = document.getElementById(containerId);

        const datalist = document.getElementById(datalistId);

        const hiddenContainer = document.getElementById(hiddenContainerId);

        input.addEventListener("keydown", function(e) {

            if (e.key === "Enter") {

                e.preventDefault();

                const value = input.value.trim();

                if (value === "") return;

                // CEK DUPLIKAT

                const existingTags = container.querySelectorAll(".tag");

                let isDuplicate = false;

                existingTags.forEach(tag => {

                    const tagText = tag.firstChild.textContent
                        .trim()
                        .toLowerCase();

                    if (tagText === value.toLowerCase()) {

                        isDuplicate = true;

                    }

                });

                if (isDuplicate) {

                    input.value = "";
                    return;

                }

                // CARI DATA DATALIST

                const option = [...datalist.options]
                    .find(opt => opt.value === value);

                if (!option) {

                    alert("Data tidak tersedia!");
                    return;

                }

                const id = option.dataset.id;

                // BUAT TAG

                const tag = document.createElement("div");

                tag.classList.add("tag");

                tag.innerHTML = `
                    ${value}
                    <span>&times;</span>
                `;

                // HIDDEN INPUT

                const hiddenInput = document.createElement("input");

                hiddenInput.type = "hidden";

                hiddenInput.name = inputName + "[]";

                hiddenInput.value = id;

                hiddenContainer.appendChild(hiddenInput);

                // HAPUS TAG

                tag.querySelector("span")
                    .addEventListener("click", function() {

                        tag.remove();
                        hiddenInput.remove();

                    });

                container.insertBefore(tag, input);

                input.value = "";

            }

        });

    }

    // TOOLS

    createTagInput(
        "tools-input",
        "tools-container",
        "list_tools",
        "technology-hidden-input",
        "technology_id"
    );

    // SKILLS

    createTagInput(
        "skills-input",
        "skills-container",
        "list_skills",
        "skill-hidden-input",
        "skill_id"
    );

    // MINAT BIDANG

    createTagInput(
        "minat-input",
        "minat-container",
        "list_minat",
        "minat-hidden-input",
        "minat_id"
    );

</script>

@endsection