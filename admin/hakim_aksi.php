<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "insert into hakim values (NULL,'$nama','$keterangan')");
header("location:hakim.php");