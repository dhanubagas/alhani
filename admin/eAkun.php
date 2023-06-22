<?php require 'header.php'; ?>

<?php 

error_reporting(0);

if(isset($_POST["btn_simpan"])){

        if (eAkun($_POST) > 0 ) {
            echo "
                <script>
                    alert('Akun Berhasil Diedit !');
                    document.location.href = 'eAkun.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Akun Gagal Diedit !');
                    document.location.href = 'eAkun.php';
                </script>
            ";
        }
    }

 ?>

            <div class="page-heading">
                <h3>Data Akun</h3>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="eAkun.php">Setting</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Akun</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Akun</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                	<form action="" method="post">
                                    <div class="form-group">
                                        <label for="basicInput">Username</label>
                                        <input type="text" class="form-control" id="basicInput" value="<?= $user['username'] ?>" name="username" readonly>
                                        <input type="text" class="form-control" id="basicInput" value="<?= $user['id'] ?>" name="id" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Password</label>
                                        <input type="password" name="password" class="form-control" id="helpInputTop" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Nama</label>
                                        <input value="<?= $user['nama'] ?>" type="text" name="nama" class="form-control" id="helpInputTop" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-rounded btn-outline-primary" name="btn_simpan" type="submit" name="btn_simpan">Simpan</button>
                                        <a href="index.php" class="btn btn-sm btn-rounded btn-outline-danger">Batal</a>
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