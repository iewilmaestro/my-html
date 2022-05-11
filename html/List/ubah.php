<?php

require "functions.php";
//ambil data id
$id = $_GET["id"];

$ls = query("SELECT * FROM List WHERE id = $id")[0];

//cek tombol submit sudah di pencet atau belum
if( isset($_POST["submit"])){
	if(ubah($_POST) > 0 ) {
	   echo "
            <script>
	            alert('Data berhasil di ubah');
	            document.location.href = 'admin.php'
            </script>
	   ";
	} else {
	   echo "
            <script>
	            alert('Data gagal di ubah');
	            document.location.href = 'admin.php'
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
	<h1> Ubah Data</h1>
	<form action="" method="post">
	    <input type="hidden" name="id" value="<?= $ls["id"]; ?>">
		<ul>
			<li>
				<label for="Nama Situs">Nama Situs:	</label>
			<input type="text" name="NamaSitus" id="Nama Situs" required value="<?= $ls["NamaSitus"]; ?>">	
			</li>	
			<li>
				<label for="Link Situs">Link Situs:	</label>
			<input type="text" name="LinkSitus" id="Link Situs" required value="<?= $ls["LinkSitus"]; ?>">	
			</li>
			<li>
				<label for="Link Vidio">Link Vidio:	</label>
			<input type="text" name="LinkVidio" id="Link Vidio" required value="<?= $ls["LinkVidio"]; ?>">	
			</li>
			<li>
				<label for="Link Script">Link Script:	</label>
			<input type="text" name="LinkScript" id="Link Script" required value="<?= $ls["LinkScript"]; ?>">	
			</li>
			<li>
				<label for="Status">Status:	</label>
			<input type="text" name="Status" id="Status" required value="<?= $ls["Status"]; ?>">	
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>			
		</ul>
	</form>
</body>
</html>
