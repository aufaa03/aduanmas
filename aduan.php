<?php
include "koneksi.php";


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajuan masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<form action="#" method="POST">
    <div class="container py-4 col-xxl-6 col-xl-7 col-lg-8">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label fw-bold">NIK</label>
            <input type="text" class="form-control py-2" id="formGroupExampleInput" name="NIK" placeholder="Masukan NIK" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control py-2" id="formGroupExampleInput2" name="nama" placeholder="Masukan Nama" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="email" class="form-control py-2" id="formGroupExampleInput2" name="email" placeholder="Masukan Email" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold">Nomer Handphone</label>
            <input type="text" class="form-control py-2" id="formGroupExampleInput2" name="nomer" placeholder="Masukan Nomor HP" required>
        </div>
        <label for="formGroupExampleInput2" class="form-label fw-bold">Aduan</label>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="aduan" id="floatingTextarea2" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Aduan kamu</label>
        </div>
        <button class="btn btn-primary p-2 my-3"  type="submit" name="submit">Simpan</button>
        <p>Sudah Mengajukan Keluhan?   <a href="cekform.php">cek disini</a></p>
    </div>
    </form>
    <?php
     if (isset($_POST['submit'])) {
        $nik = $_POST['NIK'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nomer = $_POST['nomer'];
        $aduan = $_POST['aduan'];
        $simpan_data = "INSERT INTO aduan_masyarakat (NIK, Nama, Email, Nomer_tlp, Aduan) VALUES ('$nik', '$nama','$email', '$nomer', '$aduan')";
        $koneksi->query($simpan_data);
        echo" <script>
        alert('Data Berhasil Ditambahkan!!');
        document.location.href = 'Aduan.php';
       </script>";
     }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
