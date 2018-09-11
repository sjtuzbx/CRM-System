<!DOCTYPE html>
<?php
	unset($_SESSION['admin']);
	session_destroy();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="login.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="./img/grade_a.png">
</head>
<body >
	<div class="bg">
		<img src="img/login.png">
		<div class="login_form">
			<!-- 标题 -->
			<div class="form_header">
				<p><span>Alimama CRM</span></p>
			</div>
			<!-- 表单内容 -->
			<div class="form_content">
				<form id="login" action="login-check.php" method="post">
					<!-- 登录输入框 -->
					<label for="login_username" class="login_label_username"></label>
					<input type="text" name="username" class="username" autocomplete="on" placeholder="Enter Your Username">

					<!-- 密码输入框 -->
					<label for="login_pwd" class="login_label_pwd"></label>
			
					<?php
						echo "<div class='login_password'>";
						if(isset($_GET['valid'])){
							echo '<input type="password" name="password" class="password" autocomplete="on" placeholder="Enter Your Password">';
							echo "<font color='red' class='login_label_pwd'>Invalid username or password. Please try again.</font>";
						} else {
							echo '<input type="password" name="password" class="password" autocomplete="on" placeholder="Enter Your Password">';
						}
						echo "</div>";
					?>
					<!-- 登录按钮 -->
					<div class="login_button">
						<input type="submit" name="login_button" class="input_login_button" value="Login">
						<p class="float_1"><input type="checkbox" name="rem" value="rem" checked="checked">Remember Me</p>
					</div>

				</form>
			</div>
			<!-- 忘记密码 -->
			<span class="forgot">Forgot your password?  <a href="#" class="forgot_pwd">Click Here</a></span>
		</div>
	</div>	
</body>
</html>