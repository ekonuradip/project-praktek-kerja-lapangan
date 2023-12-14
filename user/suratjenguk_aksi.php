<?php 
// include '../koneksi.php';
// $nama  = $_POST['nama'];
// $terdakwa = $_POST['terdakwa'];
// $tanggal = $_POST['tanggal'];

// $rand = rand();
// $allowed =  array('gif','png','jpg','jpeg');
// $filename = $_FILES['foto']['name'];

// if($filename == ""){
// 	mysqli_query($koneksi, "insert into pengunjung values (NULL,'$nama','$terdakwa','$tanggal','')");
// 	header("location:index.php");
// }else{
// 	$ext = pathinfo($filename, PATHINFO_EXTENSION);

// 	if(!in_array($ext,$allowed) ) {
// 		header("location:index.php?alert=gagal");
// 	}else{
// 		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/pengunjung/'.$rand.'_'.$filename);
// 		$file_gambar = $rand.'_'.$filename;
// 		mysqli_query($koneksi, "insert into pengunjung values (NULL,'$nama','$terdakwa','$tanggal','$file_gambar')");
// 		header("location:index.php");
// 	}
// }


include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = $_SESSION['id'];
$nama  = $_POST['nama'];
$terdakwa = $_POST['terdakwa'];
$tanggal = $_POST['tanggal'];
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

if($jenis == "php") {
	header("location:index.php");
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/pengunjung/'.$rand.'_'.$filename);
	$nama_file = $rand.'_'.$filename;
	mysqli_query($koneksi, "insert into pengunjung values (NULL,'$waktu','$nama','$petugas','$terdakwa','$tanggal','$nama_file','','')")or die(mysqli_error($koneksi));
	header("location:index.php");
}


