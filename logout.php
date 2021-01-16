<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["nama_usr"]);
session_unset();
session_destroy();	

    //echo "<script>alert('Anda telah berhasil keluar.'); window.location = 'index.html'</script>";
header("location:index.php");
?>