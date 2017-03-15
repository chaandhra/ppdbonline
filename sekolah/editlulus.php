<?php
include_once 'koneksi.php';

if (isset($_GET['no_reg'])) {

$sql = "UPDATE psb set status='LULUS' WHERE no_reg = '$_GET[no_reg]'";
   $DB_con->exec($sql); 

}
header("location:psb.php");
 

?>
