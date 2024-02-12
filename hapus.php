<?php
include "koneksi.php";

    $id = $_GET['id'];
    $ambil = "DELETE FROM aduan_masyarakat WHERE ID = '$id'";
    $hapus = $koneksi->query($ambil);
    if ($hapus) {
        echo" <script>
        confirm('Apakah anda yakin ingin menghapus?');
        document.location.href = 'dataMasyarakat.php';
       </script>";
        exit();
    }
?>