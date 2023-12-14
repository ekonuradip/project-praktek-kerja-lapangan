<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah Sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">sidang_tambah</span></li>
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
                    <h3 class="panel-title">Tambah Sidang</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="jadwalsidang.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="sidang_aksi.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Kode Sidang</label>
                            <input type="text" class="form-control" name="kode" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Tersangka</label>
                            <select class="form-control" name="nama" required="required">
                                <option value="">Pilih Tersangka</option>
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
                            <label>Hakim</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih Hakim</option>
                                <?php 
                                $hakim = mysqli_query($koneksi,"SELECT * FROM hakim");
                                while($k = mysqli_fetch_array($hakim)){
                                    ?>
                                    <option value="<?php echo $k['hakim_id']; ?>"><?php echo $k['hakim_nama']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jadwal Sidang</label>
                            <input type="date" class="form-control" name="jadwal" required="required">
                        </div>

                        <div class="form-group">
                            <label>Agenda </label>
                            <input type="text" class="form-control" name="agenda" required="required">
                        </div>

                        <div class="form-group">
                            <label>Kasus</label>
                            <textarea class="form-control" name="keterangan" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file">
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