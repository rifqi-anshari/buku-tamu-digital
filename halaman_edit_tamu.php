<?php
include "header.php";
if ($_SESSION['username'] != 'admin') {
    header("location:login.php");
} else {
?>

    <div class="container-fluid" style="margin-top:80px; margin-bottom: 30px;">

        <!-- Button Tambah Data dan Laporan Data -->
        <!-- <div class="row">
        <div class="col">

        </div>
        <div class="col text-right">

        </div>
    </div> -->

        <div class="row">
            <div class="col-md">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <?php
                        if (isset($_GET['id'])) {

                            $id = $_GET['id'];

                            include "koneksi.php";


                            $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE id = '$id'");
                        }
                        ?>

                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Buku Tamu > Edit Data Tamu
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <form action="storeImage.php" method="POST"> -->
                        <form method="post" action="halaman_buku_tamu.php" class="form-horizontal">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="panel panel-default">
                                            <?php while ($data = mysqli_fetch_array($result)) { ?>
                                                <div class="panel-body">
                                                    <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                                    <div class="form-group">
                                                        <label for="nip" class="col-sm-12 control-label"><b>Nama</b></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama..." value="<?= $data['nama'] ?>" required>
                                                            <input type="text" value="<?= $id ?>" class="form-control" name="id" id="id" placeholder="Masukan Nama..." required hidden>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama_pegawai" class="col-sm-12 control-label"><b>Alamat</b></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $data['alamat'] ?>" placeholder="Masukan Alamat..." required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama_pegawai" class="col-sm-12 control-label"><b>Instansi</b></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="instansi" id="instansi" value="<?= $data['instansi'] ?>" placeholder="Masukan Instansi..." required>
                                                        </div>
                                                    </div>
                                                    <!-- </form> -->

                                                    <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                                    <div class="form-group">
                                                        <label for="nip" class="col-sm-12 control-label"><b>Keperluan</b></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="keperluan" id="keperluan" value="<?= $data['keperluan'] ?>" placeholder="Masukan Keperluan..." required>
                                                        </div>
                                                    </div>

                                                    <!-- </form> -->

                                                </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Tanggal</b></label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name="tgl" value="<?= $data['tanggal'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Jam</b></label>
                                            <div class="col-sm-12 mt-1 input">
                                                <!-- <h4 name="jam" class="input" id="timestamp"></h4> -->
                                                <input type="text" class="form-control" name="jam" id="timestamp" value="<?= $data['jam'] ?>">
                                            </div>
                                            <script>
                                                // Function ini dijalankan ketika Halaman ini dibuka pada browser
                                                $(function() {
                                                    setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
                                                });

                                                //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
                                                function timestamp() {
                                                    $.ajax({
                                                        url: 'ajax_timestamp.php',
                                                        success: function(data) {
                                                            $('#timestamp').html(data);
                                                        },
                                                    });
                                                }
                                            </script>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="nama_pegawai" class="col-sm-12 control-label"><b>Foto</b></label>
                                        <div class="col-sm-12 mt-1">
                                            <div id="results"></div>
                                        </div>
                                    </div>


                                    </div>

                                    <div class="col-4">

                                        <div class="row">
                                            <div class="col">
                                                <label for="nama_pegawai" class="col-sm-12 control-label"><b>Kamera</b></label>
                                                <div class="col-sm-9">
                                                    <div id="my_camera"></div>
                                                </div>
                                                <br />
                                                <input hidden name="image" id="image" class="image-tag">
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="button" class="btn btn-sm btn-block btn-success ml-1 mr-1" value="Capture" onClick="take_snapshot()">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Page level plugins -->
                                                <script language="JavaScript">
                                                    Webcam.set({
                                                        width: 170,
                                                        height: 125,
                                                        image_format: 'jpeg',
                                                        jpeg_quality: 100
                                                    });
                                                    Webcam.attach('#my_camera');

                                                    function take_snapshot() {
                                                        Webcam.snap(function(data_uri) {
                                                            $(".image-tag").val(data_uri);
                                                            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                        <!-- </form> -->
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="Edit" class="btn btn-primary" value="Update">
                                <input type="button" onclick="javascript:eraseText();" name="reset" class="btn btn-warning" value="Reset">
                                <a href="halaman_buku_tamu.php" type="button" class="btn btn-secondary">Kembali</a>
                            </div>
                            <script type="text/javascript">
                                function eraseText() {
                                    document.getElementById("nama").value = "";
                                    document.getElementById("alamat").value = "";
                                    document.getElementById("instansi").value = "";
                                    document.getElementById("keperluan").value = "";
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include
        "footer.php";
}
?>