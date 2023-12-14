<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Profil</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Profil</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3">

                <?php 
                $id = $_SESSION['id'];
                $saya = mysqli_query($koneksi,"select * from petugas where petugas_id='$id'");
                $s = mysqli_fetch_assoc($saya);
                ?>
                <div class="single-cards-item">
                    <div class="single-product-image">
                        <a href="#">

                            <img src="../assets/img/product/profile-bg.jpg" alt="">
                        </a>
                    </div>

                    <div class="single-product-text">
                        <?php 
                        if($s['petugas_foto'] == ""){
                            ?>
                            <img class="img-user" src="../gambar/sistem/user.png">
                            <?php
                        }else{
                            ?>
                            <img class="img-user" src="../gambar/petugas/<?php echo $s['petugas_foto']; ?>">
                            <?php
                        }
                        ?>

                        <h4><a class="cards-hd-dn" href="#"><?php echo $s['petugas_nama']; ?></a></h4>
                        <h5>Petugas</h5>
                        <p class="ctn-cards">Pengelolaan arsip jadi lebih mudah dengan sistem informasi arsip digital.</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <?php 
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == "sukses"){
                        echo "<div class='alert alert-success'>Data anda berhasil diganti!</div>";
                    }
                }
                ?>

                <div class="panel">
                    <div class="panel-heading">
                        <h4>Data Diri</h4>
                    </div>
                    <div class="panel-body">



                        <ul class="list-group">
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Tempat, Tanggal lahir </h6> <small class="text-muted"><?= $s['petugas_tmpt_lahir'];?>, <?= date("d-m-Y", strtotime($s['petugas_tgl_lahir'])); ?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">No. ID Petugas </h6><small class="text-muted"><?= $s['No_id_petugas'];?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Jenis Kelamin </h6>
                            <?php

                            if($s['jenis_kelamin']=='L'){
                                $kelamin = "Laki-laki";
                            }else{
                                $kelamin = "Perempuan";
                            }

                            ?>
                            <small class="text-muted"><?= $kelamin;?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Agama </h6> <small class="text-muted"><?= $s['petugas_agama'];?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Alamat </h6> <small class="text-muted"><?= $s['petugas_alamat'];?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">email </h6> <small class="text-muted"><?= $s['petugas_email'];?></small></li>
                            <li class="list-group-item"><h6 class="mb-0" style="color: black;">Telepon </h6> <small class="text-muted"><?= $s['petugas_telepon'];?></small></li>
                            
                        </ul>
                        
                        <div class="text-right">
                            <a href="edit_profil.php" class="btn btn-warning btn-sm">Edit Profil</a>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>
</div>


<?php include 'footer.php'; ?>