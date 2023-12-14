<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Data Jaksa</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">JPU</span></li>
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
                    <h3 class="panel-title">Edit Data Jaksa</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="hakim.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from hakim where hakim_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="hakim_update.php">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id" value="<?php echo $d['hakim_id']; ?>">
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['hakim_nama']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <textarea class="form-control" name="keterangan" required="required"><?php echo $d['hakim_jabatan']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Simpan">
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