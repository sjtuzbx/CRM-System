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

	$json_string = file_get_contents('json/contact-id.json');   
    $pid = json_decode($json_string, true);  
	$id = $pid['cnt'];
	//echo $id, "<br>";

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	$status_map = array("Not Started", "In Progress", "Finished");
	$status = $status_map[$_POST['status']]; 
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$note = $_POST['notes'];
	$datecreated = date("Y-m-d");

	$sql = "INSERT INTO `contact` (`ctid`, `firstname`, `lastname`, `ctphone`, `ctemail`, `organisation`, `ctdatecreated`, `ctstatus`, `notes`) VALUES ('$id', '$firstname', '$lastname', '$phone', '$email', '0', '$datecreated', '$status', '$note');";
	//echo "<br>", $sql;
	$res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		$sql_contact = "select * from contact";
		$contact_res = mysqli_query($conn, $sql_contact);
		$arr = array();
		while ($contact_row = mysqli_fetch_assoc($contact_res)){
			array_push($arr, $contact_row);
		}
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/contact.json', json_encode($data));

		$pid['cnt'] = $pid['cnt'] + 1;
		file_put_contents('json/contact-id.json', json_encode($pid));

		echo "successfully added new contact";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
