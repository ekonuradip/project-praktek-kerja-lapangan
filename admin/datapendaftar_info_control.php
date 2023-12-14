<?php
include '../koneksi.php';
$id= $_GET['id'];
if(isset($_POST['simpan']) && $_POST['simpan']=='simpan_nilai'){
    $nilai = $_POST['nilai'];
    $sql_daftar = "UPDATE pendaftar set level='$nilai' where pendaftar_id= '$id'";
    $query_daftar = mysqli_query($koneksi,$sql_daftar);
    if($nilai == "1"){
        $data = mysqli_query($koneksi, "select * from pendaftar where pendaftar_id='$id'");
        while($p = mysqli_fetch_array($data)){
            $nama  = $p['nama'];
            $username = $p['username'];
            $password = md5($p['email']);
            $rand = rand();
            $sql_user = "INSERT INTO user (user_nama, user_username	, user_password) values ('$nama','$username','$password')";
            $result_user = mysqli_query($koneksi, $sql_user);
            if($result_user){
                
            }else {
                echo "Error insert pendaftar ". mysqli_error($koneksi);
                echo "<br><br> <button type='button' onclick='history.back();'>Kembali</button>";
                die;
            }
        }
    }else{
        $data = mysqli_query($koneksi, "select * from pendaftar where pendaftar_id='$id'");
        while($p = mysqli_fetch_array($data)){
            $nama  = $p['nama'];
            $username = $p['username'];
            $password = md5($p['email']);
            $foto = $p['foto'];
            $rand = rand();
            $allowed =  array('gif','png','jpg','jpeg');
            $sql_petugas = "INSERT INTO petugas (petugas_nama, petugas_username , petugas_password) values ('$nama','$username','$password')";
            $result_petugas = mysqli_query($koneksi, $sql_petugas);
            if($result_petugas){
                
            }else {
                echo "Error insert pendaftar ". mysqli_error($koneksi);
                echo "<br><br> <button type='button' onclick='history.back();'>Kembali</button>";
                die;
            }
        }
    }
    if($query_daftar){
        $_SESSION['pesan_sukses'] = "Pendaftar Telah ditambahkan";
        
    }else{
        echo "gagal update"; die;
    }
    
}
?>