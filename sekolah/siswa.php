<?php
include 'koneksi.php';
include 'header.php';

$jml = $DB_con->query('select count(*) from siswa')->fetchColumn(); 

?>
<body>
<div class="clearfix"></div>
        
    
<div class="container">




                            <!-- Nav tabs -->
                           <?php include 'headersub.php';?>
                   
       

                            <nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                            <a class="navbar-brand" href="#"> Jumlah Data: <span class="badge"><?php echo $jml;?></span>
                            </a>
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search" action="siswa.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                                                       </form>
                        <a href="siswatambah.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><i class="fa fa-plus"></i> Tambah Data</button></a>
                             <a href="siswa.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </div>
                            </nav>


        <div class="container">


      

            <br>

        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat. Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>    
                    <th>Agama</th>
                    <th>No Telepon</th>
                <!--     <th>Foto</th> -->
                    <th>Tahun Angkatan</th>
                    <th>Status</th>
                    <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                    ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT * FROM siswa where nama_siswa like '%$cari%'or nis like '%$cari%'";       
                        $records_per_page=3;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->dataview($newquery);


                        } else {

                        $query = "SELECT * FROM siswa";       
                        $records_per_page=3;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->dataview($newquery);
                    }

                     ?>
             
                    <td colspan="13" align="center">
                        <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        </div>
                        
                              
                 



  





</body>