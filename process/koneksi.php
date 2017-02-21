<?php 

$host ='localhost';
$user ='root';
$pass ='resolusi123';
$db   ='training';

//buat koneksi
$connect = new mysqli($host, $user, $pass, $db);

// cek untuk koneksi
if ($connect->connect_error) {
	die('koneksi gagal'.$connect->connect_error);
}else{
	
}
