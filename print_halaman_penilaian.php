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
    <script>
        window.print();
    </script>
    <title>Laporan Penilaian Pelayanan</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
            align-content: center;
        }

        #tabel td {
            /* padding-left: 5px; */
            border: 1px solid black;
            align-content: center;
        }
    </style>
    <style type="text/css">
        .pembungkus {
            position: relative;
        }
    </style>
    <style type="text/css">
        /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
        body {
            width: 100%;
            height: 100%;
            margin: 10;
            padding: 10;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";

        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;

        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 10mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 2px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            align-content: center;

        }

        .subpage {
            padding: 10cm;
            border: 5px red solid;
            height: 257mm;
            outline: 1cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 5;
            align-content: center;

        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                width: 100%;
                height: 100%;
                margin: 10;
                padding: 10;
                background-color: #FAFAFA;
                font: 12pt "Tahoma";

            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
                align-content: center;
                /* width: 210mm;
                min-height: 297mm;
                padding: 10mm;
                margin: 10mm auto;
                background: white;
                align-content: center; */

            }

            .progress {
                position: relative;
            }

            .progress:before {
                display: block;
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 0;
                border-bottom: 2rem solid #eeeeee;
            }

            .progress-bar {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 0;
                border-bottom: 2rem solid #337ab7;
            }

            .bg-success {
                border-bottom-color: #67c600;
            }

            .bg-info {
                border-bottom-color: #5bc0de;
            }

            .bg-warning {
                border-bottom-color: #f0a839;
            }

            .bg-danger {
                border-bottom-color: #ee2f31;
            }
        }
    </style>
</head>

<!-- <a type="button" href="halaman_keperluan.php" class="btn btn-primary">Kembali</a> -->

