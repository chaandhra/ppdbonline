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


      <h3>Data Kelas</h3>

            <br>

        <div class="table-responsive">
             <table class="table" border="1">
  
                 <tr>
               
                  <th>Kode kelas</th>
                    <th>Tahun Ajar</th>
                    <th>Kelas</th> 
                    <th>Nama Kelas</th>
                    <th>Guru</th>
                    <th>Status</th>
                    
            
                </tr>

                <tr>
                 
                     <?php
                   
                        $query = "SELECT kelas.*,guru.kode_guru, guru.nama_guru 
                        from kelas
                        LEFT join guru ON kelas.kode_guru = guru.kode_guru
                        order by kode_kelas asc";       
                    
                        $crud->kelasl($query);
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