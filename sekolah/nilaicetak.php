 <?php
include_once 'koneksi.php';
include_once 'header.php';
ini_set("display_errors",0);

$jmln = $DB_con->query('select count(*) from nilai')->fetchColumn(); 
?>

<div class="container">


<form class="form-inline" role="form" action="nilaicetak.php" method="post">
<div class="form-group">
 <?php 
                         
                                    $sql = "SELECT * FROM siswa";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id = $row['kode_siswa'];
                                    $nama=$row['nama_siswa'];
                             
                                    $tahun.='<option value="'.$id.'">'.$nama.'</option>';
                                    }
                                ?>

<select class="form-control" name="siswa">
<option>Pilih Siswa</option>
<?php echo $tahun;?>
</select>
</div>
<div class="form-group">
<?php 
                         
                                    $sql = "SELECT distinct semester FROM nilai";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id = $row['semester'];
                                    
                             
                                    $tahun.='<option value="'.$id.'">'.$id.'</option>';
                                    }
                                ?>
<select class="form-control"  name="semester">
<option>Pilih kelas</option>
<?php echo $tahun;?>
</select>
</div>

<button type="submit" class="btn btn-default" >Submit</button>
</form>




<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default" id="print">

<div class="panel-body">
<h2 align="center"  >DATA NILAI</h2><br>

<?php 
$siswa=$_POST['siswa'];
$sem=$_POST['semester'];
  
                  
                        if(isset($_POST)){
                         
                                    $sql = "SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas , guru.kode_guru , guru.nama_guru
                FROM nilai
                LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
                LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                  LEFT JOIN kelas ON nilai.kode_kelas = kelas.kode_kelas
                  LEFT JOIN guru on nilai.kode_guru=guru.kode_guru
            
              where nilai.kode_siswa ='$siswa' and nilai.semester='$sem'";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                     foreach ($result as $row) {
                                    $id2 = $row['nis'];
                                    $nama2=$row['nama_siswa'];
                                    $semester=$row['semester'];
                                  }

                             }
                                    
                                ?>


<table align="center">
<tr>
<td width="200">Nama Siswa<br>
NIS<br>
Semester </td>
<td >
: <?php echo $nama2;?><br>
: <?php echo $id2;?><br>
: <?php echo $semester;?>
    
</td>
</tr>
<tr><td colspan="2"><hr size="5" style="background-color: #000;"></td></tr>
<tr>
<td colspan="2" >
<table border="1" class="table">
<tr align="center">
    <th>N0</th>
         <th width="500" >Pelajaran</th>
        <th width="100" >Tugas 1 </th>
        <th width="100">Tugas 2 </th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
</tr>
<tr>


<?php

                  
$siswa=$_POST['siswa'];
$sem=$_POST['semester'];
  ini_set("display_errors",0);
                  
                        if(isset($_POST)){


                        $query = "SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas , guru.kode_guru , guru.nama_guru
                FROM nilai
                LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
                LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                  LEFT JOIN kelas ON nilai.kode_kelas = kelas.kode_kelas
                  LEFT JOIN guru on nilai.kode_guru=guru.kode_guru
            
              where nilai.kode_siswa ='$siswa' and nilai.semester='$sem'";       
                        $records_per_page=5;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->nilai2($newquery);
                       }
                        ?>
</tr>

    
</table>

</td>
</tr>
</table>
<br><br>
<table align="center" >
    <tr><td width="400"><center>Mengetahui,<br>Kepala Sekolah<br>

<br><br><br><br><br>

....................<br>
</center></td><td width="400"><center> Sumedang, <?php echo $date=date('d M Y'); ?><br>
Wali Kelas,<br>

<br><br><br><br><br>

....................<br>
</center>
 </td></tr>
</table>


</div>
</div>
</div>
<br>
<center>
<a href="javascript:printDiv('print');"><button type="submit">Print</button></a></center>   




<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>



 