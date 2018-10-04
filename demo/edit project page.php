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
        $pid = $row["id"];
        $pname = $row["pname"];
        $status = $row["status"];
        
        $catogery = $row['catogery'];
        $catogery_map = array("Category1", "Category2", "Category3");
        $catogery_name = $catogery_map[$catogery];
        //echo $catogery, "<br>", $catogery_name, $catogery_map[$catogery];

        $duedate = $row['duedate'];
        $responsiveid = $row["responsiveid"];
        $responsive_map = array("Lisa", "Jenny", "Ponny");
        $responsive_name = $responsive_map[$responsiveid];

        $tags = $row["tags"];
        $tags_map = array("aa", "cc", "dd");
        $tags_name = $tags_map[$tags];

        $description = $row["description"];
        $customized = $row["customized"];
    }
?>

    <form class="layui-form" action="../edit-project.php?id=<?php echo $pid ?>" method="post">
        PROJECT DETAILS<hr />
        <div class="layui-form-item">
            <label class="layui-form-label"  style="width: 120px; padding: 10px;">Project Name</label>
            <div class="layui-input-block" style="margin-left: 155px;">
                <input type="text" name="title" lay-filter="project-name" lay-verify="title" autocomplete="off" value="<?php echo $pname ?>" class="layui-input"> 
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
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Category</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="catogery" autocomplete="off" value="<?php echo $catogery ?>" class="layui-input"> 
        </div>
    </div>

    <div class="layui-form-item" style="display:block;">
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Date Due</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="date" value="<?php echo $duedate ?>" id="date" lay-verify="valid_date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Responsible User</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <select name="responsiveid" lay-verify="essential" lay-search="">
                <?php       
                        $json_string = file_get_contents('../json/user.json');   
                        $pid = json_decode($json_string, true);  
                        $data = $pid['data'];
                        $arr = array();
                        foreach($data as $x) {
                            $id = $x["uid"];
                            $name = $x['username'];
                            //echo $name;
                            if ($id == $responsiveid)
                                array_push($arr, "<option value=$id selected=''");
                            else
                                array_push($arr, "<option value=$id");
                            array_push($arr, ">$name</option>");
                        }
                        for ($i=0; $i < count($arr); $i=$i+1){
                            echo $arr[$i];
                        }
                 ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Tags</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <input type="text" name="tags" value="<?php echo $tags ?>" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Description</label>
        <div class="layui-input-block" style="margin-left: 155px;">
            <textarea name="description" class="layui-textarea"><?php echo $description ?></textarea>
        </div>
    </div>


    CUSTOMIZED INFORMATION<hr/>

    <div class="layui-form-item layui-form-text">
        <!-- <label class="layui-form-label" style="width: 120px; padding: 10px;">Customized Information</label> -->
        <div class="layui-input-block" style="margin: 0px 30px;">
            <textarea class="layui-textarea layui-hide" name="customized" lay-verify="content" id="LAY_demo_editor"><?php echo $customized ?></textarea>
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

        // form.val('project-name',{
        //     "placeholder": 
        // });

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