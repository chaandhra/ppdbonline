<?php 

include 'header.php';
include 'koneksi.php';

if (isset($_GET['id'])) {

	$stmt = $DB_con->query("SELECT * from berita where id='$_GET[id]'");

    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$sql=$DB_con->query("select * from berita");
$data=$sql->fetch(PDO::FETCH_ASSOC);
}

?>

<body>


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="well well-sm">

<br>
<div class="page-header">
<h2>Berita
<small>NAMA SEKOLAH</small>
</h2>
</div>
<?php print($userRow['isi']);?>


<br>
<a href="index">Back Home</a>
</div>
</div>
</div>
</div>
<?php 

include 'footer.php';

?>
