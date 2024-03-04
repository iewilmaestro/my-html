<?php
$conn = mysqli_connect("103.163.138.13","apiiewil_database","Iewil5758","apiiewil_database");
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}
function Build_Array($data){
	foreach($data as $list){
		$arr = [strtoupper($list["Title"])=>["id"=>$list["id"],"Author"=>$list["Author"],"Link"=>$list["Link"],"Youtube"=>$list["Youtube"],"Status"=>$list["Status"],"Server 1"=>$list["Server 1"],"Server 2"=>$list["Server 2"],"LastUpdate"=>$list["LastUpdate"],"Bot"=>$list["Bot"],"Versi"=>$list["Versi"]]];
		if(!$x){
			$x = [];
		}
		$cont=array_merge($arr,$x);
		$x = $cont;
	}
	return $x;
}
function list_autor($keyword){
    $query = "SELECT * FROM List
            WHERE 
            Author = '$keyword'
            ";
    return query($query);
}
const author = "iewil";
$data = list_autor(author);
$build = Build_Array($data);
print json_encode($build, JSON_PRETTY_PRINT);
