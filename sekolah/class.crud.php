
<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}


public function getID($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM siswa WHERE kode_siswa=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           
                <td><?php print($row['nis']); ?></td>
                <td><?php print($row['nama_siswa']); ?></td>
                <td><?php print($row['alamat']) ;?></td>
           		<td><?php print($row['tempat_lahir']); echo ', '.$row['tanggal_lahir'];?></td>
       
           		<td><?php print($row['kelamin']); ?></td>
	            <td><?php print($row['agama']) ;?></td>
	            <td><?php print($row['no_telepon']); ?></td>  
	           <!--  <td><?php print($row['foto']); ?></td> -->
	            <td><?php print($row['tahun_angkatan']); ?></td>
	            <td><?php print($row['status']); ?></td>
                
                <td align="center">
                <a href="siswatambah.php?kode_siswa=<?php print($row['kode_siswa']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
               <a href="siswahapus.php?kode_siswa=<?php print($row['kode_siswa']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus ?')"></i></a>
<br>
                 <a href="user.php?nis=<?php print($row['nis']); ?>">tambah user</a>

                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function dataview2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           
                <td><?php print($row['nis']); ?></td>
                <td><?php print($row['nama_siswa']); ?></td>
                <td><?php print($row['alamat']) ;?></td>
           		<td><?php print($row['tempat_lahir']); echo ', '.$row['tanggal_lahir'];?></td>
       
           		<td><?php print($row['kelamin']); ?></td>
	            <td><?php print($row['agama']) ;?></td>
	            <td><?php print($row['no_telepon']); ?></td>  
	           <!--  <td><?php print($row['foto']); ?></td> -->
	            <td><?php print($row['tahun_angkatan']); ?></td>
	            <td><?php print($row['status']); ?></td>
                
                
                </tr>
                <?php
			}
		}
	
	}
//data psb

public function psb($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['no_reg']); ?></td>	
                <td><?php print($row['nisn']); ?></td>
                <td><?php print($row['nama']); ?></td>
                <td><?php print($row['alamat']); ?></td>
           		<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir'];?></td>
           		
	            <td><?php print($row['jenis_kelamin']) ;?></td>
	            <td><?php print($row['asal_sekolah']); ?></td>  
	            <td><?php print($row['no_tlpn']); ?></td>
	            <td><?php print($row['b_indo']); ?></td>
	            <td><?php print($row['b_ing']); ?></td>
	            <td><?php print($row['mtk']); ?></td>
	            <td><?php print($row['jml']); ?></td>
	            <td><?php print($row['status']); ?></td>
	            <td align="center">
                <a href="editlulus.php?no_reg=<?php print($row['no_reg']); ?>"><button class="btn btn-primary">LULUS</button></a><br>
                <a href="editlulus2.php?no_reg=<?php print($row['no_reg']); ?>"><button class="btn btn-primary">TDK LULUS</button></a></td>
              

                <td align="center"><a href="psbedit.php?no_reg=<?php print($row['no_reg']); ?>" >
              <i class="glyphicon glyphicon-edit"></i></a>
              </td>
              <td>
              <a href="psbhapus.php?no_reg=<?php print($row['no_reg']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a>
                
                </td>
                </tr>

                
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	

	public function psb2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['no_reg']); ?></td>	
                <td><?php print($row['nisn']); ?></td>
                <td><?php print($row['nama']); ?></td>
                <td><?php print($row['alamat']); ?></td>
           		<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir'];?></td>
           		
	            <td><?php print($row['jenis_kelamin']) ;?></td>
	            <td><?php print($row['asal_sekolah']); ?></td>  
	            <td><?php print($row['no_tlpn']); ?></td>
	            <td><?php print($row['b_indo']); ?></td>
	            <td><?php print($row['b_ing']); ?></td>
	            <td><?php print($row['mtk']); ?></td>
	            <td><?php print($row['jml']); ?></td>
	            <td><?php print($row['status']); ?></td>
	            
                </tr>

                
                <?php
			}
		}
	
	}
	



