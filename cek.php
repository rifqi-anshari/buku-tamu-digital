<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootsrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <!-- DataTables -->
    <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <title>DPUPR</title>

    <style>
        footer {
            position: fixed;
            height: 25px;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>
    <img style='width:100%' src='img/head.jpg'>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">E-BUDGETING </a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="home.php"><i class="icon-home icon-white"></i> Home Page</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> User Guide <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="admin-guide.php"><i class="icon-fire"></i> Administrator</a></li>
                                <li><a href="operator-guide.php"><i class="icon-asterisk"></i> Operator</a></li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['level'] != '') { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th icon-white"></i> Master <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="pegawai.php"><i class="icon-user"></i> Pegawai</a></li>
                                    <li><a href="jenis-belanja.php"><i class="icon-align-justify"></i> Jenis Belanja</a></li>
                                    <li><a href="sub-jenis-belanja.php"><i class="icon-list"></i> Sub Jenis Belanja</a></li>
                                    <li><a href="target-dan-realisasi.php"><i class="icon-globe"></i> Jenis Target dan Realisasi</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-large icon-white"></i> Process <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="data-umum.php"><i class="icon-file"></i> Data Umum</a></li>
                                    <li><a href="anggaran-belanja.php"><i class="icon-shopping-cart"></i> Anggaran Belanja</a></li>
                                    <li><a href="laporan-akhir.php"><i class="icon-book"></i> Laporan Akhir</a></li>
                                </ul>
                            </li>
                            <li><a href="restore.php"><i class="icon-refresh icon-white"></i> Restore</a></li>
                        <?php } ?>
                    </ul>


                    <?php if ($_SESSION['level'] == '') { ?>
                        <form action="" class="navbar-form pull-right" method="post">
                            <div style="display:none"></div>
                            <input class="span2" type="text" name="user" placeholder="Username..." value="">
                            <input class="span2" type="password" name="pass" placeholder="Password...">
                            <button name='login' type="submit" class="btn btn-success"><i class="icon-share icon-black"></i> Log in</button>
                        </form>
                    <?php } elseif ($_SESSION['level'] == 'operator') { ?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> <?php echo "$_SESSION[nama_lengkap] ($_SESSION[level])"; ?></a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="edit-all-operator-<?php echo $_SESSION['id_user']; ?>.php"><i class="i"></i> Setting Account</a></li>
                                <li><a href="logout.php"><i class="i"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php } elseif ($_SESSION['level'] == 'admin') { ?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="#"><i class="icon-user icon-white"></i> <?php echo "$_SESSION[nama_lengkap] ($_SESSION[level])"; ?></a>
                            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="edit-all-operator-<?php echo $_SESSION['id_user']; ?>.php"><i class="i"></i> Setting Account</a></li>
                                <li><a href="all-operator.php"><i class="i"></i> All Operator</a></li>
                                <li><a href="all-admin.php"><i class="i"></i> All Admin</a></li>
                                <li><a href="logout.php"><i class="i"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container">
        <?php include "cek_login.php"; ?>
        <div class="hero-unit">

            <?php
            if ($_GET['page'] == '') {
                include "home.php";
            } elseif ($_GET['page'] == 'admin') {
                include "admin.php";
            } elseif ($_GET['page'] == 'operator') {
                include "operator.php";
            } elseif ($_GET['page'] == 'jenisbelanja') {
                include "jenis_belanja.php";
            } elseif ($_GET['page'] == 'editjenisbelanja') {
                include "edit_jenis_belanja.php";
            } elseif ($_GET['page'] == 'tambahjenisbelanja') {
                include "tambah_jenis_belanja.php";
            } elseif ($_GET['page'] == 'subjenisbelanja') {
                include "sub_jenis_belanja.php";
            } elseif ($_GET['page'] == 'editsubjenisbelanja') {
                include "edit_sub_jenis_belanja.php";
            } elseif ($_GET['page'] == 'tambahsubjenisbelanja') {
                include "tambah_sub_jenis_belanja.php";
            } elseif ($_GET['page'] == 'targetrealisasi') {
                include "target_realisasi.php";
            } elseif ($_GET['page'] == 'dataumum') {
                include "data_umum.php";
            } elseif ($_GET['page'] == 'anggaranbelanja') {
                include "anggaran_belanja.php";
            } elseif ($_GET['page'] == 'anggaranbelanja') {
                include "anggaran_belanja.php";
            } elseif ($_GET['page'] == 'tambahanggaranbelanja') {
                include "tambah_anggaran_belanja.php";
            } elseif ($_GET['page'] == 'editanggaranbelanja') {
                include "edit_anggaran_belanja.php";
            } elseif ($_GET['page'] == 'detailanggaranbelanja') {
                include "detail_anggaran_belanja.php";
            } elseif ($_GET['page'] == 'laporanakhir') {
                include "laporan_akhir.php";
            } elseif ($_GET['page'] == 'settingaccount') {
                include "setting_account.php";
            } elseif ($_GET['page'] == 'tambahdataumum') {
                include "tambah_data_umum.php";
            } elseif ($_GET['page'] == 'editdataumum') {
                include "edit_data_umum.php";
            } elseif ($_GET['page'] == 'detaildataumum') {
                include "detail_data_umum.php";
            } elseif ($_GET['page'] == 'editpage') {
                include "edit_page.php";
            } elseif ($_GET['page'] == 'semuaoperator') {
                include "all_operator.php";
            } elseif ($_GET['page'] == 'editsemuaoperator') {
                include "edit_all_operator.php";
            } elseif ($_GET['page'] == 'detailsemuaoperator') {
                include "detail_all_operator.php";
            } elseif ($_GET['page'] == 'tambahsemuaoperator') {
                include "tambah_all_operator.php";
            } elseif ($_GET['page'] == 'semuaadmin') {
                include "all_admin.php";
            } elseif ($_GET['page'] == 'editsemuaadmin') {
                include "edit_all_admin.php";
            } elseif ($_GET['page'] == 'detailsemuaadmin') {
                include "detail_all_admin.php";
            } elseif ($_GET['page'] == 'tambahsemuaadmin') {
                include "tambah_all_admin.php";
            } elseif ($_GET['page'] == 'pegawai') {
                include "pegawai.php";
            } elseif ($_GET['page'] == 'editpegawai') {
                include "edit_pegawai.php";
            } elseif ($_GET['page'] == 'detailpegawai') {
                include "detail_pegawai.php";
            } elseif ($_GET['page'] == 'tambahpegawai') {
                include "tambah_pegawai.php";
            } elseif ($_GET['page'] == 'restore') {
                include "restore.php";
            }
            ?>

        </div>
    </div> <!-- /container -->
</body>
<footer id='well' class="well">
    <p align='center'>Sistem Informasi Anggaran Keuangan 2015 - Powered by php[mu]
        <br>Develop by : Robby Prihandaya - www.phpmu.com
    </p>
</footer>

</html>