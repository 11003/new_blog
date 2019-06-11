<?php /*a:10:{s:51:"D:\apps\thinkphp5\app\admin\view\article\index.html";i:1556639987;s:49:"D:\apps\thinkphp5\app\admin\view\public\base.html";i:1557754736;s:48:"D:\apps\thinkphp5\app\admin\view\public\css.html";i:1557754736;s:52:"D:\apps\thinkphp5\app\admin\view\public\loading.html";i:1557754736;s:48:"D:\apps\thinkphp5\app\admin\view\public\nav.html";i:1560065380;s:51:"D:\apps\thinkphp5\app\admin\view\public\serach.html";i:1557754736;s:49:"D:\apps\thinkphp5\app\admin\view\public\left.html";i:1557926595;s:49:"D:\apps\thinkphp5\app\admin\view\public\head.html";i:1558099734;s:49:"D:\apps\thinkphp5\app\admin\view\public\foot.html";i:1557754736;s:51:"D:\apps\thinkphp5\app\admin\view\public\script.html";i:1558023065;}*/ ?>
<!DOCTYPE html>
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

<!--<div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/static/admin/img/logo.png" alt="" />
                    </small>
                </a>
            </div>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class=" dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                <i class="icon fa fa-warning"></i>
                            </a>
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-phone bg-themeprimary white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Skype meeting with Patty</span>
                                                <span class="description">01:00 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o themeprimary"></i>
                                                <span class="description">office</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-check bg-darkorange white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Uncharted break</span>
                                                <span class="description">03:30 pm - 05:15 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-clock-o darkorange"></i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-gift bg-warning white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Kate birthday party</span>
                                                <span class="description">08:30 pm</span>
                                            </div>
                                            <div class="notification-extra">
                                                <i class="fa fa-calendar warning"></i>
                                                <i class="fa fa-clock-o warning"></i>
                                                <span class="description">at home</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <div class="notification-icon">
                                                <i class="fa fa-glass bg-success white"></i>
                                            </div>
                                            <div class="notification-body">
                                                <span class="title">Dinner with friends</span>
                                                <span class="description">10:30 pm</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer ">
                                    <span>
                                        Today, March 28
                                    </span>
                                    <span class="pull-right">
                                        10°c
                                        <i class="wi wi-cloudy"></i>
                                    </span>
                                </li>
                            </ul>
                            <!--/Notification Dropdown-->
                        </li>
                        <li>
                            <a class="wave in dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                <i class="icon fa fa-envelope"></i>
                                <span class="badge"><?php echo htmlspecialchars($comment_count); ?></span>
                            </a>
                            <!--Messages Dropdown-->
                            <?php if(!empty($comment)): ?>
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                <?php foreach($comment as $item):?>
                                <li>
                                    <a href="<?php echo url('comment/index'); ?>">
                                        <img src="/static/admin/img/avatars/bing.png" class="message-avatar">
                                        <div class="message">
                                            <span class="message-sender">
                                               <?php echo $item['user_name']?>
                                            </span>
                                            <span class="message-time">
                                                <?php echo transfer_time($item['create_time'])?>
                                            </span>
                                            <span class="message-subject">
                                                <?php echo $item['address']?>
                                            </span>
                                            <span class="message-body">
                                                <?php echo $item['user_comment']?>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>
                            <!--/Messages Dropdown-->
                        </li>

                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                                <i class="icon fa fa-tasks"></i>
                                <span class="badge">4</span>
                            </a>
                            <!--Tasks Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-tasks dropdown-arrow ">
                                <li class="dropdown-header bordered-darkorange">
                                    <i class="fa fa-tasks"></i>
                                    4 Tasks In Progress
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Account Creation</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:65%" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Profile Data</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:35%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Updating Resume</span>
                                            <span class="pull-right">75%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:75%" class="progress-bar progress-bar-darkorange"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Adding Contacts</span>
                                            <span class="pull-right">10%</span>
                                        </div>

                                        <div class="progress progress-xs">
                                            <div style="width:10%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="#">
                                        See All Tasks
                                    </a>
                                    <button class="btn btn-xs btn-default shiny darkorange icon-only pull-right"><i class="fa fa-check"></i></button>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="<?php echo htmlspecialchars($avatar); ?>">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo htmlspecialchars(app('request')->session('username')); ?> Stevenson</span></span></h2>
                                </section>
                            </a>
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a><?php echo htmlspecialchars(app('request')->session('username')); ?> Stevenson</a></li>
                                <li class="email"><a><?php echo htmlspecialchars(app('request')->session('username')); ?>.Stevenson@live.com</a></li>
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <img src="<?php echo htmlspecialchars($avatar); ?>" class="avatar">
                                        <span class="caption">Change Photo</span>
                                    </div>
                                </li>
                                <li class="edit">
                                    <a href="<?php echo url('admin/edit',array('id'=>app('request')->session('id'))); ?>" class="pull-right">修改</a>
                                </li>
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/static/admin/css/skins/blue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/static/admin/css/skins/azure.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/static/admin/css/skins/teal.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/static/admin/css/skins/green.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/static/admin/css/skins/orange.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/static/admin/css/skins/pink.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/static/admin/css/skins/darkred.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/static/admin/css/skins/purple.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/static/admin/css/skins/darkblue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/static/admin/css/skins/gray.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/static/admin/css/skins/black.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/static/admin/css/skins/deepblue.min.css"></a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('login/logout'); ?>">
                                        Sign out  <i class="glyphicon glyphicon-log-out"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                    </div><div class="setting-container">
                        <label>
                            <input type="checkbox" id="checkbox_fixednavbar">
                            <span class="text">Fixed Navbar</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedsidebar">
                            <span class="text">Fixed SideBar</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                            <span class="text">Fixed BreadCrumbs</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedheader">
                            <span class="text">Fixed Header</span>
                        </label>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
    </div>

