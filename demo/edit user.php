<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>表单</title>
    <link rel="stylesheet" href="../frame/layui/css/layui.css">
    <link rel="stylesheet" href="../frame/static/css/style.css">
    <link rel="icon" href="../frame/static/image/code.png">
</head>
<?php
    if (isset($_GET["data"])){
        $json = $_GET["data"];
        $row = json_decode($json, true);
        $pid = $row["uid"];
        $username = $row["username"];
        $firstname = $row["ufirstname"];
        $lastname = $row["ulastname"];
        $password = $row["password"];
    }
?>
<body class="body">
<form class="layui-form" action="../edit-user.php?id=<?php echo $pid ?>" method="post">
    CONTACT DETAILS<hr />
    <div class="layui-form-item">
        <label class="layui-form-label"  style="width: 120px; padding: 10px;">First Name</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="firstname" lay-verify="" autocomplete="off" value="<?php echo $firstname ?>" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"  style="width: 120px; padding: 10px;">Last Name</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="lastname" lay-verify="" autocomplete="off" value="<?php echo $lastname ?>" class="layui-input">
        </div>
    </div>
  
    <div class="layui-form-item">
        <label class="layui-form-label"  style="width: 120px; padding: 10px;">Account Name</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="accountname" lay-verify="required" autocomplete="off" value="<?php echo $username ?>" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label"  style="width: 120px; padding: 10px;">Password</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="password" lay-verify="required" autocomplete="off" value="<?php echo $password ?>" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block" style="margin-left: 255px;">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">Save</button>
            <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
        </div>
    </div>
</form>

<script src="../frame/layui/layui.js" charset="utf-8"></script>
<!-- <script src="../frame/layui/layui.all.js" charset="utf-8"></script> -->
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
        laydate.render({
            elem: '#date1'
            ,lang:'en'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return 'Contact name must be filled';
                }
            }
            ,auphone: [/^\d{10}$/, 'Please input correct phone number']
            ,auemail:[/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,"Invalid email address."]
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            // layer.alert(JSON.stringify(data.field), {
            //     title: '最终的提交信息'
            // });
            // return false;
        });


    });
</script>
</body>
</html>