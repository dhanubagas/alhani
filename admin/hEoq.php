<?php 

	require "../assets/module/functions.php";
	require "../assets/module/koneksi.php";

	$grade= $_GET["grade"];

	if(hEoq($grade) > 0){
	echo "
				<script>
					alert('Data Perkiraan Berhasil Dihapus');
					document.location.href = 'eoq.php';
				</script>
			";

	}else {
		echo "
				<script>
					alert('Data Perkiraan Gagal Dihapus');
					document.location.href = 'eoq.php';
				</script>
			";
	}
	
?>