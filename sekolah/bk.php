 <?php
include_once 'koneksi.php';
include_once 'header.php';


$jmln = $DB_con->query('select count(*) from bk')->fetchColumn(); 


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
                        <a href="bkproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                            </nav>


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
          <th>NIS  </th>        
        <th>Nama Siswa  </th>
        <th>Kelas</th>
        <th>Tanggal </th>
        <th>Catatan </th>
        <th>Keterangan</th>
   
        <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                        $query = "SELECT bk.*, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas
                FROM bk
                LEFT JOIN kelas ON bk.kode_kelas = kelas.kode_kelas
                LEFT JOIN siswa ON bk.kode_siswa = siswa.kode_siswa
            
                ORDER BY tanggal DESC";       
                      $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->bk($newquery);

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