<?php 
include'koneksi.php';

   if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM kelas_siswa WHERE id = '$_GET[id]'");





}

 header("location:kelassiswa.php");


?>