<?php 
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from sidang where sidang_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['arsip_file'];
unlink("../arsip/".$nama_file_lama);

mysqli_query($koneksi, "delete from sidang where sidang_id='$id'");
header("location:jadwalsidang.php");
