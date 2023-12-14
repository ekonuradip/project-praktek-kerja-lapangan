<?php 
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$nama  = $_POST['nama'];
$noid = $_POST['noid'];
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

	mysqli_query($koneksi, "update petugas set petugas_nama='$nama', No_id_petugas = '$noid', petugas_username='$username',petugas_tmpt_lahir='$tempat_lahir',petugas_tgl_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',petugas_agama='$agama',petugas_alamat='$alamat',petugas_email='$email',petugas_telepon='$telepon' where petugas_id='$id'")or die(mysqli_error($koneksi));
	header("location:profil.php?alert=sukses");

}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from petugas where petugas_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['petugas_foto'];
		unlink("../gambar/petugas/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update petugas set petugas_nama='$nama', petugas_username='$username', petugas_foto='$nama_file' where petugas_id='$id'")or die(mysqli_error($koneksi));
		header("location:profil.php?alert=sukses");

	}else{

		header("location:profil.php?alert=gagal");
	}

}

