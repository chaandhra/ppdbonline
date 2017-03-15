<?php
include_once 'koneksi.php';
include_once 'header.php';

$jmln = $DB_con->query('select count(*) from user')->fetchColumn(); 
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM user WHERE id_login = '$_GET[id]'");
echo '<script type="text/javascript">

       
        window.location = "userlist.php";
  
</script>';

}

?>

<div class="container">
 <?php include 'headersub.php';?>




      <div class="row">
 

            <br>

        <div class="table-responsive">
        Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
 <a href="kelasproses.php">
                             
                             <a href="kelas.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                             
        <form class="navbar-form navbar-right" role="search" action="userlist.php" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                           
                            </form>
             <table class="table">
  
                <tr>
                
                       
                    <th>Nama</th>
                    <th>Username</th>
                   
                    <th>Action</th>

                </tr>

                <tr>
                    <?php
                     ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                      $query = "SELECT *
                        from user
                             where username like '%$cari%' or name_login like '%$cari%' ";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->user($newquery);


                        } else {
                        $query = "SELECT * from user order by id asc";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->user($newquery);
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


       </hr>

           
                    <br>

       
 
                            