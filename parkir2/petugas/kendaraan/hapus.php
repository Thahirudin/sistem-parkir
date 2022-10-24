<?php  
include 'function.php';

	$id = $_GET['id_parkir'];

if (hapus($id) > 0) {
    echo "
        <script>
          alert('Data Berhasil Dihapus!');
          document.location.href = 'kendaraan.php';
        </script>
    ";
  }
else {
    echo "
        <script>
          alert('Data Dihapus!');
          document.location.href = 'kendaraan.php';
        </script>";
  }

?>