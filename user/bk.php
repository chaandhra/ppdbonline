 <?php
include_once 'koneksi.php';
include_once 'header.php';



?>

<div class="container">


 


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
         
        <th>Tanggal </th>
        <th>Catatan </th>
        <th>Keterangan</th>
   
            
                </tr>

                <tr>
                    <?php
    ini_set("display_errors",0);
                    $a=$_SESSION['mysesi'];
                        $query = "SELECT bk.*, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas
                FROM bk
                LEFT JOIN kelas ON bk.kode_kelas = kelas.kode_kelas
                LEFT JOIN siswa ON bk.kode_siswa = siswa.kode_siswa
            where siswa.nis='$a'";

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