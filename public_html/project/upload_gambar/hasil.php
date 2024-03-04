<?php
include "koneksi.php";

function query($query) { 
    global $koneksi; 
    $result = mysqli_query($koneksi, $query); 
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result) ) { 
        $rows[] = $row; 
    } 
    return $rows; 
}

$list = query("SELECT * FROM gambar ORDER BY gambar_nama ASC");
?>
<html>
<head>
    <title>kang prabu lucknut</title>
</head>
<body>
    <table border="1">
        <tr>
            <td width="20">No</td>
            <td width="80">Nama</td>
            <td width="80">Foto</td>
        </tr>
        <?php foreach($list as $nomor => $list_foto): ?>
        <tr>
            <td><?=$nomor;?></td>
            <td><?=$list_foto["Nama"];?></td>
            <td><img src='img/<?=$list_foto["gambar_nama"];?>' width='200' height='200' />
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    <a href="index.php">Kembali</a>
</body>
</html>