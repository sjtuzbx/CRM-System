<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="frame/layui/css/layui.css">
    <link rel="stylesheet" href="./frame/static/css/home-style.css">
    <link rel="icon" href="./img/grade_a.png">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="intro.css">
  <style>
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
  </style>  
</head>
<body>
    <?php 
        session_start();
        if (isset($_SESSION["admin"])){
            echo "admin";
            //echo $_SESSION["admin"];
            //echo "login successful";
        } else {
            echo "failed";
            header("location:login.php");
        }
    ?> 

<!-- layout admin -->
  <div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
      <!-- header -->
      <div class="layui-header my-header">
          <a href="https://www.grantsplusconsulting.com.au/"><div class="layui-logo">CRM Alimama</div></a>
      <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="index.php"><span style="font-family: 'imooc-icon';"></span><span> Home</span></a></li>
        <li class="layui-nav-item"><a href="project.php"><span style="font-family: 'imooc-icon';"></span><span> Projects</span></a></li>
        <li class="layui-nav-item"><a href="task.html"><span style="font-family: 'imooc-icon';"></span><span> Tasks</span></a></li>
        <li class="layui-nav-item"><a href="lead.html"><span style="font-family: 'imooc-icon';"></span><span> Leads</span></a></li>
        <li class="layui-nav-item"><a href="client.html"><span style="font-family: 'imooc-icon';"></span><span> Clients</span></a></li>
        <li class="layui-nav-item"><a href="e-mail.html"><span style="font-family: 'imooc-icon';"></span><span> E-mails</span></a></li>
        <li class="layui-nav-item"><a href="contact.html"><span style="font-family: 'imooc-icon';"></span><span> Contacts</span></a></li>
      

        <li class="layui-nav-item">
          <a href="javascript:;">More</a>
          <dl class="layui-nav-child">
		  <!--Need implement-->
            <dd><a href="">Recent Activity</a></dd>
            <dd><a href="wrap_calendar.html">Calendar</a></dd>
          </dl>
        </li>
      </ul>
      <ul class="layui-nav layui-layout-right" >
          <li class="layui-nav-item ">
              <a title="personal centre" href="personal center.html" style="font-family:'imooc-icon';"></a>
          </li>
          <li class="layui-nav-item">
              <a title="log out" href="login.php" style="font-family:'imooc-icon';"></a>
          </li>
          <li class="layui-nav-item">
              <a title="setting" href="setting.php" style="font-family:'imooc-icon';"></a>
          </li>
      </ul>
    </div>

      <!-- body -->
    <div class="layui-form">
    <div style="position:absolute; left:0px; width: 100%;">
        <div class="title"> Dashboard</div>
          <div class="bg">
            <div class="dashboard-row">
              <div id="project" class="item">
                <div style="height: 25px;width: 100%;"> 
                  <select name="dashboard1" lay-filter="dashboard1" style="width: 100%; color: #004476;">
                     <option value="0" selected="">Projects</option>
                     <option value="1">Clients</option>
                     <option value="2">Leads</option>
                     <option value="3">Tasks</option>
                     <option value="4">Contacts</option>
                     <option value="5">E-mails</option>
                  </select>
                </div>

                <table id="dateTable1" class="layui-hide" lay-filter="demo"></table>
              </div>
      
              <div id="client" class="item">
                <div style="height: 25px;width: 100%;"> 
                  <select name="dashboard2" lay-filter="dashboard2" style="width: 100%; color: #004476;">
                     <option value="0">Projects</option>
                     <option value="1" selected="">Clients</option>
                     <option value="2">Leads</option>
                     <option value="3">Tasks</option>
                     <option value="4">Contacts</option>
                     <option value="5">E-mails</option>
                  </select>
                </div>

                <table id="dateTable2" class="layui-hide" lay-filter="demo2"></table>
              </div>

              <div id="lead" class="item">
                  <div style="height: 25px;width: 100%;"> 
                  <select name="dashboard3" lay-filter="dashboard3" style="width: 100%; color: #004476;">
                     <option value="0">Projects</option>
                     <option value="1">Clients</option>
                     <option value="2" selected="">Leads</option>
                     <option value="3">Tasks</option>
                     <option value="4">Contacts</option>
                     <option value="5">E-mails</option>
                  </select>
                </div>
                <table id="dateTable3" class="layui-hide" lay-filter="demo3"></table>
              </div>
        </div>

      <div class="dashboard-row">
        <div id="task" class="item">
            <div style="height: 25px;width: 100%;"> 
              <select name="dashboard4" lay-filter="dashboard4" style="width: 100%; color: #004476;">
                 <option value="0">Projects</option>
                 <option value="1">Clients</option>
                 <option value="2">Leads</option>
                 <option value="3" selected="">Tasks</option>
                 <option value="4">Contacts</option>
                 <option value="5">E-mails</option>
              </select>
            </div>
            <table id="dateTable4" class="layui-hide" lay-filter="demo4"></table>
        </div>
      
        <div id="contact" class="item">
           <div style="height: 25px;width: 100%;"> 
              <select name="dashboard5" lay-filter="dashboard5" style="width: 100%; color: #004476;">
                 <option value="0">Projects</option>
                 <option value="1">Clients</option>
                 <option value="2">Leads</option>
                 <option value="3">Tasks</option>
                 <option value="4" selected="">Contacts</option>
                 <option value="5">E-mails</option>
              </select>
            </div>
            <table id="dateTable5" class="layui-hide" lay-filter="demo5"></table>
        </div>

        <div id="client" class="item">
            <div style="height: 25px;width: 100%;"> 
              <select name="dashboard6" lay-filter="dashboard6" style="width: 100%; color: #004476;">
                 <option value="0">Projects</option>
                 <option value="1">Clients</option>
                 <option value="2">Leads</option>
                 <option value="3">Tasks</option>
                 <option value="4">Contacts</option>
                 <option value="5" selected="">E-mails</option>
              </select>
            </div>
            <table id="dateTable6" class="layui-hide" lay-filter="demo6"></table>
        </div>
    </div>
  </div>
