<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "update hakim set hakim_nama='$nama', hakim_jabatan='$keterangan' where hakim_id='$id'");
header("location:hakim.php");
