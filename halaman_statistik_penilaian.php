<?php
include "header.php";
if ($_SESSION['username'] != 'admin') {
    header("location:login.php");
} else {
?>

    <div class="container" style="margin-top:80px; margin-bottom: 30px;">

        <div class="row">
            <div class="col">
                <a target="_blank" class="btn btn-sm btn-success" href="halaman_penilaian.php">Halaman Penilaian</a>
            </div>
            <div class="col text-right">
                <?php if (isset($_POST['filter'])) {
                    $tanggal = $_POST['tanggal'];
                    $bulan = $_POST['bulan'];
                    $tahun = $_POST['tahun'];
                ?>
                    <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {  ?>
                        <a href="print_halaman_penilaian.php?tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Laporan Penilaian Tamu</a>
                    <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                        <a href="print_halaman_penilaian.php?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Laporan Penilaian Tamu</a>
                    <?php  } else if (!empty($tahun)) { ?>
                        <a href="print_halaman_penilaian.php?tahun=<?= $tahun ?>" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Laporan Penilaian Tamu</a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="print_halaman_penilaian.php" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Laporan Penilaian Tamu</a>
                <?php } ?>
            </div>
        </div>
        <hr>

        <div class="row">


            <div class="col-md-5">
                <h2>Statistik Penilaian Pelayanan</h2>
                <p>Di bawah ini merupakan data statistik penilaian pelayanan
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
                    <?php } else { ?>
                        Keseluruhan
                    <?php } ?>
                    pada Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru:</p>
                <hr>

                <?php
                include 'koneksi.php';
                ?>

                <?php if (isset($_POST['filter'])) {
                    $tanggal = $_POST['tanggal'];
                    $bulan = $_POST['bulan'];
                    $tahun = $_POST['tahun'];
                ?>
                    <?php if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {  ?>
                        <?php
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

                    <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                        <?php
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

                    <?php } else if (!empty($tahun)) { ?>
                        <?php
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
                    <?php } ?>
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

                <h5>Sangat Puas</h5>
                <div class="progress">

                    <div class="progress-bar bg-warning" style="width:<?= round($total_sp1) ?>%"><?= round($total_sp1) ?>%</div>

                </div><br>
                <h5>Puas</h5>
                <div class="progress">

                    <div class="progress-bar bg-warning" style="width:<?= round($total_ps1) ?>%"><?= round($total_ps1) ?>%</div>

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

            <div class="col-md-7">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penilaian Pelayanan
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
                    <div class="card-body">
                        <form method="post" action="halaman_statistik_penilaian.php">
                            <div class="input-group col-md-12 pull-right mb-3 row">
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
                                    $query = mysqli_query($connect, "SELECT YEAR(tgl) AS tahun FROM penilaian GROUP BY YEAR(tgl)");

                                    while ($cek = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $cek['tahun'] ?>"><?= $cek['tahun'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" class="btn btn-primary ml-2" name="filter" value="Filter">
                                <a type="button" href="halaman_statistik_penilaian.php" class="btn btn-warning ml-2">Reset</a>
                            </div>
                        </form>
                        <div class="table-responsive">
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
                </div>
            </div>
        </div>


    </div>


<?php include
        "footer.php";
}
?>