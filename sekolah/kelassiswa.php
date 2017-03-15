<div class="container">


<?php
include_once 'koneksi.php';
include_once 'header.php';


$jmln2 = $DB_con->query('select count(*) from kelas_siswa')->fetchColumn(); 

?>

<div class="container">
 <?php include 'headersub.php';?>




      <div class="row">
 

            <br>

                    <br>

        <div class="table-responsive">
        Jumlah Data: <span class="badge"><?php echo $jmln2;?></span>
 <a href="kelassiswaproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="kelassiswa.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
        <form class="navbar-form navbar-right" role="search" action="kelas.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari2">
                            </div>
                           
                            </form>
             <table class="table">
  
                <tr>
                
                       
                    <th>kelas</th>
                    <th>Nama Kelas</th>
                    <th>NISN</th> 
                    <th>Siswa</th>
                    <th>Action</th>

                </tr>

                <tr>
                    <?php
                   
                ini_set("display_errors",0);
                        $cari2=$_POST['cari2'];
                        if(isset($_POST)) {
                $query = "SELECT kelas_siswa.*, siswa.nama_siswa , siswa.nis ,
                        kelas.kelas, kelas.nama_kelas
                        from kelas_siswa 
                        LEFT join kelas ON kelas_siswa.kode_kelas = kelas.kode_kelas
                        left join siswa ON kelas_siswa.kode_siswa = siswa.kode_siswa
                          where nama_kelas like '%$cari2%' or nama_siswa like '%$cari2%' ";
                              
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->kelas2($newquery);

                    } else {
                        $query = "SELECT kelas_siswa.*, siswa.nama_siswa , siswa.nis ,
                        kelas.kelas, kelas.nama_kelas
                        from kelas_siswa 
                        LEFT join kelas ON kelas_siswa.kode_kelas = kelas.kode_kelas
                        left join siswa ON kelas_siswa.kode_siswa = siswa.kode_siswa
                        ";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->kelas2($newquery);
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



