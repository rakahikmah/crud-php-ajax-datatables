<?php 

require_once 'koneksi.php';

$nim_mhs = $_POST['nim_mhs'];

$sql = "SELECT * FROM mahasiswa WHERE nim ='$nim_mhs'";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

//tutup koneksi
$connect->close();

echo json_encode($result);


