<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="login.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="./img/grade_a.png">
	<style type="text/css">
		
			.input_confirm_button{
		width: 140px;
		height: 25px;
		margin-top: 40px;
		margin-left: 140px;
		font-size: 13px;
		font-family: 'Arial Negreta', 'Arial Normal', 'Arial';
		font-weight:700; 
		border-width: 0px; /* 边框宽度 */
		border-radius: 3px; /* 边框半径 */
		background: #1E90FF; /* 背景颜色 */
		cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
		outline: none; /* 不显示轮廓线 */
		color: white; /* 字体颜色 */

	}
	
        @font-face{
            font-family: "imooc-icon";
            src: url("icomoon/fonts/icomoon.eot?7kkyc2"); 
            src: url("icomoon /fonts/icomoon.eot?#iefix") format("embedded-opentype")
            ,url("icomoon /fonts/icomoon.woff") format("woff")
            ,url("icomoon/fonts/icomoon.ttf") format("truetype")
            ,url("icomoon/fonts/icomoon.svg") format("svg");
            font-weight: normal;
            font-style: normal;
        } 
	.back{
		width: 140px;
		height: 25px;
		border-width: 0px; /* 边框宽度 */
		border-radius: 3px; /* 边框半径 */
		background: #1E90FF; /* 背景颜色 */
		cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
		outline: none; /* 不显示轮廓线 */
		color: white; /* 字体颜色 */
	}

	</style>
		
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
				<form id="login" action="recover password.php" method="post">
					<!-- 登录输入框 -->
					<label for="login_username" class="login_label_username"></label>
					<input type="text" name="username" class="username" autocomplete="on" placeholder="Enter Your Username">

					<!-- 密码输入框 -->
					<label for="login_pwd" class="login_label_pwd"></label>
			
						<div class='login_password'>
							<input type="password" name="password" class="password" autocomplete="on" placeholder="Enter Your New Password">
							<input type="email" name="email" class="password" autocomplete="on" placeholder="Enter Your Email Address">
							<input type="password" name="email_password" class="password" autocomplete="on" placeholder="Enter Your Email Password">
						</div>
						<?php
							echo "<div class='login_password'>";
							if(isset($_GET['valid'])){
								echo "<font color='red' class='login_label_pwd'>Incorrect email or email password. Please try again.</font>";
							} 
							echo "</div>";
						?>
					<!-- 登录按钮 -->
					<div class="login_button">
						<input type="submit" name="login_button" class="input_confirm_button" value="Confirm">
					<!-- 	<span  class="back" style="font-family: 'imooc-icon';"></span><span></span> -->
					
					</div>

				</form>
			</div>
			<!-- 忘记密码 -->
			
		</div>
	</div>	
</body>
</html>