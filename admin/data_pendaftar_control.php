<?php


$pendaftar = mysqli_query($koneksi, "SELECT*FROM pendaftar where pendaftar.level = 0");

// cek hasil
if(!$pendaftar){
    die('Query Error : '.mysqli_error($koneksi));
}


?>