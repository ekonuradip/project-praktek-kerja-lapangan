<?php include 'header.php'; ?>
<?php include('data_pendaftar_control.php'); ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data akun baru</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data akun baru</span></li>
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
            <h3 class="panel-title">Data Pendaftar Akun Baru</h3>
        </div>
        <div class="panel-body">


            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th class="text-center" width="10%">Nama</th>
                        <th class="text-center" width="10%">No ID Petugas</th>
                        <th class="text-center" width="10%">Username</th>
                        <th class="text-center" width="10%">email</th>
                        <th class="text-center" width="10%">Status</th>
                        <th class="text-center" width="10%">Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $nomor = 1;
                    $saya = $_SESSION['id'];
                    $pendaftar = mysqli_query($koneksi,"SELECT * FROM pendaftar ");
                    
                    
                    
                    while($p = mysqli_fetch_array($pendaftar)){
                        ?>
                        <tr>
                        
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $p['nama'] ?></td>
                            <td><?php echo $p['no_id'] ?></td>
                            <td><?php echo $p['username'] ?></td>
                            <td><?php echo $p['email'] ?></td>
                            <td class="text-center"><span class="badge badge">Pendaftar Baru</span></td>
                            <td class="text-center">
                                <div class="modal fade" id="exampleModal_<?php echo $p['pendaftar_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="data_hapus.php?id=<?php echo $p['pendaftar_id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-group">

                                    <a href="data_pendaftar_info.php?id=<?php echo $p['pendaftar_id']; ?>" class="btn btn-default"><i class="fa fa-info"></i></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?php echo $p['pendaftar_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    

                                </div>
                            </td>                            
                            
                        </tr>
                        <?php
                        if(mysqli_num_rows($pendaftar)==0){
                            echo"<tr><td colspan='5' align='center'><b>Belum terdapat pendaftar baru</b></td></tr>";
                        } 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>