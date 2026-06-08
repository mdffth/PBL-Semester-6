<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rekomendasi Magang</title>
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/form_page.css') }}">
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-brand">
            <div class="brand-logo">RI</div>
            <span class="brand-name">RekomIn</span>
        </a>
    </nav>

    <div class="main-wrapper">
        <div class="container">

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

                        <input type="text" name="ipk" class="form-control" placeholder="Contoh: 3.80" required>
                    </div>

                    <!-- MINAT BIDANG -->
                    <div class="form-group">
                        <label>MINAT BIDANG</label>

                        <div class="tag-box" id="minat-bidang-container">
                            <input type="text" id="minat-bidang-input" list="list_minat_bidang"
                                placeholder="Ketik minat bidang lalu tekan Enter">
                        </div>

                        <div id="minat-hidden-input"></div>

                        <datalist id="list_minat_bidang">
                            @foreach ($minat_bidang as $minat)
                                <option value="{{ $minat->name }}" data-id="{{ $minat->id }}">
                                </option>
                            @endforeach
                        </datalist>
                    </div>

                    <!-- TOOLS -->
                    <div class="form-group">
                        <label>TOOLS YANG DIKUASAI</label>

                        <div class="tag-box" id="tools-container">
                            <input type="text" id="tools-input" list="list_tools"
                                placeholder="Ketik tools lalu tekan Enter">
                        </div>

                        <div id="technology-hidden-input"></div>

                        <datalist id="list_tools">
                            @foreach ($technologies as $tech)
                                <option value="{{ $tech->name }}" data-id="{{ $tech->id }}">
                                </option>
                            @endforeach
                        </datalist>
                    </div>

                    <!-- SKILLS -->
                    <div class="form-group">
                        <label>KEAHLIAN (SKILLS)</label>

                        <div class="tag-box" id="skills-container">
                            <input type="text" id="skills-input" list="list_skills"
                                placeholder="Ketik skill lalu tekan Enter">
                        </div>

                        <div id="skill-hidden-input"></div>

                        <datalist id="list_skills">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->name }}" data-id="{{ $skill->id }}">
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
