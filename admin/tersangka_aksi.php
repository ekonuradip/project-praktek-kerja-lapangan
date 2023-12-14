<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$alamat = $_POST['alamat'];
$kasus = $_POST['kasus'];

mysqli_query($koneksi, "insert into tersangka values (NULL,'$nama','$alamat','$kasus')");
header("location:tersangka.php");