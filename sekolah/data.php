<?php
 ini_set("display_errors",0);
include 'koneksi.php';
  if($_POST) 
  {
      $nis    = strip_tags($_POST['nis']);
      
	  $stmt=$DB_con->prepare("SELECT nis FROM siswa WHERE nis=:name");
	  $stmt->execute(array(':name'=>$nis));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {
		  echo "<span style='color:brown;'>maaf nis sudah ada !!!</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>available</span>";
	  }
}

?>