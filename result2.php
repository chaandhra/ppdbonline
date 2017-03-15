<?php

include 'koneksi.php';


include'header.php';
     ini_set("display_errors",0);

if (isset($_GET['kode_reg'])) {
    $query = $DB_con->query("SELECT * FROM psb WHERE no_reg = '$_GET[kode_reg]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
}

 if ($data === false) {
 	echo '<script type="text/javascript">

        alert("Data tidak Ditemukan")
        window.location = "result2.php";
  
</script>';

    exit();
}

?>




<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="jumbotron">
<div class="form form-inline">-
 <form action="result2.php" method="get">
 Cek Hasil PSB
<input type="text" class="form-control" name="kode_reg" 
placeholder="masukan No registrasi anda" >
<button type="submit" class="btn btn-info btn-lg" >CEK</button>



</form>
<div class="panel panel-default" id="print">
<div class="panel-heading">
<h3 class="panel-title">
<center id="print">Hasil PSB Anda</center>
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
	<tr>
	<td>Keterangan</td><td>:<b>" <?php echo $data['status'];?> "<br>
	</tr>


</table>



	</div>
	<div class="panel-footer" align="center">
<br>
	Simpan Hasil tes ini! serahkan ke panitia untuk proses selanjutnya .
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


