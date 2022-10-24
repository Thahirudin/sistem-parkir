<?php
//koneksi database
include '../app/koneksi.php';
error_reporting(0);
 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $a = mysqli_query($koneksi, "select * from transaksi where id_parkir like '%".$cari."%'");       
  }
  else {
    $a = mysqli_query($koneksi, "select * from transaksi");   
  }
if(isset($_GET['waktu'])){
    $waktu = $_GET['waktu'];
    $tgl1    = date('Y-m-d'); // menentukan tanggal awal
      
    if ($waktu == 1) {
            $tgl2    = date('Y-m-d', strtotime('-6 days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
      $a = mysqli_query($koneksi, "select * from transaksi where tanggal between '$tgl2' and '$tgl1' ");  
     }elseif ($waktu == 2) {
       $tgl2    = date('Y-m-d', strtotime('-1 month', strtotime($tgl1)));
      $a = mysqli_query($koneksi, "select * from transaksi where tanggal between '$tgl2' and '$tgl1' ");  
     }elseif ($waktu == 3) {
       $tgl2    = date('Y-m-d', strtotime('-1 year', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
      $a = mysqli_query($koneksi, "select * from transaksi where tanggal between '$tgl2' and '$tgl1' ");  
     }elseif ($waktu == 4) {
      $tgl2    = date('Y-m-d', strtotime('-1 days', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
      $a = mysqli_query($koneksi, "select * from transaksi where tanggal = '$tgl2'");  
     }elseif ($waktu == 5) {
       $a = mysqli_query($koneksi, "select * from transaksi where tanggal = '$tgl1'");
     }
     else {
    $a = mysqli_query($koneksi, "select * from transaksi");   
    }
  }

$i = 1;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../app/styles.css">

    <title>Hello, world!</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Kelompok 3</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Kendaraan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="transaksi.php">Transaksi Parkir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="member.php">Member</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="topup.php">topup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pegawai.php">Pegawai</a>
        </li>
      </ul>
      <span><?php echo $_SESSION['nama'] ?></span>
      
      <form class="d-flex">
        <button type="submit" class="btn btn-danger"><a class="nav-link active" href="../logout.php">Logout</a></button>
      </form>
    </div>
  </div>
</nav>

<form class="d-flex col-md-4" role="search" method="get">
      <input class="form-control me-2" type="text" placeholder="Masukkan ID Parkir" aria-label="Search" name="cari">
      <button class="btn btn-success" type="submit">Search</button>
    </form>

<form class="data " role="button" method="get">
      <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" name="waktu" required>
      <option selected>Pilih</option>
      <option value="1">7 hari terakhir</option>
      <option value="2">1 bulan terakhir</option>
      <option value="3">1 tahun terakhir</option>
      <option value="4">1 hari terakhir</option>
      <option value="5">Hari ini</option>
  </select>
      <button class="btn btn-success" type="submit">Search</button>
    </form>

<form action="" method="post" class="table-responsive">
<table class="table table-hover " style="text-align: center; " >
  <thead>
    <tr class="table1">
      <th scope="col">No</th>
      <th scope="col">Id Pegawai</th>
      <th scope="col">Id Parkir</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jam Masuk</th>
      <th scope="col">Jam Keluar</th>
      <th scope="col">Id Member</th>
      <th scope="col">Biaya</th>


    </tr>
  </thead>
  <tbody>
    <?php while( $row = mysqli_fetch_assoc($a)) :?>
      <?php $total += $row['biaya'];  ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row ["id_pegawai"]?></td>
      <td><?php echo $row ["id_parkir"]?></td>
      <td><?php echo $row ["tanggal"]?></td>
      <td><?php echo $row ["jam_masuk"]?></td>
      <td><?php echo $row ["jam_keluar"]?></td>
      <td><?php echo $row ["id_member"]?></td>
      <td><?php echo $row ["biaya"]?></td>
    </tr>
    
    <?php $i++ ;?>

    <?php endwhile;?>
    <tr>
      <th colspan="7" style="border-right: solid 2px; text-align: right; " >Total :</th>
      <td colspan="" style="text-align: center ;" ><?php echo $total ?></td>
    </tr>
  </tbody>
</table>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>