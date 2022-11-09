<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";

date_default_timezone_set('Asia/Makassar');

// echo date("Y-m-d H:i:s");
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

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="webcam.min.js"></script>
    <script src="chart.min.js"></script>

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

<body style="background-color: #e9ecef;">


    <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar navbar navbar-light bg-warning">
            <div class="container">
                <a class="navbar-brand" href="#"><b>E-TAMU</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php if ($_SESSION['username'] == 'admin') { ?>
                            <a class="nav-item nav-link" href="index.php"><b>H</b>ome</a>
                            <a class="nav-item nav-link" href="halaman_pegawai_resepsionis.php"><b>P</b>egawai Resepsionis</a>
                            <a class="nav-item nav-link" href="halaman_buku_tamu.php"><b>B</b>uku Tamu</a>
                            <a class="nav-item nav-link" href="halaman_keperluan.php"><b>K</b>eperluan Tamu</a>
                            <a class="nav-item nav-link" href="halaman_statistik_penilaian.php"><b>S</b>tatistik Penilaian Pelayanan</a>
                            <a class="btn" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModal"><b>Logout</b></a>
                        <?php } else { ?>
                            <a class="nav-item nav-link" href="index.php"><b>H</b>ome</a>
                            <!-- <a class="nav-item nav-link" href="tamuhalaman_keperluan.php"><b>K</b>eperluan Tamu</a> -->
                            <a class="nav-item nav-link" href="tamuhalaman_statistik.php"><b>S</b>tatistik Tamu</a>
                            <a class="nav-item nav-link" href="tamuhalaman_penilaian.php"><b>S</b>tatistik Penilaian Pelayanan</a>
                            <a class="nav-item nav-link text-right" href="login.php"><b>Login</b></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>