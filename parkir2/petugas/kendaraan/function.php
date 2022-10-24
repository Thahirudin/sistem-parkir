<?php 
	include '../../app/koneksi.php';



function hapus($id)
{
	global $koneksi;

	 mysqli_query($koneksi, "DELETE FROM kendaraan WHERE id_parkir = $id");
	 mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_parkir = $id");
	 mysqli_query($koneksi, "DELETE FROM topup WHERE id_parkir = $id");

	 return mysqli_affected_rows($koneksi);
}

function konfirm($data)
{
	global $koneksi;


	$id_parkir = htmlspecialchars($data['id_parkir']);
	$id_pegawai = htmlspecialchars($data['id_pegawai']);
	$jam_masuk = htmlspecialchars($data['jam_masuk']);
	$jam_keluar = htmlspecialchars($data['jam_keluar']);
	$biaya = htmlspecialchars($data['biaya']);
	$id_member = htmlspecialchars($data['id_member']);
	$b = mysqli_query($koneksi, "SELECT * FROM kartu_member where id_member = '$id_member'");
	$row = mysqli_fetch_assoc($b);
	$member = $row['id_member'];

	if ($id_member == $member or $id_member == 0) {
		$query = "UPDATE transaksi SET  id_pegawai = '$id_pegawai',  jam_keluar = '$jam_keluar', id_member = '$id_member' WHERE id_parkir = '$id_parkir' ";
	}
	else {
		echo "<script>
          alert('id salah');
        </script>";
	}


	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}
function transaksi($data)
{
	global $koneksi;

	$id_parkir = htmlspecialchars($data['id_parkir']);
	$jam_keluar = htmlspecialchars($data['jam_keluar']);
	$biaya = htmlspecialchars($data['biaya']);
	$id_member = htmlspecialchars($data['id_member']);
	$saldo = htmlspecialchars($data['saldo']);

if ($id_member != 0) {
	if ( $saldo >= $biaya	) {
		$saldoskr = $saldo - $biaya;
			$member = "UPDATE kartu_member SET  saldo = '$saldoskr' WHERE id_member = '$id_member' ";
	} else {
		echo "
        <script>
          alert('saldo tidak cukup');
          document.location.href = '#';
        </script>
    ";
  }
}

	
	


	$transaksi = "UPDATE transaksi SET  jam_keluar = '$jam_keluar', biaya = '$biaya', id_member = '$id_member' WHERE id_parkir = '$id_parkir' ";


	mysqli_query($koneksi, $transaksi);
	mysqli_query($koneksi, $member);
	
	return mysqli_affected_rows($koneksi);
}


 ?>