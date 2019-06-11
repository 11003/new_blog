<?php /*a:7:{s:53:"D:\apps\thinkphp5\app\index\view\article\article.html";i:1560089912;s:49:"D:\apps\thinkphp5\app\index\view\common\base.html";i:1560090279;s:50:"D:\apps\thinkphp5\app\index\view\common\title.html";i:1560088504;s:48:"D:\apps\thinkphp5\app\index\view\common\css.html";i:1560088358;s:49:"D:\apps\thinkphp5\app\index\view\common\head.html";i:1560094981;s:49:"D:\apps\thinkphp5\app\index\view\common\foot.html";i:1560065901;s:51:"D:\apps\thinkphp5\app\index\view\common\script.html";i:1560090494;}*/ ?>
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
        <div class="col-content">
            <div class="inner">
                <article class="article-list bloglist" id="LAY_bloglist">
                    <?php if(is_array($artres) || $artres instanceof \think\Collection || $artres instanceof \think\Paginator): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <section class="article-item zoomIn article">
                        <?php if($vo['rec']): ?>
                        <div class="fc-flag">置顶</div>
                        <?php endif; ?>
                        <h5 class="title">
                            <?php if($vo['is_origin']): ?>
                            <span class="fc-blue">【原创】</span>
                            <?php endif; ?>
                            <a href="/p/<?php echo htmlspecialchars($vo['cid']); ?>/<?php echo htmlspecialchars($vo['id']); ?>"><?php echo htmlspecialchars($vo['title']); ?></a>
                        </h5>
                        <div class="time">
                            <span class="day"><?php echo htmlspecialchars(date('d',!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></span>
                            <span class="month fs-18"><?php echo htmlspecialchars(date('m',!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?><span class="fs-14">月</span></span>
                            <span class="year fs-18 ml10"><?php echo htmlspecialchars(date('Y',!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></span>
                        </div>
                        <div class="content">
                            <a href="/p/<?php echo htmlspecialchars($vo['cid']); ?>/<?php echo htmlspecialchars($vo['id']); ?>" class="cover img-light">
                                <?php if($vo['pic'] != ''): ?>
                                <img src="<?php echo htmlspecialchars($vo['pic']); ?>" alt="<?php echo htmlspecialchars($vo['title']); ?>">
                                <?php else: ?>
                                暂无图片
                                <?php endif; ?>
                            </a>
                            <?php echo htmlspecialchars(urldecode($vo['content'])); ?>
                        </div>
                        <div class="read-more">
                            <a href="/p/<?php echo htmlspecialchars($vo['cid']); ?>/<?php echo htmlspecialchars($vo['id']); ?>" class="fc-black f-fwb">继续阅读</a>
                        </div>
                        <aside class="f-oh footer">
                            <div class="f-fl tags">
                                <span class="fa fa-tags fs-16"></span>
                                <a class="tag" title="查看 <?php echo htmlspecialchars($vo['catename']); ?> 中的全部文章"
                                   href="/c/<?php echo htmlspecialchars($vo['cid']); ?>"><?php echo htmlspecialchars($vo['catename']); ?></a>
                            </div>
                            <div class="f-fr">
									<span class="read">
										<i class="fa fa-eye fs-16"></i>
										<i class="num"><?php echo htmlspecialchars($vo['look']); ?></i>
									</span>
                                <span class="ml20">
										<i class="fa fa-comments fs-16"></i>
									<i class="num"><?php echo htmlspecialchars($vo['look']); ?></i>
									</span>
                            </div>
                        </aside>
                    </section>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </article>
                <div class="article-item zoomIn article"><?php echo $artres->render(); ?></div>
            </div>
        </div>
        <div class="col-other">
            <div class="inner">
                <div class="other-item" id="categoryandsearch">
                    <div class="search">
                        <label class="search-wrap">
                            <input type="text" id="searchtxt" placeholder="输入关键字搜索"/>
                            <span class="search-icon" onclick="search()">
					                <i class="fa fa-search"></i>
					            </span>
                        </label>
                        <ul class="search-result"></ul>
                    </div>
                    <ul class="category mt20" id="category">
                        <li data-index="0" class="slider"></li>
                        <li data-index="1"><a href="/Blog/Article">全部文章</a></li>
                        <li data-index="2"><a href="/Blog/Article/1/">个人日记</a></li>
                        <li data-index="3"><a href="/Blog/Article/2/">HTML5&amp;CSS3</a></li>
                        <li data-index="4"><a href="/Blog/Article/3/">JavaScript</a></li>
                        <li data-index="5"><a href="/Blog/Article/4/">ASP.NET MVC</a></li>
                        <li data-index="6"><a href="/Blog/Article/5/">其它</a></li>
                    </ul>
                </div>
                <!--右边悬浮 平板或手机设备显示-->
                <div class="category-toggle"><i class="layui-icon">&#xe603;</i></div>
                <div class="article-category">
                    <div class="article-category-title">分类导航</div>
                    <a href="/Blog/Article/1/">个人日记</a>
                    <a href="/Blog/Article/2/">HTML5&amp;CSS3</a>
                    <a href="/Blog/Article/3/">JavaScript</a>
                    <a href="/Blog/Article/4/">ASP.NET MVC</a>
                    <a href="/Blog/Article/5/">其它</a>
                    <div class="f-cb"></div>
                </div>
                <!--遮罩-->
                <div class="blog-mask animated layui-hide"></div>
                <div class="other-item">
                    <h5 class="other-item-title">热门文章</h5>
                    <div class="inner">
                        <ul class="hot-list-article">
                            <li><a href="/Blog/Read/9">2018最新版QQ音乐api调用</a></li>
                            <li><a href="/Blog/Read/12">模板分享</a></li>
                            <li><a href="/Blog/Read/13">逆水寒</a></li>
                            <li><a href="/Blog/Read/4">序章</a></li>
                            <li><a href="/Blog/Read/7">解决百度分享插件不支持https</a></li>
                            <li><a href="/Blog/Read/11">使用码云和VS托管本地代码</a></li>
                            <li><a href="/Blog/Read/14">MUI框架-快速开发APP</a></li>
                            <li><a href="/Blog/Read/8">NPOI导入导出Excel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="other-item">
                    <h5 class="other-item-title">置顶推荐</h5>
                    <div class="inner">
                        <ul class="hot-list-article">
                            <li><a href="/Blog/Read/16">.NET Spire.Doc组件</a></li>
                            <li><a href="/Blog/Read/14">MUI框架-快速开发APP</a></li>
                            <li><a href="/Blog/Read/9">2018最新版QQ音乐api调用</a></li>
                        </ul>
                    </div>
                </div>
                <div class="other-item">
                    <h5 class="other-item-title">最近访客</h5>
                    <div class="inner">
                        <dl class="vistor">
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/72388EA977643E8F97111222675720B1/100"><cite>Anonymous</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/342F777E313DDF5CCD6E3E707BB0770B/100"><cite>Dekstra</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/EA5D00A72C0C43ECD8FC481BD274DEEC/100"><cite>惜i</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/EF18CEC98150D2442183AA30F05AAD7B/100"><cite>↙Aㄨ计划
                                ◆莪↘</cite></a></dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/3D8D91AD2BAFD36F5AC494DA51E270E6/100"><cite>.</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/B745A110DAB712A0E6C5D0B633E905D3/100"><cite>Lambert.</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/E9BA3A2499EC068B7917B9EF45C4D13C/100"><cite>64ღ</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/09F92966169272DD7DD9999E709A0204/100"><cite>doBoor</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/59991D53192643A1A651383847332EB6/100"><cite>毛毛小妖</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/FF34F311DDC43E2AF63BE897BCA24F05/100"><cite>NULL</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/59AA25A7627284AE62C8E6EBDC6FE417/100"><cite>吓一跳</cite></a>
                            </dd>
                            <dd><a href="javasript:;"><img
                                    src="https://thirdqq.qlogo.cn/qqapp/101465933/28B021E0F5AF0A4B9B781A24329FE897/100"><cite>如初</cite></a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
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


<script src="/static/index/js/yss/article.js"></script>
<script>
    function search() {
        window.location.href = "search.html";
    }
</script>

</body>
</html>
