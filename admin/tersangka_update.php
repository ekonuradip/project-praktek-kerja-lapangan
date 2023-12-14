<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$alamat = $_POST['alamat'];
$kasus = $_POST['kasus'];

mysqli_query($koneksi, "update tersangka set tersangka_nama='$nama', tersangka_alamat='$alamat', tersangka_kasus='$kasus' where tersangka_id='$id'");
header("location:tersangka.php");
