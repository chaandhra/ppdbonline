<?php 
include'koneksi.php';

   if (isset($_GET['no_reg'])) {
    $DB_con->exec("DELETE FROM psb WHERE no_reg = '$_GET[no_reg]'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "psb.php";
  
</script>';


?>