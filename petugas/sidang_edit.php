<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Ubah Sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">jadwal Sidang</span></li>
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
                    <h3 class="panel-title">Ubah Data Sidang</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="jadwalsidang.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>


                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from sidang where sidang_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="sidang_update.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Kode Sidang</label>
                                  <input type="hidden" name="id" value="<?php echo $d['sidang_id']; ?>">
                                <input type="text" class="form-control" name="kode" required="required" value="<?php echo $d['sidang_kode']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Tersangka</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['sidang_nama']; ?>">
                            </div>

                            <div class="form-group">
                                <label>JPU</label>
                                <select class="form-control" name="kategori" required="required">
                                    <option value="">Pilih JPU</option>
                                    <?php 
                                    $kategori = mysqli_query($koneksi,"SELECT * FROM hakim");
                                    while($k = mysqli_fetch_array($kategori)){
                                        ?>
                                        <option <?php if($k['hakim_id'] == $d['sidang_hakim']){echo "selected='selected'";} ?> value="<?php echo $k['hakim_id']; ?>"><?php echo $k['hakim_nama']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Agenda </label>
                                <input type="text" class="form-control" name="agenda" required="required" value="<?php echo $d['sidang_jenis']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Kasus</label>
                                <textarea class="form-control" name="keterangan" required="required"><?php echo $d['sidang_keterangan']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Upload">
                            </div>

                        </form>

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>