<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM admin WHERE id=:id");
	$stmt->execute(array(":id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


include'koneksi.php';
?>



<head>

<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="../css/styles.css" type="text/css"  />
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootbox.js"></script>
<title>welcome - <?php print($userRow['email']); ?></title>

</head>

<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Panel Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="profilesekolah.php"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
         	<li><a href="nilai.php"><span class="glyphicon glyphicon-tasks"></span> Nilai</a></li>
       	 	<li><a href="psb.php"><span class="glyphicon glyphicon-import"></span> PSB</a></li>
         	<li><a href="siswa.php"><span class="glyphicon glyphicon-home"></span> Sekolah</a></li>
       		<li><a href="bk.php"><span class="glyphicon glyphicon-th-list"></span> BK</a></li>
          <li><a href="laporan.php"><span class="glyphicon glyphicon-print"></span> Cetak Laporan</a></li>
          <li><a href="userlist.php"><span class="glyphicon glyphicon-user"></span>User list</a></li>
           </ul>
          <ul class="nav navbar-nav navbar-right">
            


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


