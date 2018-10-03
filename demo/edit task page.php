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
    if (isset($_GET["data"])){
        $json = $_GET["data"];
        $row = json_decode($json, true);
        $tid = $row["tid"];
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
		$relatedto = $row["relatedto"];

        $permission_map = array("Public Task", "Private Task");
        $permission_name = $permission_map[$catogery];
    }
?>

    <form class="layui-form" action="../edit-task.php?id=<?php echo $tid ?>" method="post">
        TASK DETAILS
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Task Name</label>
            <div class="layui-input-block" style="margin-left: 155px;">
                <input type="text" name="title" lay-filter="project-name" lay-verify="title" autocomplete="off" value="<?php echo $tname ?>" class="layui-input"> 
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Category</label>
            <div class="layui-input-inline" style="margin-left: 15px;"> 
                <select name="catogery" lay-verify="" lay-search="">

                    <?php       
                        $arr = array('<option value="1"', '>Email</option>',
                                    ' <option value="2"', '>Follow Up</option>',
                                '<option value="3"', '>Get Started</option>',
                            ' <option value="4"', '>Meeting</option>',
                            ' <option value="5"', '>Phone Call</option>',
                            ' <option value="6"', '>TO Do</option>',);
                        if ($tcatogery == "Email") $id = 0;
                        else if ($tcatogery == "Follow Up") $id = 2;
                        else if ($tcatogery == "Get Started") $id = 4;
                        else if ($tcatogery == "Meeting") $id = 6;
                        else if ($tcatogery == "Phone Call") $id = 8;
                        else if ($tcatogery == "TO Do") $id = 10;
        
                        $arr[$id] = $arr[$id] . ' selected=""';
                        for ($i=0; $i < count($arr); $i=$i+1){
                            echo $arr[$i];
                        }
                    
                    ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Started</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="startdate" id="date" lay-verify="date" value="<?php echo $startdate ?>" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Due</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="duedate" id="date" lay-verify="date" value="<?php echo $duedate ?>" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <br />
        ADDITIONAL INFORMATION
        <hr />
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Reminder</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="reminddate" id="date" lay-verify="date" value="<?php echo $reminddate ?>" autocomplete="off"
                    class="layui-input"><br /><input type="time" class="layui-input" id="test4" placeholder="HH:mm:ss">            </div>
        </div>


        <div class="layui-form-item" style="margin-bottom: 8px;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Progress</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <input type="text" name="progress" lay-verify="required" autocomplete="off" value="<?php echo $progress ?>" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Status</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <select name="status" lay-filter="aihao">
                     <?php       
                        $arr = array('<option value="0"', '>Not Started</option>',
                                        '<option value="1"', '>In Progress</option>',
                                    ' <option value="2"', '>Completed</option>',
                                '<option value="3"', '>Deferred</option>',
                            ' <option value="4"', '>Cancelled</option>');
                        if ($status == "Not Started") $id = 0;
                        else if ($status == "In Progress") $id = 2;
                        else if ($status == "Completed") $id = 4;
                        else if ($status == "Deferred") $id = 6;
                        else if ($status == "Cancelled") $id = 8;
        
                        $arr[$id] = $arr[$id] . ' selected=""';
                        for ($i=0; $i < count($arr); $i=$i+1){
                            echo $arr[$i];
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Priority</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <select name="priority" lay-filter="aihao">
                    <?php       
                        $arr = array('<option value="0"', '>Medium</option>',
                                        '<option value="1"', '>Low</option>',
                                    ' <option value="2"', '>High</option>');
                        if ($status == "Medium") $id = 0;
                        else if ($status == "Low") $id = 2;
                        else if ($status == "High") $id = 4;
                        $arr[$id] = $arr[$id] . ' selected=""';
                        for ($i=0; $i < count($arr); $i=$i+1){
                            echo $arr[$i];
                        }
                    ?>
                </select>
            </div>
        </div>
        <br />
        RELATED TO
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Related To</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <select name="projectid" id="project" lay-verify="required">
                    <?php       
                            $json_string = file_get_contents('../json/projects.json');   
                            $pid = json_decode($json_string, true);  
                            $data = $pid['data'];
                            $arr = array();
                            foreach($data as $x) {
                                $id = $x["id"];
                                $name = $x['pname'];
                                //echo $name;
                                if ($id == $relatedto)
                                    array_push($arr, "<option value=$id selected=''");
                                else
                                    array_push($arr, "<option value=$id");
                                array_push($arr, ">$name</option>");
                            }
                            echo "<option value=''> Please Choose </option>";
                            for ($i=0; $i < count($arr); $i=$i+1){
                                echo $arr[$i];
                            }
                    ?>
                </select>
            </div>
        </div>

        <br />
        DESCRIPTION INFORMATION
        <hr />

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Description</label>
            <div class="layui-input-block" style="margin-left: 155px;">
                <textarea name="description" value="<?php echo $description ?>" class="layui-textarea"></textarea>
            </div>
        </div>


        <br />
        PERMISSIONS
        <hr />
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Task Visibility</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <select name="permission" lay-filter="aihao">
                    <?php       
                        $arr = array('<option value="0"', '>Public Task</option>',
                                        '<option value="1"', '>Private Task</option>');
                        $id = $permission * 2;
                        $arr[$id] = $arr[$id] . ' selected=""';
                        for ($i=0; $i < count($arr); $i=$i+1){
                            echo $arr[$i];
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block" style="margin-left: 255px;">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">Save</button>
                <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
            </div>
        </div>
    </form>
<script>
    
    
    </script>
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

        //监听提交
        form.on('submit(demo1)', function(data){
            // layer.alert(JSON.stringify(data.field), {
            //     title: '最终的提交信息'
            // });
            //return false;
        });


    });
	
	
</script>
</body>
</html>