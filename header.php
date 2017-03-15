<title>PPDB Online</title>
<script src="js/jquery.sldr.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="css/styles.css" type="text/css"  />
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.js"></script>



<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="index"><span class="glyphicon glyphicon-home"></span>  Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="profile"> Profile </a></li>
         	<li><a href="kegiatan">Kegiatan</a></li>
       	 	<li><a href="data"> Data Sekolah</a></li>
         	<li><a href="psb"> PSB</a></li>
       		<li><a href="user/">Login</a></li>
           </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<?php
include 'koneksi.php';
$stmt = $DB_con->query("SELECT * FROM idprofile");

    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$sql=$DB_con->query("select * from berita");
$data=$sql->fetch(PDO::FETCH_ASSOC);


?>