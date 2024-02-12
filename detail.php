<?php
include "koneksi.php";
 $id = $_GET['id'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Respon Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container py-4 col-xxl-6 col-xl-7 col-lg-8">
    <?php
    $tampilkan = $koneksi->query("SELECT * FROM aduan_masyarakat WHERE ID = '$id'");
    while ($data = $tampilkan->fetch_assoc()) {
     
    
    ?>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label fw-bold">NIK</label>
            <input type="text" class="form-control py-2" readonly id="formGroupExampleInput" name="NIK" placeholder="<?php echo $data['NIK'];  ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control py-2" readonly id="formGroupExampleInput2" name="nama" placeholder="<?php echo $data['Nama'];  ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="text" class="form-control py-2" readonly id="formGroupExampleInput2" name="email" placeholder="<?php echo $data['Email'];  ?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold">Nomer Handphone</label>
            <input type="text" class="form-control py-2" readonly id="formGroupExampleInput2" name="nomer" placeholder="<?php echo $data['Nomer_tlp'];  ?>">
        </div>
        <label for="formGroupExampleInput2" class="form-label fw-bold">Aduan</label>
        <div class="form-floating">
            <textarea class="form-control"  readonly name="aduan" id="floatingTextarea2" style="height: 100px"><?php echo $data['Aduan'];  ?></textarea>
            
        </div>
        <form action="#" method="POST">
        <label for="formGroupExampleInput2" class="form-label fw-bold">Respon</label>
        <input type="text" value='<?php echo $id ?>' hidden name='id'>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="respon" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Respon Admin</label>
        </div>
        <button class="btn btn-primary p-2 my-3"  type="submit" name="submit">Simpan</button>
        <a href="dataMasyarakat.php" class="btn btn-primary p-2 my-3"  type="submit" name="batal">Batal</a>
        </form>
    </div>
<?php } ?>
<?php
   if (isset($_POST['submit'])) {
       $id_masyarakat = $_POST['id'];
       $respon = $_POST['respon'];
       $kirim = "INSERT INTO respon(id_masyarakat,respon) VALUES ('$id_masyarakat','$respon')";
       $koneksi->query($kirim);
       if ($kirim) {
        echo" <script>
        alert('Berhasil Memberikan Respon!!');
        document.location.href = 'dataMasyarakat.php';
       </script>";
       }
   }

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>