public function guru($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['nip']); ?></td>	
                <td><?php print($row['nama_guru']); ?></td>
                <td><?php print($row['kelamin']); ?></td>
	            <td><?php print($row['alamat']); ?></td>  
	            <td><?php print($row['no_telepon']); ?></td>
	            <td><?php print($row['status_aktif']); ?></td>

	            <td align="center">
                <a href="gurutambah.php?kode_guru=<?php print($row['kode_guru']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
               <a href="guruhapus.php?kode_guru=<?php print($row['kode_guru']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function guru2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['nip']); ?></td>	
                <td><?php print($row['nama_guru']); ?></td>
                <td><?php print($row['kelamin']); ?></td>
	            <td><?php print($row['alamat']); ?></td>  
	            <td><?php print($row['no_telepon']); ?></td>
	            <td><?php print($row['status_aktif']); ?></td>

	           
                </tr>
                <?php
			}
		}
	
		
	}


public function pelajaran($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['kode_pelajaran']); ?></td>	
      
                <td><?php print($row['nama_pelajaran']); ?></td>
                <td><?php print($row['keterangan']); ?></td>
  
	            <td align="center">
                <a href="pelajaranproses.php?kode_pelajaran=<?php print($row['kode_pelajaran']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
              <a href="pelajaranhapus.php?kode_pelajaran=<?php print($row['kode_pelajaran']); ?>"> <i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function pelajaran2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['kode_pelajaran']); ?></td>	
      
                <td><?php print($row['nama_pelajaran']); ?></td>
                <td><?php print($row['keterangan']); ?></td>
  
	           
                </tr>
                <?php
			}
		}
		
		
	}


public function nilai($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>
        <td><?php echo $myData['nama_pelajaran']; ?></td>
        <td><?php echo $myData['nama_guru']; ?></td>
        <td><?php echo $myData['kelas'].'-'.$myData['nama_kelas'];  ?></td>
        <td><?php echo $myData['semester']; ?></td>
        <td><?php echo $myData['nilai_tugas1']; ?></td>
        <td><?php echo $myData['nilai_tugas2']; ?></td>
        <td><?php echo $myData['nilai_uts']; ?></td>
        <td><?php echo $myData['nilai_uas']; ?></td>
	            <td align="center">
                <a href="nilaiproses.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
                 <a href="nilai.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a></td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td ></td>
            </tr>
            <?php
		}
		
	}

public function nilai2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			$no=1;
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
               
           		 <td align="center"><?php echo $c=$no++; ?></td>
        
        <td><?php echo $myData['nama_pelajaran']; ?></td>
        
        
        
        <td align="center"><?php echo $myData['nilai_tugas1']; ?></td>
        <td align="center"><?php echo $myData['nilai_tugas2']; ?></td>
        <td align="center"><?php echo $myData['nilai_uts']; ?></td>
        <td align="center"><?php echo $myData['nilai_uas']; ?></td>
        <td align="center"><?php $a=$myData['nilai_uas'];
        			$b=$myData['nilai_uts'];
        			$c=$myData['nilai_tugas2'];
        			$d=$myData['nilai_tugas1'];
        			$e=($a+$b+$c+$d)/4;
        			echo $e;

         ?></td>
	           
                </tr>
                <?php
			}
		}else
		{
			?>
            <tr>
            <td colspan="7">Belum ada siswa yang dipilih</td>
            </tr>
            <?php
		}
		
		
	}


public function bk($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>
        <td><?php echo $myData['kelas'].'-'.$myData['nama_kelas']; ?></td>
        <td><?php echo $myData['tanggal']; ?></td>
        <td><?php echo $myData['catatan']; ?></td>
        <td><?php echo $myData['keterangan']; ?></td>
        
	            <td align="center">
                <a href="bkproses2.php?catatan=<?php print($myData['catatan']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
                <a href="bkhapus.php?nis=<?php print($myData['nis']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a><br>
                 <a href="panggilan.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-print" ></i>Panggilan</a><br>
                  <a href="pernyataan.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-print" ></i>Pernyataan</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function nilai3($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			$no=1;
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
               
           		 <td align="center"><?php echo $c=$no++; ?></td>
        
        <td><?php echo $myData['nama_pelajaran']; ?></td>
        <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>

        <td><?php echo $myData['nama_guru']; ?></td>
        <td><?php echo $myData['kelas'].'-'.$myData['nama_kelas'];  ?></td>
        <td><?php echo $myData['semester']; ?></td>
        
        
        <td align="center"><?php echo $myData['nilai_tugas1']; ?></td>
        <td align="center"><?php echo $myData['nilai_tugas2']; ?></td>
        <td align="center"><?php echo $myData['nilai_uts']; ?></td>
        <td align="center"><?php echo $myData['nilai_uas']; ?></td>
        <td align="center"><?php $a=$myData['nilai_uas'];
        			$b=$myData['nilai_uts'];
        			$c=$myData['nilai_tugas2'];
        			$d=$myData['nilai_tugas1'];
        			$e=($a+$b+$c+$d)/4;
        			echo $e;

         ?></td>
	           
                </tr>
                <?php
			}
		}else
		{
			?>
            <tr>
            <td colspan="7">Belum ada siswa yang dipilih</td>
            </tr>
            <?php
		}
		
		
	}

