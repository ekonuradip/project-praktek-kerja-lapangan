<?php include 'header.php'; ?>

<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Surat Menjenguk Tahanan</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Surat Menjenguk</span></li>
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
                    <h3 class="panel-title">Buat Surat</h3>
                </div>
                <div class="panel-body">

                    <br>
                    <br>
                    
                    <form method="post" action="suratjenguk_aksi.php" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label>Nama Pengunjung</label>
                            <input type="text" class="form-control" name="nama" required="required">
                        </div>
                        
                

                        <div class="form-group">
                            <label>Nama Terdakwa</label>
                            <input type="text" class="form-control" name="terdakwa" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Besuk</label>
                            <input type="date" class="form-control" name="tanggal" required="required">
                        </div>

                        <div class="form-group">
                            <label>Foto KTP Pengunjung</label>
                            <input type="file" name="foto" required="required">
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div> -->




<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Upload Arsip</h4>
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


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Upload arsip</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="progres.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="suratjenguk_aksi.php" enctype="multipart/form-data">

                        

                        <div class="form-group">
                            <label>Nama Pengunjung</label>
                            <select class="form-control" name="nama" required="required">
                                <option value="">Pilih Nama Pengunjung</option>
                                <?php 
                                $user = mysqli_query($koneksi,"SELECT * FROM user");
                                while($k = mysqli_fetch_array($user)){
                                    ?>
                                    <option value="<?php echo $k['user_id']; ?>"><?php echo $k['user_nama']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Terdakwa</label>
                            <select class="form-control" name="terdakwa" required="required">
                                <option value="">Pilih Terdakwa</option>
                                <?php 
                                $tersangka = mysqli_query($koneksi,"SELECT * FROM tersangka");
                                while($k = mysqli_fetch_array($tersangka)){
                                    ?>
                                    <option value="<?php echo $k['tersangka_id']; ?>"><?php echo $k['tersangka_nama']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" class="form-control" name="tanggal" required="required">
                        </div>

                        <div class="form-group">
                            <label>Foto KTP Pengunjung</label>
                            <input type="file" name="foto" required="required">
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>