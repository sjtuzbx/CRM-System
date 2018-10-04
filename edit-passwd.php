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

    // echo $_POST["title"];
    // echo $_POST["password"];

    session_start();
    //echo $_SESSION["admin"];
    $passwd = $_POST["password"];
    $username = $_SESSION["admin"];

    $sql = "UPDATE `user` SET password='$passwd' WHERE `user`.`username`='$username'";
    //echo $sql;
    $res = mysqli_query($conn, $sql);
	if ($res){
		echo "successfully update admin's information";
		$sql_user = "select * from user";
		$user_res = mysqli_query($conn, $sql_user);
		$arr = array();
		while ($user_row = mysqli_fetch_assoc($user_res)){
			array_push($arr, $user_row);
		}
		$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
		file_put_contents('json/user.json', json_encode($data));
        //header("location:");
	} else {
		echo "failed";
	}		
?> 

</body> 
</html>
