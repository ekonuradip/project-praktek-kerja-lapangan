<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from pendaftar where pendaftar_id='$id'");
while($p = mysqli_fetch_array($data)){
	$nama  = $p['nama'];
	$username = $p['username'];
	$password = md5($p['email']);

	$rand = rand();
	$allowed =  array('gif','png','jpg','jpeg');
	$filename = $_FILES['foto']['name'];

	if($filename == ""){
		mysqli_query($koneksi, "insert into user (user_nama, user_username	, user_password, user_foto) values ('$nama','$username','$password','')");
		header("location:user.php");
	}else{
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if(!in_array($ext,$allowed) ) {
			header("location:user.php?alert=gagal");
		}else{
			move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
			$file_gambar = $rand.'_'.$filename;
			mysqli_query($koneksi, "insert into user (user_nama, user_username	,user_password, user_foto) values (NULL,'$nama','$username','$password','$file_gambar')");
			header("location:user.php");
		}
	}

}

