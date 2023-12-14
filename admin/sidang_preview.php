<?php include 'header.php'; ?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview sidang</span></li>
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
                    <h3 class="panel-title">Preview sidang</h3>
                </div>
                <div class="panel-body">

                    <a href="jadwalsidang.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM sidang,hakim,petugas,tersangka WHERE sidang_petugas=petugas_id and sidang_nama = tersangka_id  and sidang_hakim=hakim_id and sidang_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Kode sidang</th>
                                        <td><?php echo $d['sidang_kode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y',strtotime($d['sidang_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Tersangka</th>
                                        <td><?php echo $d['tersangka_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hakim</th>
                                        <td><?php echo $d['hakim_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jadwal Sidang</th>
                                        <td><?php echo date("d-m-Y", strtotime($d['sidang_jadwal'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Agenda</th>
                                        <td><?php echo $d['sidang_jenis']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Petugas Pengupload</th>
                                        <td><?php echo $d['petugas_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kasus</th>
                                        <td><?php echo $d['sidang_keterangan']; ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-lg-8">

                                <?php 
                                if($d['jenis_file'] == "png" || $d['sidang_jenis'] == "jpg" || $d['sidang_jenis'] == "gif" || $d['sidang_jenis'] == "jpeg" ){
                                    ?>
                                    <img src="../arsip/<?php echo $d['sidang_file']; ?>">
                                    
                                    <?php
                                }elseif($d['jenis_file'] == ""){
                                    ?>
                                    <p>Berkas sidang untuk terdakwa <?php echo $d['tersangka_nama'];?> belum tersedia, Coba hubungi petugas <?php echo $d['petugas_nama'];?> untuk melihat berkas</p>
                                    <?php
                                }
                                else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['sidang_file']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>

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