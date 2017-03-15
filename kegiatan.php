<?php 

include 'header.php';

?>

<body>


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="well well-sm">
<h2></h2>
<br>
<div class="page-header">
<h2>Kegiatan
<small>NAMA SEKOLAH</small>
</h2>
</div>
  <?php
                    ini_set("display_errors",0);
                      
                        $query = "SELECT * FROM kegiatan order by id DESC";       
                        $records_per_page=8;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->kegiatan($newquery);
                    
                     ?>
             
                   


</div>
</div>
<div class="col-md-12">
 					<center>
                        <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </center>
</div>
</div>




</div>
</div>
</div>
</div>
<?php 

include 'footer.php';

?>
