<?php
include_once 'koneksi.php';
include_once 'header.php';

 
  

?>
<body>
<div class="clearfix"></div>
           

<div class="container">
<h2>Data Peserta PSB </h2><br>
<br>

                            <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php
$nRows = $DB_con->query('select count(*) from psb')->fetchColumn(); 
echo $nRows;

$query=$DB_con->query("SELECT * from tanggal where id='1'");
$data  = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['simpan'])) {

   $query="UPDATE tanggal set tanggal='$_POST[tgl]' where id='1' ";
   $DB_con->exec($query);
   echo '<script type="text/javascript">

        alert("Berhasil diubah")
        window.location = "psb.php";
  
</script>';
}



?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-left" role="search" action="psb.php" method="post">
                            <div class="form-group">
                            <label class="form-control">Masukan tanggal cek registrasi</label>
                            
                            <input type="date" class="form-control" name="tgl" value="<?php echo $data['tanggal'];?>">
                            </div>
                            <button type="submit" class="btn btn-default" name="simpan" >Simpan</button>
                         
                            </form>


                            <form class="navbar-form navbar-right" role="search" action="psb.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                            
                             <a href="psb.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </form>
                      
                            
                            </div>
                            </nav>

<div class="table-responsive">
     <table class="table">
  
        <tr>
        <th>No Registrasi</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tempat, Tanggal Lahir</th>
       
            <th>Jenis kelamin</th>
            <th>Asal Sekolah</th>
            <th>No Telepon</th>
            <th>B. Indonesia</th>
            <th>B. Inggris</th>
            <th>Matematika</th>
            <th>jumlah</th>
            <th>Status</th>
            <th>*</th>
            <th>Action</th>
       
        </tr>

     
<tr>
       <?php
                    ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM psb where nisn like '%$cari%' or nama like '%$cari%' or no_reg like '%$cari%'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->psb($newquery);


                        } else {
                        $query = "SELECT * FROM psb order by jml";       
                        $records_per_page=3;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->psb($newquery);
                   }

                     ?>
     </tr>
    <tr>
        <td colspan="17" align="center">
            <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
            </div>
        </td>
    </tr>

</table>




</div>
</div>
</div>

<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>


</body>