<?php
include("../asset/php/functions.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		
		// alihkan ke halaman dashboard admin
		header("location:control/index.php");
 
	// cek jika user login sebagai pegawai
	}elseif($data['level']=="client"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "client";
		// alihkan ke halaman dashboard pegawai
		header("location:../Website/Dashboard.php?pesan=client");
	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}