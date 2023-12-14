<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from pendaftar where pendaftar_id='$id'");
$d = mysqli_fetch_assoc($data);
mysqli_query($koneksi, "delete from pendaftar where pendaftar_id='$id'");
header("location:data_pendaftar.php");
