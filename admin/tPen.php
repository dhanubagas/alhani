<?php require 'header.php'; ?>

<?php 

error_reporting(0);


if(isset($_POST["btn_simpan"])){
        
        if (tPen($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Penjualan Berhasil Ditambahkan !');
                    document.location.href = 'penjualan.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Penjualan Gagal Ditambahkan !');
                    document.location.href = 'penjualan.php';
                </script>
            ";
        }
    }

$jml = query("SELECT * FROM penjualan ORDER BY id DESC LIMIT 1")[0];

if ($jml['id'] < 1) {
    $kode = 1;
}else{
    $kode = $jml['id'] + 1;
}

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
                                    <li class="breadcrumb-item"><a href="penjualan.php">Master Data</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Penjualan</li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Data Penjualan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Data Penjualan</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                	<form action="" method="post">
                                    <div class="form-group">
                                        <label for="basicInput">Tahun</label>
                                        <select name="th" class="form-control">
                                        	<option>-Silahkan Pilih Tahun Penjualan-</option>
                                        <?php 
                                        $th = query("SELECT * FROM tahun");
                                        foreach ($th as $row) :
                                         ?>
                                        	<option value="<?= $row['th'] ?>"><?= $row['th'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Kode Barang</label>
                                        <select name="kd_brg" class="form-control">
                                            <option>-Silahkan Pilih Kode Barang-</option>
                                        <?php 
                                        $brg = query("SELECT * FROM barang");
                                        foreach ($brg as $row) :
                                         ?>
                                            <option value="<?= $row['kd_brg'] ?>"><?= $row['kd_brg'] ?>/<?= $row['brg'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Jumlah Penjualan</label>
                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="penj" class="form-control" id="helpInputTop" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-rounded btn-outline-primary" name="btn_simpan" type="submit" name="btn_simpan">Simpan</button>
                                        <a href="penjualan.php" class="btn btn-sm btn-rounded btn-outline-danger">Batal</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
				<!-- Input Style end -->
            </div>
<?php require 'footer.php'; ?>