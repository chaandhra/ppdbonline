<div class="container">


<?php 
include 'koneksi.php';
include 'header.php';
include 'headersub.php';
ini_set("display_errors",0);
if (isset($_GET['kode_siswa'])) {

	$query=$DB_con->query("select * from siswa where kode_siswa='$_GET[kode_siswa]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
}


?>

<script type="text/javascript">
$(document).ready(function()
{    
    $("#nis").keyup(function()
    {       
        var nis = $(this).val();   
        
        if(nis.length > 3)
        {       
            $("#result").html('checking...');
            
           
            
            $.ajax({
                
                type : 'POST',
                url  : 'data.php',
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


<form class="form-horizontal" role="form" action="siswatambah.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="siswa.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">NIS</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nis" id="nis"
placeholder="masukan NISN anda" value="<?php echo $data['nis'];?>" >
 <span id="result"></span>
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Lengkap</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="nama"
placeholder="masukan nama lengkap" value="<?php echo $data['nama_siswa'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Alamat</label>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="alamat" placeholder="masukan alamat lengkap anda" ><?php echo $data['alamat'];?></textarea>
</div></div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tempat Lahir</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tempat_lahir" 
placeholder="masukan tempat lahir anda" value="<?php echo $data['tempat_lahir'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tanggal Lahir</label>
<div class="col-sm-3">
<input type="date" class="form-control" name="tgl" 
placeholder="masukan tanggal lahir anda" value="<?php echo $data['tanggal_lahir'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Jenis Kelamin</label>
<?php if ($data['jenis_kelamin'] === "L") : ?>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L" checked> Laki-laki
</label>
</div>

</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P" > Perempuan
</label>
</div>

</div>

<?php else: ?>

<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L"> Laki-laki
</label>
</div>

</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P" checked> Perempuan
</label>
</div>

</div>
<?php endif ;?>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Agama</label>
<div class="col-sm-4">
<select class="form-control" name="agama">
<option value="<?php echo $data['agama'];?>"><?php echo $data['agama'];?></option>
<option>Islam</option>
<option>Kristen</option>
<option>Hindu</option>
<option>Budha</option>
<option>Lainnya</option>
</select>
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">NO Telepon</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tlp" 
placeholder="masukan ano Telepon" value="<?php echo $data['no_telepon'];?>" >
</div>
</div>


<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tahun Angkatan</label>
<div class="col-sm-4">
<input type="year" class="form-control" name="angkatan" placeholder="Tahun angkatan" 
 value="<?php echo $data['tahun_angkatan'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Status</label>
<div class="col-sm-4">
<select class="form-control" name="status" value="<?php echo $data['status'];?>">
<option>Aktif</option>
<option>Lulus</option>
<option>Keluar</option>
</select>
</div>
</div>
<?php if (isset($_GET['kode_siswa'])):?>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Password</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="pass" 
placeholder="password">
</div>
</div>

<?php endif; ?>
</div>
</div>
<div class="panel-footer">
<?php if (isset($_GET['kode_siswa'])):?>
<button type="submit" class="btn btn-success" name="update">Update</button>
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
$query = $DB_con->query("SELECT max(kode_siswa) as kode FROM siswa");
  $test = $query->fetch(PDO::FETCH_ASSOC);

$a = $test['kode'];
$idUrut = (int) substr($a, 3, 3);
$idUrut++;

$char = "S";
$IDbaru = $char . sprintf("%04s", $idUrut);



$file_max_weight = 200000; //limit the maximum size of file allowed (20Mb)

$ok_ext = array('jpg','png','gif','jpeg'); // allow only these types of files

$destination = 'upload/'; // where our files will be stored



// PHP sets a global variable $_FILES['file'] which containes all information on the file
// The $_FILES['file'] is also an array, so to have the file name we're supposed to write $_FILES['file']['name']
// To shorten that I added the following line. With that I could just do $file['name']
$file = $_FILES['file'];


$filename = explode(".", $file["name"]); 


$file_name = $file['name']; // file original name

$file_name_no_ext = isset($filename[0]) ? $filename[0] : null; // File name without the extension

$file_extension = $filename[count($filename)-1];

$file_weight = $file['size'];

$file_type = $file['type'];



// If there is no error
if( $file['error'] == 0 )
{
    // check if the extension is accepted
    if( in_array($file_extension, $ok_ext)):

        // check if the size is not beyond expected size
        if( $file_weight <= $file_max_weight ):


                // rename the file
                $fileNewName = md5( $file_name_no_ext[0].microtime() ).'.'.$file_extension ;


                // and move it to the destination folder
                if( move_uploaded_file($file['tmp_name'], $destination.$fileNewName) ):


				if (isset($_POST['simpan'])) {
	

    				$sql = "INSERT INTO siswa VALUES ('$IDbaru','$_POST[nis]', '$_POST[nama]', '$_POST[jk]', '$_POST[agama]', '$_POST[tempat_lahir]', '$_POST[tgl]', '$_POST[alamat]', '$_POST[tlp]', '$fileNewName', '$_POST[angkatan]', '$_POST[status]')";
    					$DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "siswa.php";
  
</script>';


                       
						}
 						else {

                            if (isset($_POST['update'])) {
                        $query = $DB_con->query("SELECT kode_siswa FROM siswa where nis='$_POST[nis]'");
                            $test = $query->fetch(PDO::FETCH_ASSOC);
                            $a=$test['kode_siswa'];

                            $sql = "update siswa set nis='$_POST[nis]',nama_siswa='$_POST[nama]', kelamin='$_POST[jk]',tempat_lahir='$_POST[tempat_lahir]', agama='$_POST[agama]', tanggal_lahir='$_POST[tgl]',tahun_angkatan='$_POST[angkatan]', status='$_POST[status]', no_telepon='$_POST[tlp]', alamat='$_POST[alamat]' where kode_siswa='$a'";
                            $DB_con->exec($sql);
$newpass=md5($_POST['pass']);
$sql2 = "INSERT INTO user VALUES ('','$_POST[nama]', '$_POST[nis]','$newpass','user')";
                        $DB_con->exec($sql2);


                         echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "siswa.php";
  
</script>';

    
                            }
                            
                    }

                endif;


        else:

           echo "File too heavy.";

        endif;


    else:

        

    endif;
}
?>