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
	$new_password = $_POST['password'];
	$email = $_POST['email'];
	$email_password = $_POST['email_password'];
	$sql = "SELECT uemail, uemailpwd FROM user WHERE username = '$login_username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if ($row["uemail"] == $email && $row["uemailpwd"] == $email_password){
        // update password
        $sql = "UPDATE user SET password='$new_password' WHERE username='$login_username'";
        $res = mysqli_query($conn, $sql);
        if ($res){
            echo "Update success";
            header("location:login.php");
        } else {
            echo "Update failed";
            header("location:forgot password.php?valid=false");
        }
    }else {
        header("location:forgot password.php?valid=false");
    }
?> 

</body> 
</html>
