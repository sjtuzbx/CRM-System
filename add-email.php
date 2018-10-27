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

	session_start();
	$name =$_SESSION["admin"];
	$address = $_POST['title'];
    $password = $_POST['password'];
	
	echo $name, "<br>";
	echo $address, "<br>";
	echo $password, "<br>";

    $sql = "SELECT * FROM `user`";
	echo $sql, "<br>";
	$res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		echo "success";
		
		$sql_email = "UPDATE user SET uemail='$address' WHERE username='$name';";
		$sql_pwd = "UPDATE user SET uemailpwd='$password' WHERE username='$name';";
        mysqli_query($conn, $sql_email);
        mysqli_query($conn, $sql_pwd);
        $arr = array();
		$user_res = mysqli_query($conn, $sql);
        while ($user_row = mysqli_fetch_assoc($user_res)){
            array_push($arr, $user_row);
        }
        $data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
        file_put_contents('json/user.json', json_encode($data));

		echo "successfully changed email account";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
