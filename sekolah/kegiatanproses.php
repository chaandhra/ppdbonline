
<div class="container">

<?php
include_once 'koneksi.php';
include_once 'header.php';
 include 'headersub.php';

	error_reporting( ~E_NOTICE ); // avoid notice
	

	
	if(isset($_POST['btnsave']))
	{
		$id = '';
		$tgl = $_POST['tgl'];
		$nama = $_POST['nama'];
		$ket = $_POST['ket'];
		
		$imgFile = $_FILES['poto']['name'];
		$tmp_dir = $_FILES['poto']['tmp_name'];
		$imgSize = $_FILES['poto']['size'];
		
			if(empty($nama)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($ket)){
			$errMSG = "Please Enter Your Job Work.";
		}
		else if(empty($tgl)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
		
			$upload_dir = 'upload/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$poto = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$poto);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			
	else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO kegiatan(id,tanggal, nama_kegiatan, keterangan,poto) VALUES( :id,:tgl,:nama,:ket,:poto) ');
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':tgl',$tgl);
			$stmt->bindParam(':nama',$nama);
			$stmt->bindParam(':ket',$ket);
			$stmt->bindParam(':poto',$poto);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:1;kegiatan.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<body>



	<div class="page-header">
    	<h1 class="h2">Form data Kegiatan. <a class="btn btn-default" href="kegiatan.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
	 <tr>
    	<td><label class="control-label">Tanggal</label></td>
        <td><input class="form-control" type="date" name="tgl" value="<?php echo $tgl; ?>" /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Nama Kegiatan</label></td>
        <td><input class="form-control" type="text" name="nama" placeholder="Enter Username" value="<?php echo $nama; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Keterangan</label></td>
        <td><input class="form-control" type="text" name="ket" placeholder="Your Profession" value="<?php echo $ket; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Dokumentasi</label></td>
        <td><input class="input-group" type="file" name="poto" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>




    

</div>



	