<div class="main-container container-fluid">
    <div class="page-container">
        <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput" />
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">    <li>        <a href="/" target="_blank">            <i class="menu-icon glyphicon glyphicon-home"></i>            <span class="menu-text"> Dashboard </span>        </a>    </li>    <?php if(!empty($node)): if(is_array($node) || $node instanceof \think\Collection || $node instanceof \think\Paginator): if( count($node)==0 ) : echo "" ;else: foreach($node as $key=>$vo): if(authList($vo['name'])): ?>         <li class="<?php if($controller ==  $vo['name']): ?> open <?php endif; ?>">            <a href="<?php echo htmlspecialchars($vo['href']); ?>" class="menu-dropdown">                <i class="menu-icon fa <?php echo htmlspecialchars($vo['style']); ?>"></i>                <span class="menu-text"><?php echo htmlspecialchars($vo['title']); ?></span>                <i class="menu-expand"></i>            </a>            <ul class="submenu" <?php if($url == $vo['href']): ?> style="display: block;" <?php endif; ?>>            <?php if(!empty($vo['child'])): if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): if( count($vo['child'])==0 ) : echo "" ;else: foreach($vo['child'] as $key=>$v): ?>                <li class="<?php if($url ===  $v['href']): ?> active <?php endif; ?>">                    <a href="<?php echo htmlspecialchars($v['href']); ?>">                        <span class="menu-text"><?php echo htmlspecialchars($v['title']); ?></span>                        <i class="menu-expand"></i>                    </a>                </li>            <?php endforeach; endif; else: echo "" ;endif; ?>            <?php endif; ?>            </ul>        </li>        <?php endif; ?>    <?php endforeach; endif; else: echo "" ;endif; ?>    <?php endif; ?></ul>
    <!-- /Sidebar Menu -->
</div>
        <div class="page-content">
            <div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo url('index/index'); ?>">Home</a>
        </li>
        <li class="active"><?php echo htmlspecialchars($title); ?></li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Hello,<?php echo htmlspecialchars(app('request')->session('username')); ?>! 
            现在：<?php echo date('Y-m-d H:i'); ?>
        </h1>
    </div>
    <!--Header Buttons-->

    <div class="header-buttons">

        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
        <a class="refresh" id="trash" title="清除缓存" href="#">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
        <a class="sidebar" title="图标库"  href="<?php echo url('conf/awesome'); ?>">
            <i class="fa fa-apple"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
            
<!-- Page Body -->

