<?php
#template
function hd(){
    ?>
    <div class="header">
    	<ul>
    		<li><marquee direction="right"><a href"#" class="logo">Iewil <span>Official</span></a></marquee></li>
    		<li><a href="https://api-iewil.my.id">Dashboard</a></li>
    		<li><a href="https://api-iewil.my.id/List">List</a></li>
    		<li><a href="https://api-iewil.my.id/Request">Request Sc</a></li>
    		<li><a href="https://api-iewil.my.id/Admin">Upload Sc</a></li>
    		<!--<li><a href="https://www.iewil.my.id/2023/01/list-script.html">List Blogger</a></li>-->
    	</ul>
    </div>
    <?php
}

function ft(){
    ?>
    <div class="footer">
        <ul>
            <li><a href="" id="social">bla</a></li>
            <li><a href="" id="social">bla</a></li>
            <li><a href="" id="social">bla</a></li>
        </ul>
    	<a href="#" class="logo">iewil official. &copy; <?=date("Y");?></a>
	</div>
	<?php
}

#mysql
$conn = mysqli_connect("localhost","apiiewil_database","Iewil5758","apiiewil_database");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function waktu(){
    date_default_timezone_set('Asia/Jakarta');
    $timezone = getdate(time());
    return date('d/M/Y');;
}

#daftar
function daftar($data) {
    date_default_timezone_set('Asia/Jakarta');
    global $conn;
    $user = $data["username"];
    $password = $data["password"];
    $level = "admin";
    
    $query = "INSERT INTO user(username, password, level) VALUES ('$user','$password','$level')"; 
    mysqli_query($conn, $query);
    return mysqli_affected_rows($koneksi);
}

#control
function autor($keyword){
    $query = "SELECT * FROM List
            WHERE 
            Author = '$keyword'
            ";
    return query($query);
}
function autor_search(){
    $query = "SELECT * FROM List
            WHERE 
            Author = '$author' AND (
            Title LIKE '%$keyword%' OR
            Link LIKE '%$keyword%' OR
            Status LIKE '%$keyword%' )
            ";
    return query($query);
}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `List` WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;
    $id = $data["id"];
    $autor = htmlspecialchars($data["Author"]);
	$title = htmlspecialchars($data["Title"]);
	$link = htmlspecialchars($data["Register"]);
	$yt = htmlspecialchars($data["Tutorial"]);
	$status = htmlspecialchars($data["Status"]);
	$server1 = htmlspecialchars($data["Server1"]);
	$server2 = htmlspecialchars($data["Server2"]);
	$lastupdate = htmlspecialchars($data["LastUpdate"]);
	$query = "UPDATE `List` SET `id`='$id',`Author`='$autor',`Title`='$title',`Link`='$link',`Youtube`='$yt',`Server 1`='$server1',`Server 2`='$server2',`LastUpdate`='$lastupdate',`Status`='$status' WHERE id = '$id'";
	// echo $query;
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function tambah($data) {
    global $conn;
    $autor = htmlspecialchars($data["Author"]);
	$title = htmlspecialchars($data["Title"]);
	$link = htmlspecialchars($data["Register"]);
	$yt = htmlspecialchars($data["Tutorial"]);
	$status = htmlspecialchars($data["Status"]);
	$server1 = htmlspecialchars($data["Server1"]);
	$server2 = htmlspecialchars($data["Server2"]);
	$lastupdate = htmlspecialchars($data["LastUpdate"]);
	
	$query = "INSERT INTO `List`(`Author`, `Title`, `Link`, `Youtube`, `Status`, `Server 1`, `Server 2`, `LastUpdate`) VALUES ('$autor','$title','$link','$yt','$status','$server1','$server2','$lastupdate')";
	// echo $query;
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

#global
function cari($keyword){
	$query = "SELECT * FROM List
            WHERE 
            Author LIKE '%$keyword%' OR
            Title LIKE '%$keyword%' OR
            Link LIKE '%$keyword%' OR
            Status LIKE '%$keyword%' 
            ";
    return query($query);
}
#promo
function datax($keyword) {
    $query = "SELECT * FROM List
            WHERE 
            id = '$keyword'
            ";
    return query($query);
}

#cuan
function cuan($str){
    return "https://iewil.bojez.com/p/decrypt.html?url=".base64_encode($str);
}
?>