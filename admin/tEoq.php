<?php require 'header.php'; ?>

<?php 

error_reporting(0);

if(isset($_POST["btn_simpan"])){

        if (tEoq($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Perkiraan Berhasil Ditambahkan !');
                    document.location.href = 'eoq.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Perkiraan Gagal Ditambahkan !');
                    document.location.href = 'eoq.php';
                </script>
            ";
        }
    }

$grade = $_GET['grade'];

 ?>

            <div class="page-heading">
                <h3>Metode EOQ</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="eoq.php">Metode EOQ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Barang</li>
                                    <li class="breadcrumb-item active" aria-current="page">Input Data Perkiraan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Data Perkiraan</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                	<form action="" method="post">
                                    <div class="form-group">
                                        <label for="basicInput">Grade Bahan Baku</label>
                                        <input type="text" class="form-control" id="basicInput" value="<?= $grade ?>" name="grade" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Perkiraan Kebutuhan</label>
                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="basicInput" name="keb" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Perkiraan Harga Perunit</label>
                                        <input type="text" class="form-control" id="basicInput" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="hrg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Perkiraan Biaya Pemesanan</label>
                                        <input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <=57" id="basicInput" name="bpem" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Perkiraan Biaya Penyimpanan (%)</label>
                                        <input type="text" class="form-control" id="basicInput" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="bpeny" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-rounded btn-outline-primary" name="btn_simpan" type="submit" name="btn_simpan">Simpan</button>
                                        <a href="eoq.php" class="btn btn-sm btn-rounded btn-outline-danger">Batal</a>
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