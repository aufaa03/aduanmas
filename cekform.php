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
    <div class="container py-5 col-xxl-6 col-xl-7 col-lg-8">
        <span class="text-capitalize fs-1">Form Cek Aduan</span>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">ID</label>
            <input type="text" class="form-control py-2" name="cari" id="formGroupExampleInput2" placeholder="Masukan ID kamu">
        </div>
        <button class="btn btn-primary p-2 my-3" type="submit" name="search">Search</button>
        <a href="aduan.php" class="btn btn-primary p-2 my-3 ms-2"  type="submit" name="batal">Kembali</a>
    </div>
    </form>
    <div class="container py-4 col-xxl-6 col-xl-7 col-lg-8">
        <?php
        // Cek apakah tombol "Cari" diklik
        if (isset($_POST['search'])) {
               // Ambil nilai pencarian dari form
              $search = $_POST['cari'];

              // Query SQL untuk mencari data berdasarkan ID
              $sql = "SELECT * FROM aduan_masyarakat, respon WHERE NIK LIKE '%$search%' ";
              $result = mysqli_query($koneksi, $sql);
}
        // Jika query pencarian dijalankan
        if (isset($result)) {
            // Jika hasil pencarian ditemukan
            if (mysqli_num_rows($result) > 0) {
                echo "<p>Menampilkan " . mysqli_num_rows($result) . " item.</p>";
                echo "<table class='table table-striped table-bordered'>";
                echo "<tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Aduan</th>
                        <th>Respon</th>
                        <th>Status</th>
                    </tr>";
                // Tampilkan hasil pencarian
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['ID'] . "</td>
                            <td>" . $row['Nama'] . "</td>
                            <td>" . $row['NIK'] . "</td>
                            <td>" . $row['Aduan'] . "</td>
                            <td>" . $row['respon'] . "</td>
                            <td>-</td>  
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada hasil yang ditemukan.";
            }
        }
        ?>
        
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>