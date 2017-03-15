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


      <h3>Data Guru</h3>

            <br>

        <div class="table-responsive">
             <table class="table" border="1">
  
                 <tr>
                
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th> 
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Status</th>
         
            
                </tr>

                <tr>
                 
                     <?php
                   
                        $query = "SELECT * FROM guru";       
                     
                        $crud->guru2($query);
                    
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