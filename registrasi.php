<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Admin | Sistem Informasi Arsip Digital</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/morrisjs/morris.css">
    <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="assets/css/form/all-type-forms.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>SISTEM INFORMASI</h3>
                <h4>ARSIP DIGITAL</h4>

                <br>

                <p>Silahkan Melakukan Pendaftaran Untuk Bisa Masuk.</p>

            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <br>
                        <br>
                        <center>
                            <h4>REGISTRASI ADMIN / PENGURUS</h4>    
                        </center>
                        <br>
                        <br>
                        <form class="user" action="registrasi_control.php" method="POST">
                            
                            <div class="form-group">
                                <label for="idpet">No. ID Petugas</label>
                                <input type="text" name="idpet" class="form-control"
                                    id="idpet" 
                                    placeholder="Masukkan No ID Petugas (Kosongkan jika tidak ada)">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                    id="nama" 
                                    placeholder="Masukkan Nama Anda" required="required">
                            </div>
                            <div class="username">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control"
                                    id="username" 
                                    placeholder="Masukkan username Anda" required="required">
                            </div>
                            <br>
                            <div class="email">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"
                                    id="email" 
                                    placeholder="Masukkan Email Anda" required="required">
                                <small>Pastikan Menggunakan Alamat Email Yang Aktif.</small>
                            </div>
                        
                            <hr>
                            
                            <button name="btn_registrasi" value="simpan" class="btn btn-primary btn-user btn-block">
                                                Registrasi
                            </button>
                        </form>

                        <br>

                    </div>
                </div>

                <a href="index.html">Kembali</a>
            </div>
            <div class="text-center login-footer">
                <p class="text-muted">Copyright © <?php echo date('Y') ?>. All rights reserved. Sistem Informasi Arsip Digital (SIAD)</p>
            </div>
        </div>   
    </div>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery-price-slider.js"></script>
    <script src="assets/js/jquery.meanmenu.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/metisMenu/metisMenu-active.js"></script>
    <script src="assets/js/tab.js"></script>
    <script src="assets/js/icheck/icheck.min.js"></script>
    <script src="assets/js/icheck/icheck-active.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>