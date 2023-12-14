<?php 
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$nama  = $_POST['nama'];
$username  = $_POST['username'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['Jenis_kelamin'];
$agama  = $_POST['agama'];
$alamat  = $_POST['alamat'];
$email  = $_POST['email'];
$telepon  = $_POST['telepon'];

$rand = rand();

$allowed =  array('gif','png','jpg','jpeg');

$filename = $_FILES['foto']['name'];

if($filename == ""){

	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username' ,user_tmpt_lahir='$tempat_lahir',user_tgl_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',user_agama='$agama',user_alamat='$alamat',user_email='$email',user_telepon='$telepon' where user_id='$id'")or die(mysqli_error($koneksi));
	header("location:profil.php?alert=sukses");


}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from user where user_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['user_foto'];
		unlink("../gambar/user/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_foto='$nama_file' where user_id='$id'")or die(mysqli_error($koneksi));
		header("location:profil.php?alert=sukses");

	}else{

		header("location:profil.php?alert=gagal");
	}

}

