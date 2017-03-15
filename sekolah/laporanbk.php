<?php
include 'koneksi.php';
include 'header.php';

?>
<body>
<div class="clearfix"></div>
        
    
<div class="container">


  <center>
 <a href="javascript:printDiv('print');"><button type="submit">Print</button></a></center>   

        <div class="container" id="print">


      <h3>Data BK</h3>

            <br>

        <div class="table-responsive">
             <table class="table" border="1">
  
                 <tr>
               
        <th>NIS  </th>        
        <th>Nama Siswa  </th>
        <th>Kelas</th>
        <th>Tanggal </th>
        <th>Catatan </th>
        <th>Keterangan</th>
                    
            
                </tr>

                <tr>
                 
                     <?php
                   
                      $query = "SELECT bk.*, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas
                FROM bk
                LEFT JOIN kelas ON bk.kode_kelas = kelas.kode_kelas
                LEFT JOIN siswa ON bk.kode_siswa = siswa.kode_siswa
            
                ORDER BY tanggal DESC";       
        
                        $crud->bk2($query);

                    
                     ?>
             
                   
                </tr>
            </table>
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