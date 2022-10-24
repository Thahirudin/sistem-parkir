<?php
include 'function.php';
include 'kodeauto.php';
error_reporting(0);
 
session_start();
if (!isset($_SESSION['login1'])) {
    header("Location: ../../index.php");
}
if (isset($_POST['submit'])) {
  
  if (tambah($_POST) > 0) {
    echo "
        <script>
          alert('Data Berhasil Ditambahkan!');
          document.location.href = 'member.php';
        </script>
    ";
  }
  else {
    echo "
        <script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'tambah.php';
        </script>
    ";
  }
}

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
    <a class="navbar-brand" href="#">Kelompok 3</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../kendaraan/kendaraan.php">Kendaraan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="member.php">Member</a>
        </li>
        
      </ul>
      <span><?php echo $_SESSION['nama'] ?></span>
      <form class="d-flex">
        <button type="button" class="btn btn-danger"><a class="nav-link active" href="../../logout.php">Logout</a></button>
      </form>
    </div>
  </div>
</nav>

<form class="input" action="" method="post">
  <h1>Tambah Member</h1>

  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="id_member" required value="<?php echo $kodeauto?>">
  <label for="floatingInput">Id Member</label>
</div>
  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nama_member" required >
  <label for="floatingInput">Nama Member</label>
</div>
<div class="form-floating mb-3">
  <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="tanggal_lahir" required>
  <label for="floatingInput">Tanggal Lahir</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="alamat" required>
  <label for="floatingInput">Alamat</label>
</div>



<button type="submit" class="btn btn-success" name="submit">Input</button>
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