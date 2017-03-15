<?php

include 'koneksi.php';
if (isset($_GET['id'])) {
    $query = $DB_con->query("SELECT * FROM psb WHERE nisn = '$_GET[id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
}

 if ($data === false) {
 	echo '<script type="text/javascript">

        alert("Data tidak Ditemukan")
        window.location = "psb.php";
  
</script>';

    exit();
}

include'header.php';
?>




<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="jumbotron">

<div class="panel panel-default" id="print">
<div class="panel-heading">
<h3 class="panel-title">
<center id="print">Data Pendaftaran Anda</center>
</h3>
</div>
<div class="panel-body">

<table id="print">
	<tr>
	<td width="200">NISN</td><td width="500">: <?php echo $data['nisn'];?><br>
	</tr>
	<tr>
	<td>Nama</td><td>: <?php echo $data['nama'];?><br>
	</tr>
	<tr>
	<td>Alamat</td><td>: <?php echo $data['alamat'];?><br>
	</tr>
	<tr>
	<td>No Registrasi</td><td>:<b> <?php echo $data['no_reg'];?><br>
	</tr>


</table>



	</div>
	<div class="panel-footer">

	Simpan No Registrasi tersebut! cek informasi hasil penerimaan siswa baru NAMA SEKOLAH pada tanggal :<?php $query = $DB_con->query("SELECT * from tanggal where id='1'");
  $data  = $query->fetch(PDO::FETCH_ASSOC);

echo $data['tanggal']; ?>
</div>
</div>
<a href="javascript:printDiv('print');"><button type="submit">Print</button></a>
</div>
</div>

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





</body>
<?php include 'footer.php'?>


