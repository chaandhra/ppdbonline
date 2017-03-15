<?php 
include'koneksi.php';

   if (isset($_GET['id'])) {





    $DB_con->exec("DELETE FROM berita WHERE id = '$_GET[id]'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "berita.php";
  
</script>';


?>