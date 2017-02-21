<?php 

require_once 'koneksi.php';

$output = array('success' => false, 'messages' => array());

$nim_mhs = $_POST['nim_mhs'];

$sql = "DELETE FROM mahasiswa WHERE nim = {$nim_mhs}";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Data mahasiswa berhasi dihapus';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing the member information';
}

// close database connection
$connect->close();

echo json_encode($output);