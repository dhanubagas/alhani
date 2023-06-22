<?php require 'header.php'; ?>
            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                                            <?php 
                                            $barang = mysqli_query($conn, "SELECT * FROM barang");
                                            $jml_brg = mysqli_num_rows($barang);
                                             ?>
                                                <h6 class="font-extrabold mb-0"><?= $jml_brg ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldPaper-Download"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Data Penjualan</h6>
                                            <?php 
                                            $penjualan = mysqli_query($conn, "SELECT * FROM penjualan");
                                            $jml_ter = mysqli_num_rows($penjualan);
                                             ?>
                                                <h6 class="font-extrabold mb-0"><?= $jml_ter ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Penjualan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Data Penjualan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                $data = query("SELECT * FROM penjualan");
                                foreach ($data as $row) :
                                $brg = query("SELECT * FROM barang WHERE kd_brg = '$row[kd_brg]'")[0];
                                 ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                        <td><?= $row['kd_brg'] ?></td>
                                        <td><?= $brg['brg'] ?> Unit</td>
                                        <td><?= number_format($row['penj']) ?> Unit</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
<?php require 'footer.php'; ?>