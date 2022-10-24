<?php 
	include '../app/koneksi.php';

function tambah($data)
{
	global $koneksi;


	$id_parkir = htmlspecialchars($data['id_parkir']);
	$nomor_kendaraan = htmlspecialchars($data['nomor_kendaraan']);
	$jenis_kendaraan = htmlspecialchars($data['jenis_kendaraan']);
	$jam_masuk = htmlspecialchars($data['jam_masuk']);
	$tanggal = htmlspecialchars($data['tanggal']);

	$kendaraan = "INSERT INTO kendaraan (id_parkir, nomor_kendaraan, jenis_kendaraan) Values ('$id_parkir', '$nomor_kendaraan', '$jenis_kendaraan')";
	$transaksi = "INSERT INTO transaksi (tanggal, jam_masuk, id_parkir) Values ('$tanggal', '$jam_masuk', '$id_parkir')";

	mysqli_query($koneksi, $kendaraan);
	mysqli_query($koneksi, $transaksi);

	return mysqli_affected_rows($koneksi);
}