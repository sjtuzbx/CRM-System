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
	if ($_POST) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_error = $_FILES["file"]["error"];
        $file_size = $_FILES["file"]["size"];
    
        if ($file_error > 0) { // 出错
            $message = $file_error;
        } elseif($file_size > 1048576) { // 文件太大了
            $message = "上传文件不能大于1MB";
        }else{
            $date = date('Ymd');
            $file_name_arr = explode('.', $file_name);
            $new_file_name = date('YmdHis') . '.' . $file_name_arr[1];
            $path = "upload/".$date."/";
            $file_path = $path . $new_file_name;
            if (file_exists($file_path)) {
                $message = "此文件已经存在啦";
            } else {
                //TODO 判断当前的目录是否存在，若不存在就新建一个!
                if (!is_dir($path)){mkdir($path,0777);}
                    $upload_result = move_uploaded_file($file_tmp, $file_path); 
                    //此函数只支持 HTTP POST 上传的文件
                    if ($upload_result) {
                        $status = 1;
                        $message = $file_path;
                    } else {
                        $message = "文件上传失败，请稍后再尝试";
                    }
                }
        }
    } else {
        $message = "参数错误";
    }
    $json =file_get_contents('upload/api.json');  
    return $json;
?> 

</body> 
</html>
