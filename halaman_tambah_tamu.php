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
                        if (isset($_POST['Submit'])) {

                            $img = $_POST['image'];
                            $folderPath = "upload/";
                            $image_parts = explode(";base64,", $img);
                            $image_type_aux = explode("image/", $image_parts[0]);
                            $image_type = $image_type_aux[1];
                            $image_base64 = base64_decode($image_parts[1]);
                            $fileName = uniqid() . '.png';
                            $file = $folderPath . $fileName;
                            file_put_contents($file, $image_base64);
                            // print_r($fileName);

                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $instansi = $_POST['instansi'];
                            $keperluan = $_POST['keperluan'];
                            $jam = date('H:i:s');
                            $tgl = date('Y-m-d');

                            // echo "$nama, $alamat, $instansi, $keperluan, $tgl, $jam, $fileName";

                            include "koneksi.php";


                            $result = mysqli_query($connect, "INSERT INTO buku_tamu(nama, alamat, instansi, keperluan, tanggal, jam, capture) VALUES('$nama', '$alamat', '$instansi', '$keperluan', '$tgl', '$jam', '$fileName')");

                            if ($result == TRUE) {
                                //show message when user added
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                <strong> Sukses..!</strong> Data Tamu Berhasil Disimpan.
                                </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tamu.php">';
                            } else {
                                //show message when user added
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                <strong> Gagal..!</strong> Data Tamu Tidak Berhasil Disimpan.
                                </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tammu.php">';
                            }
                        }
                        ?>

                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Buku Tamu > Tambah Data Tamu
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
                                            <div class="panel-body">
                                                <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                                <div class="form-group">
                                                    <label for="nip" class="col-sm-12 control-label"><b>Nama</b></label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama..." required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_pegawai" class="col-sm-12 control-label"><b>Alamat</b></label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat..." required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_pegawai" class="col-sm-12 control-label"><b>Instansi</b></label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan Instansi..." required>
                                                    </div>
                                                </div>
                                                <!-- </form> -->

                                                <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                                <div class="form-group">
                                                    <label for="nip" class="col-sm-12 control-label"><b>Keperluan</b></label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Masukan Keperluan..." required>
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
                                                <input type="text" class="form-control" name="tgl" value="<?php echo tgl_indo(date('Y-m-d')); ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Jam</b></label>
                                            <div class="col-sm-12 mt-1 input">
                                                <h4 id="timestamp"></h4>
                                                <!-- <input type="text" class="form-control" name="jam" id="timestamp" value=""> -->
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
                                <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
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