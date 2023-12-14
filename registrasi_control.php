<?php

include('koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])){
    
    $noid = $_POST['idpet'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email =$_POST['email'];
    

    $sql_user = "INSERT INTO pendaftar (no_id,nama, username, email) VALUES ('$noid','$nama','$username','$email')" ;

   
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        //jika berhasil
        
        header('location:login.php?alert=berhasil');
    }else {
        echo "Error insert pendaftar ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'>Kembali</button>";
        die;

    }



}else{
    header('location:registrasi.php');
}   

?>