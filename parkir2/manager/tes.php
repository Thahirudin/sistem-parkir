<?php

if(isset($_GET['waktu'])){
    $waktu = $_GET['waktu'];
    $tgl1    = date('Y-m-d'); // menentukan tanggal awal

			
    if ($waktu == 1) {
          	$tgl2    = date('Y-m-d', strtotime('-6 days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
			echo $tgl2; // cetak tanggal
     }elseif ($waktu == 2) {
     	 $tgl2    = date('Y-m-d', strtotime('-1 month', strtotime($tgl1)));
     	  $tgl3 = date('Y-m-d', strtotime('+1 days', strtotime($tgl2)));
			echo $tgl3; // cetak tanggal
     }elseif ($waktu == 3) {
     	 $tgl2    = date('Y-m-d', strtotime('-1 year', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
     	 $tgl3 = date('Y-m-d', strtotime('+1 days', strtotime($tgl2)));
			echo $tgl2; // cetak tanggal
     }elseif ($waktu == 4) {
     	$tgl2    = date('Y-m-d', strtotime('-1 days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
			echo $tgl2;
     }
  }







  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form class="d-flex" role="button" method="get">
      <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" name="waktu" required>
      <option selected>Pilih</option>
      <option value="1">7 hari terakhir</option>
      <option value="2">1 bulan terakhir</option>
      <option value="3">1 tahun terakhir</option>
      <option value="4">1 hari terakhir</option>
  </select>
      <button class="btn btn-success" type="submit">Search</button>
    </form>
</body>
</html>