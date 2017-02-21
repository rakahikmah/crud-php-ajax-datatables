<?php require_once 'process/koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud Mahasiswa</title>
	<!-- for icon -->
	<link rel="icon" href="image/icon/icon.png">
	<!-- link bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<!-- datatable css -->
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
	<!-- css datepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

</head>
<body>
	<div class="container-fluid">
	<br><br>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<center><h1 class="page-header">Input Data Mahasiswa</h1></center>
			</div>

			

			<!-- button untuk tambah data mahasiswa -->
			<button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#tambahData" id="TambahDataMhsBtn">
				<span class="glyphicon glyphicon-plus"></span>Tambah Data
			</button>
		</div>
		<div class="pesanHapus"></div>
		<br>
		<div class="table-responsive">
				<table class="table" id="manageMahasiswaTable">
					<thead>
						<tr>
							<th>Nim</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Tanggal Lahir</th>
							<th>Telepon</th>
							<th>Fakultas</th>
							<th>Jurusan</th>
							<th>Jenis Kelamin</th>
							<th>Agama</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
<!-- tambah data mahasiswa -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahData">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Tambah Data Mahasiswa</h4>
      </div>
      <form class="form-horizontal" action="process/tambah.php" method="post" id="tambahDataMhsForm">
      <div class="modal-body">
        <div class="messages"></div>
        	<div class="form-group"> <!-- here add class has-error -->
			    <label for="nim" class="col-sm-2 control-label">Nim</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
			    </div>
			</div>
			  <div class="form-group">
			    <label for="nama" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="tgllahir" class="col-sm-2 control-label">Tanggal Lahir</label>
			    <div class="col-sm-10">
				 <div class="input-group">
				   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					<input class="form-control" id="tgllahir" name="tgllahir" placeholder="DD/MM/YYYY" type="text">
				 </div>
				</div>
			  </div>
			  <div class="form-group">
			    <label for="telp" class="col-sm-2 control-label">Telepon</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="telp" name="telp" placeholder="Telepon">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="fakultas" class="col-sm-2 control-label">Fakultas</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="fakultas" id="fakultas">
			      	 <option value="">Pilih Fakultas</option>
			      	  <?php 
				      	$sql = "SELECT kd_fakultas,nm_fakultas FROM fakultas";
				      	$query = $connect->query($sql);
				      	while($row = $query->fetch_assoc()){ ?>
				      		<option value="<?php echo $row['kd_fakultas']?>"><?php echo $row['nm_fakultas'];?></option>
				      <?php	} ?>
				  </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="jurusan" id="jurusan">
			      	<option value="">Pilih Jurusan</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="jenis_kel" class="col-sm-2 control-label">Jenis Kelamin</label>
			    <div class="col-sm-10">
				    <label class="radio-inline">
					  <input type="radio" name="jenis_kel" id="jenis_kel" value="Laki-laki">Laki-laki
					</label>
					<label class="radio-inline">
					  <input type="radio" name="jenis_kel" id="jenis_kel" value="Perempuan">Perempuan
					</label>
			    </div>
			    <div class="error-jeniskelamin"></div>
			  </div>
			  <div class="form-group">
			    <label for="agama" class="col-sm-2 control-label">Agama</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="agama" id="agama">
			      	<option value="">Pilih Agama</option>
			      	<option value="islam">Islam</option>
			      	<option value="katolik">Katolik</option>
			      	<option value="protestas">Protestan</option>
			      	<option value="budha">Budha</option>
			      	<option value="hindu">Hindu</option>
			      </select>
			    </div>
			  </div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="hapusMahasiswaModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Member</h4>
	      </div>
	      <div class="modal-body">
	        <p>Do you really want to remove ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="hapusBtn">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMahasiswaModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span>Edit data mahasiswa</h4>
	      </div>
	      <form class="form-horizontal" action="process/editdata.php" method="post" id="editDataMhsForm">
	      <div class="modal-body">
			<div class="edit-messages"></div>
        	<div class="form-group"> <!-- here add class has-error -->
			    <label for="editnim" class="col-sm-2 control-label">Nim</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editnim" name="editnim"  placeholder="NIM">
			    </div>
			</div>
			  <div class="form-group">
			    <label for="editnama" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editnama" name="editnama" placeholder="Nama">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editalamat" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editalamat" name="editalamat" placeholder="alamat">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="edittgllahir" class="col-sm-2 control-label">Tanggal Lahir</label>
			    <div class="col-sm-10">
				 <div class="input-group">
				   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					<input class="form-control" id="edittgllahir" name="edittgllahir" placeholder="DD/MM/YYYY" type="text">
				 </div>
				</div>
			  </div>
			  <div class="form-group">
			    <label for="edittelp" class="col-sm-2 control-label">Telepon</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="edittelp" name="edittelp" placeholder="Telepon">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editfakultas" class="col-sm-2 control-label">Fakultas</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editfakultas" id="editfakultas">
			      	 <option value="">Pilih Fakultas</option>
			      	  <?php 
				      	$sql = "SELECT kd_fakultas,nm_fakultas FROM fakultas";
				      	$query = $connect->query($sql);
				      	while($row = $query->fetch_assoc()){ ?>
				      		<option value="<?php echo $row['kd_fakultas']?>"><?php echo $row['nm_fakultas'];?></option>
				      <?php	} ?>
				  </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editjurusan" class="col-sm-2 control-label">Jurusan</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editjurusan" id="editjurusan">
			      	<option value="">Pilih Jurusan</option>
			      	<?php 
				      	$sql = "SELECT * FROM jurusan ";
				      	$query = $connect->query($sql);
				      	while($row = $query->fetch_assoc()){ ?>
				      		<option value="<?php echo $row['nm_jurusan']?>"><?php echo $row['nm_jurusan'];?></option>
				      <?php	} ?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editjenis_kel" class="col-sm-2 control-label">Jenis Kelamin</label>
			    <div class="col-sm-10">
				    <label class="radio-inline">
					  <input type="radio" name="editjenis_kel" id="editjenis_kel" value="Laki-laki">Laki-laki
					</label>
					<label class="radio-inline">
					  <input type="radio" name="editjenis_kel" id="editjenis_kel" value="Perempuan">Perempuan
					</label>
			    </div>
			    <div class="error-jeniskelamin"></div>
			  </div>
			  <div class="form-group">
			    <label for="editagama" class="col-sm-2 control-label">Agama</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editagama" id="editagama">
			      	<option value="">Pilih Agama</option>
			      	<option value="islam">Islam</option>
			      	<option value="katolik">Katolik</option>
			      	<option value="protestas">Protestan</option>
			      	<option value="budha">Budha</option>
			      	<option value="hindu">Hindu</option>
			      </select>
			    </div>
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Edit data</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- tutup edit modal -->



