<?php
//koneksi database
include '../app/koneksi.php';
error_reporting(0);
 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
$a= mysqli_query($koneksi, " select * from pegawai");
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

<form action="" method="post" class="data table-responsive">
  <a href="tambah.php" class="aksi">Tambah Pegawai</a>
<table class="table table-hover ">
  <thead>
    <tr class="table1">
      <th scope="col">No</th>
      <th scope="col">Id Pegawai</th>
      <th scope="col">Nama Pegawai</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Password</th>
      <th scope="col">Aksi</th>


    </tr>
  </thead>
  <tbody>
    <?php while( $row = mysqli_fetch_assoc($a)) :?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row ["id_pegawai"]?></td>
      <td><?php echo $row ["nama"]?></td>
      <td><?php echo $row ["tanggal_lahir"]?></td>
      <td><?php echo $row ["jabatan"]?></td>
      <td><?php echo $row ["password"]?></td>
      <td><a href="hapus.php?id_pegawai=<?= $row ["id_pegawai"] ?>" class="aksi" onclick =" return confirm('yakin?');" >hapus</a></td>
    </tr>
    <?php $i++ ;?>
    <?php endwhile;?>
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