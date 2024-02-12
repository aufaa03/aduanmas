<?php
 include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>form login</title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="login-box">
 
  <form action="#" method="POST">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div><center>
    <button type="Submit" name="simpan">
           SEND
       <span></span>
</button></center>
  </form>
</div>
  <?php
      if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM admin WHERE username='$username' AND password ='$password'";
        $hasil = $koneksi->query($sql);
        if ($hasil->num_rows > 0) {
          // keluarin data didatabase
          $data = $hasil->fetch_assoc();
          $_SESSION["username"] = $data["$username"];
          $_SESSION["login"] = true;
          echo" <script>
           alert('Login Berhasil!!');
           document.location.href = 'dataMasyarakat.php';
          </script>";

          } else {
            echo" <script>
            alert('Login Gagal!!');
            document.location.href = 'login.php';
           </script>";
          }
          }
      ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>