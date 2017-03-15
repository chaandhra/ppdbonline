<div class="container">
<?php
include'koneksi.php';
include'header.php';
include'headersub.php';
ini_set("display_errors",0);

if (isset($_GET['kode_pelajaran'])) {

	$query=$DB_con->query("select * from pelajaran where kode_pelajaran='$_GET[kode_pelajaran]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
}

?>

<script type="text/javascript">
$(document).ready(function()
{    
    $("#kp").keyup(function()
    {       
        var kp = $(this).val();   
        
        if(kp.length > 3)
        {       
            $("#result").html('checking...');
            
            /*$.post("username-check.php", $("#reg-form").serialize())
                .done(function(data){
                $("#result").html(data);
            });*/
            
            $.ajax({
                
                type : 'POST',
                url  : 'data2.php',
                data : $(this).serialize(),
                success : function(data)
                          {
                             $("#result").html(data);
                          }
                });
                return false;
            
        }
        else
        {
            $("#result").html('');
        }
    });
    
});
</script>


<form class="form-horizontal" role="form" action="pelajaranproses.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="pelajaran.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Kode Pelajaran</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kp" id="kp"
placeholder="masukan kode" value="<?php echo $data['kode_pelajaran'];?>" >
 <span id="result"></span>
</div>

</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Pelajaran</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="nama"
placeholder="masukan nama pelajran" value="<?php echo $data['nama_pelajaran'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Status</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="status" placeholder="masukan status" value="<?php echo $data['keterangan'];?>">
</div>


</div>
</div>
<div class="panel-footer">
<?php if (isset($_GET['kode_pelajaran'])):?>
<button type="submit" class="btn btn-success" name="edit">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php else :?>

<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php endif; ?>
</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
    

                    $sql = "INSERT INTO pelajaran VALUES ('$_POST[kp]','$_POST[nama]','$_POST[status]')";
                        $DB_con->exec($sql);

                     
                        echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "pelajaranproses.php";
  
</script>';

  

                       
                        }
                            else {


                           if (isset($_POST['edit'])) {
                     

                            $sql = "update pelajaran set  nama_pelajaran='$_POST[nama]',keterangan='$_POST[status]' where kode_pelajaran='$_POST[kp]'";
                            $DB_con->exec($sql);


                                                 
echo '<script type="text/javascript">

        alert("Berhasil diedit")
        window.location = "pelajaran.php";
  
</script>';
                     


}
}


       
?>