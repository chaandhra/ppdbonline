<?php
include'koneksi.php';
if(isset($_POST)){

$sql = "UPDATE idprofile SET profile='$_POST[profile]',
  			alamat='$_POST[alamat]',
  			telepon='$_POST[tlpn]',
  			email='$_POST[email]'
  			 WHERE id=1";
    $DB_con->exec($sql);
echo $sql;
}
header("location:profilesekolah.php");