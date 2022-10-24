<?php 
	include '../app/koneksi.php';

function tambah($data)
{
	global $koneksi;


	$id_pegawai = htmlspecialchars($data['id_pegawai']);
	$nama = htmlspecialchars($data['nama']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$jabatan = htmlspecialchars($data['jabatan']);
	$password = htmlspecialchars($data['password']);

	$password1 = password_hash($password, PASSWORD_DEFAULT);



	$query = "INSERT INTO pegawai (id_pegawai, nama, tanggal_lahir, jabatan, password) Values ('$id_pegawai', '$nama', '$tanggal_lahir', '$jabatan', '$password1')";


	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
	global $koneksi;

	 mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = $id");

	 return mysqli_affected_rows($koneksi);
}