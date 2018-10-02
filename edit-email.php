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
    $email = $_POST["title"];
    $passwd = $_POST["password"];
    $username = $_SESSION["admin"];

    $sql = "UPDATE `user` SET uemail='$email', password='$passwd' WHERE `user`.`username`='$username'";
    //echo $sql;
    $res = mysqli_query($conn, $sql);
	if ($res){
        echo "successfully update admin's information";
        //header("location:");
	} else {
		echo "failed";
	}		
?> 

</body> 
</html>
