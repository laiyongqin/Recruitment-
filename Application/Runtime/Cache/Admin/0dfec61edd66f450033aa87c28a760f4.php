<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>系统后台登陆</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/zhaoping/Public/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhaoping/Public/Admin/Css/Login/style.css">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div class="ch-container" style="padding: 0 20px">
    <div class="row">
        <div class="row">
            <div class="col-md-12 center login-header">
                <h1 style="color: rgb(49,126,172)">招聘系统后台</h1>
            </div>
            <!--/span-->
        </div><!--/row-->

        <div class="row">
            <div class="well col-md-5 center login-box">
                <div class="alert alert-info">
                    请输入用户名和密码.
                </div>
                <form class="form-horizontal" method="post" id="loginForm">
                    <fieldset>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="用户名">
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="密码">
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-group" style="margin-top: 20px">
                            <span class="input-group-addon">类型</span>
                            <select class="form-control" name="type" id="type">
                                <option value="2">人事部门</option>
                                <option value="1">用人部门</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <p class="center col-md-5">
                            <button type="button" class="btn btn-primary btn-lg btn-block" id="loginBtn">登录</button>
                        </p>
                    </fieldset>
                </form>
            </div>
            <!--/span-->
        </div><!--/row-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/zhaoping/Public/jquery-1.11.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/zhaoping/Public/Bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#loginBtn").click(function(){
            if($("#username").val().length == 0){
                alert('请填写用户名');
                return false;
            }
            if($("#password").val().length == 0){
                alert('请填写密码');
                return false;
            }
            $.post("/zhaoping/index.php/Admin/Login/loginCheck" ,{username:$("#username").val(),password:$("#password").val(),type:$("#type").val()},function(data,status){
                if(data['status'] == 1){
                    if(data['type'] == 2)
                        window.location.href = "/zhaoping/index.php/Admin/Content/index";
                    else
                        window.location.href = "/zhaoping/index.php/Department/Verify/index";
                }else{
                    alert(data['content']);
                }
            });
        });
    });
</script>
</body>
</html>