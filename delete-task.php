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
	if (isset($_POST["data"])){
		$json = $_POST["data"];
		$row = json_decode($json, true);
		$pid = $row["tid"];
		$sql_delete = "DELETE FROM task WHERE tid = '$pid' ";
		//echo $sql_delete;
		$res = mysqli_query($conn, $sql_delete);
		if ($res){
			echo "Success";
			$sql_project = "select * from user a INNER JOIN task b ON a.uid=b.tresponsiveid";
			$project_res = mysqli_query($conn, $sql_project);
			$arr = array();
			while ($project_row = mysqli_fetch_assoc($project_res)){
				array_push($arr,$project_row);
			}
			$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
			file_put_contents('json/task.json', json_encode($data));
		} else {
			echo "Failed";
		}
	}
?> 

</body> 
</html>
