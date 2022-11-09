<?php
include "header.php";
if ($_SESSION['username'] != 'admin') {
    header("location:login.php");
} else {
?>

    <div class="container-fluid" style="margin-top:80px; margin-bottom: 30px;">

        <!-- Button Tambah Data dan Laporan Data -->
        <!-- <div class="row">
        <div class="col text-right">

        </div>
    </div>
    <hr> -->

        <div class="row">
            <div class="col-md">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="m-0 font-weight-bold text-primary">Data Keperluan Tamu
                                    <?php if (isset($_POST['filter'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $bulan = $_POST['bulan'];
                                        $tahun = $_POST['tahun'];
                                    ?>
                                        <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {  ?>
                                            Tanggal <?= $tanggal ?> Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                        <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                                            Bulan <?= getBulan($bulan) ?> Tahun <?= $tahun ?>
                                        <?php  } else if (!empty($tahun)) { ?>
                                            Tahun <?= $tahun ?>
                                        <?php } ?>
                                    <?php } ?>
                                </h6>
                            </div>
                            <div class="col-3">
                                <?php if (isset($_POST['filter'])) {
                                    $tanggal = $_POST['tanggal'];
                                    $bulan = $_POST['bulan'];
                                    $tahun = $_POST['tahun'];
                                ?>
                                    <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {  ?>
                                        <a href="print_halaman_keperluan.php?tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Keperluan Tamu
                                        </a>
                                    <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                                        <a href="print_halaman_keperluan.php?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Keperluan Tamu
                                        </a>
                                    <?php  } else if (!empty($tahun)) { ?>
                                        <a href="print_halaman_keperluan.php?tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Keperluan Tamu
                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a href="print_halaman_keperluan.php" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                        Laporan Keperluan Tamu
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="halaman_keperluan.php">
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
                                    include 'koneksi.php';
                                    $query = mysqli_query($connect, "SELECT YEAR(tanggal) AS tahun FROM buku_tamu GROUP BY YEAR(tanggal)");

                                    while ($cek = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $cek['tahun'] ?>"><?= $cek['tahun'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" class="btn btn-primary ml-2" name="filter" value="Filter">
                                <a type="button" href="halaman_keperluan.php" class="btn btn-warning ml-2">Reset</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <!-- <th>Alamat</th> -->
                                        <th>Instansi</th>
                                        <th>Keperluan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
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
                                        $result = mysqli_query($connect, "SELECT * FROM buku_tamu ORDER BY id DESC");
                                    }

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <!-- <td><?php echo $data['alamat']; ?></td> -->
                                            <td><?php echo $data['instansi']; ?></td>
                                            <td><?php echo $data['keperluan']; ?></td>
                                            <td><?php echo tgl_indo($data['tanggal']); ?></td>
                                            <td><?php echo $data['jam']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include
        "footer.php";
}
?>