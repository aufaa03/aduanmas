<?php
  session_start();
  session_destroy();
  echo" <script>
  alert('Berhasil LOGOUT !!');
  document.location.href = 'login.php';
 </script>";
?>