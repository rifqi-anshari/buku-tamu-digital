<?php
include "header.php";
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
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-4">
                                <h6 class="m-0 font-weight-bold text-primary">Statistik Tamu Pada Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru

                                </h6>
                            </div>
                            <div class="col-8">
                                <form method="post" action="tamuhalaman_statistik.php">
                                    <div class="input-group col-4 pull-right row">
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
                                        <a type="button" href="tamuhalaman_statistik.php" class="btn btn-warning ml-2">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        include 'koneksi.php';
                        $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        if (isset($_POST['filter'])) {
                            $tahun = $_POST['tahun'];
                            if (!empty($tahun)) {
                                for ($bulan = 1; $bulan < 13; $bulan++) {
                                    $query = mysqli_query($connect, "SELECT COUNT(nama) as jumlah_tamu from buku_tamu where MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'");
                                    $row = $query->fetch_array();
                                    $jumlah_tamu[] = $row['jumlah_tamu'];
                                }
                            } ?>
                        <?php } else {
                            $tahun = date('Y');
                            for ($bulan = 1; $bulan < 13; $bulan++) {
                                $query = mysqli_query($connect, "SELECT COUNT(nama) as jumlah_tamu from buku_tamu where MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'");
                                $row = $query->fetch_array();
                                $jumlah_tamu[] = $row['jumlah_tamu'];
                            }
                        } ?>

                        <div class="row">
                            <div class="col-12 pull-left" style="width: 800px;height: 630px">
                                <canvas id="myChart"></canvas>
                            </div>
                            <!-- <div class="col-5">

                                <div class="card bg-primary col-md-12 text-white mt-2 pull-right">
                                    <?php
                                    include 'koneksi.php';
                                    if (isset($_POST['filter'])) {
                                        $tahun = $_POST['tahun'];
                                        if (!empty($tahun)) {
                                            $query = mysqli_query($connect, "SELECT COUNT(nama) as jumlah_tamu from buku_tamu where YEAR(tanggal)='$tahun'");
                                        } ?>
                                    <?php } else {
                                        $tahun = date('Y');

                                        $query = mysqli_query($connect, "SELECT COUNT(nama) as jumlah_tamu from buku_tamu where YEAR(tanggal)='$tahun'");
                                    } ?>
                                    <?php

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="card-body">
                                            <i class="fa fa-user" arie-hidden="true"></i> Total Tamu <b><?= $data['jumlah_tamu'] ?></b><br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div> -->
                        </div>
                        <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: <?php echo json_encode($label); ?>,
                                    datasets: [{
                                        label: 'Jumlah Tamu Tahun ' + <?= $tahun ?>,
                                        backgroundColor: "rgba(247, 202, 24, 1)",
                                        data: <?php echo json_encode($jumlah_tamu); ?>,
                                        borderWidth: 1,
                                        barPercentage: 2,
                                        barThickness: 10,
                                        maxBarThickness: 15,
                                        minBarLength: 1,
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include
        "footer.php";
?>