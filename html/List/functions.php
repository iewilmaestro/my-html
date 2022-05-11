<?php

$conn = mysqli_connect('localhost', 'id18222386_iewilmaestro', 'v8M>7%Eh%F6LSFH!', 'id18222386_database');

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data) {
    global $conn;
    $namasitus = htmlspecialchars($data["NamaSitus"]);
	$linksitus = htmlspecialchars($data["LinkSitus"]);
	$linkvidio = htmlspecialchars($data["LinkVidio"]);
	$linkscript = htmlspecialchars($data["LinkScript"]);
	$status = htmlspecialchars($data["Status"]);
	
	$query = "INSERT INTO `List`(`NamaSitus`, `LinkSitus`, `LinkVidio`, `LinkScript`, `Status`) VALUES ('$namasitus','$linksitus','$linkvidio','$linkscript','$status')";
	// echo $query;
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM List
            WHERE 
            NamaSitus LIKE '%$keyword%' OR
            LinkSitus LIKE '%$keyword%' OR
            Status LIKE '%$keyword%'
            ";
    return query($query);
}
function ubah($data){
    global $conn;
    $id = $data["id"];
    $namasitus = htmlspecialchars($data["NamaSitus"]);
	$linksitus = htmlspecialchars($data["LinkSitus"]);
	$linkvidio = htmlspecialchars($data["LinkVidio"]);
	$linkscript = htmlspecialchars($data["LinkScript"]);
	$status = htmlspecialchars($data["Status"]);
	$query = "UPDATE `List` SET `id`='$id',`NamaSitus`='$namasitus',`LinkSitus`='$linksitus',`LinkVidio`='$linkvidio',`LinkScript`='$linkscript',`Status`='$status' WHERE id = '$id'";

	// echo $query;
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `List` WHERE id = $id");
    return mysqli_affected_rows($conn);
}

$list = query("SELECT * FROM List ORDER BY NamaSitus ASC");
$halaman = 
[
"list2.php",
"list3.php"
]
?>
