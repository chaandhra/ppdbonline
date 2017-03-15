<div class="container">

<?php
include 'koneksi.php';
include 'header.php';




?>


<nav class="navbar navbar-default" role="navigation">
                            <div class="navbar-header">
                         
                            </div>
                            <div>
                            <form class="navbar-form navbar-right" role="search" action="bkproses.php" method="post">
                            <div class="form-group">
                           	<?php 
                            		$sql = "SELECT DISTINCT tahun_ajar FROM kelas";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['tahun_ajar'];
    								$tahun.='<option value="'.$id.'">'.$id.'</option>';}
								?>
							<select class="form-control" name="tahun" >
							<option>Tahun Ajar</option>
							<?php echo $tahun; ?>
 							</select>
							</div>
                            <div class="form-group">
                            	<?php 
                            		$sql = "SELECT DISTINCT kelas FROM kelas";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$k = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kelas'];
    								$k.='<option value="'.$id.'">'.$id.'</option>';}
								?>
							<select class="form-control" name="kelas" value="">
							<option>kelas</option>
							<?php echo $k; ?>
							</select>
							</div>
							<div class="form-group">
								<?php $sql = "SELECT DISTINCT nama_kelas FROM kelas";
								$query = $DB_con->prepare($sql);
								$query->execute();
								$option = "";
								$result = $query->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result as $row) {
								    $id = $row['nama_kelas'];
								    $option.='<option value="'.$id.'">'.$id.'</option>';
								}
								?>
							<select class="form-control" name="kelas">
								<option>nama kelas</option>
								
								<?php echo $option; ?>

							</select>
							</div>
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                            <button type="submit" class="btn btn-default">Cari</button>
                            </form>
                        <a href="bkproses.php" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                           
                            </div>
                            </nav>




        <div class="table-responsive">
             <table class="table">
  
                <tr>
                
          <th>NIS  </th>        
        <th>Nama Siswa  </th>
        <th>Kelas</th>
    	<th>Tahun Ajar</th>
        <th>Action</th>
            
                </tr>

                <tr>
                    <?php
                       ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                        $query = "SELECT siswa.nis,siswa.nama_siswa ,kelas.kelas,kelas.nama_kelas,kelas.tahun_ajar FROM siswa 
                        LEFT JOIN kelas_siswa ON siswa.kode_siswa=kelas_siswa.kode_siswa 
                        RIGHT JOIN kelas ON kelas_siswa.kode_kelas=kelas.kode_kelas where siswa.nama_siswa like '%$cari%'";       
                      $records_per_page=7;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->bkp($newquery);


                        } 
                     ?>
             
                    <td colspan="7" align="center">
                         <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </td>
                </tr>
            </table>