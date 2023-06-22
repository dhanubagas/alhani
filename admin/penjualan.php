<?php require 'header.php'; ?>
            <div class="page-heading">
                <h3>Data Penjualan</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="penjualan.php">Master Data</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Penjualan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Data Penjualan <a href="tPen.php"><span class="badge bg-success">Tambah</span></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Kode Barang</th>
                                        <th>Penjualan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php 
                                $no=1;
                                $data = query("SELECT * FROM penjualan");
                                foreach ($data as $row) :
                                 ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                        <td><?= $row['kd_brg'] ?></td>
                                        <td><?= number_format($row['penj']) ?></td>
                                        <td>
                                            <a href="ePen.php?id=<?= $row['id'] ?>"><span class="badge bg-primary">Edit</span></a>
                                            <a href="hPen.php?id=<?= $row['id'] ?>"><span class="badge bg-danger">Hapus</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
<?php require 'footer.php'; ?>