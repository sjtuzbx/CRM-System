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

	// 1 - Everyone  0 - Administrator
	foreach($_POST as $x=>$x_value) {
		$name_list = explode('-',$x); 	
		$table_name = $name_list[0];
		$table_name = $table_name . "_permission";
		$permission = $name_list[1];
		if ($permission == "everyone")
			$permission_id = 1;
		else
			$permission_id = 0;
		$sql = "UPDATE `permission` set `$table_name`='$permission_id' WHERE permission_id='0'";
		$res = mysqli_query($conn, $sql);
	}	
	if ($res){
		$sql = "select * from permission";
		$res = mysqli_query($conn, $sql);
		$arr = array();
		while ($row = mysqli_fetch_assoc($res)){
			array_push($arr,$row);
		}
		$data=array("data"=>$arr);
		file_put_contents('json/permission.json', json_encode($data));
		echo "successfully updated setting";
	}
?> 

</body> 
</html>
