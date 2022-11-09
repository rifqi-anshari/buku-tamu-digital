<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";

date_default_timezone_set('Asia/Makassar');

// echo date("Y-m-d H:i:s");
// if ($_SESSION['username'] != 'admin') {
//     header("location:login.php");
// } else {}
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
    <title>Laporan Buku Tamu</title>
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
                font: 14pt "Tahoma";
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
                                <h6 class="m-0 font-weight-bold text-black">Data Tamu
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
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th width="15%">Nama</th>
                                        <th width="15%">Instansi</th>
                                        <th width="20%">Keperluan</th>
                                        <th width="15%">Tanggal</th>
                                        <th width="15%">Jam</th>
                                        <th width="20%">Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    if (isset($_GET['tanggal']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
                                        $tanggal = $_GET['tanggal'];
                                        $bulan = $_GET['bulan'];
                                        $tahun = $_GET['tahun'];
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE DAY(tanggal) = '$tanggal' AND  MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                    } else if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                                        $bulan = $_GET['bulan'];
                                        $tahun = $_GET['tahun'];
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                    } else if (isset($_GET['tahun'])) {
                                        $tahun = $_GET['tahun'];
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                    } else {
                                        $today = date('Y-m-d');
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE tanggal = '$today' ORDER BY id DESC");
                                    }

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['instansi']; ?></td>
                                            <td><?php echo $data['keperluan']; ?></td>
                                            <td><?php echo tgl_indo($data['tanggal']); ?></td>
                                            <td><?php echo $data['jam']; ?></td>
                                            <td><img src="upload/<?php echo $data['capture']; ?>" alt="foto" style="width: 150px;align-content:center;"></td>
                                        </tr>
                                    <?php } ?>
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