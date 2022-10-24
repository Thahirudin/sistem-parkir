<?php 

include '../app/koneksi.php';

$a = mysqli_query($koneksi,"select max(id_pegawai) as maxID from pegawai");
$data = mysqli_fetch_array($a);

$kode = $data['maxID'];

$kode++;
$kodeauto = $kode;




 ?>