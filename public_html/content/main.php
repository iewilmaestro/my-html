<?php
$conn = mysqli_connect("localhost","apiiewil_database","Iewil5758","apiiewil_database");
//$conn = mysqli_connect("103.163.138.13","apiiewil_database","Iewil5758","apiiewil_database");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row; 
    }
    return $rows; 
}

function cari($keyword) {
    $query = "SELECT * FROM List 
            WHERE
            category LIKE '%$keyword%'";
    return query($query);
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM List WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function Filter_Category($data){
	foreach($data as $cat){
		$category[] = $cat["category"];
	}
	return array_unique($category);
}
function Build_Array($data){
	foreach($data as $list){
		$arr = [$list["title"]=>["url"=>$list["url"],"status"=>$list["status"],"versi"=>$list["versi"],"bot"=>$list["bot"]]];
		if(!$x){
			$x = [];
		}
		$cont=array_merge($arr,$x);
		$x = $cont;
	}
	return $x;
}

$list = query("SELECT * FROM List ORDER BY title ASC");

//FILTER CATEGORY
$Filter_Category = Filter_Category($list);
foreach ($Filter_Category as $Category){
	$short = cari($Category);
	$hasil[$Category] = Build_Array($short);
}
if($_GET["update"]==1){
    file_put_contents("conn.json",json_encode($hasil));
}