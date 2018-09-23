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
	echo $id, "<br>";

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	$status_map = array("Not Started", "In Progress", "Finished");
	$status = $status_map[$_POST['status']]; 
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$note = $_POST['notes'];
	$datecreated = date("Y-m-d");

    $sql = "UPDATE `contact` SET firstname='$firstname', lastname='$lastname', ctphone='$phone', ctemail='$email', ctstatus='$status', notes='$notes' WHERE contact.ctid='$id'";
    
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

		echo "successfully edited new contact";
	} else {
		echo "failed";
	}		
?> 

</body> 
</html>
