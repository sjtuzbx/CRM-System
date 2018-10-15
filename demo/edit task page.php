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
            <input type="text" name="startdate" id="startdate" lay-verify="date" value="<?php echo $startdate ?>" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Due</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="duedate" id="duedate" lay-verify="date" value="<?php echo $duedate ?>" autocomplete="off"
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
                    class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" style="display:block;">
            <label class="layui-form-label" style="width: 120px; padding: 10px;">Time</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <input type="time" class="layui-input" id="test4" placeholder="HH:mm:ss">
            </div>
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
                <textarea name="description" class="layui-textarea"> <?php echo $description ?> </textarea>
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

        <!-- <button class="layui-btn layui-btn-primary layui-icon-add-1" id='add_new_area' lay-filter="demo2"><span>Project
                Information</span></button>
        <table class="layui-table" id="link_project" style="display: none;">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Start Date</th>
                    <th>Statues</th>
                </tr>
            </thead>
            <tbody class="project_table" id='project_table'>
            </tbody>
        </table> -->

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
            elem: '#reminderdate'
            ,lang:'en'
        });
        var nowTime = new Date().valueOf();
            //日期
            var startTime=laydate.render({
                elem: '#startdate'
                , lang: 'en'
                ,min:nowTime
                ,done:function(value,dates){
                   endTime.config.min ={  
                         year:dates.year,   
                         month:dates.month-1, //关键  
                         date: dates.date,   
                };
                }              
            });
          var endTime=  laydate.render({
                elem: '#duedate'
                , lang: 'en'              
                ,done:function(value,datdatese){
                 startTime.config.max={  
                    year:dates.year,   
                    month:dates.month-1,//关键   
                    date: dates.date,              
            }
                }
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
            if(confirm('Confirm to Edit ?')){ //只有当点击confirm框的确定时，该层才会关闭
                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                parent.layer.close(index); //再执行关闭  
            }
        });

        //  $("#add_new_area").off().on("click", function () {
        //         var b = $("#link_project").css("display");//获取当前表格是否显示
        //         if (b == "none") {//如果不显示则执行显示事件并向服务器获取数据
        //             $("#link_project").show("300", function () {
        //                 $.ajax({
        //                     url: '../json/projects.json',
        //                     method: "POST",
        //                     data: {},
        //                     success: function (data) {
        //                         var json = JSON.parse(data);//将json数据变成数组
        //                         $.each(json.data, function (i2, e2) {//遍历e2
        //                             console.log(e2);//查看e2内容
        //                             //e2.[object]用于调取指定key,value值
        //                             $("#project_table").append('<tr><td>' + e2.pname + '</td><td>' + e2.datecreated + '</td><td>' + e2.status + '</td></tr>');

        //                             $('html,body').animate({ scrollTop: $('#project_table').offset().top }, 1000);
        //                         });
        //                     }
        //                 });
        //             });
        //         } else {
        //             $("#link_project").hide("300", function () {
        //                 // $("#link_project tr:not(:first)").empty("");//隐藏并清空表格防止反复提交ajax
        //             })
        //         }
        //     }
    });
	
	
</script>
</body>
</html>