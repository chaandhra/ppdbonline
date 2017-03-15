<?php 
include'koneksi.php' ;
                       if(isset($_GET['cari'])){
                        
                           
                        $query = $DB_con->query("SELECT * FROM psb WHERE nisn = '$_GET[cari]' ");
                         
                           $query->execute();
                          $data  = $query->fetch(PDO::FETCH_ASSOC);
                       }
                        
                        $z=$_GET['cari'];

                    
echo "<script languange=\"javascript\">;document.location='result.php?masuk=result&id=$z'</script>";

                                             ?>