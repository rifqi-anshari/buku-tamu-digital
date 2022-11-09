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

</head>

<body class="bg-warning">

    <div class="row" style="margin-top:80px; margin-bottom: 30px;">
        <div class="col text-center">
            <h1>Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru</h1>
        </div>
    </div><br>

    <!-- Button Tambah Data dan Laporan Data -->
    <?php
    if (isset($_GET['nilai']) && !empty($_GET['nilai'])) {

        $nilai = $_GET['nilai'];
        $tgl = date('Y-m-d');
        // sql untuk menambahkan vote kedatabase
        // $sql = "INSERT INTO penilaian (nilai, tgl) VALUES ('$nilai', '$tgl') ";


        //include data bse connection file
        include "koneksi.php";

        //insert user data into table
        $result = mysqli_query($connect, "INSERT INTO penilaian (nilai, tgl) VALUES ('$nilai', '$tgl') ");

        if ($result == TRUE) {
            //show message when user added
            echo '<div class="alert alert-success alert-dismissible align-center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <h3><strong> Terima Kasih..!</strong> Penilaian Berhasil Tersimpan.</h3>
                            </div>';
            echo '<meta http-equiv="refresh" content="3;url=halaman_penilaian.php">';
        } else {
            //show message when user added
            echo '<div class="alert alert-danger alert-dismissible align-center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <h3><strong> Maaf..!</strong> Penilaian Gagal Tersimpan.</h3>
                            </div>';
            echo '<meta http-equiv="refresh" content="3;url=halaman_penilaian.php">';
        }
    }
    ?>
    <br><br>
    <div class="row">
        <div class="col text-center">
            <h2>Apakah Anda puas dengan pelayanan Kantor kami ?</h2>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <div>
                <a href="halaman_penilaian.php?nilai=SP" type="button" class="btn btn-sm btn-warning"><img src="img/icon/sangat_puas.png" alt="Sangat Puas"><br>
                    <h4>Sangat Puas</h4>
                </a>
                <a href="halaman_penilaian.php?nilai=PS" type="button" class="btn btn-sm btn-warning"><img src="img/icon/puas.png" alt="Puas"><br>
                    <h4>Puas</h4>
                </a>
                <a href="halaman_penilaian.php?nilai=CP" type="button" class="btn btn-sm btn-warning"><img src="img/icon/cukup_puas.png" alt="Cukup Puas"><br>
                    <h4>Cukup Puas</h4>
                </a>
                <a href="halaman_penilaian.php?nilai=TP" type="button" class="btn btn-sm btn-warning"><img src="img/icon/tidak_puas.png" alt="Tidak Puas"><br>
                    <h4>Tidak Puas</h4>
                </a>
            </div>
        </div>
    </div>

</body>

</html>