<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from hakim where hakim_id='$id'");
mysqli_query($koneksi, "delete from hakim where hakim_id='$id'");
header("location:hakim.php");
