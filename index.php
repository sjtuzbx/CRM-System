<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Project</title>
    <link rel="stylesheet" href="frame/layui/css/layui.css">
    <link rel="stylesheet" href="./frame/static/css/style.css">
    <link rel="icon" href="./frame/static/image/code.png">
    <link rel="stylesheet" href="project.css">
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
            //echo "admin";
            //echo $_SESSION["admin"];
            //echo "login successful";
        } else {
            //echo "failed";
            header("location:login.php");
        }
    ?> 

    <!-- layout admin -->
    <div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
        <!-- header -->
        <div class="layui-header my-header">
            <a href="https://www.grantsplusconsulting.com.au/"><div class="layui-logo">CRM Alimama
            </div></a>
            <ul class="layui-nav layui-layout-left">
              <li class="layui-nav-item"><a href="home.php"><span style="font-family: 'imooc-icon';"></span><span> Home</span></a></li>
              <li class="layui-nav-item"><a href="index.php"><span style="font-family: 'imooc-icon';"></span><span> Projects</span></a></li>
              <li class="layui-nav-item"><a href="task.html"><span style="font-family: 'imooc-icon';"></span><span> Tasks</span></a></li>
              <li class="layui-nav-item"><a href="lead.html"><span style="font-family: 'imooc-icon';"></span><span> Leads</span></a></li>
              <li class="layui-nav-item"><a href="client.html"><span style="font-family: 'imooc-icon';"></span><span> Clients</span></a></li>
              <li class="layui-nav-item"><a href="e-mail.html"><span style="font-family: 'imooc-icon';"></span><span> E-mails</span></a></li>
              <li class="layui-nav-item"><a href="contact.html"><span style="font-family: 'imooc-icon';"></span><span> Contacts</span></a></li>
              

              <li class="layui-nav-item">
                <a href="javascript:;">More</a>
                <dl class="layui-nav-child">
                  <dd><a href="">Recent Activity</a></dd>
                  <dd><a href="">Calendar</a></dd>
              </dl>
          </li>
      </ul>
      <ul class="layui-nav layui-layout-right" >
        <li class="layui-nav-item ">
            <a title="personal centre" href="#" style="font-family:'imooc-icon';"></a>
        </li>
        <li class="layui-nav-item">
            <a title="log out" href="login.php" style="font-family:'imooc-icon';"></a>
        </li>
        <li class="layui-nav-item">
            <a title="setting" href="#" style="font-family:'imooc-icon';"></a>
        </li>
        </ul>
    </div>
<!-- side -->
    <div class="layui-side my-side">
        <div class="layui-side-scroll">
            <!-- 左侧主菜单添加选项卡监听 -->
            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
               <li class="layui-nav-item  layui-nav-itemed">
                <a href="javascript:;"><i class="layui-icon">&#xe620;</i>Projects</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="demo/table layer project.html"><i class="layui-icon">&#xe621;</i>All Projects</a></dd>
                    <dd><a href="javascript:;" href-url="demo/table layer project.html"><i class="layui-icon">&#xe621;</i>Recent Projects</a></dd>
                    <dd><a href="javascript:;" href-url="demo/table.html"><i class="layui-icon">&#xe621;</i>My Projects</a></dd>
                    
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon">&#xe628;</i>More</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="demo/login.php"><i class="layui-icon">&#xe621;</i>Lisa</a></dd>                 
                </dl>
            </li>

            </ul>
        </div>
    </div>

    <!-- body -->
    <div class="layui-body my-body">
        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>All Projects</span></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="iframe" src="demo/table layer project.html" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

<script type="text/javascript" src="frame/layui/layui.js"></script>
<script type="text/javascript" src="./frame/static/js/vip_comm.js"></script>

</body>
</html>