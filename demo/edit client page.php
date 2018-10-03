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
<?php 
    if (isset($_GET["data"])){
        $json = $_GET["data"];
        $row = json_decode($json, true);

        $cid = $row['cid'];
        $name = $row['cname'];
        $status = $row['status']; 

        $siteaddress = $row['siteaddress'];
        $postaladdress = $row['postaladdress'];
        $phone = $row['cphone'];
        $clienttype = $row['clienttype'];
    }
?>
<body class="body">
    <form class="layui-form" action="../edit-client.php?id=<?php echo $cid ?>" method="post">
        CLIENT DETAILS<hr />
        <div class="layui-form-item">
            <label class="layui-form-label"  style="width: 120px; padding: 10px;">Client Name</label>
            <div class="layui-input-inline" style="margin-left: 15px;">
                <input type="text" name="name" lay-verify="required" autocomplete="off" value="<?php echo $name; ?>" class="layui-input">
            </div>
        </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width: 120px; padding: 10px;">Client Status</label>
        <div class="layui-input-inline" style="margin-left: 15px;">
            <select name="status" id="status" lay-filter="aihao">
             <!--  <option value=""></option> -->
             <?php 

             	if ($status == "Lapsed"){
             		echo '<option value="0" selected="">Lapsed</option> </br>
             <option value="1">Active</option>';
             	}else {
             		echo '<option value="0">Lapsed</option> </br>
             <option value="1" selected="">Active</option>';
             	}
             ?>
             <!--<option value="0">Lapsed</option>
             <option value="1" selected="">Active</option>-->
         </select>
     </div>
 </div>
 <div class="layui-form-item">
    <label class="layui-form-label"  style="width: 120px; padding: 10px;">Site Address</label>
    <div class="layui-input-block" style="margin-left: 155px;">
        <input type="text" name="siteaddress" lay-verify="title" autocomplete="off" value="<?php echo $siteaddress; ?>" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label class="layui-form-label"  style="width: 120px; padding: 10px;">Postal Address</label>
    <div class="layui-input-block" style="margin-left: 155px;">
        <input type="text" name="postaladdress" lay-verify="title" autocomplete="off" value="<?php echo $postaladdress; ?>" class="layui-input">
    </div>
</div>

<div class="layui-form-item" style="display:block;">
    <label class="layui-form-label"  style="width: 120px; padding: 10px;">Phone</label>
    <div class="layui-input-inline" style="margin-left: 15px;">
        <input type="text" name="phone" lay-verify="phone" autocomplete="off" value="<?php echo $phone; ?>" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label class="layui-form-label" style="width: 120px; padding: 10px;">Client Type</label>
    <div class="layui-input-inline" style="margin-left: 15px;">
        <select name="type" lay-verify="required" lay-search="">
            <?php       
                $arr = array('<option value="0"', '>Individual</option>',
                            ' <option value="1"', '>Organisation</option>');
                if ($clienttype == "Individual") $id = 0;
                else if ($clienttype == "Organisation") $id = 2;      

                $arr[$id] = $arr[$id] . ' selected=""';
                echo '<option value="">Please Choose</option>';
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

<script src="../frame/layui/layui.js" charset="utf-8"></script>
<!-- <script src="../frame/layui/layui.all.js" charset="utf-8"></script> -->
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,layedit = layui.layedit
        ,laydate = layui.laydate
        ,$ = layui.jquery;

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
                    return 'Project name must be filled';
                }
            }
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
            //return false;
        });
        
        //console.log($status)
    });
</script>
</body>
</html>