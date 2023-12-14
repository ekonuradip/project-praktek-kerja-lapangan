<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = $_SESSION['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$agenda = $_POST['agenda'];

$rand = rand();

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$jadwal = $_POST['jadwal'];
$keterangan = $_POST['keterangan'];

if($jenis == "php") {
	header("location:jadwalsidang.php?alert=gagal");
}else{
	move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
	$nama_file = $rand.'_'.$filename;
	mysqli_query($koneksi, "insert into sidang values (NULL,'$waktu','$petugas','$kode','$nama','$jenis','$agenda','$kategori','$jadwal','$keterangan','$nama_file')")or die(mysqli_error($koneksi));
	header("location:jadwalsidang.php?alert=sukses");
}
