<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id  = $_POST['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$agenda = $_POST['agenda'];
$rand = rand();

$filename = $_FILES['file']['name'];

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

if($filename == ""){

	mysqli_query($koneksi, "update sidang set sidang_kode='$kode', sidang_nama='$nama', sidang_hakim='$kategori', sidang_keterangan='$keterangan' where sidang_id='$id'")or die(mysqli_error($koneksi));
	header("location:jadwalsidang.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:jadwalsidang.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from sidang where sidang_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['arsip_file'];
		unlink("../arsip/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update sidang set sidang_kode='$kode', sidang_nama='$nama', sidang_jenis='$agenda',jenis_file='$jenis', sidang_hakim='$kategori', sidang_keterangan='$keterangan', sidang_file='$nama_file' where sidang_id='$id'")or die(mysqli_error($koneksi));
		header("location:jadwalsidang.php?alert=sukses");
	}
}

