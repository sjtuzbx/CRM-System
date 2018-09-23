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
	 echo "连接成功";

    $id = $_GET["id"];
	//echo $id, "<br>";

	$name = $_POST['title'];
	$status_map = array("Lapsed", "Active");
	$status = $status_map[$_POST['status']]; 
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$permission = $_POST['permission'];
	$datecreated = date("Y-m-d");

	$sql = "UPDATE lead SET lname='$name', phonenumber='$phone', email='$email', lstatus='$status', laddress='$address', lpermission='$permission' WHERE lead.lid='$id'";
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

		echo "successfully edited lead";
	} else {
		echo "failed";
	}		
?> 

</body> 
</html>
