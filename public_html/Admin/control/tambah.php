<?php
session_start();
include("../../asset/php/functions.php");

//cek tombol submit sudah di pencet atau belum
if( isset($_POST["submit"])){
	if(tambah($_POST) > 0 ) {
	   echo "
            <script>
	            alert('Data berhasil di tambahkan');
	            document.location.href = 'index.php'
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
if(!$_SESSION["username"]){
header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>iewil | Add List</title>
	<link rel="stylesheet" href="../../asset/css/style.css">
</head>
<body>
    <?=hd();?>
    <div class="content">
	<h1>Tambah Data</h1>
    	<div class="form">
        	<form action="" method="post">	
        		<ul>
        		    <input type="hidden" id="Author" name="Author" value="<?=$_SESSION["username"];?>">
        			<li>
        				<label for="Nama Situs">Title:	</label>
        			<input type="text" name="Title" id="Title" placeholder="Nama/Judul situs" required>	
        			</li>	
        			<li>
        				<label for="Register">Link Site:	</label>
        			<input type="text" name="Register" id="Register" placeholder="link referal" required>	
        			</li>
        			<li>
        				<label for="Tutorial">Link Vidio:	</label>
        			<input type="text" name="Tutorial" id="Tutorial" placeholder="kosongkan jika tidak ada">	
        			</li>
        			<li>
        				<label for="Server1">Server 1:	</label>
        			<input type="text" name="Server1" id="Server1" placeholder="link script" required>	
        			</li>
        			<li>
        				<label for="Server2">Server 2:	</label>
        			<input type="text" name="Server2" id="Server2" placeholder="kosongkan jika tidak ada">	
        			</li>
        			<input type="hidden" id="LastUpdate" name="LastUpdate" value="<?=waktu();?>">
        			<li>
        				<label for="Status">Status:	</label>
        			<input type="text" name="Status" id="Status" placeholder="Online/Offline" required>	
        			</li>
        			<li>
        				<button type="submit" name="submit" class="tombol">Add</button>
        			</li>
        		</ul>
        	</form>
    	</div>
	</div>
    <?=ft();?>
</body>
</html>