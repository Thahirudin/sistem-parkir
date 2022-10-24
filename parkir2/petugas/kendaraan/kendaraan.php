<?php
//koneksi database
include '../../app/koneksi.php';

error_reporting(0);
 
session_start();
if (!isset($_SESSION['login1'])) {
    header("Location: ../../index.php");
}
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $a = mysqli_query($koneksi, "select * from kendaraan where id_parkir like '%".$cari."%'");       
  }
  else {
    $a = mysqli_query($koneksi, "select * from kendaraan");   
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
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../../app/styles.css">

    <title>Hello, world!</title>
  </head>
  <body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Kelompok 3</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Kendaraan Masuk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="kendaraan.php">Kendaraan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../member/member.php">kartu Member</a>
        </li>
        
      </ul>
      <span><?php echo $_SESSION['nama'] ?></span>
      <form class="d-flex">
        <button type="button" class="btn btn-danger"><a class="nav-link active" href="../../logout.php">Logout</a></button>
      </form>
    </div>
  </div>
</nav>

 <form class="d-flex col-md-4" role="search" method="get">
      <input class="form-control me-2" type="text" placeholder="Masukkan ID Parkir" aria-label="Search" name="cari">
      <button class="btn btn-success" type="submit">Search</button>
    </form>

<form action="" method="post" class="data table-responsive">
<table class="table table-hover">
  <thead>
    <tr class="table1">
      <th scope="col">No</th>
      <th scope="col">Id Parkir</th>
      <th scope="col">Nomor Kendaraan</th>
      <th scope="col">Jenis Kendaraan</th>
      <th scope="col">Aksi</th>


    </tr>
  </thead>
  <tbody>
    <?php while( $row = mysqli_fetch_assoc($a)) :?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row ["id_parkir"]?></td>
      <td><?php echo $row ["nomor_kendaraan"]?></td>
      <td><?php echo $row ["jenis_kendaraan"]?></td>
      <td>
                <a href="konfirm.php?id_parkir=<?= $row ["id_parkir"] ?>" class="aksi">Konfirm</a>
                
            </td>
    </tr>
    <?php $i++ ;?>
    <?php endwhile;?>
  </tbody>
</table>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>