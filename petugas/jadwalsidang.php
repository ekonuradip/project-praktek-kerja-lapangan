<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Jadwal Sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Jadwal Sidang</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">


            <div class="pull-right">
                <a href="sidang_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sidang</a>
            </div>

            <br>
            <br>
            <br>
            <div class="container-fluid">
                <div class="panel panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">Semua Sidang</h3>
                    </div>
                    <div class="panel-body">

                        <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Waktu Upload</th>
                                    <th>Sidang</th>
                                    <th>Hakim</th>
                                    <th>Petugas</th>
                                    <th>Jadwal Sidang</th>
                                    <th>Kasus</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include '../koneksi.php';
                                $no = 1;
                                $arsip = mysqli_query($koneksi,"SELECT * FROM sidang,hakim,petugas, tersangka WHERE sidang_petugas=petugas_id and sidang_hakim=hakim_id and sidang_nama = tersangka_id ORDER BY sidang_id DESC");
                                while($p = mysqli_fetch_array($arsip)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('H:i:s  d-m-Y',strtotime($p['sidang_upload'])) ?></td>
                                        <td>

                                            <b>KODE</b> : <?php echo $p['sidang_kode'] ?><br>
                                            <b>Nama</b> : <?php echo $p['tersangka_nama'] ?><br>
                                            <b>Jenis</b> : <?php echo $p['sidang_jenis'] ?><br>

                                        </td>
                                        <td><?php echo $p['hakim_nama'] ?></td>
                                        <td><?php echo $p['petugas_nama'] ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($p['sidang_jadwal']))?></td>
                                        <td><?php echo $p['sidang_keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="sidang_preview.php?id=<?php echo $p['sidang_id']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                                <a href="sidang_edit.php?id=<?php echo $p['sidang_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                    <?php 
                                }
                                ?>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>