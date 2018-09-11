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
	
	$login_username = $_POST['username'];
	$login_password = $_POST['password'];
	$sql = "SELECT password FROM user WHERE username='$login_username'";
	$res = mysqli_query($conn, $sql);

	if (mysqli_num_rows($res) == 1){
		// 
		session_start();
		$_SESSION["admin"] = true;

		$row = mysqli_fetch_assoc($res);
		if ($row['password'] == $login_password){
			// get projects info
			$sql_project = "select * from client a INNER JOIN projects b INNER JOIN user c ON a.cid=b.clientid and b.responsiveid=c.uid";
			$project_res = mysqli_query($conn, $sql_project);
			$arr = array();
			while ($project_row = mysqli_fetch_assoc($project_res)){
				array_push($arr,$project_row);
			}
			$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
			file_put_contents('json/projects.json', json_encode($data));

			// get tasks info
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

			// redirect to index page
			header("location:index.php");
		} else {
			header("location:login.php?valid=false");
		}
	} else {
		header("location:login.php?valid=false");
	}
?> 

</body> 
</html>
