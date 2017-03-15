<?php
include_once 'koneksi.php';
include_once 'header.php';

$jmln = $DB_con->query('select count(*) from kegiatan')->fetchColumn(); 
if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT poto FROM kegiatan WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("upload/".$imgRow['poto']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM kegiatan WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: kegiatan.php");
	}

?>

<div class="container">
 <?php include 'headersub.php';?>


<div class="container">

	<div class="page-header">
    	<h1 class="h2">Jumlah kegiatan : <?php echo $jmln;?>  <a class="btn btn-default" href="kegiatanproses.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah </a></h1> 
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT id, tanggal, nama_kegiatan, keterangan, poto FROM kegiatan ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $nama_kegiatan."&nbsp;/&nbsp;".$tanggal; ?></p>
				<img src="upload/<?php  echo $row['poto']; ?>" class="img-rounded" width="250px" height="250px"  title="<?php echo $keterangan; ?>">
			<p class="page-header">
				<span>
				<a class="btn btn-info" href="kegiatanupdate.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