</body>
	<!-- link jquery original -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- link jquery from bootstrap -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- link jquery datatables  -->
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<!-- link jquery customs -->
	<script type="text/javascript" src="customs/js/edit.js"></script>
	<!-- link custom datepicker -->
	<script type="text/javascript" src="customs/js/datepicker.js"></script>
	<!-- link custom form editdatepicker -->
	<script type="text/javascript" src="customs/js/editdatepicker.js"></script>
	<!-- link datepicker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	
	<script type="text/javascript">
		$("#fakultas").change(function(){
   		// variabel dari nilai combo box fakutas
        var kd_fakultas = $("#fakultas").val();
       // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "process/getJurusan.php",
            data: "kd_fakultas="+kd_fakultas,
            success: function(msg){
               // jika tidak ada data
                if(msg == ''){
                    $("#jurusan").html('<option value="">Pilih Jurusan</option>');
                }else{
                	// jika dapat mengambil data,, tampilkan di combo box jurusan
                    $("#jurusan").html(msg);                                                     
                }
            }
        });    
    });

	$("#editfakultas").change(function(){
   		// variabel dari nilai combo box fakutas
        var kd_fakultas = $("#editfakultas").val();
       // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "process/getJurusan.php",
            data: "kd_fakultas="+kd_fakultas,
            success: function(msg){
               // jika tidak ada data
                if(msg == ''){
                    $("#editjurusan").html('<option value="">Pilih Jurusan</option>');
                }else{
                	// jika dapat mengambil data,, tampilkan di combo box jurusan
                    $("#editjurusan").html(msg);                                                     
                }
            }
        });    
    });	

			
	</script>

</html>