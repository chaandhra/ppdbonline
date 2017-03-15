<?php 

include 'header.php';
include 'koneksi.php';

?>


<body>






<!-- //ini form cari data -->
<br>
<div class="container">
<div class="row">

<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
Cek No Registrasi
</div>
<div class="panel-body">
<center>
<div class="form form-inline">-
 <form action="result.php" method="get">
 
<input type="text" class="form-control" name="id" 
placeholder="masukan No NISN anda untuk " >
<button type="submit" class="btn btn-info btn-lg" >CEK</button>
</form>
</div>
</center>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<a href="psb-form.php"><button class="button btn-primary"> DAFTAR SEKARANG ! </button></a>
</center>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h4>Cek Hasil PSB anda di : 
<?php 

 $query = $DB_con->query("SELECT * from tanggal where id='1'");
  $data  = $query->fetch(PDO::FETCH_ASSOC);



$date=date('Y-m-d');

if ($data['tanggal'] === $date) :?>


 <a href="result2.php"> <u>SINI</u>  </a>
<?php else : ?>
	(link belum tersedia)

<?php endif;

?>
</h4>
</center>
</div>
</div>
</div>









  <!-- //ini dorm utama -->
       
        




</div>
</div>

</body>


<?php 

   




include 'footer.php';

?>
