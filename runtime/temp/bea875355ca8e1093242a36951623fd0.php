<?php /*a:4:{s:49:"D:\apps\thinkphp5\app\admin\view\login\login.html";i:1560095192;s:48:"D:\apps\thinkphp5\app\admin\view\public\css.html";i:1557754736;s:49:"D:\apps\thinkphp5\app\admin\view\public\foot.html";i:1557754736;s:51:"D:\apps\thinkphp5\app\admin\view\public\script.html";i:1558023065;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php if(!empty($title)): ?><?php echo htmlspecialchars($title); ?> - Dashboard<?php else: ?>Login<?php endif; ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Dashboard" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/static/admin/img/favicon.png" type="image/x-icon">
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link href="/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/admin/css/demo.min.css" rel="stylesheet" />
    <link href="/static/admin/css/typicons.min.css" rel="stylesheet" />
    <link href="/static/admin/css/popdivs.css" rel="stylesheet" />
    <link href="/static/admin/css/animate.min.css" rel="stylesheet" />
    <link href="/static/admin/layui/css/layui.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <script src="/static/admin/ueditor/ueditor.config.js"></script>
    <script src="/static/admin/ueditor/ueditor.all.min.js"></script>
    <script src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script src="/static/admin/js/skins.min.js"></script>
</head>
<body>
<link href="/static/admin/slidercaptcha/slidercaptcha.css" rel="stylesheet">
<style>
    .login-container .loginbox{
        height: 513px !important;
    }
</style>
<div class="login-container animated fadeInDown">
    <form action="" method="post">
    <div class="loginbox bg-white">
        <div class="loginbox-title">SIGN IN</div>
        <div class="loginbox-social">
            <div class="social-title ">Connect with Your Social Accounts</div>
            <div class="social-buttons">
                <a href="" class="button-facebook">
                    <i class="social-icon fa fa-facebook"></i>
                </a>
                <a href="" class="button-twitter">
                    <i class="social-icon fa fa-twitter"></i>
                </a>
                <a href="" class="button-google">
                    <i class="social-icon fa fa-google-plus"></i>
                </a>
            </div>
        </div>
        <div class="loginbox-or">
            <div class="or-line"></div>
            <div class="or">OR</div>
        </div>
        <div class="loginbox-textbox">
            <input type="text" class="form-control" placeholder="username" name="username"/>
        </div>
        <div class="loginbox-textbox">
            <input type="password" class="form-control" placeholder="Password" name="password" />
        </div>
        <div class="loginbox-forgot">
            <a href="#" onclick="forgotPass()">Forgot Password?</a>
        </div>
        <div class="loginbox-textbox">
            <div id="captcha"></div>
        </div>
    </div>
        <!--<input type="button" class="btn btn-primary btn-block" value="Login">-->
</form>
</div>
<script src="/static/admin/js/jquery-2.0.3.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/admin/js/beyond.min.js"></script>


<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    //清除缓存
    $("#trash").on('click',function(){
        var url = "<?php echo url('admin/index/clear'); ?>";
        //询问框
        layer.confirm('您确定要清除吗？', {
                btn: ['确定','取消'] //按钮
            },
            function(){
                $.get(url,function(info){
                    if(info.code === 1){
                        setTimeout(function () {location.href = info.url;}, 1000);
                    }
                    layer.msg(info.msg);
                });
            },
            function(){});
    });
    //增加页面
    $('#add').on('click', function(){
        var addurl = $(this).attr("addurl");
        var html = $(this).prop("title");
        layer.open({
            type: 2,
            title: html,
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area : ['800px' , '650px'],
            content: addurl
        });
    });
    //修改页面
    $('.update').on('click',function(){
        var updateurl = $(this).attr("updateurl");
        var html = $(this).prop("title");
        layer.open({
            type: 2,
            title: html,
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area : ['800px' , '700px'],
            content: updateurl
        });
    });
    $('.reply').on('click',function(){
        var updateurl = $(this).attr("updateurl");
        var html = $(this).prop("title");
        layer.open({
            type: 2,
            title: html,
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area : ['700px' , '350px'],
            content: updateurl
        });
    });

    //删除
    $('.delete').on('click',function(){
        var deleteurl = $(this).attr("deleteurl");
        layer.confirm('确定要删除吗？',{
            btn:['确定','取消'],
            shade: false
        },function(){
            $.ajax({
                type:"POST",
                dataType:"json",
                url:deleteurl,
                success: function (res) {
                    if(res.status == 1){
                        layer.msg(res.msg,{icon: 1});
                        setTimeout(function() {
                            window.parent.location.reload();
                            // window.location.href=res.url;
                        }, 600);
                    }else{
                        layer.msg(res.msg,{icon: 2});
                    }
                }
            });
        },function(){
            layer.msg('取消了删除！', {icon: 2});
        });
    });
    $('.replydelete').on('click',function(){
        var deleteurl = $(this).attr("deleteurl");
        layer.confirm('确定要删除吗？',{
            btn:['确定','取消'],
            shade: false
        },function(){
            $.ajax({
                type:"POST",
                dataType:"json",
                url:deleteurl,
                success: function (res) {
                    if(res.status == 1){
                        layer.msg(res.msg,{icon: 1});
                        setTimeout(function() {
                            self.location.reload();
                            layer.close(layer.index);
                        }, 600);
                    }else{
                        layer.msg(res.msg,{icon: 2});
                    }
                }
            });
        },function(){
            layer.msg('取消了删除！', {icon: 2});
        });
    });

   function SaveInfoAdd(){
        var formData =$("#add_form").serialize();
        var url = $("#add_form").attr("action-url");
        $.ajax({
            dataType:'json',
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            success: function(res) {
                if(res.status == 1){
                    layer.msg(res.msg,{icon: 1});
                    setTimeout(function() {
                        window.parent.location.reload();
                        layer.close(layer.index);
                    }, 800);
                }else{
                    layer.msg(res.msg,{icon: 5});
                }
            }
        });
    }

    function SaveInfoEdit(){
        var formData =$("#edit_form").serialize();
        var url = $("#edit_form").attr("action-url");
        $.ajax({
            dataType:'json',
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            success: function(res) {
                if(res.status == 1){
                    layer.msg(res.msg,{icon: 1});
                    setTimeout(function() {
                        window.parent.location.reload();
                        layer.close(layer.index);
                    }, 800);
                }else{
                    layer.msg(res.msg,{icon: 5});
                    // layer.msg(res.msg,{anim: 5});
                }
            }
        });
    }
	//字符串截取
    $(".table tr td.content").each(function(i){
        if($(this).text().length>80){
            $(this).attr("title",$(this).text());
            var text = $(this).text().substring(0,80)+"...";
            $(this).text(text);
        }
    });

    //排序
    $("#shiny").on('click',function(){
        // var data = $("#form").serialize();
        var data = $(".sort").serialize();
        var url = $(this).attr("url");
          $.ajax({
            type:"POST",
            dataType:"json",
            url:url,
            data:data,
            success:function(res){
                if(res.status == 1){
                    layer.msg(res.msg,{icon: 1});
                    setTimeout(function() {
                        window.parent.location.reload();
                        // layer.close(layer.index);
                    }, 800);

                }else{
                    layer.msg(res.msg,{icon: 5});
                }
            }
        });
    });

    //发布/推荐逻辑
    $(".fabu").on('click',function(){
        var url = $(this).attr('fabuurl');
         $.ajax({
            type:"POST",
            dataType:"json",
            url:url,
            success:function(res){
                if(res.status == 1){
                    layer.msg(res.msg,{icon: 1});
                    setTimeout(function() {
                        window.parent.location.reload();
                        // layer.close(layer.index);
                    }, 800);

                }else{
                    layer.msg(res.msg,{icon: 5});
                }
            }
        });
    });

    //搜索
    $("input[name=key]").keyup(function(){
        var key = $("input[name=key]").val();
        $("table tr:not(#thead)").hide().filter(':contains("'+key+'")').show();
    });
/*    $(".search").on('click',function(){
         var key = $("input[name=key]").val();
         $("table tr:not(#thead)").hide().filter(':contains("'+key+'")').show();

    });*/
   /* $("input[name=key]").keyup(function(){
        var key = $("input[name=key]").val();
        var url = $(this).attr("searchurl");
        var myReg = /^[\u4e00-\u9fa5]+$/;
        if (myReg.test(key)) {
            $.ajax({
                dataType:"json",
                url:url,
                data:{key:key},
                success:function(data){
                    if(data.status == 1){
                        var data = data.msg;
                        // console.log(data);
                        for(i in data){
                            $("table tr:not(#thead)").hide();
                            var item =
                                "<tr>" +
                                "<td class='text-center'>" +
                                "<label>" +
                                "<input type='checkbox' name='id[]' value="+ data[i].id +" class='inverted sck'>" +
                                "<span class='text' style='cursor: pointer'></span>" +
                                "</label>" +
                                "</td>" +
                                "<td align='center'>"+ data[i].id +"</td>" +
                                "<td align='center'>"+ data[i].title +"</td>" +
                                "<td align='center'>"+data[i].desc +"</td>" +
                                "<td align='center'>"+ data[i].catename +"</td>" +
                                "<td align='center'><img src="+ data[i].pic +" alt='' height='50' class='src_view'></td>" +
                                "<td align='center' class='content' align='center'>"+ data[i].content +"</td>" +
                                "<td align='center'><a href='javascript:void(0)' title='修改' class='btn btn-info btn-xs edit update' onclick=window.location='/admin/article/edit/id/"+  data[i].id+".html'><i class='fa fa-edit'></i> Edit</a>" +
                                "<a href='javascript:void(0)' title='删除' class='btn btn-danger btn-xs delete' onclick=window.location='/admin/article/delete/id/"+  data[i].id+".html'><i class='fa fa-trash-o'></i> Delete</a></td>";
                            $("table").append(item);
                        }
                    }
                }
            });
        }
    });*/
    //checkbox反选
    /**
     * 一般如果是标签自身自带的属性，我们用prop方法来获取；
     * 如果是自定义的属性，我们用attr方法来获取
     */
    $("#fck").click(function(){
        $(".sck").each(function(){
            $(this).prop('checked',!$(this).prop('checked'));
        })
    });

    UE.getEditor('content',{
        initialFrameWidth:'100%',
        initialFrameHeight:'100%',
        toolbars: [[
            'link', //超链接
            'unlink', //取消链接
            '|',
            'forecolor', //字体颜色
            'backcolor', //背景色
            'fontfamily', //字体
            'fontsize', //字号
            '|',
            'bold', //加粗
            'italic', //斜体
            'underline', //下划线
            'strikethrough', //删除线
            '|',
            'formatmatch', //格式刷
            'removeformat', //清除格式
            '|',
            'insertorderedlist', //有序列表
            'insertunorderedlist', //无序列表
            '|',
            'inserttable', //插入表格
            'paragraph', //段落格式
            'insertimage', //duo图上传
            'imagecenter', //居中
            'attachment', //附件

            '|',
            'justifyleft', //居左对齐
            'justifycenter', //居中对齐
            'horizontal', //分隔线
            '|',
            'blockquote', //引用
            'insertcode', //代码语言

            '|',
            'source', //源代码
            'preview', //预览
            'fullscreen', //全屏
            'emotion',
            'insertvideo',
        ]]
    });
