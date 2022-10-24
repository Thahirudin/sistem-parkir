<?php 

include '../../app/koneksi.php';

$a = mysqli_query($koneksi,"select max(id_member) as maxID from kartu_member");
$data = mysqli_fetch_array($a);

$kode = $data['maxID'];

$kode++;
$kodeauto = $kode;





 ?>