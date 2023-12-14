<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Informasi Data Petugas</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Petugas</span></li>
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
                    <h3 class="panel-title">Data Petugas</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="petugas.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from petugas where petugas_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <?php 
                                            if($d['petugas_foto'] == ""){
                                                ?>
                                                <img class="img-user" src="../gambar/sistem/user.png">
                                                <?php
                                            }else{
                                                ?>
                                                <img class="img-user" src="../gambar/petugas/<?php echo $d['petugas_foto']; ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <h5 class="text-center card-title mt-3"><?= $d['petugas_nama']?></h5>
                                        
                                        <ul class="list-group">
                                            <!-- List Informasi Petugas -->
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">No. ID Petugas </h6> <small class="text-muted"><?= $d['No_id_petugas'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Tempat, Tanggal lahir </h6> <small class="text-muted"><?= $d['petugas_tmpt_lahir'];?>, <?= date("d-m-Y", strtotime($d['petugas_tgl_lahir'])); ?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Jenis Kelamin </h6>
                                            <?php

                                            if($d['jenis_kelamin']=='L'){
                                                $kelamin = "Laki-laki";
                                            }else{
                                                $kelamin = "Perempuan";
                                            }

                                            ?>
                                            <small class="text-muted"><?= $kelamin;?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Agama </h6> <small class="text-muted"><?= $d['petugas_agama'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Alamat </h6> <small class="text-muted"><?= $d['petugas_alamat'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">email </h6> <small class="text-muted"><?= $d['petugas_email'];?></small></li>
                                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Telepon </h6> <small class="text-muted"><?= $d['petugas_telepon'];?></small></li>
                                            
                                            
                                        </ul>
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