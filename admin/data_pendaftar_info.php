<?php include 'header.php'; ?>
<?php include 'datapendaftar_info_control.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Informasi Data Pendaftar</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Akun Baru</span></li>
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
        <div class="col-lg-6">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Data Pendaftar</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="data_pendaftar.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from pendaftar where pendaftar_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <br><br>
                                        <div class="col-md-12">
                                            <?php if(isset($_SESSION['pesan_sukses'])){ ?>
                                                <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
                                            <?php } 
                                            unset($_SESSION['pesan_sukses']);
                                            ?>
                                        </div>
                                        <br>
                                        <h5 class="text-center card-title mt-3"><?= $d['nama']?></h5>
                                        
                                        <ul class="list-group">
                                            <!-- List Informasi Petugas -->

                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">No. ID Petugas</h6> <small class="text-muted"><?= $d['no_id'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">username </h6> <small class="text-muted"><?= $d['username'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">email </h6> <small class="text-muted"><?= $d['email'];?></small></li>
                                            
                                            
                                            


                                        </ul>

                                        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
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
                                                            
                                                            <label for="nilai">Anda Akan Menambahkan <?= $d['nama'] ?> Sebagai :</label>
                                                            <select name="nilai" id="nilai" class="form-control" required>
                                                                <option value="">Pilih --</option>
                                                                <option value="1">User</option>
                                                                <option value="2">Petugas</option>
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

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>