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
		$lid = $row['lid'];
        $lname = $row["lname"];
        $phonenumber = $row['phonenumber'];
        $email = $row['email'];
        $status = $row['lstatus'];
        $datecreated = $row['ldatecreated'];
        $address = $row['laddress'];
        $permission = $row["lpermission"];
        
        $json_string = file_get_contents('json/client-id.json');   
        $pid = json_decode($json_string, true);  
        $id = $pid['cnt'];

        $sql = "INSERT INTO `client` (`cid`, `cname`, `clienttype`, `siteaddress`, `postaladdress`, `cstatus`, `cphone`, `cdatecreated`) VALUES ('$id', '$lname', 'Individual', '', '', '$status', '$phonenumber', '$datecreated');";
        $res = mysqli_query($conn, $sql);
        if ($res){
            // update json
            $sql_client = "select * from client";
            $client_res = mysqli_query($conn, $sql_client);
            $arr = array();
            while ($client_row = mysqli_fetch_assoc($client_res)){
                array_push($arr, $client_row);
            }
            $data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
            file_put_contents('json/client.json', json_encode($data));

            $pid['cnt'] = $pid['cnt'] + 1;
            file_put_contents('json/client-id.json', json_encode($pid));

            echo "successfully convert a lead to a new client";
            //header(location:index.html);
        } else {
            echo "failed";
           ///header(location:'demo/table form new prop.html');
        }
    }
?> 

</body> 
</html>
