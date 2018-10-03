<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>form</title>
    <link rel="stylesheet" href="../frame/layui/css/layui.css">
    <link rel="stylesheet" href="../frame/static/css/style.css">
    <link rel="icon" href="../frame/static/image/code.png">
</head>
<body class="body">

<?php 
    //echo "Hello3", "<br>";
    if (isset($_GET["data"])){
        $json = $_GET["data"];
        $row = json_decode($json, true);
        $tname = $row["tname"];
		$tcatogery = $row["tcatogery"];
        $startdate = $row["startdate"];
        $duedate = $row['duedate'];
        $status = $row["status"];
        $reminddate = $row['reminddate'];
        $progress = $row['progress'];
        $priority = $row['priority'];
        $description = $row["description"];
        $permission = $row["permission"];

        $permission_map = array("Public Task", "Private Task");
        $permission_name = $permission_map[$permission];
		
		$relatedto = $row["relatedto"];
		$sql = "SELECT pname FROM projects WHERE id='$relatedto'";
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
		//echo $sql;
		$res = mysqli_query($conn, $sql);
		$project_row = mysqli_fetch_assoc($res);
		//echo $prject_row;
		$pname = $project_row['pname'];
    }
?>

    <form class="layui-form" action="">
        TASK DETAILS
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Task Name</label>
            <div class="layui-input-block" style="margin-left: 155px;">
                <label class="layui-input"> <?php echo $tname ?> </label>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Category</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            	<label class="layui-input"> <?php echo $tcatogery ?> </label>
            </div>
        </div>
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Started</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <label class="layui-input"> <?php echo $startdate ?> </label>
            </div>
        </div>
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Due</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <label class="layui-input"> <?php echo $duedate ?> </label>
            </div>
        </div>
        <br />
        ADDITIONAL INFORMATION
        <hr />
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Reminder</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            <label class="layui-input"> <?php echo $reminddate ?> </label><br /><input type="time" class="layui-input" id="test4" placeholder="HH:mm:ss">
            </div>
        </div>


        <div class="layui-form-item" style="margin-bottom: 8px;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Progress</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <label class="layui-input"> <?php echo $progress ?> </label>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Status</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <label class="layui-input"> <?php echo $status ?> </label>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Priority</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            	<label class="layui-input"> <?php echo $priority ?> </label>
            </div>
        </div>
        <br />
        RELATED TO
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Related To</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            	<label class="layui-input"> <?php echo $pname ?> </label>
            </div>
        </div>

        <br />
        DESCRIPTION INFORMATION
        <hr />

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Description</label>
            <div class="layui-input-block" style="margin-left: 155px;">
                <label class="layui-textarea"><?php echo $description ?>  </label>
            </div>
        </div>


        <br />
        PERMISSIONS
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Task Visibility</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <label class="layui-input"><?php echo $permission_name ?>  </label>
            </div>
        </div>

    </form>

<script src="../frame/layui/layui.js" charset="utf-8"></script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,layedit = layui.layedit
        ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
            ,lang:'en'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return 'Project name should be greater than 4 characters.';
                }
            }
            ,essential: [/[\S]+/, "This one should not be empty."]
            ,valid_date: [/^(\d{4})[-\/](\d{1}|0\d{1}|1[0-2])([-\/](\d{1}|0\d{1}|[1-2][0-9]|3[0-1]))*$/, "Invalid date format"]
            ,pass: [/(.+){6,12}$/, 'the length of password should be between 6 to 12 characters.']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('switch checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('the characters in switch can be any.', data.othis)
        });
    });
</script>
</body>
</html>