<div class="page-body">

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="col-md-3">
                        <input type="text" name="article_key" class="form-control" placeholder="Search">
                    </div>
                    <div class="flip-scroll">
                        <form action="" method="post" id="form">
                            <input class="btn btn-sm btn-primary article_search" searchurl="<?php echo url('article/index'); ?>" value="搜索" type="button">

                            <?php if(authCheck('article/add')):?>
                            <a href="#" id="add" addurl="<?php echo url('article/add'); ?>" title="添加文章" class="btn btn-sm btn-azure btn-addon"> <i class="fa fa-plus"></i> Add</a>
                            <?php endif;if(authCheck('article/dels')):?>
                            <input form="form" formaction="<?php echo url('article/dels'); ?>" onclick="return confirm('确定要删除吗？')" id="deletes" type="submit" class="btn btn-sm btn-danger"value="批量删除">
                            <?php endif;?>
                            <!-- input class="btn btn-primary btn-sm" url="<?php echo url('article/index'); ?>" type="button" id="shiny" value="排序"> -->
                            <input class="btn btn-sm btn-danger" value="清空" onclick="window.location.reload()" type="button">
                            <br><br>
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                <tr id="thead">
                                    <th class="text-center">
                                        <label>
                                            <input type="checkbox" class="inverted" >
                                            <span class="text" style="cursor: pointer" id="fck"></span>
                                        </label>
                                    </th>
                                    <th class="text-center" width="2%">ID</th>
                                    <!-- <th class="text-center" width="3%">排序</th> -->
                                    <th class="text-center">名称</th>
                                    <th class="text-center">副标题</th>
                                    <th class="text-center">所属栏目</th>
                                    <th class="text-center">图片</th>
                                    <!--<th class="text-center">内容</th>-->
                                    <th class="text-center" width="15%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr id="tr_<?php echo htmlspecialchars($vo['id']); ?>">
                                    <td class="text-center" >
                                        <label>
                                            <input type="checkbox" name="id[]" value="<?php echo htmlspecialchars($vo['id']); ?>" class="inverted sck">
                                            <span class="text" style="cursor: pointer"></span>
                                        </label>
                                    </td>
                                    <td align="center"><?php echo htmlspecialchars($vo['id']); ?></td>
                           <!--          <td align="center"><input name="<?php echo htmlspecialchars($vo['id']); ?>" class="sort" type="text" style="width:50px; text-align:center;" value="<?php echo htmlspecialchars($vo['sort']); ?>"></td> -->
                                    <td>
                                        <?php if($vo['rec'] == 1): ?>
                                        <a href="<?php echo url('index/article/index',array('cid'=>$vo['cid'],'id'=>$vo['id'])); ?>" style="color:green"><?php echo htmlspecialchars($vo['title']); ?><span class="label label-darkorange">推荐</span></a>
                                        <?php else: ?>
                                        <a href="<?php echo url('index/article/index',array('cid'=>$vo['cid'],'id'=>$vo['id'])); ?>" style="color:green"><?php echo htmlspecialchars($vo['title']); ?></a>
                                        <?php endif; ?>

                                    </td>
                                    <td class="sub sub_<?php echo htmlspecialchars($vo['id']); ?>" data-id="<?php echo htmlspecialchars($vo['id']); ?>" data-title="<?php echo htmlspecialchars($vo['unlimit_desc']); ?>"><?php echo htmlspecialchars($vo['desc']); ?></td>
                                    <td align="center">
                                        <?php echo htmlspecialchars($vo['catename']); ?>
                                    </td>
                                    <td align="center" class="layer_view">
                                        <img style="cursor: pointer" src="<?php echo htmlspecialchars($vo['pic']); ?>" name="src" height="50" title="<?php echo htmlspecialchars($vo['desc']); ?>">
                                    </td>
                             <!--       <td align="center" class="content">
                                        <?php echo htmlspecialchars(mb_substr(urldecode($vo['content']),0,1,'utf-8')); ?>
                                    </td>-->
                                    <td align="center">
                                        <?php if(authCheck('article/edit')):?>
                                        <a href="javascript:void(0)" title="修改" class="btn btn-info btn-xs edit update" updateurl="<?php echo url('article/edit',array('id'=>$vo['id'])); ?>"><i class="fa fa-edit"></i> Edit</a>
                                        <?php endif;if(authCheck('article/delete')):?>
                                        <a href="javascript:void(0)" title="删除" class="btn btn-danger btn-xs delete" deleteurl="<?php echo url('article/delete',array('id'=>$vo['id'])); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        <?php endif;if(authCheck('article/status')):if($vo['rec'] == 1): ?>
                                        <a href="javascript:void(0)" title="取消" class="btn btn-maroon btn-xs fabu" fabuurl="<?php echo url('article/status',array('id'=>$vo['id'],'rec'=>0)); ?>"><i class="fa fa-level-down"></i>取消</a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" title="推荐" class="btn btn-azure btn-xs fabu" fabuurl="<?php echo url('article/status',array('id'=>$vo['id'],'rec'=>1)); ?>"><i class="fa fa-level-up"></i>推荐</a>
                                        <?php endif; ?>
                                        <?php endif;?>

                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div style="padding-top:10px;">
                        <?php echo htmlspecialchars($res->render()); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Body -->

        </div>
    </div>
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




<script>
    $(".sub").hover(function() {
        let id=$(this).data('id');
        let title = $(this).data('title');
        if(title){
            openMsg(".sub_"+id,title);
        }
    }, function() {
        layer.close(subtips);
    });
    function openMsg($e,$title) {
        subtips = layer.tips($title, $e,{tips:[1,'#57b5e3'],time: 30000});
    }

    let article_search = $(".article_search");
    let url = "<?php echo url('article/index'); ?>";
    $(article_search).click(function(){
        let key = $("input[name=article_key]").val();
        if(key){
            $.ajax({
                data:{"key":key},
                url: url,
                dataType:'json',
                success:function(res){
                    console.log(res);
                }
            });
        }
    });
</script>

</body>
<!--  /Body -->
</html>

