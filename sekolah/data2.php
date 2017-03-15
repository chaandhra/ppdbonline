<?php
include 'koneksi.php';
  if($_POST) 
  {
      $kp     = strip_tags($_POST['kp']);
      
	  $stmt=$DB_con->prepare("SELECT kode_pelajaran FROM pelajaran WHERE kode_pelajaran=:name");
	  $stmt->execute(array(':name'=>$kp));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {
		  echo "<span style='color:brown;'>maaf kode sudah ada !!!</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>available</span>";
	  }
  }
?>