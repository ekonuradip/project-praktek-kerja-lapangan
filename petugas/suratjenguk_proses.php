<?php include 'header.php'; ?>
<?php include('suratjenguk_control.php'); ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview pengunjung</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview pengunjung</h3>
                </div>
                <div class="col-md-12">
                    <?php if(isset($_SESSION['pesan_sukses'])){ ?>
                        <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
                    <?php } 
                    unset($_SESSION['pesan_sukses']);
                    ?>
                </div>
                <div class="panel-body">

                    <a href="suratjenguk.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"SELECT * FROM pengunjung,user,tersangka WHERE pengunjung_user = user_id and terdakwa_nama = tersangka_id and  pengunjung_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Nama Pengunjung</th>
                                        <td><?php echo $d['user_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Terdakwa</th>
                                        <td><?php echo $d['tersangka_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Jenguk</th>
                                        <td><?php echo date("d-m-Y", strtotime($d['tanggal_kunjungan']))?></td>
                                    </tr>
                                    <tr>
                                        <th>Foto KTP</th>
                                        <td>
                                            <?php 
                                            if($d['foto_ktp'] == ""){
                                            ?>
                                                <img class="img-user" src="../gambar/sistem/user.png">
                                                <?php
                                            }else{
                                            ?>
                                                <img class="img-user" src="../gambar/pengunjung/<?php echo $d['foto_ktp']; ?>">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    
                                </table>

                            </div>
                           
                        </div>
                        <?php 
                    }
                    ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalvalidasi">
                        Tambahkan Sebagai
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalvalidasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Sebagai</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <label for="nilai">Pilih tahapan surat</label>
                                        <select name="nilai" id="nilai" class="form-control" required>
                                            <option value="">Pilih --</option>
                                            <option value="1">Proses</option>
                                            <option value="2">Selesai</option>
                                            <option value="3">Ditolak</option>
                                        </select>
                                
                                    </div>
                                    <div class="modal-footer">
                                        <button name="simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


</div>



<?php include 'footer.php'; ?>