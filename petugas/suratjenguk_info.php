<?php include 'header.php'; ?>

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
                <div class="panel-body">

                    <a href="suratjenguk.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM pengunjung,user WHERE pengunjung_user=user_id and  pengunjung_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Nama Pengunjung</th>
                                        <td><?php echo $d['pengunjung_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Terdakwa</th>
                                        <td><?php echo $d['terdakwa_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Jenguk</th>
                                        <td><?php echo $d['tanggal_kunjungan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
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

                </div>
            </div>
        </div>
    </div>


</div>



<?php include 'footer.php'; ?>