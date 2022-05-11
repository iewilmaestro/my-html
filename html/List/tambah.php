<?php

require "functions.php";

//cek tombol submit sudah di pencet atau belum
if( isset($_POST["submit"])){
	if(tambah($_POST) > 0 ) {
	   echo "
            <script>
	            alert('Data berhasil di tambahkan');
	            document.location.href = 'tambah.php'
            </script>
	   ";
	} else {
	   echo "
            <script>
	            alert('Data gagal di tambahkan');
	            document.location.href = 'tambah.php'
            </script>
	   ";
	    echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	Halaman Admin</title>
</head>
<body>
	<h1>	Tambah Data</h1>
	<form action="" method="post">	
		<ul>
			<li>
				<label for="Nama Situs">Nama Situs:	</label>
			<input type="text" name="NamaSitus" id="Nama Situs" required>	
			</li>	
			<li>
				<label for="Link Situs">Link Situs:	</label>
			<input type="text" name="LinkSitus" id="Link Situs" required>	
			</li>
			<li>
				<label for="Link Vidio">Link Vidio:	</label>
			<input type="text" name="LinkVidio" id="Link Vidio" required>	
			</li>
			<li>
				<label for="Link Script">Link Script:	</label>
			<input type="text" name="LinkScript" id="Link Script" required>	
			</li>
			<li>
				<label for="Status">Status:	</label>
			<input type="text" name="Status" id="Status" required>	
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>			
		</ul>
	</form>
</body>
</html>
