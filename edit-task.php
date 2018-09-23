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

	// echo $_POST["title"], "<br>", $_POST["status"], "<br>", $_POST["catogery"];
	// echo "<br>", $_POST["date"], "<br>", $_POST["responsiveid"];
	// echo "<br>", $_POST["tags"], "<br>", $_POST["description"];
	// echo "<br>", $_POST["customized"];

    $id = $_GET["id"];
	//echo $id, "<br>";

	$name = $_POST['title'];
	$status_map = array("Not Started", "In Progress", "Completed", "Deferred", "Cancelled");
	$status = $status_map[$_POST['status']]; 
	$catogery = $_POST['catogery'];

	$startdate = $_POST["startdate"];
	$duedate = $_POST['duedate'];
	$reminddate = $_POST['reminddate'];

	$priority_map = array("Medium", "Low", "High");
	$priority = $priority_map[$_POST['priority']]; 

	$description = $_POST["description"];
	$permission = $_POST["permission"];

	$sql = "UPDATE task SET tname='$name', startdate='$startdate', duedate='$duedate', status='$status', reminddate='$reminddate', priority='$priority', description = '$description', permission = '$permission' WHERE task.tid = '$id'";
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
		echo "successfully added new task";
	} else {
		echo "failed";
	}		
?> 

</body> 
</html>
