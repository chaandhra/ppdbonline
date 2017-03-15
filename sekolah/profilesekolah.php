<?php require_once("header.php") ; 

include'koneksi.php';
 $query = $DB_con->query("SELECT * FROM idprofile");
    $data  = $query->fetch(PDO::FETCH_ASSOC);



?>
<script src="../ckeditor/ckeditor.js"></script>
 
    <body>
<div class="container">

   <div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
Panel With title
</h3>
</div>
<div class="panel-body">
 <form class="form-horizontal" role="form" action="simpanprofile.php" method="post">


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Profile</label>
<div class="col-sm-10">
 <textarea name="profile" id="editor1" rows="10" cols="50">
    <?php echo $data['profile'];?>            
 </textarea>
</div>
</div>
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-10">
<textarea class="form-control" id="lastname" name="alamat" 
placeholder="Enter Last Name"><?php echo $data['alamat'];?>  </textarea>
</div>
</div>


<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">No Telepon</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="lastname" name="tlpn"
placeholder="Enter Last Name" value="<?php echo $data['telepon'];?>  ">
</div>
</div>
<div class="form-group">
<label for="lastname" class="col-sm-2 control-label">E-mail</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="lastname" name="email"
placeholder="Enter Last Name" value="<?php echo $data['email'];?>"  >
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
</div>
</div>
 </form>
</div>

           


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
       
    </body>