<div class="row">
    <div class="col">
        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Resepsionis </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th class="text-center">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';
                            if (isset($_GET['search'])) {
                                $keyword = $_GET['search'];
                                $result = mysqli_query($connect, "SELECT * FROM pegawai WHERE nama_pegawai LIKE '%" . $keyword . "%'");
                            } else
                                $result = mysqli_query($connect, "SELECT * FROM pegawai ORDER BY nama_pegawai ASC");

                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++; ?></td>
                                    <td><?php echo $data['nip']; ?></td>
                                    <td><?php echo $data['nama_pegawai']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" name="Pilih" href="pilih_resepsionis.php?id=<?php echo $data['id']; ?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tambah</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>