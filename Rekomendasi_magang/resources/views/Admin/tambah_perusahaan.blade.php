@extends('layouts.perusahaan')

@section('topbar_title', 'Tambah Perusahaan')

@section('content')

            <div class="content-grid">

                <!-- LEFT -->

                <div>

                    <div class="card">

                        <div class="card-title">
                            <i class="fa-solid fa-building"></i>
                            Identitas Perusahaan
                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="input" placeholder="Contoh: PT Teknologi Masa Depan">
                            </div>

                            <div class="form-group">
                                <label>Industry Type</label>

                                <select class="select">
                                    <option>Pilih Sektor Industri</option>
                                    <option>Technology</option>
                                    <option>Finance</option>
                                    <option>Education</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Company Profile</label>

                            <div class="editor-toolbar">
                                <i class="fa-solid fa-bold"></i>
                                <i class="fa-solid fa-italic"></i>
                                <i class="fa-solid fa-list"></i>
                                <i class="fa-solid fa-align-left"></i>
                            </div>

                            <div class="editor-area">
                                Tuliskan profil singkat perusahaan secara mendalam...
                            </div>
                        </div>

                    </div>

                    <div class="card">

                        <div class="card-title">
                            <i class="fa-solid fa-file-lines"></i>
                            Deskripsi & Status
                        </div>

                        <div class="form-group">
                            <label>Job Description</label>

                            <div class="editor-toolbar">
                                <i class="fa-solid fa-bold"></i>
                                <i class="fa-solid fa-italic"></i>
                                <i class="fa-solid fa-list"></i>
                                <i class="fa-solid fa-link"></i>
                                <i class="fa-solid fa-image"></i>
                            </div>

                            <div class="editor-area">
                                Tuliskan deskripsi pekerjaan, persyaratan, kualifikasi, dan benefit yang akan didapatkan secara lengkap...
                            </div>
                        </div>

                        <div class="switch-wrapper">

                            <div class="switch-text">
                                <h4>Internship Status</h4>
                                <p>Tentukan apakah lowongan ini aktif dan dapat dilamar oleh mahasiswa</p>
                            </div>

                            <div class="switch"></div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->

                <div>

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
                                Format: JPG, PNG (Max 2MB)
                            </div>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-title">
                            <i class="fa-solid fa-briefcase"></i>
                            Detail Lowongan
                        </div>

                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="input" placeholder="Contoh: UI/UX Designer Intern">
                        </div>

                        <div class="form-group">
                            <label>Internship Type</label>

                            <div class="type-group">
                                <button class="type-btn active">Paid</button>
                                <button class="type-btn">Unpaid</button>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="range-header">
                                <label>Duration (Months)</label>
                                <div class="range-value">6 Months</div>
                            </div>

                            <input type="range" class="range-input" min="1" max="12">
                        </div>

                        <div class="form-group">
                            <label>Min IPK / GPA</label>
                            <input type="number" class="input" placeholder="3.50">
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="input" placeholder="Jakarta / Remote">
                        </div>

                    </div>

                </div>

            </div>

            <div class="bottom-actions">

                <div>
                    <button class="btn btn-outline">Cancel</button>
                    <button class="btn btn-secondary">Save as Draft</button>
                </div>

                <button class="btn btn-primary">
                    Publish Vacancy
                </button>

            </div>

@endsection