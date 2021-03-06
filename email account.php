<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Personal Center</title>
    <link rel="stylesheet" href="frame/layui/css/layui.css">
    <link rel="stylesheet" href="./frame/static/css/style.css">
    <link rel="icon" href="./img/grade_a.png">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="email account.css">
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
	$email = mysqli_fetch_assoc(mysqli_query($conn, "SELECT uemail FROM `user` WHERE username = '$name'"))["uemail"];
	$emailpwd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT uemailpwd FROM `user` WHERE username = '$name'"))["uemailpwd"];
	
?>
    <fieldset class="layui-elem-field ">
        <legend>Email Account</legend>
        <form class="layui-form" action="./add-email.php" method="post">

            <div class="layui-field-box">
                <label class="layui-form-label" id="address_lable">Address:</label>
                <div class="layui-input-block">
                    <input title='address' type="text" name="title" required lay-verify="required" placeholder="Address" autocomplete="off"
                        class="layui-input" id="email_address" onblur="isEmail()" value=<?php echo $email ?>>
                </div>
            </div>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label" id="password_lable">Password:</label>
                    <div class="layui-input-inline">
                        <input title='password' type="password" name="password" required lay-verify="required" placeholder="Password"
                            autocomplete="off" class="layui-input" id="email_password" value=<?php echo $emailpwd ?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux" id="emial_tips">辅助文字</div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">Save</button>
                    <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
                </div>
            </div>
        </form>
    </fieldset>

    <script type="text/javascript">
        //验证邮箱格式
        function isEmail() {
            var email = document.getElementById("email_address").value;
            if (email == "") {
                //alert("请输入邮箱！");
                document.getElementById("emial_tips").style.display = "inline-block";
                document.getElementById("emial_tips").style.color = "red";

                document.getElementById("emial_tips").innerHTML = "✘Entry Address";
                document.getElementById("emial_tips").focus();
                return false;
            }
            var pattern = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            strEmail = pattern.test(email);
            if (strEmail) {
                document.getElementById("emial_tips").style.display = "inline-block";
                document.getElementById("emial_tips").style.color = "green";//设置邮箱可用是的字体颜色

                document.getElementById("emial_tips").innerHTML = "✔";
                return true;
            }
            else {
                document.getElementById("emial_tips").style.display = "inline-block";
                document.getElementById("emial_tips").style.color = "red";//设置邮箱不可用时的字体颜色
                document.getElementById("emial_tips").innerHTML = "✘Wrong Format";
                document.getElementById("emial_tips").focus();

            }
        }   
    </script>
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
            });
        });
    </script>
</body>

</html>