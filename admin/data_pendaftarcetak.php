<?php
include('../config/koneksi.php');
require '../vendor/autoload.php';

// // reference the Dompdf namespace
use Dompdf\Dompdf;

// // instantiate and use the dompdf class
$dompdf = new Dompdf();


$html ='<style>
table,th, td {
    font-size: 12px;
    border: 1px solid black ;
    border-collapse: unset;
    padding: 5px;
}

</style>

<img src="../asset/img/ub.png" style="float: left; height:60px">

<div style="margin-left:20px">
    <div style="font-size: 18px">KATALOG</div>
    <div style="font-size: 20px">PERKARA TINDAK PIDANA UMUM TAHUN 2020</div>
    
</div>

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 12px; margin-left: 1px;">&nbsp; Tanggal Cetak: '. date("d-m-Y") .'</div>

<table width="100%">
<tr>
    <td width="5%">No</td>
    <td width="20%">Nama Tersangka</td>
    <td width="30%">Pasal Yang dilanggar</td>
    <td width="30%">Keterangan</td>
    
</tr>';



    
// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT arsip.*, arsip.arsip_kategori FROM kategori WHERE kategori.id = arsip.arsip_kategori order by kategori_nama" );

$no = 1;
while($p = mysqli_fetch_array($all_pendaftar)){ 
    if($p['status']==0){
        $status = "baru";
    }else if($p['status']==1){
        $status = "Lolos";
    }else{
        $status = "Tidak Lolos";
    }

    $html .= '
    <tr>
        <td align="center">'. $no++ .'</td>
        <td>'. $p['nama'] . '</td>
        <td>'. $p['tmpt_lahir'] .', '. $p['tgl_lahir'] . '</td>
        <td align="center">'. $p['jenis_kelamin'] . '</td>
        <td>'. $p['alamat'] . '</td>
        <td>'. $p['telepon'] . '</td>
        <td>'. $p['dataarsip'] . '</td>
        <td>'. $p['dataarsip2'] . '</td>
        <td align="center">'. $status . '</td>
    </tr>';
}
$html .= '
</table>';



$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
$dompdf->stream("data_pendftar.pdf", array("attachment"=>0));

?>

