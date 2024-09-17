<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Form Input Siswa
            </div>
            <div class="card-body">
                <?php
                $nis = $nama = $kelas = "";
                $gender = $ekstrakurikuler = [];
                $errors = [];
                $success = false;

                //form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validasi NIS
                    if (empty($_POST["nis"])) {
                        $errors['nis'] = "NIS wajib diisi.";
                    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["nis"])) {
                        $errors['nis'] = "NIS harus 10 karakter dan hanya berisi angka.";
                    } else {
                        $nis = $_POST["nis"];
                    }

                    // Validasi Nama
                    if (empty($_POST["nama"])) {
                        $errors['nama'] = "Nama wajib diisi.";
                    } else {
                        $nama = $_POST["nama"];
                    }

                    // Validasi Gender
                    if (empty($_POST["gender"])) {
                        $errors['gender'] = "Jenis kelamin wajib dipilih.";
                    } else {
                        $gender = $_POST["gender"];
                    }

                    // Validasi Kelas
                    if (empty($_POST["kelas"])) {
                        $errors['kelas'] = "Kelas wajib dipilih.";
                    } else {
                        $kelas = $_POST["kelas"];
                    }

                    // Validasi Ekstrakurikuler kelas X dan XI
                    if ($kelas == 'X' || $kelas == 'XI') {
                        if (empty($_POST["ekstrakurikuler"])) {
                            $errors['ekstrakurikuler'] = "Pilih minimal 1 kegiatan ekstrakurikuler.";
                        } elseif (count($_POST["ekstrakurikuler"]) > 3) {
                            $errors['ekstrakurikuler'] = "Pilih maksimal 3 kegiatan ekstrakurikuler.";
                        } else {
                            $ekstrakurikuler = $_POST["ekstrakurikuler"];
                        }
                    }

                    // success
                    if (empty($errors)) {
                        $success = true;
                    }
                }
                ?>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS:</label>
                        <input type="text" class="form-control <?php echo isset($errors['nis']) ? 'is-invalid' : ''; ?>" id="nis" name="nis" value="<?php echo htmlspecialchars($nis); ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['nis'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control <?php echo isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['nama'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="pria" name="gender" value="Pria" <?php echo ($gender == 'Pria') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="wanita" name="gender" value="Wanita" <?php echo ($gender == 'Wanita') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="wanita">Wanita</label>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?php echo $errors['gender'] ?? ''; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select class="form-select <?php echo isset($errors['kelas']) ? 'is-invalid' : ''; ?>" id="kelas" name="kelas" onchange="toggleEkstrakurikuler()">
                            <option value="">Pilih Kelas</option>
                            <option value="X" <?php echo ($kelas == 'X') ? 'selected' : ''; ?>>X</option>
                            <option value="XI" <?php echo ($kelas == 'XI') ? 'selected' : ''; ?>>XI</option>
                            <option value="XII" <?php echo ($kelas == 'XII') ? 'selected' : ''; ?>>XII</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo $errors['kelas'] ?? ''; ?>
                        </div>
                    </div>

                    <!-- Ekstrakurikuler section, jika XII di pencet -->
                    <div id="ekstrakurikuler-section" class="mb-3" style="<?php echo ($kelas == 'XII') ? 'display:none;' : ''; ?>">
                        <label class="form-label">Ekstrakurikuler:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Pramuka" <?php echo (in_array('Pramuka', $ekstrakurikuler)) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Pramuka</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Seni Tari" <?php echo (in_array('Seni Tari', $ekstrakurikuler)) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Seni Tari</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Sinematografi" <?php echo (in_array('Sinematografi', $ekstrakurikuler)) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Sinematografi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Basket" <?php echo (in_array('Basket', $ekstrakurikuler)) ? 'checked' : ''; ?>>
                            <label class="form-check-label">Basket</label>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?php echo $errors['ekstrakurikuler'] ?? ''; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger" onclick="resetForm()">Reset</button>
                </form>

                <!-- Display sudah berhasil -->
                <?php if ($success): ?>
                    <div class="mt-5">
                        <h5>Hasil Submit:</h5>
                        <p><strong>NIS:</strong> <?php echo htmlspecialchars($nis); ?></p>
                        <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($gender); ?></p>
                        <p><strong>Kelas:</strong> <?php echo htmlspecialchars($kelas); ?></p>
                        <?php if (!empty($ekstrakurikuler)): ?>
                            <p><strong>Ekstrakurikuler:</strong> <?php echo implode(", ", $ekstrakurikuler); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- JavaScript Ekstrakulikuler-->
    <script>
        function toggleEkstrakurikuler() {
            const kelas = document.getElementById('kelas').value;
            const ekSection = document.getElementById('ekstrakurikuler-section');
            if (kelas === 'XII') {
                ekSection.style.display = 'none';
            } else {
                ekSection.style.display = 'block';
            }
        }

        function resetForm() {
            // reset
            document.querySelector('form').reset();
            document.getElementById('ekstrakurikuler-section').style.display = 'none';
        }
    </script>
</body>
</html>