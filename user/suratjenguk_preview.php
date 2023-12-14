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
                                <li><span class="bread-blod">Surat Jenguk Tahanan</span></li>
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
                    <h3 class="panel-title">Surat Jenguk</h3>
                </div>
                <div class="panel-body">

                    <a href="progres.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM pengunjung WHERE pengunjung_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-8">

                                <?php
                                if($d['pengunjung_surat'] == ""){
                                    ?>
                                    <p>Surat Jenguk Belum Ada</p>
                                    <?php
                                }else{
                                    ?>
                                    <?php 
                                    if($d['pengunjung_surat'] == "pdf"){
                                        ?>
                                        <div class="pdf-singe-pro">
                                            <a class="media" href="../suratjenguk/<?php echo $d['pengunjung_surat']; ?>"></a>
                                        </div>

                                        <?php
                                    }else{
                                        ?>
                                        <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../suratjenguk/<?php echo $d['pengunjung_surat']; ?>">Download di sini.</a></p>.
                                        <?php
                                    }
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