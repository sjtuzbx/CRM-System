<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="frame/layui/css/layui.css">
    <link rel="stylesheet" href="./frame/static/css/style.css">
    <link rel="icon" href="./frame/static/image/code.png">
<link rel="stylesheet" href="User Details.css">
</head>

<body>
<?php
    //echo "Hello3", "<br>";
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
	$firstname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ufirstname FROM `user` WHERE username = '$name'"))["ufirstname"];
	$lastname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ulastname FROM `user` WHERE username = '$name'"))["ulastname"];
	
?>
	<fieldset class="layui-elem-field">
		<legend>User Details</legend>
		        
		  
		<form class="layui-form" action="./add-userdetails.php" method="post">
		   <div class="layui-form-item" >
		    <div class="layui-inline">
		      <label class="layui-form-label">Name:</label>
		      <div class="" id="name">
		        <input type="text" name="Username"  autocomplete="off" class="layui-input firstname" placeholder="username" value=<?php echo $name ?>>
		        <input type="text" name="Firstname"  autocomplete="off" class="layui-input firstname" placeholder="firstname" value=<?php echo $firstname ?>>
		        <input type="text" name="Lastname"  autocomplete="off" class="layui-input firstname" placeholder="lastname" value=<?php echo $lastname ?>>
		      </div>
		    </div>
		    <div class="textbox">
		         <label class="layui-form-label">Note:</label>
		          <div class="layui-input-block">
		      <textarea name="notes" placeholder="Your Description" class="layui-textarea" id="text_area" rows="5" cols="50"></textarea><br>
		   </div>
		    <div class="layui-form-item">
		            <div class="layui-input-block">
		                <button class="layui-btn" lay-submit lay-filter="formDemo">Save</button>
		                <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
		            </div>
		        </div>
		    </div>	
		  </div>	    
		</form>
	</fieldset>
	<script type="text/javascript" src="frame/layui/layui.js"></script>
    <script type="text/javascript" src="./frame/static/js/vip_comm.js"></script>
    <script type="text/javascript"> </script>
    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function (data) {
                //layer.msg(JSON.stringify(data.field));
                //return false;
				if(true){ //只有当点击confirm框的确定时，该层才会关闭 
					var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
					parent.layer.close(index); //再执行关闭  
				}   
            });
        });
    </script>
</body>
</html>