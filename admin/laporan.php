<?php require 'header.php'; ?>
            <div class="page-heading">
                <h3>Laporan</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="laporan.php">Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Bahan Baku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Laporan Metode Least Square
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
<?php 
$no=1;
$data = query("SELECT * FROM barang");
foreach ($data as $row) :
$data = mysqli_query($conn, "SELECT * FROM penjualan WHERE kd_brg = '$row[kd_brg]'");
$htg = mysqli_num_rows($data);
 ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kd_brg'] ?></td>
                                        <td><?= $row['brg'] ?></td>
<?php 
if ($htg % 2 == 0) {
?>
                                    <td>
                                        <a target="blank" class="btn btn-sm btn-rounded btn-outline-primary" href="cet-lap-genap.php?kd_brg=<?= $row['kd_brg'] ?>">Cetak</a>
                                    </td>
<?php 
}else{      
 ?>
                                    <td>
                                        <a target="blank" class="btn btn-sm btn-rounded btn-outline-primary" href="cet-lap-ganjil.php?kd_brg=<?= $row['kd_brg'] ?>">Cetak</a>
                                    </td>
<?php } ?>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Laporan Data Penjualan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Laporan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    	<td>1</td>
                                    	<td>Laporan Data Penjualan</td>
                                    	<td><a target="blank" class="btn btn-sm btn-rounded btn-outline-primary" href="cet-lap.php">Cetak</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>
<?php require 'footer.php'; ?>