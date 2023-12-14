<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Surat Jenguk</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Surat Jenguk</span></li>
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
            <h3 class="panel-title">Data User</h3>
        </div>
        <div class="panel-body">
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
            <?php
            if(isset($_GET['alert'])){
                if($_GET['alert'] == "gagal"){
                    echo "<div class='alert alert-danger'>File yang di upload harus memiliki ekstensi PDF</div>";
                }else if($_GET['alert'] == 'berhasil'){
                    echo "<div class='alert alert-info'>File Telah Diunggah</div>";
                }
            }
            ?>
            <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th class="text-center">Nama Pengunjung</th>
                        <th class="text-center">Nama Terdakwa</th>
                        <th class="text-center">Tanggal Jenguk</th>
                        <th class="text-center">Foto KTP</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    
                    $kategori = mysqli_query($koneksi,"SELECT * FROM pengunjung,user,tersangka WHERE pengunjung_user = user_id and terdakwa_nama = tersangka_id ORDER BY pengunjung_id DESC");
                    while($p = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $p['user_nama'] ?></td>
                            <td class="text-center"><?php echo $p['tersangka_nama'] ?></td>
                            
                            <td class="text-center"><?php echo date("d-m-Y", strtotime($p['tanggal_kunjungan']))?></td>
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
                                $status = '<span class="badge badge-pill badge-danger">Belum diproses</span>';
                            }else if($p['status']==1){
                                $status = '<span class="badge badge-success">diproses</span>';
                            }else if($p['status']==2){
                                $status = '<span class="badge badge-danger">Selesai</span>';
                            }else if($p['status']==3){
                                $status = '<span class="badge badge-danger">Ditolak</span>';
                            }
                            ?>
                            <td class="text-center"><?= $status ?></td>
                            <td class="text-center">

                                <div class="modal fade" id="exampleModal_<?php echo $p['pengunjung_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="suratjenguk_hapus.php?id=<?php echo $p['pengunjung_id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="btn-group">
                                    <a href="suratjenguk_kirim.php?id=<?php echo $p['pengunjung_id']; ?>" class="btn btn-default"><i class="fa fa-plus"></i></a>
                                    <a href="suratjenguk_proses.php?id=<?php echo $p['pengunjung_id']; ?>" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?php echo $p['pengunjung_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
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