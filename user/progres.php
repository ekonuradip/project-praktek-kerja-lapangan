<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Arsip Saya</h3>
        </div>
        <div class="panel-body">


            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Nama Pengunjung</th>
                        <th>Nama Terdakwa</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Foto KTP</th>
                        <th>Status</th>
                        <th>Surat Jenguk</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $saya = $_SESSION['id'];
                    $arsip = mysqli_query($koneksi,"SELECT * FROM pengunjung,user,tersangka WHERE pengunjung_user = user_id and terdakwa_nama = tersangka_id and pengunjung_user='$saya' ORDER BY pengunjung_id DESC");
                    while($p = mysqli_fetch_array($arsip)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y',strtotime($p['pengunjung_upload'])) ?></td>
                            <td><?php echo $p['user_nama'] ?></td>
                            <td><?php echo $p['tersangka_nama'] ?></td>
                            <td><?php echo $p['tanggal_kunjungan'] ?></td>
                            <td class="text-center">
                                <?php 
                                if($p['foto_ktp'] == ""){
                                    ?>
                                    <img class="img-user" src="../gambar/sistem/user.png">
                                    <?php
                                }else{
                                    ?>
                                    <img class="img-user" src="../gambar/pengunjung/<?php echo $p['foto_ktp']; ?>">
                                    <?php
                                }
                                ?>
                             
                            </td>
                            <?php
                            if($p['status']==0){
                                $status = '<span class="badge badge-info">Belum diproses</span>';
                            }else if($p['status']==1){
                                $status = '<span class="badge badge-success">diproses</span>';
                            }else if($p['status']==2){
                                $status = '<span class="badge badge-danger">Selesai</span>';
                            }else if($p['status']==3){
                                $status = '<span class="badge badge-danger">Ditolak</span>';
                            }
                            ?>
                            <td><?= $status ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="suratjenguk_preview.php?id=<?php echo $p['pengunjung_id']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>