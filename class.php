
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


public function kegiatan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);
				?>
        

<div class="col-xs-3">
				<p class="page-header"><?php echo $nama_kegiatan."&nbsp;/&nbsp;".$tanggal; ?></p>
				<img src="sekolah/upload/<?php  echo $row['poto']; ?>" class="img-rounded" width="250px" height="250px"  title="<?php echo $keterangan; ?>">
			<p class="page-header">
				
				</p>
			</div>       



                <?php
			}
		}
	
	}









public function berita($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
         <div class="panel panel-default">
<div class="panel-heading">
<?php echo $row['judul'] ;?></div>
<div class="panel-body">
<?php 
$string= $row['isi'] ;
$string = strip_tags($string);

if (strlen($string) > 10) {

    // truncate string
    $stringCut = substr($string, 0, 500);

    // make sure it ends in a word so assassinate doesn't become ass...
 $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
$b= $row['id'] ;
$a='......<a href=berita?id='.$b.'>Readmore</a>';
echo $string.$a ;
?>
</div>
</div>
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
public function satgas($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['satgas']); ?></td>	
                <td><?php print($row['kontak']); ?></td>
                <td><?php print($row['keterangan']); ?></td>
	            
	         

	            <td align="center">
	            <a href="satgasproses?id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
               <a href="satgas?id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a>
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


public function info($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
           		<td><?php print($row['isi']); ?></td>	
      
                <td><?php print($row['tanggal']); ?></td>
                <td align="center">
                <a href="infoproses?id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
              
              <a href="info?id=<?php print($row['id']); ?>"> <i class="glyphicon glyphicon-remove-circle" onclick="return confirm('yakin dihapus?')"></i></a>
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