<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from tersangka where tersangka_id='$id'");
mysqli_query($koneksi, "delete from tersangka where tersangka_id='$id'");
header("location:tersangka.php");
