<?php 

require_once 'koneksi.php';

$output = array('data'=>array());

$sql = "SELECT * FROM mahasiswa";
$query = $connect->query($sql);


while($row = $query->fetch_assoc()){
	$fakultas='';

	switch ($row['fakultas']) {
		case 'f01':
			$fakultas ='Ilmu Komputer';
			break;
		
		case 'f02':
			$fakultas = 'Ilmu Komunikasi';
			break;
		case 'f03':
			$fakultas = 'Teknik';
		case 'f04':
			$fakultas ='Manajemen Dan Bisnis';
		case 'f05':
			$fakultas ='Psikologi';			
	}

	$date=new DateTime($row['tgllahir']);

	$opsi = '
		<div class="btn-group">
		  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a type="button" data-toggle="modal" data-target="#editMahasiswaModal" onclick="editData('.$row['nim'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" data-toggle="modal" data-target="#hapusMahasiswaModal" onclick="hapusData('.$row['nim'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
			';

	$output['data'][]=array(
		$row['nim'],
		$row['nama'],
		$row['alamat'],
		$date->format('d-M-Y'),
		$row['telp'],
		$fakultas,
		$row['jurusan'],
		$row['jenis_kel'],
		$row['agama'],
		$opsi
	);
}

// databases conecction close
$connect->close();

echo json_encode($output);

?>