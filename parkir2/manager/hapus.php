<?php  
include 'function.php';

	$id = $_GET['id_pegawai'];

if (hapus($id) > 0) {
    echo "
        <script>
          alert('Data Berhasil Dihapus!');
          document.location.href = 'pegawai.php';
        </script>
    ";
  }
else {
    echo "
        <script>
          alert('Data Dihapus!');
          document.location.href = 'pegawai.php';
        </script>";
  }

?>