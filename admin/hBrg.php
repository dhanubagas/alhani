<?php 

	require "../assets/module/functions.php";
	require "../assets/module/koneksi.php";

	$id= $_GET["id"];
	
	if(hBrg($id) > 0){
	echo "
				<script>
					alert('Data Barang Berhasil Dihapus');
					document.location.href = 'barang.php';
				</script>
			";

	}else {
		echo "
				<script>
					alert('Data Barang Gagal Dihapus');
					document.location.href = 'barang.php';
				</script>
			";
	}
	
?>