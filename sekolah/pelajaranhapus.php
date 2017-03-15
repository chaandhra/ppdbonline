<?php 
include'koneksi.php';

   if (isset($_GET['kode_pelajaran'])) {
    $DB_con->exec("DELETE FROM pelajaran WHERE kode_pelajaran = '$_GET[kode_pelajaran]'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "pelajaran.php";
  
</script>';


?>