<body class="page" style='font-family:tahoma; font-size:12pt;'>
    <div class="box">
        <table>
            <tr>
                <td width="10%">
                    <img class="img-box" style="width:80px" src="img/logo_kota_banjarbaru.png" alt="">
                </td>
                <td>
                    <div class="">
                        <p align="center" class="mb-1" style="font: 18pt 'Times New Roman';"><b>PEMERINTAH KOTA BANJARBARU</b></p>
                        <p align="center" class="mb-1" style="font: 18pt 'Times New Roman'"><b>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</b></p>
                        <p align="center" class="mb-1" style="font: 12pt 'Arial Narrow'"><b>Alamat Kantor : Jalan Pangeran Antasari No. 6 Telp./Fax.(0511) 4772365/Kode Pos : 70711</b></p>
                        <p align="center" class="mb-1" style="font: 12pt 'Times New Roman'"><b>BANJARBARU</b></p>
                    </div>

                </td>
            </tr>
        </table>
        <hr style="border: 3px solid black" class="mb-1">

        <!-- Add the bg color to the header using any of the bg-* classes -->

        <div class="row" style="font: 12pt 'Times New Roman'">
            <div class="col-md">
                <!-- DataTales Example -->
                <div class="mb-4">
                    <div class="py-3">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="m-0 font-weight-bold text-black">Data Penilaian Pelayanan
                                    <?php if (isset($_GET['tanggal']) && isset($_GET['bulan']) && isset($_GET['tahun'])) { ?>
                                        <?php
                                        $tanggal = $_GET['tanggal'];
                                        $bulan = $_GET['bulan'];
                                        $tahun = $_GET['tahun']; ?>
                                        Tanggal <?= $tanggal ?> Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                    <?php } else if (isset($_GET['bulan']) && isset($_GET['tahun'])) { ?>
                                        <?php $bulan = $_GET['bulan'];
                                        $tahun = $_GET['tahun']; ?>
                                        Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                    <?php } else if (isset($_GET['tahun'])) { ?>
                                        <?php
                                        $tahun = $_GET['tahun']; ?>
                                        Tahun <?= $tahun ?>
                                    <?php } ?>
                                </h6>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Statistik Penilaian Pelayanan</h2>
                            <p>Di bawah ini merupakan data statistik penilaian pelayanan

                                <?php if (isset($_GET['tanggal']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
                                    $tanggal = $_GET['tanggal'];
                                    $bulan = $_GET['bulan'];
                                    $tahun = $_GET['tahun']; ?>

                                    Tanggal <?= $tanggal ?> Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                <?php } else if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                                    $bulan = $_GET['bulan'];
                                    $tahun = $_GET['tahun']; ?>
                                    Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                <?php  } else if (isset($_GET['tahun'])) {
                                    $tahun = $_GET['tahun']; ?>
                                    Tahun <?= $tahun ?>
                                <?php } else { ?>
                                    Keseluruhan
                                <?php } ?>
                                pada Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru:</p>
                            <hr>
                            <h5>Sangat Puas</h5>
                            <?php
                            include 'koneksi.php'; ?>

                            <?php if (isset($_GET['tanggal']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {  ?>
                                <?php
                                $tanggal = $_GET['tanggal'];
                                $bulan = $_GET['bulan'];
                                $tahun = $_GET['tahun'];
                                $TOTAL = mysqli_query($connect, "SELECT COUNT(nilai) AS total FROM penilaian WHERE DAY(tgl) = $tanggal AND MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($total = mysqli_fetch_array($TOTAL)) {
                                    $total1 = $total['total'];
                                }

                                $SP = mysqli_query($connect, "SELECT COUNT(nilai) AS sp FROM penilaian WHERE nilai='SP' AND DAY(tgl) = $tanggal AND  MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($sp = mysqli_fetch_array($SP)) {
                                    $sp1 = $sp['sp'];
                                    $total_sp1 = (intval($sp1) / intval($total1)) * 100;
                                }

                                $PS = mysqli_query($connect, "SELECT COUNT(nilai) AS ps FROM penilaian WHERE nilai='PS' AND DAY(tgl) = $tanggal AND  MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($ps = mysqli_fetch_array($PS)) {
                                    $ps1 = $ps['ps'];
                                    $total_ps1 = (intval($ps1) / intval($total1)) * 100;
                                }

                                $CP = mysqli_query($connect, "SELECT COUNT(nilai) AS cp FROM penilaian WHERE nilai='CP' AND DAY(tgl) = $tanggal AND  MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($cp = mysqli_fetch_array($CP)) {
                                    $cp1 = $cp['cp'];
                                    $total_cp1 = (intval($cp1) / intval($total1)) * 100;
                                }

                                $TP = mysqli_query($connect, "SELECT COUNT(nilai) AS tp FROM penilaian WHERE nilai='TP' AND DAY(tgl) = $tanggal AND  MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($tp = mysqli_fetch_array($TP)) {
                                    $tp1 = $tp['tp'];
                                    $total_tp1 = (intval($tp1) / intval($total1)) * 100;
                                }
                                ?>

                            <?php } else if (isset($_GET['bulan']) && isset($$_GET['tahun'])) {  ?>
                                <?php
                                $bulan = $_GET['bulan'];
                                $tahun = $_GET['tahun'];
                                $TOTAL = mysqli_query($connect, "SELECT COUNT(nilai) AS total FROM penilaian WHERE MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($total = mysqli_fetch_array($TOTAL)) {
                                    $total1 = $total['total'];
                                }

                                $SP = mysqli_query($connect, "SELECT COUNT(nilai) AS sp FROM penilaian WHERE nilai='SP' AND MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($sp = mysqli_fetch_array($SP)) {
                                    $sp1 = $sp['sp'];
                                    $total_sp1 = (intval($sp1) / intval($total1)) * 100;
                                }

                                $PS = mysqli_query($connect, "SELECT COUNT(nilai) AS ps FROM penilaian WHERE nilai='PS' AND MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($ps = mysqli_fetch_array($PS)) {
                                    $ps1 = $ps['ps'];
                                    $total_ps1 = (intval($ps1) / intval($total1)) * 100;
                                }

                                $CP = mysqli_query($connect, "SELECT COUNT(nilai) AS cp FROM penilaian WHERE nilai='CP' AND MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($cp = mysqli_fetch_array($CP)) {
                                    $cp1 = $cp['cp'];
                                    $total_cp1 = (intval($cp1) / intval($total1)) * 100;
                                }

                                $TP = mysqli_query($connect, "SELECT COUNT(nilai) AS tp FROM penilaian WHERE nilai='TP' AND MONTH(tgl) = $bulan AND YEAR(tgl) = $tahun");
                                while ($tp = mysqli_fetch_array($TP)) {
                                    $tp1 = $tp['tp'];
                                    $total_tp1 = (intval($tp1) / intval($total1)) * 100;
                                }
                                ?>

                            <?php } else if (isset($_GET['tahun'])) { ?>
                                <?php
                                $tahun = $_GET['tahun'];
                                $TOTAL = mysqli_query($connect, "SELECT COUNT(nilai) AS total FROM penilaian WHERE YEAR(tgl) = $tahun");
                                while ($total = mysqli_fetch_array($TOTAL)) {
                                    $total1 = $total['total'];
                                }

                                $SP = mysqli_query($connect, "SELECT COUNT(nilai) AS sp FROM penilaian WHERE nilai='SP' AND YEAR(tgl) = $tahun");
                                while ($sp = mysqli_fetch_array($SP)) {
                                    $sp1 = $sp['sp'];
                                    $total_sp1 = (intval($sp1) / intval($total1)) * 100;
                                }

                                $PS = mysqli_query($connect, "SELECT COUNT(nilai) AS ps FROM penilaian WHERE nilai='PS' AND YEAR(tgl) = $tahun");
                                while ($ps = mysqli_fetch_array($PS)) {
                                    $ps1 = $ps['ps'];
                                    $total_ps1 = (intval($ps1) / intval($total1)) * 100;
                                }

                                $CP = mysqli_query($connect, "SELECT COUNT(nilai) AS cp FROM penilaian WHERE nilai='CP' AND YEAR(tgl) = $tahun");
                                while ($cp = mysqli_fetch_array($CP)) {
                                    $cp1 = $cp['cp'];
                                    $total_cp1 = (intval($cp1) / intval($total1)) * 100;
                                }

                                $TP = mysqli_query($connect, "SELECT COUNT(nilai) AS tp FROM penilaian WHERE nilai='TP' AND YEAR(tgl) = $tahun");
                                while ($tp = mysqli_fetch_array($TP)) {
                                    $tp1 = $tp['tp'];
                                    $total_tp1 = (intval($tp1) / intval($total1)) * 100;
                                }
                                ?>
                            <?php } else { ?>
                                <?php
                                $TOTAL = mysqli_query($connect, "SELECT COUNT(nilai) AS total FROM penilaian");
                                while ($total = mysqli_fetch_array($TOTAL)) {
                                    $total1 = $total['total'];
                                }

                                $SP = mysqli_query($connect, "SELECT COUNT(nilai) AS sp FROM penilaian WHERE nilai='SP'");
                                while ($sp = mysqli_fetch_array($SP)) {
                                    $sp1 = $sp['sp'];
                                    $total_sp1 = (intval($sp1) / intval($total1)) * 100;
                                }

                                $PS = mysqli_query($connect, "SELECT COUNT(nilai) AS ps FROM penilaian WHERE nilai='PS'");
                                while ($ps = mysqli_fetch_array($PS)) {
                                    $ps1 = $ps['ps'];
                                    $total_ps1 = (intval($ps1) / intval($total1)) * 100;
                                }

                                $CP = mysqli_query($connect, "SELECT COUNT(nilai) AS cp FROM penilaian WHERE nilai='CP'");
                                while ($cp = mysqli_fetch_array($CP)) {
                                    $cp1 = $cp['cp'];
                                    $total_cp1 = (intval($cp1) / intval($total1)) * 100;
                                }

                                $TP = mysqli_query($connect, "SELECT COUNT(nilai) AS tp FROM penilaian WHERE nilai='TP'");
                                while ($tp = mysqli_fetch_array($TP)) {
                                    $tp1 = $tp['tp'];
                                    $total_tp1 = (intval($tp1) / intval($total1)) * 100;
                                }
                                ?>
                            <?php } ?>


                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:<?= round($total_sp1) ?>%"><?= round($total_sp1) ?>%</div>
                            </div><br>
                            <h5>Puas</h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:<?= round($total_ps1) ?>%; "><?= round($total_ps1) ?>%</div>
                            </div><br>
                            <h5>Cukup Puas</h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:<?= round($total_cp1) ?>%"><?= round($total_cp1) ?>%</div>
                            </div><br>
                            <h5>Tidak Puas</h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:<?= round($total_tp1) ?>%"><?= round($total_tp1) ?>%</div>
                            </div>
                            <hr>
                        </div>
                        <div class="table-responsive col-md-12">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>Sangat Puas</th>
                                        <th>Puas</th>
                                        <th>Cukup Puas</th>
                                        <th>Tidak Puas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php
                                            include 'koneksi.php';
                                            $SP = mysqli_query($connect, "SELECT COUNT(nilai) AS sp FROM penilaian WHERE nilai='SP'");
                                            $PS = mysqli_query($connect, "SELECT COUNT(nilai) AS ps FROM penilaian WHERE nilai='PS'");
                                            $CP = mysqli_query($connect, "SELECT COUNT(nilai) AS cp FROM penilaian WHERE nilai='CP'");
                                            $TP = mysqli_query($connect, "SELECT COUNT(nilai) AS tp FROM penilaian WHERE nilai='TP'");
                                            ?> -->
                                    <tr>
                                        <td>
                                            <!-- <?php while ($sp = mysqli_fetch_array($SP)) {
                                                        echo $sp['sp'];
                                                    } ?> -->
                                            <?= $sp1 ?>
                                        </td>
                                        <td>
                                            <!-- <?php while ($ps = mysqli_fetch_array($PS)) {
                                                        echo $ps['ps'];
                                                    } ?> -->
                                            <?= $ps1 ?>
                                        </td>
                                        <td>
                                            <!-- <?php while ($cp = mysqli_fetch_array($CP)) {
                                                        echo $cp['cp'];
                                                    } ?> -->
                                            <?= $cp1 ?>
                                        </td>
                                        <td>
                                            <!-- <?php while ($tp = mysqli_fetch_array($TP)) {
                                                        echo $tp['tp'];
                                                    } ?> -->
                                            <?= $tp1 ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div style="width:300px;float:right;">
                        <!-- Dikeluarkan Di : Banjarbaru<br>
                        <?php

                        echo " <tr><td>Pada Tanggal	</td><td>: </td></tr>";

                        ?>
                        <?php
                        echo date("d M Y");
                        ?> -->
                        <div style="text-align:center">
                            An. Kepala Dinas,
                            <br />
                            <p>Kasubag Umum dan Kepegawaian<br />
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p><u>ALIP, S.Sos</u><br />
                                Penata Tingkat I<br />
                                NIP. 19670622 199803 1 007</p>
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap4.min.js"></script>


</body>



</html>