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
    <title>Laporan Resepsionis</title>
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
                <div class="card shadow mb-4 mt-3">
                    <div class="py-3">
                        <div class="">
                            <div class="col-9">
                                <h6 class="m-0 font-weight-bold text-black">Data Tamu
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class=" card-body row">
                        <?php
                        include 'koneksi.php';
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE id = '$id'");
                        }

                        $no = 1;
                        while ($data = mysqli_fetch_array($result)) {
                        ?>

                            <div class="col-4">
                                <div class="text-center">
                                    <img src="upload/<?= $data['capture']; ?>" alt="Foto-Tamu" style="width: 220px;">
                                </div>
                            </div>
                            <div class="col-8 row">
                                <div class="col-3">
                                    <h6>Nama</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= $data['nama']; ?></h6>
                                </div>
                                <div class="col-3">
                                    <h6>Alamat</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= $data['alamat']; ?></h6>
                                </div>
                                <div class="col-3">
                                    <h6>Instansi</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= $data['instansi']; ?></h6>
                                </div>
                                <div class="col-3">
                                    <h6>Keperluan</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= $data['keperluan']; ?></h6>
                                </div>
                                <div class="col-3">
                                    <h6>Tanggal</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= tgl_indo($data['tanggal']); ?></h6>
                                </div>
                                <div class="col-3">
                                    <h6>Jam</h6>
                                </div>
                                <div class="col-1">
                                    <h6>:</h6>
                                </div>
                                <div class="col-8">
                                    <h6><?= $data['jam']; ?></h6>
                                </div>
                                <br>
                            <?php } ?>

                            </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="datatables/jquery.dataTables.min.js"></script>
        <script src="datatables/dataTables.bootstrap4.min.js"></script>


</body>



</html>