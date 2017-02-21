<?php 
require_once 'koneksi.php';
if ($_POST) {
function ubahTanggal($tanggal){
   $pisah = explode('-',$tanggal);
   $array = array($pisah[2],$pisah[1],$pisah[0]);
   $satukan = implode('-',$array);
   return $satukan;
 }

 	$validator = array('success'=>false,'messages'=>array());

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tgl = $_POST['tgllahir'];
	$tgllahir = ubahTanggal($tgl);
	$telp  = $_POST['telp'];		// data dari modal tambahdata
	$fakultas = $_POST['fakultas'];
	$jurusan = $_POST['jurusan'];
	$jenis_kel = $_POST['jenis_kel'];
	$agama = $_POST['agama'];

	// sql untuk menambah data
	$sql = "INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tgllahir`, `telp`, `fakultas`, `jurusan`, `jenis_kel`, `agama`) VALUES ('$nim', '$nama', '$alamat', '$tgllahir', '$telp', '$fakultas', '$jurusan', '$jenis_kel', '$agama')";

	// jalankan sql
	$query = $connect->query($sql);
	
	// cek validasi query
	if ($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Data berhasil ditambahkan";
	}else{
		$validator['success'] =false;
		$validator['messages']="data gagal ditambahkan".$connect->error;
	}

	// tutup koneksi
	$connect->close();

	echo json_encode($validator);

	
	
}





?>