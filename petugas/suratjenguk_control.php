<?php
include '../koneksi.php';
$id= $_GET['id'];
if(isset($_POST['simpan']) && $_POST['simpan']=='simpan_nilai'){
    
    $nilai = $_POST['nilai'];

    $sql_arsip = "UPDATE pengunjung set status='$nilai' where pengunjung_id= '$id'";
    $query_arsip = mysqli_query($koneksi,$sql_arsip);
    if($query_arsip){
        $_SESSION['pesan_sukses'] = "Status surat pengunjung telah diubah";
        
    }else{
        echo "gagal update"; die;
    }
}
?>