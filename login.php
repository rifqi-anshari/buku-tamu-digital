<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootsrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-form.css">

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <title>DPUPR</title>
</head>

<body style="margin-top:30px; margin-bottom:30px;">
    <div id="login">
        <div class="container" style="margin-top:10px; margin-bottom:10px;">
            <div class="row">
                <div class="col-sm text-center">
                    <img src="img/logo_kota_banjarbaru.png" alt="Logo Kota Banjarbaru" style="width: 6%;">
                </div>

            </div>
            <div class="row">
                <div class="col-sm text-center">
                    <h2 class="text-black">Dinas Pekerjaan Umum dan Penataan Ruang</h2>
                    <h2 class="text-black">Kota Banjarbaru</h2>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
                <strong> Login Gagal..!</strong> Username atau Password Salah
                </div>';
                echo '<meta http-equiv="refresh" content="3;url=login.php">';
            } else if ($_GET['pesan'] == "logout") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">  </button>
                <strong> Berhasil Logout..!</strong>
                </div>';
                echo '<meta http-equiv="refresh" content="3;url=login.php">';
            } else if ($_GET['pesan'] == "belum_login") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">  </button>
                <strong> Anda Harus Login..!</strong>
                </div>';
                echo '<meta http-equiv="refresh" content="3;url=login.php">';
            }
        }
        ?>

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="cek_login.php" method="post">

                            <h3 class="text-center">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <div class="row">
                                    <div class="col">
                                        <!-- <input type="submit" name="submit" class="btn btn-dark btn-md" value="Submit"> -->
                                        <button type="submit" name="login" id="login" value="Login" class="btn btn-primary btn-md text-right text-white">Submit</a>
                                    </div>
                                    <div class="col text-right">
                                        <a href="index.php" class="btn btn-dark btn-md text-right" role="button">Halaman Awal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>