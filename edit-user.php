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

	$json_string = file_get_contents('json/user-id.json');   
    $id = $_GET["id"];

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

    $accountname = $_POST['accountname'];
    $password = $_POST['password'];
    $sql = "UPDATE `user` SET `ufirstname`='$firstname', `ulastname`='$lastname', `username`='$accountname', `password`='$password' WHERE user.uid='$id'";
    echo $sql;
    $res = mysqli_query($conn, $sql);
	if ($res){
		// update json
		$sql_user = "select * from user";
        $user_res = mysqli_query($conn, $sql_user);
        $arr = array();
        while ($user_row = mysqli_fetch_assoc($user_res)){
            array_push($arr, $user_row);
        }
        $data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
        file_put_contents('json/user.json', json_encode($data));

		$pid['cnt'] = $pid['cnt'] + 1;
		file_put_contents('json/user-id.json', json_encode($pid));

		echo "successfully edit new user";
		//header(location:index.html);
	} else {
		echo "failed";
		//header(location:'demo/table form new prop.html');
	}		
?> 

</body> 
</html>
