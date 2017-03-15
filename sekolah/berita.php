<?php
include_once 'koneksi.php';
include_once 'header.php';

$jmlberita = $DB_con->query('select count(*) from berita')->fetchColumn(); 

if (isset($_GET['id'])) {

    $query=$DB_con->query("SELECT * from berita where id='$_GET[id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
}


?>
<div class="container">
 <?php include 'headersub.php';?>
 <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php echo $jmlberita;?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search" action="berita.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                           
                             <a href="berita.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            
                            </form>
                       
                            
                            </div>
                            </nav>


          <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                 
                    <th>Judul</th>
                    <th>Tanggal</th> 
                    <th>Jenis</th>
                
                    <th>Action</th>
            
                </tr>

                <tr>
                 
                     <?php
                    ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM berita where judul like '%$cari%' or jenis like'%$cari&'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->berita($newquery);


                        } else {
                        $query = "SELECT * FROM berita";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->berita($newquery);
                    }
                     ?>
             
                    <td colspan="7" align="center">
                        <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        </div>



<script src="../ckeditor/ckeditor.js"></script>
 
    <body>
<div class="container">

   <div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
Data Berita
</h3>
</div>
<div class="panel-body">
 <form class="form-horizontal" role="form" action="berita" method="post">
<?php if (isset($_GET['id'])) : ?>
<div class="form-group">

<div class="col-sm-1">
<input type="hidden" class="form-control"  name="id"
 value=" <?php echo $data['id'];?> ">
</div>
</div>
<?php endif; ?>

<?php if (isset($_GET['id'])) : ?>
<div class="form-group">
<label for="judul" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="judul" name="judul"
placeholder="masukan judul" value=" <?php echo $data['judul']; ?> ">
</div>
</div>
<?php else : ?>
<div class="form-group">
<label for="judul" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="judul" name="judul"
placeholder="masukan judul" value="  ">
</div>
</div>
<?php endif; ?>
<div class="form-group">
<label for="tgl" class="col-sm-2 control-label">tanggal</label>
<?php if (isset($_GET['id'])) : ?>
<div class="col-sm-3">
<input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data['tanggal']; ?>">
</div>
<?php else :?>
    <div class="col-sm-3">
<input type="date" class="form-control" id="tgl" name="tgl">
</div>
<?php endif ;?>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Jenis Katagori</label>
<?php if (isset($_GET['id'])) : ?>
<div class="col-sm-4">
<select name="jenis" class="form-control"> 
    <option><?php echo $data['jenis']; ?></option>
       <option>Pengumuman</option>
    <option>Berita</option>
    <option>Artikel</option>
</select>
</div>
<?php else : ?>
<div class="col-sm-4">
<select name="jenis" class="form-control"> 
    <option>Pengumuman</option>
    <option>Berita</option>
    <option>Artikel</option>
</select>
</div>
<?php endif ; ?>
</div>

<div class="form-group">
<label  class="col-sm-2 control-label">Isi</label>
<?php if (isset($_GET['id'])) : ?>
<div class="col-sm-10">
 <textarea name="isi" id="editor1" rows="10" cols="50">
        <?php echo $data['isi'];?>     
 </textarea>
 </div>
<?php else : ?>
 <div class="col-sm-10">
 <textarea name="isi" id="editor1" rows="10" cols="50">
             
 </textarea>
</div>
<?php endif; ?>
</div>

<?php if (isset($_GET['id'])) : ?>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" name="edit">Edit</button>
<button type="cancel" class="btn btn-warning" name="batal">Batal</button>
</div>
</div>
<?php else : ?>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-warning" name="batal">Batal</button>
</div>
</div>
<?php endif; ?>
 </form>
</div>
</div>
</div>




<?php 

if (isset($_POST['simpan'])) {

    $sql="INSERT into berita VALUE('','$_POST[judul]','$_POST[tgl]','$_POST[jenis]','$_POST[isi]')";
   $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "berita";
  
</script>';
    
} else {
if (isset($_POST['edit'])) {
    $sql=" UPDATE berita set judul='$_POST[judul]', tanggal='$_POST[tgl]', jenis='$_POST[jenis]' where id='$_POST[id]' ";
       $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil diudate")
        window.location = "berita";
  
</script>';

}

}

?>


<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
