<?php 
include '../koneksi.php';
$id  = $_POST['id'];
// cek gambar
$rand = rand();
$allowed =  array('pdf');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$allowed) ) {
    header("location:suratjenguk.php?alert=gagal");
}else{
    move_uploaded_file($_FILES['foto']['tmp_name'], '../suratjenguk/'.$rand.'_'.$filename);
    $x = $rand.'_'.$filename ;
    mysqli_query($koneksi, "update pengunjung set pengunjung_surat='$x' where pengunjung_id ='$id'");
    header("location:suratjenguk.php?alert=berhasil");
}