public function bk2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>
        <td><?php echo $myData['kelas'].'-'.$myData['nama_kelas']; ?></td>
        <td><?php echo $myData['tanggal']; ?></td>
        <td><?php echo $myData['catatan']; ?></td>
        <td><?php echo $myData['keterangan']; ?></td>
        
	            
                </tr>
                <?php
			}
		}
	
		
	}

public function bkp($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>
        <td><?php echo $myData['kelas'].'-'.$myData['nama_kelas']; ?></td>
        <td><?php echo $myData['tahun_ajar']; ?></td>
   
        
	            <td align="left">
                <a href="bkproses2.php?nis=<?php print($myData['nis']); ?>"><i class="glyphicon glyphicon-edit"> Tambah Catatan</i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}


public function berita($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['judul']; ?></td>
        <td><?php echo $myData['tanggal']; ?></td>
        <td><?php echo $myData['jenis']; ?></td>
        
   
        
	            <td align="left">
                <a href="berita.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="beritahapus.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
public function kelas($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
		        <td><?php echo $myData['kode_kelas']; ?></td>
		        <td><?php echo $myData['tahun_ajar']; ?></td>
		        <td><?php echo $myData['kelas']; ?></td>
		        <td><?php echo $myData['nama_kelas']; ?></td>
		        
		        <td><?php echo $myData['nama_guru']; ?></td>
		        <td><?php echo $myData['status_aktif']; ?></td>

        
   
        
	            <td align="left">
                <a href="kelasupdate.php?kode_kelas=<?php print($myData['kode_kelas']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="kelashapus.php?kode_kelas=<?php print($myData['kode_kelas']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin akan hapus ?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function kelasl($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
		        <td><?php echo $myData['kode_kelas']; ?></td>
		        <td><?php echo $myData['tahun_ajar']; ?></td>
		        <td><?php echo $myData['kelas']; ?></td>
		        <td><?php echo $myData['nama_kelas']; ?></td>
		        
		        <td><?php echo $myData['nama_guru']; ?></td>
		        <td><?php echo $myData['status_aktif']; ?></td>

        
   
        
                </tr>
                <?php
			}
		}
		
		
	}

public function kelas2($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 <td><?php echo $myData['kelas']; ?></td>
        <td><?php echo $myData['nama_kelas']; ?></td>
        <td><?php echo $myData['nis']; ?></td>
        <td><?php echo $myData['nama_siswa']; ?></td>
        
   
        
	            <td align="left">
                <a href="kelassiswaproses.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="kelassiswahapus.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin akan hapus ?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function prestasi($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 
        <td><?php echo $myData['prestasi']; ?></td>
        <td><?php echo $myData['juara']; ?></td>
        <td><?php echo $myData['keterangan']; ?></td>
        
   
        
	            <td align="left">
                <a href="prestasiproses.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="prestasi.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin akan hapus ?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function ekskul($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		 
        <td><?php echo $myData['nama']; ?></td>
        <td><?php echo $myData['ketua']; ?></td>
        <td><?php echo $myData['kontak']; ?></td>
        <td><?php echo $myData['jadwal']; ?></td>
        
   
        
	            <td align="left">
                <a href="ekskulproses.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="ekskul.php?id=<?php print($myData['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin akan hapus ?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function user($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($myData=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
          
        <td><?php echo $myData['name_login']; ?></td>
        <td><?php echo $myData['username']; ?></td>
        
        
        
   
        
	            <td align="left">
                <a href="user.php?id=<?php print($myData['id_login']); ?>"><i class="glyphicon glyphicon-edit"> </i></a> 
              <a href="userlist.php?id=<?php print($myData['id_login']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin akan hapus ?')"> </i></a>
              
                
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";

			}
			?></ul><?php
		}
	}
	
}