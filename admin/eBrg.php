<?php require 'header.php'; ?>

<?php 

error_reporting(0);

if(isset($_POST["btn_simpan"])){

        if (eBrg($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Barang Berhasil Diedit !');
                    document.location.href = 'barang.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Barang Gagal Diedit !');
                    document.location.href = 'barang.php';
                </script>
            ";
        }
    }

$id = $_GET['id'];
$data = query("SELECT * FROM barang WHERE id = $id")[0];
 ?>

            <div class="page-heading">
                <h3>Data Barang</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="barang.php">Master Data</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data Barang</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Data Barang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Barang</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                	<form action="" method="post">
                                    <div class="form-group">
                                        <label for="basicInput">Kode Barang</label>
                                        <input type="text" class="form-control" id="basicInput" value="<?= $data['kd_brg'] ?>" name="kd_brg" readonly>
                                        <input type="text" class="form-control" id="basicInput" value="<?= $id ?>" name="id" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Nama Barang</label>
                                        <input type="text" value="<?= $data['brg'] ?>" name="brg" class="form-control" id="helpInputTop" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-rounded btn-outline-primary" name="btn_simpan" type="submit" name="btn_simpan">Simpan</button>
                                        <a href="barang.php" class="btn btn-sm btn-rounded btn-outline-danger">Batal</a>
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