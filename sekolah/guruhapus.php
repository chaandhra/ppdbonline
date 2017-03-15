<?php 
include'koneksi.php';

   if (isset($_GET['kode_guru'])) {
    $DB_con->exec("DELETE FROM guru WHERE kode_guru = '$_GET[kode_guru]'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "guru.php";
  
</script>';


?>