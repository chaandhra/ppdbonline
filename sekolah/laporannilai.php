<?php
include_once 'koneksi.php';
include_once 'header.php';

 
  

?>
<body >
<div class="clearfix"></div>
    <center>
 <a href="javascript:printDiv('print');"><button type="submit">Print</button></a></center>          
<div class="container" id="print">
<h2 >Data Nilai </h2>   <br>
<br>

                       

<div class="table-responsive"  >
     <table class="table" border="1" >
  
        <tr>
        <th>NO</th>
        <th>Pelajaran</th>
       <th>NIS</th>
        <th>Nama Siswa  </th>
         
         <th>guru</th>
         <th>Kelas</th>
        <th>Semester</th>
        <th>Tugas 1 </th>
        <th>Tugas 2 </th>
        <th>UTS</th>
        <th>UAS</t>
        <th>Nilai Akhir</t>
            
       
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
                        $crud->nilai3($query);
                   

                     ?>
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