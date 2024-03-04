<?php
include "koneksi.php";
$limit = 1024 * 1024;
$ekstensi =  array('png','jpg','jpeg','gif');
$jumlahFile = count($_FILES['foto']['name']);
if(!file_exists("img")){
    mkdir("img");
}

for($x=0; $x<$jumlahFile; $x++){
	$namafile = $_FILES['foto']['name'][$x];
	$nama = explode(".",$namafile)[0];
	$tmp = $_FILES['foto']['tmp_name'][$x];
	$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
	$ukuran = $_FILES['foto']['size'][$x];
	if($ukuran > $limit){
		header("location:index.php?alert=gagal_ukuran");		
	}else{
		if(!in_array($tipe_file, $ekstensi)){
			header("location:index.php?alert=gagal_ektensi");			
		}else{
			move_uploaded_file($tmp, 'img/'.$namafile);
			mysqli_query($koneksi,"INSERT INTO gambar VALUES(NULL, '$namafile', '$nama')");
			header("location:index.php?alert=simpan");
		}
	}
}