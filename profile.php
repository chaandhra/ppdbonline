<?php 

include 'header.php';
include 'koneksi.php';



?>

<body>


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="well well-sm">

<br>
<div class="page-header">
<h2>Profile
<small>NAMA SEKOLAH</small>
</h2>
</div>
<?php print($userRow['profile']);?>

</div>
</div>
</div>
</div>
<?php 

include 'footer.php';

?>
