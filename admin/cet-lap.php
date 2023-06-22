<?php require '../assets/module/koneksi.php' ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cetak Laporan</title>
</head>
<body>
<h2 style="text-align: center;">Laporan Data Penjualan Barang</h2>
<h2 style="text-align: center;">Pada Toko Bangunan Alhani</h2>
                <table width="100%" border="1px">
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

$penjualan = query("SELECT * FROM penjualan");
$no = 1;
foreach ($penjualan as $row) :
$brg = query("SELECT * FROM barang WHERE kd_brg = '$row[kd_brg]'")[0];
$total[] = $row['penj'];


 ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['tahun'] ?></td>
                      <td><?= $row['kd_brg'] ?></td>
                      <td><?= $brg['brg'] ?></td>
                      <td style="text-align: center;"><?= number_format($row['penj']) ?></td>
                    </tr>
<?php endforeach; ?>
          <tr>
             <td colspan="4" style="text-align: center;">Total Penjualan</td>
             <td style="text-align: center;"><?= number_format(array_sum($total)) ?></td>
          </tr>
                  </tbody>
                </table>

<script type="text/javascript">
  window.print();
</script>

</body>
</html>