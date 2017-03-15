<?php
include 'koneksi.php';

 
if (isset($_POST['daftar'])) {
	

function random_char( $panjang ) { 
	$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$string = ''; 
	for ( $i = 0; $i < $panjang; $i++ ) { 
		$pos = rand( 0, strlen( $karakter ) - 1 ); 
		$string .= $karakter{$pos}; 
	} 
return $string;
}
 
 
$years = date( 'Y' ); // tahun
$get_3_number_of_year = substr( $years,-3 ); 
 
$CODE = random_char(3) . $get_3_number_of_year ;

$A=$_POST['b_indo'];
$B=$_POST['b_ing'];
$C=$_POST['mtk'];
$D=$A+$B+$C;

$Z=$_POST['nisn'];
    $sql = "INSERT INTO psb VALUES ('$CODE','$_POST[nisn]', '$_POST[nama]', '$_POST[alamat]', '$_POST[tempat_lahir]', '$_POST[tgl]', '$_POST[jk]', '$_POST[asal]', '$_POST[tlp]', '$_POST[b_indo]', '$_POST[b_ing]', '$_POST[mtk]','$D','TIDAK LULUS')";
    $DB_con->exec($sql);
}
 

echo "<script languange=\"javascript\">;document.location='result.php?masuk=result&id=$Z'</script>";
?>