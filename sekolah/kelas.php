<?php
include_once 'koneksi.php';
include_once 'header.php';

$jmln = $DB_con->query('select count(*) from kelas')->fetchColumn(); 
$jmln2 = $DB_con->query('select count(*) from kelas_siswa')->fetchColumn(); 

?>

<div class="container">
 <?php include 'headersub.php';?>




      <div class="row">
 

            <br>

        <div class="table-responsive">
        Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
 <a href="kelasproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="kelas.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                             <a href="kelassiswa.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-plus"></span> </button>Kelas Siswa</a>
        <form class="navbar-form navbar-right" role="search" action="kelas.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                           
                            </form>
             <table class="table">
  
                <tr>
                
                       
                    <th>Kode kelas</th>
                    <th>Tahun Ajar</th>
                    <th>Kelas</th> 
                    <th>Nama Kelas</th>
                    <th>Guru</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                <tr>
                    <?php
                     ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                      $query = "SELECT kelas.*,guru.kode_guru, guru.nama_guru 
                        from kelas
                        LEFT join guru ON kelas.kode_guru = guru.kode_guru
                        where kelas like '%$cari%' or nama_kelas like '%$cari%' ";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->kelas($newquery);


                        } else {
                        $query = "SELECT kelas.*,guru.kode_guru, guru.nama_guru 
                        from kelas
                        LEFT join guru ON kelas.kode_guru = guru.kode_guru
                        order by kode_kelas asc";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->kelas($newquery);
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


       </hr>

           
                    <br>

       
 
                            