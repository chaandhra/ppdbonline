<?php
include 'header.php';

if (isset($_GET['id'])) {
$query = $DB_con->query("SELECT bk.*, siswa.nama_siswa, siswa.nis , siswa.alamat, kelas.nama_kelas ,kelas.kelas
                FROM bk
                LEFT JOIN kelas ON bk.kode_kelas = kelas.kode_kelas
                LEFT JOIN siswa ON bk.kode_siswa = siswa.kode_siswa WHERE id = '$_GET[id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
	
}

?>


<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default" id="print">
<div class="panel-body">

<table>
<tr><td width="130"><img src="../img/logo.jpg" width="100" height="100"> </td>
<td align="center">
	PEMERINTAH KABUPATEN SUMEDANG<br>
DINAS PENDIDIKAN<br>
Alamat : Jl. Pangeran Suriaatmadja No. 12 Telepon/fax : 0261-201579 <br>
Email : smpn4.sumedang@yahoo.co.id

</td>
</tr>
<tr><td colspan="2"><hr size="5" style="background-color: #000;"></td></tr>
<tr>
<td >
</td>
<td>
<center>SURAT PERNYATAAN 	</center><br>

</td></tr>
<tr><td colspan="2">

Yang bertanda tangan dibawah ini :<br><br>
<table>
	<tr>
		<td width="100">Nama</td><td>: <?php echo $data['nama_siswa'];?></td>
	</tr>
	<tr>
		<td width="100">NISN</td><td>: <?php echo $data['nis'];?></td>
	</tr>
	<tr>
		<td width="100">Kelas</td><td>: <?php echo $data['kelas'].'-'.$data['nama_kelas'];?></td>
	</tr>
	<tr>
		<td width="100">Alamat</td><td>: <?php echo $data['alamat'];?></td>
	</tr>
</table>
 </td></tr>
<tr><td align="justify" colspan="2"><br>Dengan ini saya menyatakan bahwa saya telah sengaja melakukan perbuatan:
<br><b>"<?php echo $data['catatan'];?> "</b><br>
Saya menyadari perbuatan tersebut telah melanggar tata tertib, sehingga menyesal dan tidak akan mengulangi lagi perbuatan tersebut. Apabila dikemudian hari terbukti melanggar tata tertib lagi, maka saya bersedia menerima sanksi yang sesuai dengan tata tertib.<br>
Demikian surat pernyataan ini saya buat dan ditanda tangani dengan sesungguhnya atas dasar kesadaran sendiri, tanpa paksaan dan pengaruh dari pihal lain.
 </td></tr>
<tr><td></td><td align="right"><br> Sumedang, <?php echo $date=date('d M Y'); ?><br>
Yang membuat pernyataan,<br>

<br><br><br><br><br>

<?php echo $data['nama_siswa'];?><br>
NIS <?php echo $data['nis'];?>
 </td></tr>


</table>
<center>Mengetahui,</center>
<table>

<tr >
<td width="500">Waki kelas<br><br><br><br>
...............<br></td>
<td width="500"><ledtf>Orang Tua</ledtf>
<br><br><br><br>
...............</td>
<td width="100" align="center">Guru Bk<br><br><br><br>
................<br>
</td>
<tr>
</table>



</div>
</div>
</div>
<br>
<center>
<a href="javascript:printDiv('print');"><button type="submit">Print</button></a></center>   



<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
