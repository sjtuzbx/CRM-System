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
	echo "连接成功", "<br>";
	//if (isset($_POST["data"])){
        echo $_POST['data'], "<br>";
		$json = $_POST['data'];
		$row = json_decode($json, true);
        $lid = $row['lid'];
        echo $lid, "<br>";
        $lname = $row['lname'];
        $phonenumber = $row['phonenumber'];
        $email = $row['email'];
        $status = $row['lstatus'];
        $datecreated = $row['ldatecreated'];
        $address = $row['laddress'];
        $permission = $row["lpermission"];
        
        $json_string = file_get_contents('json/client-id.json');   
        $pid = json_decode($json_string, true);  
        $id = $pid['cnt'];
        echo $id;
        $sql = "INSERT INTO `client` (`cid`, `cname`, `clienttype`, `siteaddress`, `postaladdress`, `cstatus`, `cphone`, `cdatecreated`) VALUES ('$id', '$lname', 'Individual', '', '', '$status', '$phonenumber', '$datecreated');";
        echo $sql, "<br>";
        $res = mysqli_query($conn, $sql);
        if ($res){
            // update json
            $sql_client = "select * from client";
            $client_res = mysqli_query($conn, $sql_client);
            $arr = array();
            while ($client_row = mysqli_fetch_assoc($client_res)){
                if ($client_row['cid'] != 0)
					array_push($arr, $client_row);
            }
            $data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
            file_put_contents('json/client.json', json_encode($data));

            $pid['cnt'] = $pid['cnt'] + 1;
            file_put_contents('json/client-id.json', json_encode($pid));

            

            echo "successfully convert a lead to a new client", "<br>";
            //header(location:index.html);
        } else {
            echo "failed", "<br>";
           ///header(location:'demo/table form new prop.html');
        }

        // also convert a lead to a contact
        $json_string = file_get_contents('json/contact-id.json');   
        $pid = json_decode($json_string, true);  
        $id = $pid['cnt'];

        $sql = "INSERT INTO `contact` (`ctid`, `firstname`, `lastname`, `ctphone`, `ctemail`, `organisation`, `ctdatecreated`, `ctstatus`, `notes`) 
                VALUES ('$id', '$lname', '', '$phonenumber', '$email', '0', '$datecreated', '$status', '');";
        $res = mysqli_query($conn, $sql);
        if ($res){
            // update json
            $sql_contact = "select * from contact";
            $contact_res = mysqli_query($conn, $sql_contact);
            $arr = array();
            while ($contact_row = mysqli_fetch_assoc($contact_res)){
                array_push($arr, $contact_row);
            }
            $data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
            file_put_contents('json/contact.json', json_encode($data));

            $pid['cnt'] = $pid['cnt'] + 1;
            file_put_contents('json/contact-id.json', json_encode($pid));

            echo "successfully added new contact";
            //header(location:index.html);
        } else {
            echo "failed";
            //header(location:'demo/table form new prop.html');
        }

        // detele lead
        $sql_delete = "DELETE FROM lead WHERE lid = '$lid' ";
		//echo $sql_delete;
		$res = mysqli_query($conn, $sql_delete);
		if ($res){
			echo "Success delete lead";
			$sql_project = "select * from lead";
			$project_res = mysqli_query($conn, $sql_project);
			$arr = array();
			while ($project_row = mysqli_fetch_assoc($project_res)){
				array_push($arr,$project_row);
			}
			$data=array("code"=>0,"msg"=>"","count"=>count($arr), "data"=>$arr);
			file_put_contents('json/lead.json', json_encode($data));

			
			function test_lead_completed($var)
			{
				return($var["lstatus"]== "Active");
			}
			$data=array("code"=>0,"msg"=>"","count"=>count(array_filter($arr, test_lead_completed)), "data"=>array_filter($arr, test_lead_completed));
			file_put_contents('json/active_lead.json', json_encode($data));

			function test_lead_inprogress($var)
			{
				return($var["lstatus"]== "Lapsed");
			}
			$data=array("code"=>0,"msg"=>"","count"=>count(array_filter($arr, test_lead_inprogress)), "data"=>array_filter($arr, test_lead_inprogress));
			file_put_contents('json/lapsed_lead.json', json_encode($data));
		} else {
			echo "Failed";
		}
    //}
	echo "lalala";
?> 

</body> 
</html>
