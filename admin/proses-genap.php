<?php require 'header.php'; ?>

<?php 
error_reporting(0);
$kd_brg = $_GET['kd_brg'];
 ?>
            <div class="page-heading">
                <h3>Data Penjualan</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="least.php">Metode Least Square Genap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Penjualan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Data Penjualan <?= $kd_brg ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                      					<th>Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$no=1;
$data = query("SELECT * FROM penjualan WHERE kd_brg = '$kd_brg' ORDER BY tahun ASC");
foreach ($data as $row) :
 ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                        <td><?= number_format($row['penj']) ?></td>
                                    </tr>
                            <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Proses Perhitungan Metode Least Square
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Penjualan (Y)</th>
                                        <th>Prediksi (X)</th>
                                        <th>X^2</th>
                                        <th>XY</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
$no=1;
$data2 = query("SELECT * FROM penjualan WHERE kd_brg = '$kd_brg' ORDER BY tahun ASC");
$brg = mysqli_query($conn, "SELECT * FROM penjualan WHERE kd_brg = '$kd_brg'");
$jml_data = mysqli_num_rows($brg);
$pred = ($jml_data - 1) * -1;
$prediksi = $pred;

$kosongkan = "TRUNCATE genap";
mysqli_query($conn, $kosongkan);

for ($i= $prediksi; $i <= $jml_data; $i=$i+2)
{
   mysqli_query($conn,"INSERT into genap values('','','','$i')");
}

$id = 1;
foreach ($data2 as $row) :
 ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                        <td><?= number_format($row['penj']) ?></td>
<?php 
$id_plus = $id++;
mysqli_query($conn,"UPDATE genap SET tahun = '$row[tahun]', kd_brg = '$row[kd_brg]' WHERE id = $id_plus");
$x = query("SELECT * FROM genap WHERE tahun = '$row[tahun]' AND kd_brg = '$row[kd_brg]'")[0];
$pred_genap = $x['x'];
$X2 = pow($pred_genap, 2);
$XY = $row['penj'] * $pred_genap;
$jml_penj[] = $row['penj'];
$jml_X2[] = $X2;
$jml_XY[] = $XY;
$jml_x_genap = $x['x'];
 ?>
                                        <td><?= $x['x'] ?></td>
                                        <td><?= $X2 ?></td>
                                        <td><?= number_format($XY) ?></td>
                                    </tr>
<?php endforeach; ?>
                                    <tr>
                                        <td>JUMLAH</td>
                                        <td><?= $jml_data ?></td>
                                        <td><?= number_format(array_sum($jml_penj)) ?></td>
                                        <td><?= number_format(array_sum($jml_x_genap)) ?></td>
                                        <td><?= number_format(array_sum($jml_X2)) ?></td>
                                        <td><?= number_format(array_sum($jml_XY)) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Mencari Nilai A dan B
                        </div>
                        <div class="card-body">
<?php 
$A = array_sum($jml_penj) / $jml_data;
$B = array_sum($jml_XY) / array_sum($jml_X2);
$thun = query("SELECT * FROM penjualan WHERE kd_brg = '$kd_brg' ORDER BY tahun DESC LIMIT 1")[0];
$thun_next = $thun['tahun'] + 1;
$X = ($pred * -1) + 2;
$BX = $B * $X;
$Y = $A + $BX;
 ?>
<pre style="font-family: times-new-roman;">
Proses Mencari Nilai A dan B :

a = <?= number_format(array_sum($jml_penj)) ?> / <?= $jml_data ?>

a = <?= number_format($A) ?>


b = <?= number_format(array_sum($jml_XY)) ?> / <?= number_format(array_sum($jml_X2)) ?>

b = <?= number_format($B) ?>


Maka Persamaan Least Squarenya :

Y' = a + bX
Y' = <?= number_format($A) ?> + <?= number_format($B) ?>X


Maka Ramalan Penjualan Untuk Tahun <?= $thun_next ?> :

Y (<?= $thun_next ?>) = <?= number_format($A) ?> + <?= number_format($B) ?> (<?= $X ?>)
Y (<?= $thun_next ?>) = <?= number_format($A) ?> + <?= number_format($BX) ?>

Y (<?= $thun_next ?>) = <?= number_format($Y) ?>

</pre>
                        </div>
                    </div>
                </section>

            </div>
<?php require 'footer.php'; ?>