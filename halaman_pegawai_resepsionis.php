<?php
include "header.php";
if ($_SESSION['username'] != 'admin') {
    header("location:login.php");
} else {
?>

    <div class="container" style="margin-top:80px; margin-bottom: 30px;">

        <!-- Button Tambah Data dan Laporan Data -->
        <div class="row">
            <!-- <div class="col-3">
            <button data-toggle="modal" data-target="#addPegawaiModal" class="btn btn-sm btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Pegawai</a>
        </div> -->
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-2">
                    <div class="card-header py-3 ">
                        <?php
                        if (isset($_POST['Submit'])) {
                            $nip                = $_POST['nip'];
                            $nama_pegawai        = $_POST['nama_pegawai'];

                            //include data bse connection file
                            include "koneksi.php";

                            //insert user data into table
                            $result = mysqli_query($connect, "INSERT INTO pegawai(nip,nama_pegawai) VALUES('$nip','$nama_pegawai')");

                            if ($result == TRUE) {
                                //show message when user added
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Data Berhasil Tersimpan.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            } else {
                                //show message when user added
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Data Tidak Tersimpan.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            }
                        }
                        ?>

                        <?php
                        if (isset($_POST['Edit'])) {
                            include('koneksi.php');
                            $id = $_POST['id_pegawai'];
                            $nama = $_POST['nama_pegawai'];
                            $nip = $_POST['nip'];
                            //query update
                            $query = "UPDATE pegawai SET nama_pegawai='$nama' , nip='$nip' WHERE id='$id' ";
                            if (mysqli_query($connect, $query)) {
                                //show message when user added
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Data Berhasil Diedit.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            } else {
                                //show message when user added
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Data Tidak Berhasil Diedit.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            }
                        }
                        ?>

                        <?php
                        if (isset($_POST['Hapus'])) {
                            include('koneksi.php');
                            $id = $_POST['id_pegawai'];
                            //query update
                            $query = "DELETE FROM pegawai WHERE id='$id' ";
                            if (mysqli_query($connect, $query)) {
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Data Berhasil Dihapus.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Data Tidak Berhasil Dihapus.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-9">
                                <h6 class="btn m-0 font-weight-bold text-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Data Pegawai Resepsionis </h6>
                            </div>
                            <div class="col-3">
                                <button data-toggle="modal" data-target="#addPegawaiModal" class="btn btn-sm btn-warning pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Pegawai</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body collapse multi-collapse" id="multiCollapseExample1">
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
                                    $result = mysqli_query($connect, "SELECT * FROM pegawai ORDER BY nama_pegawai ASC");

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $data['nip']; ?></td>
                                            <td><?php echo $data['nama_pegawai']; ?></td>
                                            <td class="text-center">
                                                <!-- <a class="btn btn-sm btn-info" href="edit_pegawai.php?id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            <a class="btn btn-sm btn-danger" href="delete_pegawai.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a> -->
                                                <a href="#" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPegawaiModal<?php echo $data['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                                <a class="btn btn-sm btn-danger" type="button" href="#" data-toggle="modal" data-target="#hapusPegawaiModal<?php echo $data['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Pegawai-->
                                        <div class="modal fade" id="editPegawaiModal<?php echo $data['id']; ?>" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPegawaiModalLabel">Edit Data Pegawai</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form role="form" class="form-horizontal" action="" method="post">
                                                        <div class="modal-body">
                                                            <?php
                                                            $id = $data['id'];
                                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'");
                                                            while ($row = mysqli_fetch_array($query_edit)) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id_pegawai" value="<?php echo $row['id']; ?>">
                                                                    <label for="nip" class="col-sm-2 control-label">NIP</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>" placeholder="Masukan NIP..." required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nama_pegawai" class="col-sm-2 control-label">Nama</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control" value="<?php echo $row['nama_pegawai']; ?>" name="nama_pegawai" placeholder="Masukan Nama..." required>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" name="Edit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>

                                                        </div>
                                                    <?php
                                                            }
                                                    ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Hapus Pegawai-->
                                        <div class="modal fade" id="hapusPegawaiModal<?php echo $data['id']; ?>" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPegawaiModalLabel">Hapus Data Pegawai</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form role="form" class="form-horizontal" action="" method="post">
                                                        <div class="modal-body">
                                                            <?php
                                                            $id = $data['id'];
                                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'");
                                                            while ($row = mysqli_fetch_array($query_edit)) {
                                                            ?>
                                                                Yakin hapus data pegawai <b><?= $row['nama_pegawai']; ?></b> ?
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id_pegawai" value="<?php echo $row['id']; ?>">
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

        <hr>

        <div class="row">
            <div class="col-md">
                <!-- DataTales Example -->
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <?php
                        if (isset($_POST['Resepsionis'])) {
                            $id                = $_POST['pegawai'];
                            $tgl               = date('Y-m-d');
                            // $status            = 1;

                            //include data bse connection file
                            include "koneksi.php";

                            //insert user data into table
                            $result = mysqli_query($connect, "INSERT INTO resepsionis(id_pegawai, tgl_jaga, status) VALUES('$id', '$tgl', '$status')");

                            if ($result == TRUE) {
                                //show message when user added
                                echo '<div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Sukses..!</strong> Resepsionis Berhasil Dipilih.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            } else {
                                //show message when user added
                                echo '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            <strong> Gagal..!</strong> Resepsionis Gagal Dipilih.
                            </div>';
                                echo '<meta http-equiv="refresh" content="3;url=halaman_pegawai_resepsionis.php">';
                            }
                            //show message when user added
                            // header("location:halaman_pegawai_resepsionis.php");
                        }
                        ?>

                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Data Resepsionis
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
                                        <a href="print_halaman_resepsionis.php?tanggal=<?= $tanggal ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Resepsionis
                                        </a>
                                    <?php } else if (!empty($bulan) && !empty($tahun)) {  ?>
                                        <a href="print_halaman_resepsionis.php?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Resepsionis
                                        </a>
                                    <?php  } else if (!empty($tahun)) { ?>
                                        <a href="print_halaman_resepsionis.php?tahun=<?= $tahun ?>" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                            Laporan Resepsionis
                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a href="print_halaman_resepsionis.php" class="btn btn-sm btn-danger pull-right ml-2" role="button"><i class="fa fa-download" aria-hidden="true"></i>
                                        Laporan Resepsionis
                                    </a>
                                <?php } ?>
                                <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#modalPilih"><i class="fa fa-list" aria-hidden="true"></i> Pilih Resepsionis Hari Ini</button>
                            </div>
                            <!-- <div class="col-3 text-right">
                        </div> -->
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="halaman_pegawai_resepsionis.php">
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
                                    $query = mysqli_query($connect, "SELECT YEAR(tgl_jaga) AS tahun FROM resepsionis GROUP BY YEAR(tgl_jaga)");

                                    while ($cek = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $cek['tahun'] ?>"><?= $cek['tahun'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="submit" name="filter" class="btn btn-primary ml-2" value="Filter">
                                <a type="button" href="halaman_pegawai_resepsionis.php" class="btn btn-warning ml-2">Reset</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th width="35%">NIP</th>
                                        <th width="35%">Nama</th>
                                        <th>Tanggal Jaga</th>
                                        <!-- <th class="text-center">Tools</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'config/koneksi.php';
                                    if (isset($_POST['filter'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $bulan = $_POST['bulan'];
                                        $tahun = $_POST['tahun'];

                                        if (!empty($tanggal) && !empty($bulan) && !empty($tahun)) {
                                            // perintah tampil data berdasarkan periode bulan
                                            $result = mysqli_query($connect, "SELECT * FROM resepsionis JOIN pegawai ON resepsionis.id_pegawai = pegawai.id WHERE DAY(tgl_jaga) = '$tanggal' AND MONTH(tgl_jaga) = '$bulan' AND YEAR(tgl_jaga) = '$tahun' ORDER BY tgl_jaga ASC");
                                        } else if (!empty($bulan) && !empty($tahun)) {
                                            // perintah tampil data berdasarkan periode bulan
                                            $result = mysqli_query($connect, "SELECT * FROM resepsionis JOIN pegawai ON resepsionis.id_pegawai = pegawai.id WHERE MONTH(tgl_jaga) = '$bulan' AND YEAR(tgl_jaga) = '$tahun' ORDER BY tgl_jaga ASC");
                                        } else if (!empty($tahun)) {
                                            // perintah tampil semua data
                                            $result = mysqli_query($connect, "SELECT * FROM resepsionis JOIN pegawai ON resepsionis.id_pegawai = pegawai.id WHERE YEAR(tgl_jaga) = '$tahun' ORDER BY tgl_jaga ASC");
                                        }
                                    } else {
                                        $today = date('Y-m-d');
                                        $result = mysqli_query($connect, "SELECT * FROM resepsionis JOIN pegawai ON resepsionis.id_pegawai = pegawai.id WHERE tgl_jaga = '$today' ORDER BY id_resepsionis ASC");
                                    }

                                    ?>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $data['nip']; ?></td>
                                            <td><?php echo $data['nama_pegawai']; ?></td>
                                            <td><?php echo tgl_indo($data['tgl_jaga']); ?></td>
                                            <!-- <td class="text-center">
                                            <a href="#" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editPegawaiModal<?php echo $data['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                            <a class="btn btn-sm btn-danger" type="button" href="#" data-toggle="modal" data-target="#hapusPegawaiModal<?php echo $data['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                                        </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addPegawaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPegawaiModalLabel">Tambah Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nip" class="col-sm-2 control-label">NIP</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nip" placeholder="Masukan NIP..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukan Nama..." required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Modal/Pop UP Pilih Pegawai -->
        <div class="modal fade" id="modalPilih">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pilih Resepsionis Hari Ini</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form method="post" action="halaman_pegawai_resepsionis.php" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nip" class="col-sm-2 control-label"></label>
                                <div class="col-sm-12">

                                    <!-- <input type="text" class="form-control" name="nip" placeholder="Masukan NIP..." required> -->
                                    <select name="pegawai" class="form-control" id="pegawai" required="required">
                                        <option value="" hidden>Pilih Pegawai</option>
                                        <?php
                                        include 'koneksi.php';
                                        $result = mysqli_query($connect, "SELECT * FROM pegawai ORDER BY nama_pegawai ASC");

                                        $no = 1;
                                        while ($data = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?= $data['id'] ?>"><?= $data['nip'] ?> - <?= $data['nama_pegawai'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" name="Resepsionis" class="btn btn-primary" value="Pilih">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


<?php include
        "footer.php";
}
?>