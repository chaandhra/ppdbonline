<div class="container">
<?php
include'koneksi.php';
include'header.php';
include'headersub.php';
ini_set("display_errors",0);

if (isset($_GET['id'])) {

	$query=$DB_con->query("select * from ekskul where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
    
        extract($data);
}

?>




<form class="form-horizontal" role="form"  action="ekskulupdate.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="ekskul.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">
<input type="text" class="form-control" name="id" 
 value="<?php echo $data['id'];?>" >

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Nama Ekskul</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nama" 
placeholder="masukan prestasi" value="<?php echo $data['nama'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Ketua</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="ketua"
placeholder="masukan juara" value="<?php echo $data['ketua'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">kontak</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kontak" placeholder="masukan keterangan" value="<?php echo $data['kontak'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">jadwal</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="jadwal" placeholder="masukan jadwal" value="<?php echo $data['jadwal'];?>"></div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">keterangan</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan" value="<?php echo $data['keterangan'];?>"></div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Poto</label>
<div class="col-sm-4">
<input type="file" class="form-control" name="poto" value="<?php echo $data['poto'];?>" accept="image/*">

<p><img src="upload/<?php echo $data['poto'];?>" height="150" width="150" /></p>

</div>
</div>


</div>
</div>
<div class="panel-footer">

<button type="submit" class="btn btn-success" name="edit">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>

</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                           if (isset($_POST['edit'])) {
       
        $imgFile = $_FILES['poto']['name'];
        $tmp_dir = $_FILES['poto']['tmp_name'];
        $imgSize = $_FILES['poto']['size'];
                    
        if($imgFile)
        {
            $upload_dir = 'upload/'; // upload directory    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$data['poto']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $data['poto']; // old image from database
        }   
    
       
                            $sql = "UPDATE ekskul set nama='$_POST[nama]',ketua='$_POST[ketua]', kontak='$_POST[kontak]', jadwal='$_POST[jadwal]', keterangan='$_POST[keterangan]', poto='$userpic' where id='$_POST[id]'";
                            $DB_con->exec($sql);


                                                 
echo $sql;
                     


}

       
?>