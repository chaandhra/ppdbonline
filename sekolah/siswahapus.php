<?php 
include'koneksi.php';

   if (isset($_GET['kode_siswa'])) {
    $DB_con->exec("DELETE FROM siswa WHERE kode_siswa = '$_GET[kode_siswa]'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "siswa.php";
  
</script>';


?>