</div>


  </div>   
  </div> 
  <script type="text/javascript" src="frame/layui/layui.js"></script>
  <script type="text/javascript" src="./frame/static/js/vip_comm.js"></script>
  <script type="text/javascript">
    // layui方法
    layui.use(['table', 'form', 'layer', 'vip_table'], function () {
        var table = layui.table;
        // 操作对象
        var form = layui.form
        , table = layui.table
        , layer = layui.layer
        , vipTable = layui.vip_table
        , $ = layui.jquery;

        var cwidth = window.innerWidth/3-30;
		        
		window.onresize=function(){  
		 	option0.width = window.innerWidth/3-30
		 	option1.width = window.innerWidth/3-30
		 	option2.width = window.innerWidth/3-30
		 	option3.width = window.innerWidth/3-30
		 	option4.width = window.innerWidth/3-30
		 	option5.width = window.innerWidth/3-30
		 	for (var i=0;i<6;i++)
	        {
	            var tmp = options[tindex[i]];
	            tmp["elem"] = index[i];
	            table.render(tmp);
	        }
		} 

        var option0 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2    //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
            {checkbox: false, sort: true, fixed: true, space: true}
                // , {field: 'id', title: '', width: 80}
                , {field: 'pname', title: 'Name' ,width: cwidth/4}
                , {field: 'status', title: 'Status', width: cwidth/4}
                , {field: 'username', title: 'Responsible User', width: cwidth/4}
                , {field: 'duedate', title: 'Date Due', width: cwidth/4}
                ]]
                , id: 'dataCheck'
                , url: './json/projects.json'
                , method: 'get'
                , page: true
          };

        var option1 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2    //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
                {checkbox: false, sort: true, fixed: true, space: true}
                // , {field: 'id', title: '', width: 80}
                , {field: 'cname', title: 'Name' ,width: cwidth/4}
                , {field: 'cstatus', title: 'Status', width: cwidth/4}
                , {field: 'cphone', title: 'Phone(Office)', width: cwidth/4}
                , {field: 'cdatecreated', title: 'Date Created', width: cwidth/4}
            ]]
            , id: 'dataCheck'
            , url: './json/client.json'
            , method: 'get'
            , page: true
        };

        var option2 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2   //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
                {checkbox: false, sort: true, fixed: true, space: true}
                , {field: 'lname', title: 'Name' ,width: cwidth/4}
                , {field: 'phonenumber', title: 'Contact Number(Phone)', width: cwidth/4}
                , {field: 'email', title: 'Email Address', width: cwidth/4}
                , {field: 'ldatecreated', title: 'Date Created', width: cwidth/4}
            ]]
            , id: 'dataCheck'
            , url: './json/lead.json'
            , method: 'get'
            , page: true
        };

        var option3 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2   //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
                {checkbox: false, sort: true, fixed: true, space: true}
                , {field: 'tname', title: 'Task Name' ,width: cwidth/4}
                , {field: 'duedate', title: 'Date Due', width: cwidth/4}
                , {field: 'tresponsiveid', title: 'Responsible User', width: cwidth/4}
                , {field: 'username', title: 'Task Owner', width: cwidth/4}
            ]]
            , id: 'dataCheck'
            , url: './json/task.json'
            , method: 'get'
            , page: true
        };

        var option4 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2  //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
                {checkbox: false, sort: true, fixed: true, space: true}
                , {field: 'firstname', title: 'First Name', width: cwidth/4}
                , {field: 'lastname', title: ' Last Name' ,width: cwidth/4}
                , {field: 'ctphone', title: 'Contact Number(Phone)', width: cwidth/4}
                , {field: 'ctemail', title: 'Email Address', width: cwidth/4}
            ]]
            , id: 'dataCheck'
            , url: './json/contact.json'
            , method: 'get'
            , page: true
        };
        
        var option5 = {
            elem: '#dateTable1'                  //指定原始表格元素选择器（推荐id选择器）
            , height: vipTable.getFullHeight() / 2  //容器高度
            , width: cwidth
            , cols: [[                  //标题栏
                {checkbox: false, sort: true, fixed: true, space: true}
            ]]
            , id: 'dataCheck'
            //, url: './json/contact.json'
            //, method: 'get'
            , page: true
        };

        var options = new Array(option0, option1, option2, option3, option4, option5);
        var index = new Array('#dateTable1', '#dateTable2', '#dateTable3', '#dateTable4', '#dateTable5', '#dateTable6');
		var tindex = [0,1,2,3,4,5];

        form.on('select(dashboard1)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[0] = obj.value
            tmp["elem"] = index[0];
            table.render(options[obj.value]);
        });

        form.on('select(dashboard2)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[1] = obj.value
            tmp["elem"] = index[1];
            table.render(options[obj.value]);
        });

        form.on('select(dashboard3)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[2] = obj.value
            tmp["elem"] = index[2];
            table.render(options[obj.value]);
        });

        form.on('select(dashboard4)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[3] = obj.value;
            tmp["elem"] = index[3];
            table.render(options[obj.value]);
        });

        form.on('select(dashboard5)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[4] = obj.value;
            tmp["elem"] = index[4];
            table.render(options[obj.value]);
        });

        form.on('select(dashboard6)', function (obj) {
            //alert(obj.value);
            var tmp = options[obj.value];
            tindex[5] = obj.value;
            tmp["elem"] = index[5];
            table.render(options[obj.value]);
        });

        // 表格渲染
        for (var i=0;i<6;i++)
        {
            var tmp = options[i];
            tmp["elem"] = index[i];
            table.render(tmp);
        }
        //var tableIns = table.render(option0);

        // 获取选中行
  
        table.on('checkbox(dataCheck)', function (obj) {
            layer.msg('123');
            console.log(obj.checked); //当前是否选中状态
            console.log(obj.data); //选中行的相关数据
            console.log(obj.type); //如果触发的是全选，则为：all，如果触发的是单选，则为：one
          });
          //监听表格复选框选择
          table.on('checkbox(demo)', function(obj){
            console.log(obj)
          });
      });
  
    </script>
</body>
</html>