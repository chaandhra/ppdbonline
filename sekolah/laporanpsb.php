<?php
include_once 'koneksi.php';
include_once 'header.php';

 
  

?>
<body >
<div class="clearfix"></div>
    <center>
 <a href="javascript:printDiv('print');"><button type="submit">Print</button></a></center>          
<div class="container" id="print">
<h2 >Data Peserta PSB </h2>   <br>
<br>

                       

<div class="table-responsive"  >
     <table class="table" border="1" >
  
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
            
       
        </tr>

     
<tr>
       <?php
                  
                        $query = "SELECT * FROM psb order by jml";       
                        $crud->psb2($query);
                   

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