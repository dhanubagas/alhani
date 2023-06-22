<?php require '../assets/module/koneksi.php' ?>
<?php 

$kd_brg = $_GET['kd_brg'];
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cetak Laporan</title>
</head>
<body>
<h2 style="text-align: center;">Laporan Data Perkiraan Ramalan Hasil Penjualan <?= $kd_brg ?></h2>
<h2 style="text-align: center;">Menggunakan Metode Least Square</h2>
              <h4 class="panel-heading">
                Proses Metode Least Square <?= $kd_brg ?>
              </h4>
                <table style="text-align: center;" width="100%" border="1px">
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
              
<h2></h2>
						<table style="text-align: center;" width="100%" border="1px">
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
$data = query("SELECT * FROM penjualan WHERE kd_brg = '$kd_brg' ORDER BY tahun ASC");
$brg = mysqli_query($conn, "SELECT * FROM penjualan WHERE kd_brg = '$kd_brg'");
$jml_data = mysqli_num_rows($brg);
$pred = (($jml_data - 1) / 2) * -1;
$prediksi = $pred;
foreach ($data as $row) :
$X2 = pow($prediksi, 2);
$XY = $row['penj'] * $prediksi;
$jml_penj[] = $row['penj'];
$jml_pred[] = $prediksi;
$jml_X2[] = $X2;
$jml_XY[] = $XY;
 ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tahun'] ?></td>
                                        <td><?= number_format($row['penj']) ?></td>
                                        <td><?= $prediksi++ ?></td>
                                        <td><?= $X2 ?></td>
                                        <td><?= number_format($XY) ?></td>
                                    </tr>
                            <?php endforeach; ?>
                                    <tr>
                                        <td>JUMLAH</td>
                                        <td><?= $jml_data ?></td>
                                        <td><?= number_format(array_sum($jml_penj)) ?></td>
                                        <td><?= number_format(array_sum($jml_pred)) ?></td>
                                        <td><?= number_format(array_sum($jml_X2)) ?></td>
                                        <td><?= number_format(array_sum($jml_XY)) ?></td>
                                    </tr>
                                </tbody>
                            </table>

<?php 
$A = array_sum($jml_penj) / $jml_data;
$B = array_sum($jml_XY) / array_sum($jml_X2);
$thun = query("SELECT * FROM penjualan WHERE kd_brg = '$kd_brg' ORDER BY tahun DESC LIMIT 1")[0];
$thun_next = $thun['tahun'] + 1;
$X = ($pred * -1) + 1;
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


<script type="text/javascript">
  window.print();
</script>

</body>
</html>