<html>
<head>
	<title>kang prabu gey</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Upload gambar multi</h2>
		<p>saya buat upload gambar multi/lebih dari 1 <br> karena kata kang prabu kalo 1 per 1 lelah dia mah :D </p>
		<h3><a href="hasil.php">Cek hasil</a></h3>
		<?php
		if(isset($_GET['alert'])){
			if($_GET['alert']=="gagal_ukuran"){
				?>
				<div>
					<strong>Warning!</strong> Ukuran File Terlalu Besar
				</div>
				<?php
			}elseif ($_GET['alert']=="gagal_ektensi") {
				?>
				<div>
					<strong>Warning!</strong> Ekstensi Gambar Tidak Diperbolehkan
				</div>
				<?php
			}elseif ($_GET['alert']=="simpan") {
				?>
				<div>
					<strong>Success!</strong> Gambar Berhasil Disimpan
				</div>
				<?php
			}
		}
		?>
		<form action="proses_act.php" method="post" enctype="multipart/form-data">			
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto[]" required="required"  multiple />
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>			
			<input type="submit" name="" value="Upload" class="btn btn-primary">
		</form>
	</div>
</body>
</html>