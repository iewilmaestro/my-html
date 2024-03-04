<?php
session_start();
include("../../asset/php/functions.php");
if(!$_SESSION['username']){
    header("location:../index.php?pesan=gagal");
}
$list = autor($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Admin Page</title>
	<link rel="stylesheet" href="../../asset/css/style.css">
</head>
<body>
    <?=hd();?>
    <div class="content">
        <p class="keterangan">Admin Page</p>
        <p>Halo <b><?=$_SESSION['username']; ?></b> Anda telah login sebagai <b><?=$_SESSION['level']; ?></b>.</p><br>
        <a class="tombol" href="tambah.php">Tambah Data</a>
        <a class="tombol" href="logout.php">LOGOUT</a><br><br>
        <input type='text' id='input' onkeyup='searchTable()' placeholder="Cari.. ">
        <div class="list">
            <table id="list">
                <thead>
                    <tr>
                        <th>Id</th>
                    	<!--th>Author</th-->
                        <th>Title</th>
                        <th>Action</th>
                        <th>Link Register</th>
                        <th>Link Tutor</th>
                        <th>Server 1</th>
                        <th>Server 2</th>
                        <th>Last Update</th>
                        <th>Status Script</th>
                        <th>Site</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $list as $row): ?>
                        <tr>
                        <td><?=$row["id"];?></td>
                        <!--td><?=$row["Author"];?></td-->
                        <td><?=$row["Title"];?></td>
                        <td><a class="tombol" href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> <a class="tombol" href="hapus.php?id=<?= $row["id"]; ?>">Delete</a></td>
                        <td><a href="<?=$row["Link"];?>" target='_blank'>Register Here!</a></td>
                        <?php
                        if($row["Youtube"] == "https://youtube.com/c/iewil" || !$row["Youtube"]){
                            ?>
                            <td>-</td>
                            <?php
                        }else{
                            ?><td><a href="<?=$row["Youtube"];?>" target='_blank'>View</a></td><?php
                        }
                        ?>
                        <td><a href="<?=$row["Server 1"];?>" target='_blank'>Server1</a></td>
                        <?php
                        if(!$row["Server 2"]){
                            ?>
                            <td>-</td>
                            <?php
                        }else{
                            ?><td><a href="<?=cuan($row["Server 2"]);?>" target='_blank'>Server2</a></td><?php
                        }
                        ?>
                        <td><?=$row["LastUpdate"];?></td>
                        <?php
                        if($row["Status"]=="Online"){
                            ?><td id="online"><?=$row["Status"];?></td>
                            <?php
                        }else{
                            ?><td  id="offline"><?=$row["Status"];?></td>
                            <?php
                        }
                        ?>
                        <td><a href="https://api-iewil.my.id/New.php?id=<?=$row["id"];?>">Cek</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?=ft();?>
</body>
<script src="../../asset/js/script.js"></script>
</html>