</script>
<script>
    // If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
    $(window).bind("load", function () {
        layer.photos({
            photos: '.layer_view'
            ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
        });
    });

</script>



<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="/static/admin/slidercaptcha/slidercaptcha.js"></script>
<script>
    function forgotPass(){
        layer.msg("你食屎呀！密码都记木住 - -!!",{icon: 6});
    }
    $('#captcha').sliderCaptcha({
        width: 230,
        repeatIcon: 'fa fa-redo',
        setSrc: function () {
            return 'https://picsum.photos/200/300?random=' + Math.round(Math.random() * 50);
        },
        onSuccess: function () {
            var username = $("input[type=text]").val();
            var passwords = $("input[type=password]").val();
            $.ajax({
                type:"POST",
                dateType:"json",
                url:"<?php echo url('login/login'); ?>",
                data:{username:username,password:passwords},
                success: function(res){
                    console.log(res);
                    if(res.status != 1){
                        layer.msg(res.msg,{icon: 2});
                    }else{
                        layer.msg(res.msg,{icon: 1});
                        setTimeout(function(){
                            window.location.href="<?php echo url('index/index'); ?>";
                        },800);
                    }
                }
            });
        },
        offset: 10,
    });
    $("input[type=button]").on('click',function(){
        var username = $("input[type=text]").val();
        var passwords = $("input[type=password]").val();

        $.ajax({
            type:"POST",
            dateType:"json",
            url:"<?php echo url('login/login'); ?>",
            data:{username:username,password:passwords},
            success: function(res){
                if(res.status != 1){
                    layer.msg(res.msg,{icon: 2});
                }else{
                    layer.msg(res.msg,{icon: 1});
                    setTimeout(function(){
                        window.location.href="<?php echo url('index/index'); ?>";
                    },800);
                }
            }
        });
    });
</script>
</body>
<!--Body Ends-->
</html>
