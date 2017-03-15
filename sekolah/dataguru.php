   <?php

include 'koneksi.php';
  if($_POST) 
  {

   $nip    = strip_tags($_POST['nip']);
      
	  $stmt=$DB_con->prepare("SELECT nip FROM guru WHERE nip=:name");
	  $stmt->execute(array(':name'=>$nip));
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