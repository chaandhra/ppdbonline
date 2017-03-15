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
                
                       
                    
         <th>Pelajaran</th>
         <th>Kelas</th>
        <th>Semester</th>
        <th>Tugas 1 </th>
        <th>Tugas 2 </th>
        <th>UTS</th>
        <th>UAS</t>
 
            
                </tr>

                <tr>
                    <?php

                  
                    $a=$_SESSION['mysesi'];

                        $query = "SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas
                FROM nilai
                LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
                LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                  LEFT JOIN kelas ON nilai.kode_kelas = kelas.kode_kelas
            where siswa.nis='$a'
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