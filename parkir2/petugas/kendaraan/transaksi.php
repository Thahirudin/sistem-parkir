<?php
include 'function.php';
error_reporting(0);
 
session_start();
if (!isset($_SESSION['login1'])) {
    header("Location: ../../index.php");
}
$id = $_GET["id_parkir"];
$a = mysqli_query($koneksi, "SELECT * FROM transaksi where id_parkir = $id");
$b = mysqli_query($koneksi, "SELECT * FROM kendaraan where id_parkir = $id");


$data = mysqli_fetch_assoc($b);




if (isset($_POST['submit'])) {
  
  if (transaksi($_POST) > 0) {
    echo "<script>
          alert('Data Berhasil Ditambahkan!');
          document.location.href = 'kendaraan.php';
        </script>";
  }
  else {
    echo "
        <script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'kendaraan.php';
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
          <a class="nav-link active" href="kendaraan.php">Kendaraan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../member/member.php">Member</a>
        </li>
      </ul>
            <span><?php echo $_SESSION['nama'] ?></span>
      <form class="d-flex" role="search">
      <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
      <form class="d-flex">
        <button type="submit" class="btn btn-danger"><a class="nav-link active" href="../../logout.php">Logout</a></button>
      </form>
    </div>
  </div>
</nav>

<form class="input" action="" method="post">
  <h1>Kendaraan Keluar</h1>
  <?php while( $row = mysqli_fetch_assoc($a)) :
    $id_member = $row["id_member"];

$c = mysqli_query($koneksi, "SELECT * FROM kartu_member where id_member = $id_member");
$sa = mysqli_fetch_assoc($c);

    ?>


<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="id_pegawai" required value="<?php echo $_SESSION['id_pegawai'] ?>">
  <label for="floatingInput" readonly>Id Pegawai</label>
</div>
  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="id_parkir" required value="<?php echo $row ["id_parkir"]?>">
  <label for="floatingInput">Id parkir</label>
</div>
<div class="form-floating mb-3">
  <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="tanggal" required value="<?php echo $row ["tanggal"]?>">
  <label for="floatingInput">Tanggal</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="jenis_kendaraan" required value="<?php echo $data ["jenis_kendaraan"]?>">
  <label for="floatingInput">Jenis Kendaraan</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="jam_masuk" required value="<?php echo $row ["jam_masuk"]?>">
  <label for="floatingInput">Jam Masuk</label>
</div>
<div class="form-floating mb-3">
  <input type="time" class="form-control" id="floatingInput" placeholder="name@example.com" name="jam_keluar" required value="<?php echo $row ["jam_keluar"]?>">
  <label for="floatingInput">Jam Keluar</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="id_member" readonly required value="<?php echo $row ["id_member"]?>">
  <label for="floatingInput">id_member</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="saldo" readonly required value="<?php echo $sa ["saldo"]?>">
  <label for="floatingInput">saldo</label>
</div>
<?php  


$awal  = strtotime($row ["jam_masuk"]);
$akhir = strtotime($row ["jam_keluar"]);
$id_member = $row["id_member"];
$diff  = $akhir - $awal;

$jam   = floor($diff / (60 * 60));



if ( $data["jenis_kendaraan"] == 'Motor' && $jam <= 1 && $id_member == 0) {
  $biaya = 2000;
} elseif ( $data["jenis_kendaraan"] == 'Motor' && $jam > 1  && $id_member == 0) {
  $biaya = 2000 * $jam;
} elseif ( $data["jenis_kendaraan"] == 'Mobil' && $jam <= 1 && $id_member == 0) {
  $biaya = 3000;
} elseif (  $data["jenis_kendaraan"] == 'Mobil' && $jam > 1 && $id_member == 0) {
  $biaya = 3000 * $jam;
} elseif ( $data["jenis_kendaraan"] == 'Motor' && $jam >= 5 && $id_member != 0 ) {
  $biaya = 6000;
} elseif ( $data["jenis_kendaraan"] == 'Mobil' && $jam >= 5 && $id_member != 0 ) {
  $biaya = 7000;}
  elseif ( $data["jenis_kendaraan"] == 'Motor' && $jam <= 1 && $id_member != 0) {
  $biaya = 2000;}
  elseif ( $data["jenis_kendaraan"] == 'Motor' && $jam > 1  && $id_member != 0) {
  $biaya = 2000 * $jam;
} elseif ( $data["jenis_kendaraan"] == 'Mobil' && $jam <= 1 && $id_member != 0) {
  $biaya = 3000;
} elseif (  $data["jenis_kendaraan"] == 'Mobil' && $jam > 1 && $id_member != 0) {
  $biaya = 3000 * $jam;
}


 ?>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="biaya" required value="<?php echo $biaya?>">
  <label for="floatingInput">Biaya</label>
</div>

<?php endwhile;?>




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