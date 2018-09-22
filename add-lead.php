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
	// echo "连接成功";

	// echo $_POST["title"], "<br>", $_POST["status"], "<br>", $_POST["catogery"];
	// echo "<br>", $_POST["date"], "<br>", $_POST["responsiveid"];
	// echo "<br>", $_POST["tags"], "<br>", $_POST["description"];
	// echo "<br>", $_POST["customized"];
	$json_string = file_get_contents('json/lead-id.json');   
    $pid = json_decode($json_string, true);  
	$id = $pid['cnt'];
	//echo $id, "<br>";

	$name = $_POST['title'];
	$status_map = array("Lapsed", "Active");
	$status = $status_map[$_POST['status']]; 
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$permission = $_POST['permission'];
	$datecreated = date("Y-m-d");

	$sql = "INSERT INTO `lead` (`lid`, `lname`, `phonenumber`, `email`, `lstatus`, `ldatecreated`, `laddress`, `lpermission`) VALUES ('$id', '$name', '$phone', '$email', '$status', '$datecreated', '$address', '$permission');";
	//echo "<br>", $sql;
	$res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		$sql_lead = "select * from lead";
		$lead_res = mysqli_query($conn, $sql_lead);
		$arr = array();
		while ($lead_row = mysqli_fetch_assoc($lead_res)){
			array_push($arr, $lead_row);
		}
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/lead.json', json_encode($data));

		$pid['cnt'] = $pid['cnt'] + 1;
		file_put_contents('json/lead-id.json', json_encode($pid));

		echo "successfully added new lead";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
