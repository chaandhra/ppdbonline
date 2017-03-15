<?php
include 'koneksi.php';
$stmt = $DB_con->query("SELECT * FROM idprofile");

    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.icon-large.css">

<div class="container">

<div class="jumbotron">
<div class="container">

<div class="row">
<div class="col-md-6">
<h3>Informasi Sekolah</h3>
	<span class="glyphicon glyphicon-home"></span> <?php print($userRow['alamat']);?> <br>
	<span class="glyphicon glyphicon-phone"></span>  <?php print($userRow['telepon']);?> <br>
	<span class="glyphicon glyphicon-inbox"></span> <?php print($userRow['email']);?>
</div>


<div class="col-md-6">
<h3>Ikuti Kami</h3>
</div>
</div>


				</div><!--/span-->
			  </div><!--/row-->
			</div><!--/span-->

