<?php 
include'koneksi.php';

   if (isset($_GET['kode_kelas'])) {
    $DB_con->exec("DELETE FROM kelas WHERE kode_kelas = '$_GET[kode_kelas]'");





}
 header("location:kelas.php");


?>