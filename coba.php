<?php 
function ubahTanggal($tanggal){
   $pisah = explode('/',$tanggal);
   $array = array($pisah[2],$pisah[1],$pisah[0]);    // fungsi untuk mengubah format tanggal pada insert data
   $satukan = implode('-',$array);
   return $satukan;
 }

$coba ='21/01/1997';

echo ubahTanggal($coba);


?>