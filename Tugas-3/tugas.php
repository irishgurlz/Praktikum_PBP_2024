<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Mahasiswa 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if (isset($_POST['submit'])){
            //validasi NIS: hanya bisa berisi angka 0..9
            $nis = test_input($_POST['nis']);
            if (empty($nis)){
                $error_nis = "NIS harus diisi";
            } elseif (!preg_match("/^[0-9]+$/", $nis)){
                $error_nis = "NIS hanya dapat berisi angka";
            }

            //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)){
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)){
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }

            //validasi jenis kelamin tidak boleh kosong
            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
            if (empty($_POST['jenis_kelamin'])){
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }

            //Validasi kelas: harus diisi
            $kelas = $_POST['kelas'];
            if (empty($kelas) || $kelas == '-'){
                $error_kelas = "Kelas harus diisi";
            }

            // Validasi ekskul 1: hanya jika kelas X atau XI, minimal 1 dan maksimal 3 pilihan
            $ekskul = isset($_POST['ekskul']) ? $_POST['ekskul'] : [];
            if ($kelas == "X" || $kelas == "XI") {
                if (empty($_POST['ekskul'])) {
                    $error_ekskul = "Pilih minimal 1 kegiatan ekstrakurikuler";
                } elseif (count($_POST['ekskul']) > 3) {
                    $error_ekskul = "Pilih maksimal 3 kegiatan ekstrakurikuler";
                }
            } 
        }
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kelasSelect = document.getElementById('kelas');
            const ekstrakurikulerSection = document.getElementById('ekskul-section');
            
            function toggleEkstrakurikuler() {
                if (kelasSelect.value === 'XII') {
                    ekstrakurikulerSection.style.display = 'none';
                } else{
                    ekstrakurikulerSection.style.display = 'block';
                }
            }
            toggleEkstrakurikuler();

            kelasSelect.addEventListener('change', toggleEkstrakurikuler);
        });
    </script>
    <div class="container mt-5 border rounded p-0">
    <div class="bg-secondary rounded-top p-2 text-white text-center">Form Mahasiswa</div>
    <form method="post" action ="">
        <!-- NIS -->
        <div class="form-group m-2">
            <label for="nis">NIS:</label><br />
            <input type="text" class="form-control" id="nis" name="nis" minlength="10" maxlength="10" value="<?php if(isset($nis)) {echo $nis;}?>">
            <div class="error text-danger"><?php if (isset($error_nis)) echo $error_nis;?></div>
        </div>
        <!-- Nama -->
        <div class="form-group m-2">
            <label for="nama">Nama:</label><br />
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
            <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
        </div>
        <!-- Jenis Kelamin -->
        <label class="check m-2">Jenis kelamin:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Pria") echo "checked";?>>
                Pria
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Wanita") echo "checked";?>>
                Wanita
            </label>
        </div>
        <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
        <!-- Kelas -->
        <div class="form-group m-2">
            <label class="label" for="kelas">Kelas:</label><br />
            <select name="kelas" id="kelas" class="form-control" >
                <option value="-" selected disable>-- Pilih Kelas --</option>
                <option value="X" <?php if (isset($kelas) && $kelas == "X") echo 'selected="true"';?>>X</option>
                <option value="XI" <?php if (isset($kelas) && $kelas == "XI") echo 'selected="true"';?>>XI</option>
                <option value="XII" <?php if (isset($kelas) && $kelas == "XII") echo 'selected="true"';?>>XII</option>
            </select>
            <div class="error text-danger"><?php if (isset($error_kelas)) echo $error_kelas;?></div>
        </div>
        <br>
        <!-- Ekstrakurikuler -->
        <div id="ekskul-section" style="display: none;">
            <label class="check m-2">Ekstrakurikuler:</label><br />
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="Pramuka" <?php if(isset($ekskul) && in_array('Pramuka', $ekskul)) echo 'checked'; ?>>Pramuka
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="Seni Tari" <?php if(isset($ekskul) && in_array('Seni Tari', $ekskul)) echo 'checked'; ?>>Seni Tari
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="Sinematografi" <?php if(isset($ekskul) && in_array('Sinematografi', $ekskul)) echo 'checked'; ?>>Sinematografi
                </label>
            </div>
            <div class="form-check m-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="ekskul[]" value="Basket" <?php if(isset($ekskul) && in_array('Basket', $ekskul)) echo 'checked'; ?>>Basket
                </label>
            </div>
            <div class="error text-danger"><?php if (isset($error_ekskul)) echo $error_ekskul;?></div>
        </div>
        <!-- submit, reset dan button -->
        <div class="m-2 text-center">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form> 
    </div> 
    <div class="container">
        <?php
            if (isset($_POST["submit"])) { //apakah tombol submit diklik
                if (empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekskul)){
                    echo "<h3 style='margin-top:10px;'>Your Input:</h3>";
                    echo 'NIS = '.$_POST['nis'].'</br>';
                    echo 'Nama = '.$_POST['nama'].'</br>';

                    if (isset($_POST['jenis_kelamin'])) {
                        echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                    }else{
                        echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                    }

                    echo 'Kelas = '.$_POST['kelas'].'</br>';
                    if (!empty($_POST['ekskul'])) {
                        echo 'Ekskul yang dipilih: ';
                        foreach ($_POST['ekskul'] as $ekskul_item) {
                            echo '<br />- '.$ekskul_item;
                        }
                    }
                }
            }
        ?>
    </div>
</body>
</html>
