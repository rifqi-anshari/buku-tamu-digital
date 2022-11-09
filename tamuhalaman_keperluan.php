<?php include
    "header.php";
?>

<div class="container" style="margin-top:80px; margin-bottom: 30px;">

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
                            <h6 class="m-0 font-weight-bold text-primary">Data Keperluan Tamu</h6>
                        </div>
                        <!-- <div class="col-3">
                            <a href="print.php" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i> Laporan Keperluan Tamu</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $today = date('Y-m-d');
                                $result = mysqli_query($connect, "SELECT * FROM buku_tamu ORDER BY id ASC");

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
    "footer.php"
?>