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
	//echo "连接成功";

	//echo $_POST["title"], "<br>", $_POST["startdate"], "<br>", $_POST["catogery"];
	//echo "<br>", $_POST["duedate"], "<br>", $_POST["reminddate"];

	$sql_count = "SELECT count(*) from task";
	$res = mysqli_query($conn, $sql_count);
	$row = mysqli_fetch_assoc($res);

	$json_string = file_get_contents('json/task-id.json');   
    $pid = json_decode($json_string, true);  
	$id = $pid['cnt'];
	//echo $id, "<br>";

	$name = $_POST['title'];
	$status_map = array("Not Started", "In Progress", "Completed", "Deferred", "Cancelled");
	$status = $status_map[$_POST['status']];
	$catogery = $_POST['catogery'];
	$relatedto = $_POST['projectid'];

	$startdate = $_POST["startdate"];
	$duedate = $_POST['duedate'];
	$reminddate = $_POST['reminddate'];

	$priority_map = array("Medium", "Low", "High");
	$priority = $priority_map[$_POST['priority']]; 

	$description = $_POST["description"];
	$permission = $_POST["permission"];

	$sql = "INSERT INTO `task` (`tid`, `tname`, `towner`, `tcatogery`, `relatedto`, `startdate`, `duedate`, `status`, `reminddate`, `progress`, `priority`, `tresponsiveid`, `description`, `permission`) VALUES ('$id', '$name', '0', '$catogery', '$relatedto','$startdate', '$duedate', '$status', '$reminddate', '0', '$priority', '1', '$description', '$permission');";
	//echo $sql;
	$res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		$sql_task = "select * from task a INNER JOIN user b ON a.towner=b.uid";
		$task_res = mysqli_query($conn, $sql_task);
		$arr = array();
		while ($task_row = mysqli_fetch_assoc($task_res)){
			$responsivename = $task_row['tresponsiveid'];
			$sql_id = "select username from user where user.uid=$responsivename";
			$tmp_res = mysqli_query($conn, $sql_id);
			$name = mysqli_fetch_assoc($tmp_res);
			$task_row['tresponsiveid'] = $name['username'];
			array_push($arr,$task_row);
		}
	
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/task.json', json_encode($data));

		$pid['cnt'] = $pid['cnt'] + 1;
		file_put_contents('json/task-id.json', json_encode($pid));

		echo "successfully added new task";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
