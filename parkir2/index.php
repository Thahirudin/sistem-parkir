<?php 
 
include 'app/koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['login'])) {
    header("Location: manager/index.php");
}
if (isset($_SESSION['login1'])) {
    header("Location: petugas/index.php");
}
 
if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $password1 = $row['password'];

    if (password_verify($password, $password1)) { //memverifikasi apakah enkripsi password login sesuai
            $jabatan = $row['jabatan'];
        if ($jabatan == Manager) {
          $_SESSION['login'] = true;
          $_SESSION['nama'] = $row['nama'];
          $_SESSION['id_pegawai'] = $row['id_pegawai'];
           header("Location: manager/index.php");
        }else{
          $_SESSION['login1'] = true;
          $_SESSION['nama'] = $row['nama'];
          $_SESSION['id_pegawai'] = $row['id_pegawai'];
           header("Location: petugas/index.php");
        }
    }else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="app/styles.css">

    <title>Hello, world!</title>
  </head>
  <body>



<form class="input" action="" method="post">
  <h1>Login</h1>

  <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="id_pegawai" required >
      <label for="floatingInput" >Id Pegawai</label>
  </div>
<div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password" required>
      <label for="floatingInput">passsword</label>
</div>


<button type="submit" class="btn btn-success" name="submit">Input</button>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>