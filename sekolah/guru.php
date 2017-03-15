<?php
include_once 'koneksi.php';
include_once 'header.php';

$jmlguru = $DB_con->query('select count(*) from guru')->fetchColumn(); 
?>
<div class="container">
 <?php include 'headersub.php';?>
 <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php echo $jmlguru;?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search" action="guru.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                          
                            </form>
                        <a href="gurutambah.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="guru.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </div>
                            </nav>


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th> 
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                    <th>Action</th>
            
                </tr>

                <tr>
                 
                     <?php
                    ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM guru where nama_guru like '%$cari%' or nip like'%$cari&'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->guru($newquery);


                        } else {
                        $query = "SELECT * FROM guru";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->guru($newquery);
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