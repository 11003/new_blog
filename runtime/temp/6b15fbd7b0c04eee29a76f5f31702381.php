<?php /*a:7:{s:47:"D:\apps\thinkphp5\app\index\view\read\read.html";i:1560094347;s:49:"D:\apps\thinkphp5\app\index\view\common\base.html";i:1560090279;s:50:"D:\apps\thinkphp5\app\index\view\common\title.html";i:1560088504;s:48:"D:\apps\thinkphp5\app\index\view\common\css.html";i:1560088358;s:49:"D:\apps\thinkphp5\app\index\view\common\head.html";i:1560094981;s:49:"D:\apps\thinkphp5\app\index\view\common\foot.html";i:1560065901;s:51:"D:\apps\thinkphp5\app\index\view\common\script.html";i:1560090494;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="all" />
<title><?php echo htmlspecialchars($title); ?></title>

    <link rel="stylesheet" href="/static/index/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/static/index/layui/css/layui.css" />
<link rel="stylesheet" href="/static/index/css/master.css" />
<link rel="stylesheet" href="/static/index/css/gloable.css" />
<link rel="stylesheet" href="/static/index/css/nprogress.css" />
    
<link rel="stylesheet" href="/static/index/css/blog.css"/>
<link rel="stylesheet" type="text/css" href="/static/index/highlight/styles/tomorrow-night-eighties.css">
<style>
    .artiledetail code {
        border-radius: 5px;
        padding: 15px;
        overflow: auto;
        font-family: Consolas, Inconsolata, Courier, monospace;
    }
</style>

</head>
<body>
<div class="header">
</div>
<header class="gird-header">
    <div class="header-fixed">
        <div class="header-inner">
            <a href="javascript:void(0)" class="header-logo" id="logo">Mr.Yss</a>
            <nav class="nav" id="nav">
                <ul>
                    <li><a href="/index.html">首页</a></li>
                    <li><a href="/article.html">博客</a></li>
                    <li><a href="/message.html">留言</a></li>
                    <li><a href="/link.html">友链</a></li>
                    <li><a href="/time.html">归档</a></li>
                </ul>
            </nav>
            <a href="/User/QQLogin" class="blog-user">
                <i class="fa fa-qq"></i>
            </a>
            <a class="phone-menu">
                <i></i>
                <i></i>
                <i></i>
            </a>
        </div>
    </div>
</header>

<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="col-content" style="width:100%">
            <div class="inner">
                <article class="article-list">
                    <input type="hidden" value="@Model.BlogTypeID" id="blogtypeid"/>
                    <section class="article-item">
                        <aside class="title" style="line-height:1.5;">
                            <h4><?php echo htmlspecialchars($res['title']); ?></h4>
                            <p class="fc-grey fs-14">
                                <small>
                                    作者：<a href="javascript:void(0)" target="_blank" class="fc-link">柳乘风</a>
                                </small>
                                <small class="ml10">围观群众：<i class="readcount">37</i></small>
                                <small class="ml10">更新于 <label><?php echo htmlspecialchars(date("Y-m-d H:i:s",!is_numeric($res['create_time'])? strtotime($res['create_time']) : $res['create_time'])); ?></label></small>
                            </p>
                        </aside>
                        <div class="time mt10" style="padding-bottom:0;">
                            <span class="day">22</span>
                            <span class="month fs-18">5<small class="fs-14">月</small></span>
                            <span class="year fs-18">2018</span>
                        </div>
                        <div class="content artiledetail"
                             style="border-bottom: 1px solid #e1e2e0; padding-bottom: 20px;">
                            <?php echo urldecode($res['content']); if($res['is_origin']): ?>
                            <div class="copyright mt20">
                                <p class="f-toe fc-black">
                                    非特殊说明，本文版权归 柳乘风 所有，转载请注明出处.
                                </p>
                                <p class="f-toe">
                                    本文标题：
                                    <a href="javascript:void(0)" class="r-title"><?php echo htmlspecialchars($res['title']); ?></a>
                                </p>
                                <p class="f-toe">
                                    本文网址：
                                    <a href="#">https://www.yanshisan.cn/Blog/Read/7</a>
                                </p>
                            </div>
                            <?php endif; ?>
                            <div id="aplayer" style="margin:5px 0"></div>
                            <h6>延伸阅读</h6>
                            <ul class="read" style="list-style-type: none; margin-top: 10px; width: 780px;">

                                <?php if(is_array($rec) || $rec instanceof \think\Collection || $rec instanceof \think\Paginator): $i = 0; $__LIST__ = $rec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li style="margin:0.5rem auto"><a href="/article/<?php echo htmlspecialchars($vo['cid']); ?>/<?php echo htmlspecialchars($vo['id']); ?>">
                                    <span style="margin: 0px; padding: 0px; margin-top: -5px;"><?php echo htmlspecialchars($vo['title']); ?></span>
                                </a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <ol class="b-relation">
                                <li class="f-toe">
                                    <?php if($prev != ''): ?>
                                    <a href="/p/<?php echo htmlspecialchars($res['cid']); ?>/<?php echo htmlspecialchars($prev); ?>">上一篇：<?php echo htmlspecialchars($prev_title); ?></a>
                                    <?php else: ?>
                                    <span>上一篇没有了</span>
                                    <?php endif; ?>
                                </li>
                                <li class="f-toe">
                                    <?php if($next != ''): ?>
                                    <a href="/article/<?php echo htmlspecialchars($res['cid']); ?>/<?php echo htmlspecialchars($next); ?>">下一篇：<?php echo htmlspecialchars($next_title); ?></a>
                                    <?php else: ?>
                                    <span>下一篇没有了</span>
                                    <?php endif; ?>
                                </li>
                            </ol>
                        </div>
                        <div class="bdsharebuttonbox share bdshare-button-style0-32" data-tag="share_1"
                             data-bd-bind="1560061047064">
                            <ul>
                                <li class="f-praise"><i style="color: #f46753;" class="fa fa-thumbs-o-up"
                                                        aria-hidden="true"></i></li>
                                <li class="f-weinxi"><i style="color:#5ac64f" class="fa fa-weixin"
                                                        aria-hidden="true"></i></li>
                                <li class="f-sina"><i style="color: #ff7171;" class="fa fa-weibo"
                                                      aria-hidden="true"></i></li>
                                <li class="f-qq"><i class="fa fa-qq"></i></li>
                            </ul>
                        </div>
                        <div class="f-cb"></div>
                        <div class="mt20 f-fwn fs-24 fc-grey comment"
                             style="border-top: 1px solid #e1e2e0; padding-top: 20px;">
                        </div>
                        <fieldset class="layui-elem-field layui-field-title">
                            <legend>发表评论</legend>
                            <div class="layui-field-box">
                                <div class="leavemessage" style="text-align:initial">
                                    <?php if(app('request')->session('user_name')): ?>
                                    <form class="layui-form blog-editor" action="">
                                        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($res['id']); ?>">
                                        <input type="hidden" name="cid" value="<?php echo htmlspecialchars($res['cid']); ?>">
                                        <div class="layui-form-item">
                                            <textarea name="user_comment" lay-verify="content" id="remarkEditor"
                                                      class="layui-textarea layui-hide"></textarea>
                                        </div>
                                        <div class="layui-form-item">
                                            <button class="layui-btn" lay-submit="formLeaveMessage"
                                                    lay-filter="formLeaveMessage">提交留言
                                            </button>
                                            <div class="layui-form-item" style="float: right;">
                                                <label class="layui-form-label">提醒一下！</label>
                                                <div class="layui-input-block">
                                                    <input type="checkbox" value="1" name="send_email" lay-skin="switch"
                                                           lay-text="提醒|关闭">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php else: ?>
                                    <form class="layui-form blog-editor" action="">
                                        <input type="hidden" name="aid" value="<?php echo htmlspecialchars($res['id']); ?>">
                                        <input type="hidden" name="cid" value="<?php echo htmlspecialchars($res['cid']); ?>">
                                        <div class="layui-form-item">
                                            <textarea name="user_comment" lay-verify="content" id="remarkEditor"
                                                      placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>
                                        </div>
                                        <div class="layui-form-item">
                                            <button class="layui-btn" lay-submit="formLeaveMessage"
                                                    lay-filter="formLeaveMessage">提交留言
                                            </button>
                                            <div class="layui-form-item" style="float: right;">
                                                <label class="layui-form-label">提醒一下！</label>
                                                <div class="layui-input-block">
                                                    <input type="checkbox" value="1" name="send_email" lay-skin="switch"
                                                           lay-text="提醒|关闭">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </fieldset>

                        <!--评论-->
                        <ul class="blog-comment" id="blog-comment" page-count="1">
                            <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="comment-parent"><a name="remark-<?php echo htmlspecialchars($vo['id']); ?>"></a><img
                                        src="https://thirdqq.qlogo.cn/g?b=oidb&amp;k=XRicUMzmGp7Morg1UcAtADg&amp;s=100"
                                        alt="☼">
                                    <div class="info"><span class="username"><?php echo htmlspecialchars(urldecode($vo['user_name'])); ?></span></div>
                                    <div class="comment-content"><?php echo urldecode($vo['user_comment']); ?></div>
                                    <p class="info info-footer"><span class="comment-time"> <?php echo htmlspecialchars(transfer_time($vo['create_time'])); ?></span><a
                                            href="javascript:;" class="btn-reply" data-targetid="<?php echo htmlspecialchars($vo['uid']); ?>"
                                            data-targetname="<?php echo htmlspecialchars(urldecode($vo['user_name'])); ?>">回复</a></p></div>
                                <hr>
                                <?php if(is_array($reply) || $reply instanceof \think\Collection || $reply instanceof \think\Paginator): $i = 0; $__LIST__ = $reply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                                <div class="comment-child"><a name="reply-<?php echo htmlspecialchars($voo['id']); ?>"></a> <img
                                        src="https://thirdqq.qlogo.cn/g?b=oidb&amp;k=4o1ExEW6tDIG3zUdx2I01A&amp;s=100"
                                        alt="<?php echo htmlspecialchars($voo['uid']); ?>/">
                                    <div class="info"><span class="username"><?php echo htmlspecialchars($voo['uid']); ?></span> <span
                                            style="padding-right:0;margin-left:-5px;">回复</span> <span
                                            class="username"><?php echo htmlspecialchars(urldecode($vo['user_name'])); ?></span> <span><?php echo $voo['content']; ?></span></div>
                                    <p class="info"><span class="comment-time"><?php echo htmlspecialchars(transfer_time($voo['create_time'])); ?></span> <a
                                            href="javascript:;" class="btn-reply" data-targetid="<?php echo htmlspecialchars($voo['uid']); ?>"
                                            data-targetname="<?php echo htmlspecialchars($voo['uid']); ?>">回复</a></p>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>


                                <div class="replycontainer layui-hide">
                                    <form class="layui-form" action=""><input type="hidden" name="remarkId" value="<?php echo htmlspecialchars($vo['id']); ?>">
                                        <input type="hidden" name="targetUserId" value="0"> <input type="hidden"
                                                                                                   name="aid"
                                                                                                   value="<?php echo htmlspecialchars($res['id']); ?>">
                                        <div class="layui-form-item"><textarea name="replyContent"
                                                                               lay-verify="replyContent"
                                                                               placeholder="请输入回复内容"
                                                                               class="layui-textarea"
                                                                               style="min-height:80px;"></textarea>
                                        </div>
                                        <div class="layui-form-item">
                                            <button class="layui-btn layui-btn-xs" lay-submit="formReply"
                                                    lay-filter="formReply">提交
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="layui-flow-more">没有更多了</div>
                        </ul>
                    </section>
                </article>
            </div>
        </div>
        <div class="f-cb"></div>

    </div>
</div>

<footer class="grid-footer">
    <div class="footer-fixed">
        <div class="copyright">
            <div class="info">
                <div class="contact">
                    <a href="javascript:void(0)" class="github" target="_blank"><i class="fa fa-github"></i></a>
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=930054439&site=qq&menu=yes" class="qq" target="_blank" title="930054439"><i class="fa fa-qq"></i></a>
                    <a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gbiysbG0tbWyuMHw8K-i7uw" class="email" target="_blank" title="930054439@qq.com"><i class="fa fa-envelope"></i></a>
                    <a href="javascript:void(0)" class="weixin"><i class="fa fa-weixin"></i></a>
                </div>
                <p class="mt05">
                    Copyright &copy; 2017-2019 刘海 All Rights Reserved V.1.0.0 蜀ICP备18008600号
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="/static/index/layui/layui.js"></script>
<script src="/static/index/js/yss/gloable.js"></script>
<script src="/static/index/js/plugins/nprogress.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script>
    NProgress.start();
    window.onload = function () {
        NProgress.done();
    };
</script>


<script src="/static/index/js/pagecomment.js"></script>
<script src="/static/index/highlight/highlight.pack.js"></script>
<script>
    //代码高亮
    hljs.initHighlightingOnLoad();
    var allpre = document.getElementsByTagName("pre");
    for (var i = 0; i < allpre.length; i++) {
        var onepre = document.getElementsByTagName("pre")[i];
        var mycode = document.getElementsByTagName("pre")[i].innerHTML;
        onepre.innerHTML = '<code class="mycode">' + mycode + '</code>';
    }
    //点赞
    $("#user_like").click(function () {
        if ($(this).is('.unlike')) {
            layer.msg('您已经点过赞了！感谢您的支持。', {anim: 6});
            return;
        }
        $("#user_like").removeClass('like shake shake-hard');
        var aid = $(this).attr('aid');
        var cid = $(this).attr('cid');
        $.ajax({
            url: "/like/" + aid + "/" + cid,
            type: 'POST',
            dataType: "json",
            success: function (res) {
                if (res.status == 1) {
                    var click = $(".votecount").text();

                    $("#user_like").addClass('unlike');

                    click++;
                    $(".votecount").html(click);
                    layer.msg(res.msg, {anim: 7});
                } else {
                    layer.msg(res.msg, {anim: 5});
                }
            }
        });
    });
    //上传
    layui.use('layedit', function () {
        var layedit = layui.layedit;
        layedit.set({
            uploadImage: {
                url: '<?php echo url("Article/uploadImg"); ?>' //接口url
            }
        });
        var index = layedit.build("remarkEditor");
        $("#get_comment").click(function () {
            layedit.sync(index);
            $.ajax({
                url: "<?php echo url('Article/comment'); ?>",
                data: $("#form1").serialize(),
                type: 'POST',
                dataType: "json",
                async: false,
                success: function (res) {
                    if (res.status == 1) {
                        layer.alert(res.msg, {
                            title: "操作",
                            btn: ['确定']
                        }, function () {
                            window.parent.location.reload();
                        });

                    } else {
                        layer.msg(res.msg, {anim: 6});
                    }
                }
            })
        });
    });
</script>

</body>
</html>
