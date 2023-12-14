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

            </div>

            <div class="col-lg-6">

                <?php 
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == "sukses"){
                        echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                    }
                }
                ?>

                <div class="panel">
                    <div class="panel-heading">
                        <h4>Data Diri</h4>
                    </div>
                    <div class="panel-body">

                        
                        <form action="profil_act.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>No. ID Petugas</label>
                                <input type="text" class="form-control" placeholder="Masukkan No. ID .." name="noid" required="required" value="<?php echo $s['No_id_petugas'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama .." name="nama" required="required" value="<?php echo $s['petugas_nama'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Masukkan Username .." name="username" required="required" value="<?php echo $s['petugas_username'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir .." name="tempat_lahir" required="required" value="<?php echo $s['petugas_tmpt_lahir'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir .." name="tanggal_lahir" required="required" value="<?php echo $s['petugas_tgl_lahir'] ?>">
                            </div>

                            <div class="form-group">
                            
                                <label for="Jenis_kelamin">Jenis Kelamin</label>

                                <?php
                                $laki="";
                                $perempuan="";
                                if($s['jenis_kelamin']=="L"){
                                    $laki = "checked";
                                }else{
                                    $perempuan = "checked";
                                }
                                ?>

                                <div class="form-check">
                                    <input type="radio" name="Jenis_kelamin" Value="L" class="form-check-input"
                                    id="Laki" value="L" <?= $laki ?>>
                                    <label for="laki" class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="Jenis_kelamin" Value="P" class="form-check-input"
                                    id="Perempuan" value="P" <?= $perempuan ?>>
                                    <label for="Perempuan" class="form-check-label">Perempuan</label>
                                </div>
                                            
                                            
                                
                            </div>

                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="Islam"<?php if($s['petugas_agama']=='Islam'){echo "selected";}?>>Islam</option>
                                    <option value="Kristen"<?php if($s['petugas_agama']=='Kristen'){echo "selected";}?>>Kristen</option>
                                    <option value="Katholik"<?php if($s['petugas_agama']=='Katholik'){echo "selected";}?>>Katholik</option>
                                    <option value="Hindu"<?php if($s['petugas_agama']=='Hindu'){echo "selected";}?>>Hindu</option>
                                    <option value="Budha"<?php if($s['petugas_agama']=='Budha'){echo "selected";}?>>Budha</option>
                                    <option value="Konghucu"<?php if($s['petugas_agama']=='Konghucu'){echo "selected";}?>>Konghucu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Masukkan Alamat .." name="alamat" required="required" value="<?php echo $s['petugas_alamat'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan Telepon .." name="telepon" required="required" value="<?php echo $s['petugas_telepon'] ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input type="input" class="form-control" placeholder="Masukkan Email .." name="email" required="required" value="<?php echo $s['petugas_email'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <small>Kosongkan jika tidak ingin mengubah foto.</small>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>

                            <div class="form-group">
                                <a href="profil.php" class="btn btn-primary">kembali</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>



        </div>
    </div>
</div>


<?php include 'footer.php'; ?>