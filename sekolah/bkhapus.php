<?php 
include'koneksi.php';

   if (isset($_GET['nis'])) {


   $stmt = $DB_con->query("SELECT * FROM siswa WHERE nis='$_GET[nis]'");

    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    $b=$userRow['kode_siswa'];



    $DB_con->exec("DELETE FROM bk WHERE kode_siswa = '$b'");





}
echo '<script type="text/javascript">

        alert("Berhasil Dihapus")
        window.location = "bk.php";
  
</script>';


?>