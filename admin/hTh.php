<?php 

	require "../assets/module/functions.php";
	require "../assets/module/koneksi.php";

	$id= $_GET["id"];

	if(hTh($id) > 0){
	echo "
				<script>
					alert('Data Tahun Berhasil Dihapus');
					document.location.href = 'tahun.php';
				</script>
			";

	}else {
		echo "
				<script>
					alert('Data Tahun Gagal Dihapus');
					document.location.href = 'tahun.php';
				</script>
			";
	}
	
?>