<!DOCTYPE html> 
<html> 
<body> 

<?php 
	$servername = "localhost";
	$sql_username = "root";
	$sql_password = "123456";
	$dbname = "mylogin";
	 
	// 创建连接
	$conn = mysqli_connect($servername, $sql_username, $sql_password, $dbname);
	 
	// 检测连接
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$id = $_GET["id"];

	$name = $_POST['name'];
	$status_map = array("Lapsed", "Active");
	$status = $status_map[$_POST['status']]; 

	$siteaddress = $_POST['siteaddress'];
	$postaladdress = $_POST['postaladdress'];
	$phone = $_POST['phone'];
	$type_map = array("Individual", "Organisation");
	$type = $type_map[$_POST['type']];

	$sql = "UPDATE `client` set `cname`='$name', `clienttype`='$type', `siteaddress`='$siteaddress', `postaladdress`='$postaladdress', `cstatus`='$status', `cphone`='$phone' WHERE client.cid='$id'";
	$res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		$sql_client = "select * from client";
		$client_res = mysqli_query($conn, $sql_client);
		$arr = array();
		while ($client_row = mysqli_fetch_assoc($client_res)){
			array_push($arr, $client_row);
		}
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/client.json', json_encode($data));

		$pid['cnt'] = $pid['cnt'] + 1;
		file_put_contents('json/client-id.json', json_encode($pid));

		echo "successfully edited new client";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
