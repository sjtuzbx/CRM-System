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
	$sql_count = "SELECT count(*) from projects";
	$res = mysqli_query($conn, $sql_count);
	$row = mysqli_fetch_assoc($res);

    $id = $_GET["id"];
	//echo $id, "<br>";

	$name = $_POST['title'];
	$status_map = array("Not Started", "In Progress", "Completed", "Deferred", "Cancelled");
	$status = $status_map[$_POST['status']]; 
	$catogery = $_POST['catogery'];
	$duedate = $_POST['date'];
	$datecreated = date("Y-m-d");
	$responsiveid = $_POST["responsiveid"];
	$tags = $_POST["tags"];
	$description = $_POST["description"];
	$customized = $_POST["customized"];

	$sql = "UPDATE projects SET pname='$name', status='$status', catogery='$catogery', duedate='$duedate', responsiveid = '$responsiveid', tags = '$tags', description = '$description', customized = '$customized' WHERE projects.id = '$id'";
	//echo "<br>", $sql;
	$res = mysqli_query($conn, $sql);
	if ($res){
		//echo "success";
		// update json
		$sql_project = "select * from client a INNER JOIN projects b INNER JOIN user c ON a.cid=b.clientid and b.responsiveid=c.uid";
		$project_res = mysqli_query($conn, $sql_project);
		$arr = array();
		while ($project_row = mysqli_fetch_assoc($project_res)){
			array_push($arr,$project_row);
			// foreach($row as $x=>$x_value) {
			//   echo "Key=" . $x . ", Value=" . $x_value;
			//   echo "<br>";
			// }
		}
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/projects.json', json_encode($data));

		echo "successfully update project";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
