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
                <div class="card shadow mb-1">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-3">
                                <div class="card bg-primary text-white">
                                    <?php
                                    include 'koneksi.php';
                                    $today = date('Y-m-d');
                                    $result = mysqli_query($connect, "SELECT COUNT(id) as sum_tamu FROM buku_tamu");

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="card-body">
                                            <i class="fa fa-user" arie-hidden="true"></i> Total Tamu <b><?= $data['sum_tamu'] ?></b><br>
                                            <a class="text-white" href="halaman_tamu_total.php"><u>Lihat Selengkapnya</u></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-success text-white">
                                    <?php
                                    include 'koneksi.php';
                                    $today = date('Y-m-d');
                                    $result = mysqli_query($connect, "SELECT COUNT(id) as sum_tamu FROM buku_tamu WHERE tanggal = '$today'");

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="card-body">
                                            <i class="fa fa-user" arie-hidden="true"></i> Tamu Hari Ini <b><?= $data['sum_tamu'] ?></b><br><br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

                        <?php
                        if (isset($_POST['Edit'])) {
                            // $img = $_POST['image'];
                            // $folderPath = "upload/";
                            // $image_parts = explode(";base64,", $img);
                            // $image_type_aux = explode("image/", $image_parts[0]);
                            // $image_type = $image_type_aux[1];
                            // $image_base64 = base64_decode($image_parts[1]);
                            // $fileName = uniqid() . '.png';
                            // $file = $folderPath . $fileName;
                            // file_put_contents($file, $image_base64);
                            // print_r($fileName);

                            $id = $_POST['id'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $instansi = $_POST['instansi'];
                            $keperluan = $_POST['keperluan'];
                            $jam = $_POST['jam'];
                            $tgl = $_POST['tgl'];

                            include "koneksi.php";

                            $query = "UPDATE buku_tamu SET nama='$nama' , alamat='$alamat', instansi='$instansi', keperluan='$keperluan', tanggal='$tgl', jam='$jam' WHERE id='$id' ";

                            if (mysqli_query($connect, $query)) {
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Data Tamu Berhasil Diupdate.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tamu.php">';
                            } else {

                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Data Tamu Tidak Berhasil Diupdate.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tamu.php">';
                            }
                        }
                        ?>
                        <?php
                        if (isset($_POST['Hapus'])) {
                            include('koneksi.php');
                            $id = $_POST['id'];
                            //query update
                            $query = "DELETE FROM buku_tamu WHERE id='$id' ";
                            if (mysqli_query($connect, $query)) {
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Data Berhasil Dihapus.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tamu.php">';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Data Tidak Berhasil Dihapus.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_buku_tamu.php">';
                            }
                        }
                        ?>
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Data Tamu
                                    <?php if (isset($_POST['filter'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $bulan = $_POST['bulan'];
                                        $tahun = $_POST['tahun'];
                                    ?>
                                        <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) { ?>
                                            Tanggal <?= $tanggal ?> Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                        <?php  } else if (!empty($bulan) && !empty($tahun)) {  ?>
                                            Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                        <?php  } else if (!empty($tahun)) { ?>
                                            Tahun <?= $tahun ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        Hari Ini
                                    <?php } ?>
                                </h6>
                            </div>
                            <div class="col-6">

                                <?php if (isset($_POST['filter'])) {
                                    $tanggal = $_POST['tanggal'];
                                    $bulan = $_POST['bulan'];
                                    $tahun = $_POST['tahun'];
                                ?>
                                    <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {  ?>
                                        <a href="print_buku_tamu.php?tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Buku Tamu
                                        </a>
                                    <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                                        <a href="print_buku_tamu.php?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Buku Tamu
                                        </a>
                                    <?php } else if (!empty($tahun)) { ?>
                                        <a href="print_buku_tamu.php?tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Buku Tamu
                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a href="print_buku_tamu.php" class="btn btn-sm btn-danger pull-right  ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i> Laporan Buku Tamu</a>
                                <?php } ?>
                                <button data-toggle="modal" data-target="#addTamuModal" class="btn btn-sm btn-warning pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Tamu</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="halaman_buku_tamu.php">
                            <div class="input-group col-md-7 pull-right mb-3 row">
                                <select name="tanggal" id="tanggal" class="form-control" placeholder="tanggal">
                                    <option value="" hidden>Pilih Tanggal</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                </select>
                                <select name="bulan" id="bulan" class="form-control" placeholder="bulan">
                                    <option value="" hidden>Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <select name="tahun" id="tahun" class="form-control" placeholder="tahun">
                                    <option value="" hidden>Pilih Tahun</option>
                                    <?php
                                    include 'config/koneksi.php';
                                    $query = mysqli_query($connect, "SELECT YEAR(tanggal) AS tahun FROM buku_tamu GROUP BY YEAR(tanggal)");

                                    while ($cek = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $cek['tahun'] ?>"><?= $cek['tahun'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" class="btn btn-primary ml-2" name="filter" value="Filter">
                                <a type="button" href="halaman_buku_tamu.php" class="btn btn-warning ml-2">Reset</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%" class="text-center">No</th>
                                        <th width="15%">Nama</th>
                                        <th width="15%">Alamat</th>
                                        <th width="10%">Instansi</th>
                                        <th width="10%">Keperluan</th>
                                        <th width="10%">Tanggal</th>
                                        <th width="5%">Jam</th>
                                        <th width="10%">Capture</th>
                                        <th class="text-center" width="8%">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    if (isset($_POST['filter'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $bulan = $_POST['bulan'];
                                        $tahun = $_POST['tahun'];
                                        if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {
                                            // perintah tampil data berdasarkan periode bulan
                                            $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE DAY(tanggal) = '$tanggal' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                        } else if (!empty($bulan) && !empty($tahun)) {
                                            // perintah tampil data berdasarkan periode bulan
                                            $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                        } else if (!empty($tahun)) {
                                            // perintah tampil semua data
                                            $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE YEAR(tanggal) = '$tahun' ORDER BY tanggal ASC");
                                        }
                                    } else {
                                        $today = date('Y-m-d');
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu WHERE tanggal = '$today' ORDER BY tanggal DESC");
                                    }

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['instansi']; ?></td>
                                            <td><?php echo $data['keperluan']; ?></td>
                                            <td><?php echo tgl_indo($data['tanggal']); ?></td>
                                            <td><?php echo $data['jam']; ?></td>
                                            <td><img src="upload/<?php echo $data['capture']; ?>" alt="foto" style="width: 100px;"></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary text-white btn-block" data-toggle="modal" data-target="#detailTamuModal<?php echo $data['id']; ?>"><i class="fa fa-info" aria-hidden="true"></i> Detail </a>
                                                <a class="btn btn-sm btn-info text-white btn-block" data-toggle="modal" data-target="#editTamuModal<?php echo $data['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                <a class="btn btn-sm btn-danger text-white btn-block" data-toggle="modal" data-target="#hapusTamuModal<?php echo $data['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                                                <a href="print_tamu.php?id=<?= $data['id'] ?>" type="button" class="btn btn-sm btn-info text-white btn-block"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                                            </td>
                                        </tr>
                                        <!-- Modal Detail Tamu-->
                                        <div class="modal fade" id="detailTamuModal<?php echo $data['id']; ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailTamuModalLabel">Detail Data Tamu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- <form role="form" class="form-horizontal" action="" method="post"> -->
                                                    <div class="modal-body">
                                                        <?php
                                                        $id = $data['id'];
                                                        $query_edit = mysqli_query($koneksi, "SELECT * FROM buku_tamu WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                        ?>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="text-center">
                                                                        <img src="upload/<?= $data['capture']; ?>" alt="Foto-Tamu" style="width: 240px;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-7 row">
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
                                                                </div>
                                                            </div><br>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <!-- <button type="submit" name="Edit" class="btn btn-primary">Update</button> -->
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>

                                                    </div>
                                                <?php
                                                        }
                                                ?>
                                                <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit Tamu-->
                                        <div class="modal fade" id="editTamuModal<?php echo $data['id']; ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPegawaiModalLabel">Edit Data Tamu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="" class="form-horizontal">
                                                        <?php
                                                        $id = $data['id'];
                                                        $query_edit = mysqli_query($koneksi, "SELECT * FROM buku_tamu WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                        ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label for="nip" class="col-sm-12 control-label"><b>Nama</b></label>
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" value="<?= $row['nama'] ?>" class="form-control" name="nama" id="nama" placeholder="Masukan Nama..." required>
                                                                                        <input type="text" value="<?= $id ?>" class="form-control" name="id" id="id" placeholder="Masukan Nama..." required hidden>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="nama_pegawai" class="col-sm-12 control-label"><b>Alamat</b></label>
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat..." value="<?= $row['alamat'] ?>" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="nama_pegawai" class="col-sm-12 control-label"><b>Instansi</b></label>
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan Instansi..." value="<?= $row['instansi'] ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nip" class="col-sm-12 control-label"><b>Keperluan</b></label>
                                                                                    <div class="col-sm-12">
                                                                                        <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Masukan Keperluan..." value="<?= $row['keperluan'] ?>" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Tanggal</b></label>
                                                                            <div class="col-sm-12">
                                                                                <input type="text" class="form-control" name="tgl" value="<?= $row['tanggal'] ?>"readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Jam</b></label>
                                                                            <div class="col-sm-12">
                                                                                <input type="text" class="form-control" name="jam" value="<?= $row['jam'] ?>"readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nama_pegawai" class="col-sm-12 control-label"><b>Foto</b></label>
                                                                            <div class="col-sm-12">
                                                                                <img src="upload/<?= $data['capture']; ?>" alt="Foto-Tamu" style="width: 180px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" name="Edit" class="btn btn-primary" value="Update">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                            </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Modal Hapus Pegawai-->
                                        <div class="modal fade" id="hapusTamuModal<?php echo $data['id']; ?>" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPegawaiModalLabel">Hapus Data Tamu</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form role="form" class="form-horizontal" action="" method="post">
                                                        <div class="modal-body">
                                                            <?php
                                                            $id = $data['id'];
                                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM buku_tamu WHERE id='$id'");
                                                            while ($row = mysqli_fetch_array($query_edit)) {
                                                            ?>
                                                                Yakin hapus data tamu <b><?= $row['nama']; ?></b> ?
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="Hapus" class="btn btn-danger">Hapus</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                    <?php
                                                            }
                                                    ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addTamuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPegawaiModalLabel">Tambah Data Tamu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <form action="storeImage.php" method="POST"> -->
                    <form method="post" action="" class="form-horizontal">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                            <div class="form-group">
                                                <label for="nip" class="col-sm-2 control-label"><b>Nama</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama..." required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_pegawai" class="col-sm-2 control-label"><b>Alamat</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat..." required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_pegawai" class="col-sm-2 control-label"><b>Instansi</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan Instansi..." required>
                                                </div>
                                            </div>
                                            <!-- </form> -->

                                            <!-- <form method="post" action="tambah_tamu.php" class="form-horizontal"> -->
                                            <div class="form-group">
                                                <label for="nip" class="col-sm-2 control-label"><b>Keperluan</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Masukan Keperluan..." required>
                                                </div>
                                            </div>


                                            <!-- </form> -->

                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nama_pegawai" class="col-sm-2 control-label"><b>Tanggal</b></label>
                                        <div class="col-sm-10">
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
                                        <label for="nama_pegawai" class="col-sm-2 control-label"><b>Foto</b></label>
                                        <div class="col-sm-10">
                                            <div id="results"></div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-4">

                                    <div class="row">
                                        <div class="col">
                                            <label for="nama_pegawai" class="col-sm-2 control-label"><b>Kamera</b></label>
                                            <div class="col-sm-9">
                                                <div id="my_camera"></div>
                                            </div>
                                            <br />
                                            <input hidden name="image" id="image" class="image-tag">
                                            <div class="text-center">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="button" class="btn btn-sm btn-block btn-success ml-1 mr-1" value="Capture" onClick="take_snapshot()">
                                                        <!-- <button class="btn btn-sm btn-info" aria-hidden="true">Save</button> -->
                                                        <!-- <input type=button value="Reset" onClick="Webcam.reset()"> -->
                                                        <!-- <a class="btn btn-sm btn-info text-white"><i class="fa fa-repeat"></i></a> -->
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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

        <!-- Modal/Pop Up Detail Tamu-->
        <div class="modal fade" id="modalDetail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Tamu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php include "detail_tamu.php" ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



    </div>





<?php include
        "footer.php";
}
?>