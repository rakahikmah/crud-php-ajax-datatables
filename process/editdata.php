<?php

require_once 'koneksi.php';

if ($_POST) {
function ubahTanggal($tanggal){
   $pisah = explode('/',$tanggal);
   $array = array($pisah[2],$pisah[1],$pisah[0]);
   $satukan = implode('-',$array);
   return $satukan;
 }


	$validator = array('success'=>false,'messages'=>array());

	$tgl = $_POST['edittgllahir'];
	$nim = $_POST['editnim'];
	$nama = $_POST['editnama'];
	$alamat =$_POST['editalamat'];
	$tgllahir = ubahTanggal($tgl);
	$tlp = $_POST['edittelp'];
	$fakultas = $_POST['editfakultas'];
	$jurusan = $_POST['editjurusan'];
	$jenis_kel = $_POST['editjenis_kel'];
	$agama  =$_POST['editagama'];

	$sql = "UPDATE `mahasiswa` SET `nama`='$nama',`alamat`='$alamat',`tgllahir`='$tgllahir',`telp`='$tlp',`fakultas`='$fakultas' ,`jurusan`='$jurusan',`jenis_kel`='$jenis_kel',`agama` ='$agama' WHERE `nim`='$nim'";

	$query = $connect->query($sql);

	if ($query === TRUE) {
	 	$validator['success']=true;
	 	$validator['messages']="Data mahasiswa berhasil di update";
	 }else{
	 	$validator['success']=false;
	 	$validator['messages']="Data gagal dihapus karena ada kesalah ".$connect->error;
	 }

	 $connect->close();

	 echo json_encode($validator);

}

   


?>