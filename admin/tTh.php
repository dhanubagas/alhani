<?php require 'header.php'; ?>

<?php 

error_reporting(0);

if(isset($_POST["btn_simpan"])){

        if (tTh($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Tahun Berhasil Ditambahkan !');
                    document.location.href = 'tahun.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Tahun Gagal Ditambahkan !');
                    document.location.href = 'tTh.php';
                </script>
            ";
        }
    }

$jml = query("SELECT * FROM tahun ORDER BY id DESC LIMIT 1")[0];

if ($jml['id'] < 1) {
    $kode = 1;
}else{
    $kode = $jml['id'] + 1;
}

 ?>

            <div class="page-heading">
                <h3>Data Tahun</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="tahun.php">Master Data</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Tahun</li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Data Tahun</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Data Tahun</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                	<form action="" method="post">
                                    <div class="form-group">
                                        <label for="basicInput">Kode Tahun</label>
                                        <input type="text" class="form-control" id="basicInput" value="TH-0<?= $kode ?>" name="kd_th" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Tahun</label>
                                        <input onkeypress="return event.charCode >= 48 && event.charCode <=57" type="text" name="th" class="form-control" id="helpInputTop" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-rounded btn-outline-primary" name="btn_simpan" type="submit" name="btn_simpan">Simpan</button>
                                        <a href="tahun.php" class="btn btn-sm btn-rounded btn-outline-danger">Batal</a>
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