<?php 

	require "../assets/module/functions.php";
	require "../assets/module/koneksi.php";

	$id= $_GET["id"];
	
	if(hPen($id) > 0){
	echo "
				<script>
					alert('Data Penjualan Berhasil Dihapus');
					document.location.href = 'penjualan.php';
				</script>
			";

	}else {
		echo "
				<script>
					alert('Data Penjualan Gagal Dihapus');
					document.location.href = 'penjualan.php';
				</script>
			";
	}
	
?>