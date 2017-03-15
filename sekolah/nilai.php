 <?php
include_once 'koneksi.php';
include_once 'header.php';


$jmln = $DB_con->query('select count(*) from nilai')->fetchColumn(); 

if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM nilai WHERE id = '$_GET[id]'");
echo '<script type="text/javascript">

       
        window.location = "nilai.php";
  
</script>';

}


?>

<div class="container">


 <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Cari</button>
                            </form>

                        <a href="nilaiproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="nilaicetak.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-print"></span>  Cetak Data</button></a>
                        
                            </div>
                            </nav>


        <div class="container">
<table>

      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                       
                    <th>NIS</th>
        <th>Nama Siswa  </th>
         <th>Pelajaran</th>
         <th>guru</th>
         <th>Kelas</th>
        <th>Semester</th>
        <th>Tugas 1 </th>
        <th>Tugas 2 </th>
        <th>UTS</th>
        <th>UAS</t>
        <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                        $query = "SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas , guru.kode_guru , guru.nama_guru
                FROM nilai
                LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
                LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                  LEFT JOIN kelas ON nilai.kode_kelas = kelas.kode_kelas
                  LEFT JOIN guru on nilai.kode_guru=guru.kode_guru
            
                ORDER BY semester, kode_pelajaran, kode_kelas ASC";       
                     
                      $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->nilai($newquery);
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