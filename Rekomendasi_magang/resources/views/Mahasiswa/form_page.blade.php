<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekomendasi Magang</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #F5F7FB;
            padding: 40px;
            color: #1E1E1E;
        }

        .container {
            width: 700px;
            margin: auto;
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .step-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .step-title {
            font-size: 24px;
            font-weight: bold;
            color: #0242C4;
        }

        .step-percent {
            color: #7C8299;
            font-size: 16px;
        }

        .progress-bar {
            width: 100%;
            height: 12px;
            background: #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 35px;
        }

        .progress-fill {
            width: 50%;
            height: 100%;
            background: #0242C4;
            border-radius: 20px;
        }

        .card {
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            padding: 25px;
        }

        .card-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-subtitle {
            color: #7C8299;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            width: 100%;
            padding: 14px;
            border: 1px solid #D1D5DB;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #0242C4;
            box-shadow: 0 0 0 3px rgba(2, 66, 196, 0.12);
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
            font-size: 15px;
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

        .btn-submit {
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

        .btn-submit:hover {
            background: #0136A0;
        }

        @media(max-width:768px) {

            body {
                padding: 20px;
            }

            .container {
                width: 100%;
                padding: 25px;
            }

            .card-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="step-header">
        <div class="step-title">
            STEP 1 OF 2: YOUR PROFILE
        </div>

        <div class="step-percent">
            50% Complete
        </div>
    </div>

    <div class="progress-bar">
        <div class="progress-fill"></div>
    </div>

    <div class="card">

        <div class="card-title">
            Lengkapi Data Diri Anda
        </div>

        <div class="card-subtitle">
            Informasi ini membantu sistem mencocokkan Anda
            dengan magang yang paling sesuai.
        </div>

        @if ($errors->any())
            <div style="color:red; margin-bottom:15px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('recommendation.process') }}" method="POST">
            @csrf

            <!-- IPK -->
            <div class="form-group">
                <label>IPK (GPA)</label>

                <input type="text"
                       name="ipk"
                       class="form-control"
                       placeholder="Contoh: 3.80"
                       required>
            </div>

            <!-- MINAT BIDANG -->
            <div class="form-group">
                <label>MINAT BIDANG</label>

                <div class="tag-box" id="minat-bidang-container">
                    <input type="text"
                           id="minat-bidang-input"
                           list="list_minat_bidang"
                           placeholder="Ketik minat bidang lalu tekan Enter">
                </div>

    <div id="minat-hidden-input"></div>

                <datalist id="list_minat_bidang">
                    @foreach ($minat_bidang as $minat)
                        <option value="{{ $minat->name }}"
                                data-id="{{ $minat->id }}">
                        </option>
                    @endforeach
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

    <div id="technology-hidden-input"></div>

                <datalist id="list_tools">
                    @foreach ($technologies as $tech)
                        <option value="{{ $tech->name }}"
                                data-id="{{ $tech->id }}">
                        </option>
                    @endforeach
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

                <div id="skill-hidden-input"></div>

                <datalist id="list_skills">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->name }}"
                                data-id="{{ $skill->id }}">
                        </option>
                    @endforeach
                </datalist>
            </div>

            <button type="submit" class="btn-submit">
                Lihat Hasil Rekomendasi
            </button>

        </form>

    </div>

</div>

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

                const option = [...datalist.options]
                    .find(opt => opt.value === value);

                if (!option) {

                    alert("Data tidak tersedia!");
                    return;
                }

                const id = option.dataset.id;

                const tag = document.createElement("div");

                tag.classList.add("tag");

                tag.innerHTML = `
                    ${value}
                    <span>&times;</span>
                `;

                const hiddenInput = document.createElement("input");

                hiddenInput.type = "hidden";
                hiddenInput.name = inputName + "[]";
                hiddenInput.value = id;

                hiddenContainer.appendChild(hiddenInput);

                tag.querySelector("span").addEventListener("click", function() {

                    tag.remove();
                    hiddenInput.remove();
                });

                container.insertBefore(tag, input);

                input.value = "";
            }
        });
    }

    createTagInput(
        "tools-input",
        "tools-container",
        "list_tools",
        "technology-hidden-input",
        "technology_id"
    );

    createTagInput(
        "skills-input",
        "skills-container",
        "list_skills",
        "skill-hidden-input",
        "skill_id"
    );

    createTagInput(
        "minat-bidang-input",
        "minat-bidang-container",
        "list_minat_bidang",
        "minat-hidden-input",
        "minat_id"
    );

</script>

</body>
</html>
```