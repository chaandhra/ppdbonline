<?php
session_start();
 
if (isset($_SESSION['mysesi']) && isset($_SESSION['mytype'])=='user')
{
  echo "<script>window.location.assign('home.php')</script>";
}
 
  
  ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User : Login</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="../css/style.css" type="text/css"  />
</head>
<body>

<?php
        ini_set("display_errors",0);
$username=$_POST['username'];
$password=md5($_POST['password']);
$login=$_POST['login'];
if(isset($login)){
  $mysqli = new mysqli("localhost", "root", "", "smpn4smd");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM user where username='$username' and password='$password'");
  $row = $res->fetch_assoc();
  $name = $row['name_login'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['type_login'];
  if($user==$username && $pass=$password){
    session_start();
     if($type=="user"){
      $_SESSION['mysesi']=$user;    
      $_SESSION['mytype']=$type;

      echo "<script>window.location.assign('home.php')</script>";
    } else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Maaf!</strong> Tidak sesuai dengan type user.
</div>
<?php
    }
  } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> This username or password not same with database.
</div>
<?php
  }
}
?>

<style type="text/css">
  .b{

    margin-left:500px;
    padding:1;
  }
</style>

<div class="b">
       <div class="col-md-4" align="center">
    <div class="panel panel-default" align="center">
      <div class="panel-body">
     
    <h2>Login user</h2>

    <form role="form" method="post">
      <div class="form-group">
 <label for="username">Username</label>
 <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group">
 <label for="password">Password</label>
 <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
        <a href="../"> <button type="button"  class="btn btn-warning">Cancel</button></a>
   
    </form>
       
      </div>
     </div>
     
  </div>
</body>
</html>