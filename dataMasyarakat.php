<?php 
include "koneksi.php"; 
if (!isset($_SESSION["login"])) {
  header ("location:login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data masyarakat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div class="container py-5">
        <span class="fs-1">Data Aduan Masyarakat</span>
        <table class="table table-hover">
            <tr>
                <td>#</td>
                <td>NIK</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Nomer Handphone</td>
                <td>Aduan</td>
                <td>aksi</td>
            </tr>
            <?php 
$no = 1 ;
$ambil = $koneksi->query("SELECT * FROM aduan_masyarakat");
while ($perdata = $ambil->fetch_assoc()) {
?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $perdata['NIK']; ?></td>
    <td><?php echo $perdata['Nama']; ?></td>
    <td><?php echo $perdata['Email']; ?></td>
    <td><?php echo $perdata['Nomer_tlp']; ?></td>
    <td><?php echo $perdata['Aduan']; ?></td>
    <td>
        <?php 
            // Mengambil id_masyarakat dari data aduan_masyarakat saat ini
            $id_masyarakat = $perdata['ID'];
            
            // Mengecek apakah ada baris dalam tabel respon yang memiliki id_masyarakat yang sama dengan id_masyarakat saat ini
            $kondisi = $koneksi->query("SELECT * FROM respon WHERE id_masyarakat = '$id_masyarakat'");
            
            // Mengecek jumlah baris yang ditemukan
            $jumlah_respon = $kondisi->num_rows;
            
            // Jika tidak ada baris yang ditemukan, tampilkan tombol a
            if ($jumlah_respon == 0) {
                echo "<a href='detail.php?id=" . $perdata['ID'] . "'><i class='bi bi-eye-fill'></i></a>";
            }
        ?>
        <a href="hapus.php?id=<?php echo $perdata['ID'] ?>"><i class="bi bi-trash3"></i></a>
    </td>
</tr>
<?php $no++; }; ?>

            
           
        </table>
        <a href="logout.php">Logout...</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  </body>
</html>