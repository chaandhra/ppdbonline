<?php
include_once 'koneksi.php';
include_once 'header.php';

$jml = $DB_con->query('select count(*) from ekskul')->fetchColumn(); 

 if (isset($_GET['id'])) {
      
        $stmt_delete = $DB_con->prepare('DELETE FROM ekskul WHERE id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['id']);
        $stmt_delete->execute();
        
        header("Location: ekskul.php");
    


}


?>

<div class="container">
 <?php include 'headersub.php';?>
<nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php echo $jml;?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search" action="ekskul.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                          
                            </form>
                        <a href="ekskulproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="ekskul.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </div>
                            </nav>


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                       
                    <th>Nama Ekskul</th>
                    <th>Ketua</th>
                    <th>Kontak</th> 
                    <th>jadwal</th>
                    <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                     ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM ekskul where nama like '%$cari%' or jadwal like '%$cari%' or keterangan like '%$cari%'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->ekskul($newquery);


                        } else {
                        $query = "SELECT * FROM ekskul";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->ekskul($newquery); }
                                         ?>
             
                    <td colspan="7" align="center">
                        <div class="pagination-wrap">
                        <?php $crudud->paginglink($query,$records_per_page); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        </div>