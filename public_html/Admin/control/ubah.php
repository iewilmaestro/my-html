<?php
session_start();
include("../../asset/php/functions.php");

//ambil data id
$id = $_GET["id"];

$ls = query("SELECT * FROM List WHERE id = $id")[0];

//cek tombol submit sudah di pencet atau belum
if( isset($_POST["submit"])){
	if(ubah($_POST) > 0 ) {
	   echo "
            <script>
	            alert('Data berhasil di ubah');
	            document.location.href = 'index.php'
            </script>
	   ";
	} else {
	   echo "
            <script>
	            alert('Data gagal di ubah');
	            document.location.href = 'index.php'
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
	<title>iewil | Edit</title>
	<link rel="stylesheet" href="../../asset/css/style.css">
</head>
<body>
    <?=hd();?>
    <div class="content">
        <h1> Ubah Data</h1>
        <div class="form">
        	<form action="" method="post">
        		<input type="hidden" id="Author" name="Author" value="<?=$ls['Author'];?>">
        	    <input type="hidden" name="id" value="<?= $ls["id"]; ?>">
        		<ul>
        		<li>
        				<label for="Title">Title:	</label>
        			<input type="text" name="Title" id="Title" required value="<?= $ls["Title"]; ?>">	
        			</li>
        			<li>
        				<label for="Register">Link Site:	</label>
        			<input type="text" name="Register" id="Register" required value="<?= $ls["Link"]; ?>">	
        			</li>
        			<li>
        				<label for="Tutorial">Link Vidio:	</label>
        			<input type="text" name="Tutorial" id="Tutorial" value="<?= $ls["Youtube"]; ?>">
        			</li>
        			<li>
        				<label for="Server1">Server 1:	</label>
        			<input type="text" name="Server1" id="Server1" required  value="<?= $ls["Server 1"]; ?>">	
        			</li>
        			<li>
        				<label for="Server2">Server 2:	</label>
        			<input type="text" name="Server2" id="Server2" required  value="<?= $ls["Server 2"]; ?>">	
        			</li>
        			<input type="hidden" id="Last Update" name="LastUpdate" value="<?=waktu();?>">
        			<li>
        				<label for="Status">Status:	</label>
        			<input type="text" name="Status" id="Status" required value="<?= $ls["Status"]; ?>">	
        			</li>
        			<li>
        				<button type="submit" name="submit" class="tombol">Ubah data</button>
        			</li>
        		</ul>
        	</form>
    	</div>
    </div>
    <?=ft();?>
</body>
</html>