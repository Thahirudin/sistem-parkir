<?php 
	include '../../app/koneksi.php';

function tambah($data)
{
	global $koneksi;


	$id_member = htmlspecialchars($data['id_member']);
	$nama_member = htmlspecialchars($data['nama_member']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$alamat = htmlspecialchars($data['alamat']);


	$query = "INSERT INTO kartu_member(id_member, nama_member, tanggal_lahir, alamat) Values ('$id_member', '$nama_member', '$tanggal_lahir', '$alamat')";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}
function edit($data)
{
	global $koneksi;


	$id_member = htmlspecialchars($data['id_member']);
	$nama_member = htmlspecialchars($data['nama']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$alamat = htmlspecialchars($data['alamat']);


	$query = "UPDATE kartu_member SET nama_member = '$nama_member', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir' WHERE id_member = '$id_member' ";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function topup($data)
{
	global $koneksi;

	$id_pegawai = htmlspecialchars($data['id_pegawai']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$biaya = htmlspecialchars($data['biaya']);
	$id_member = htmlspecialchars($data['id_member']);
	$saldo = htmlspecialchars($data['saldo']);
	$total = 0;

	$total = $biaya + $saldo;



	$member = "UPDATE kartu_member SET saldo = '$total' WHERE id_member = '$id_member' ";

	$topup = "INSERT INTO topup (biaya, id_member, tanggal, id_pegawai) Values ('$biaya', '$id_member', '$tanggal', '$id_pegawai')";

	mysqli_query($koneksi, $topup);
	mysqli_query($koneksi, $member);

	return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
	global $koneksi;

	 mysqli_query($koneksi, "DELETE FROM kartu_member WHERE id_member = $id");

	 return mysqli_affected_rows($koneksi);
}