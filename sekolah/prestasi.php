<?php
include_once 'koneksi.php';
include_once 'header.php';

$jml = $DB_con->query('select count(*) from prestasi')->fetchColumn(); 

 if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM prestasi WHERE id = '$_GET[id]'");
echo '<script type="text/javascript">

       
        window.location = "prestasi.php";
  
</script>';

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
                            <form class="navbar-form navbar-right" role="search" action="prestasi.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                          
                            </form>
                        <a href="prestasiproses.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="prestasi.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </div>
                            </nav>


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                       
                    <th>Nama Prestasi</th>
                    <th>Juara</th>
                    <th>Keterangan</th> 
                    <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                     ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM prestasi where prestasi like '%$cari%' or juara like '%$cari%'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->prestasi($newquery);


                        } else {
                        $query = "SELECT * FROM prestasi";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->prestasi($newquery);
                        }
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