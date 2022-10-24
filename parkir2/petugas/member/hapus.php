<?php  
include 'function.php';

	$id = $_GET['id_member'];

if (hapus($id) > 0) {
    echo "
        <script>
          alert('Data Berhasil Dihapus!');
          document.location.href = 'member.php';
        </script>
    ";
  }
else {
    echo "
        <script>
          alert('Data Gagal Dihapus!');
          document.location.href = 'member.php';
        </script>";
  }

?>