<?php 
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from pengunjung where pengunjung_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['foto_ktp'];
unlink("../pengunjung/".$nama_file_lama);

mysqli_query($koneksi, "delete from pengunjung where pengunjung_id='$id'");
header("location:suratjenguk.php");
