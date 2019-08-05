<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:29:"admin_themes\index\index.html";i:1482388333;s:22:"admin_themes\base.html";i:1482389208;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/public/static/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/public/static/css/font-awesome.min.css">
    <!--CSS引用-->
    
    <link rel="stylesheet" href="/public/static/css/admin.css">
    <!--[if lt IE 9]>
    <script src="/public/static/js/html5shiv.min.js"></script>
    <script src="/public/static/js/respond.min.js"></script>
    <![endif]-->

<!--JS引用-->
<script src="/public/static/js/jquery.min.js"></script>
<script src="/public/static/layui/layui.js"></script>
<script>
    layui.config({
        base: '/public/static/js/'
    }).use('admin');

    var _current_url = "admin/<?php echo $controller; ?>";
    $('.layui-nav-item').removeClass('layui-this');
    $('.layui-nav-tree a[href*="'+_current_url+'"]').parents('.layui-nav-item').addClass('layui-this layui-nav-itemed');
</script>

<!--页面JS脚本-->


    
</head>
<body bgcolor="#F7FAFE">
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
       <div class="logo"><i class="layui-icon" style="font-size:40px;">&#xe62e;</i>  <?php echo $site_config['site_title']; ?></div>
        <div class="user-action">
            <a href="javascript:;"><i class="layui-icon">&#xe612;</i> <?php echo session('admin_name'); ?></a>
            <a class="" href="<?php echo url('admin/login/logout'); ?>"><i class="layui-icon">&#xe64d;</i> 退出</a>
        </div>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree" id="nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <li class="layui-nav-item layui-this">
                    <a href="/index.php/admin/index/index"><i class="fa fa-home"></i> 网站概览</a>
                </li>
                <li class="layui-nav-item">
                    <a href="" data-url="/index.php/admin/system/clear" id="clear-cache"><i class="fa fa-trash-o"></i> 清除缓存</a>
                </li>
                <?php if(is_array($menu) || $menu instanceof \think\Collection): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): if(isset($vo['children'])): ?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                    <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): ?>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="<?php echo url($v['name']); ?>"> <?php echo $v['title']; ?></a>
                        </dd>
                    </dl>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <?php else: ?>
                <li class="layui-nav-item">
                    <a href="<?php echo url($vo['name']); ?>"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
            </ul>
        </div>
    </div>

    <!--主体-->
    
<div class="layui-body">
 <p class="site-tips"><i class="layui-icon">&#xe612;</i> <?php echo session('admin_name'); ?>，感谢你选择  <?php echo $site_config['site_title']; ?> 后台管理</p>
 <ul class="site-doc-color">
      <li style="background-color: #F7B824;">
        <p><i class="layui-icon" style="font-size:30px;">&#xe630;</i>  <p>
        <p>已审核：<?php echo $approvedarticle_number; ?>&nbsp;<i class="layui-icon">&#xe602;</i>&nbsp;未审核：<?php echo $notauditarticle_number; ?></p>
      </li>
      <li style="background-color: #FF5722;">
        <p><i class="layui-icon" style="font-size:30px;">&#xe64c;</i>  <p>
        <p>链接数：<?php echo $links_number; ?></p>
      </li>
      <li style="background-color: #01AAED;">
            <p><i class="layui-icon" style="font-size:30px;">&#xe639;</i>  <p>
        <p>分类数：<?php echo $tell_number; ?></p>
      </li>
      <li style="background-color: #2F4056;">
            <p><i class="layui-icon" style="font-size:30px;">&#xe63a;</i>  <p>
        <p tips>留言数：<?php echo $guestbook_number; ?></p>
      </li>
    </ul>
   <div class="clr"></div>
    
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this"><i class="layui-icon">&#xe614;</i> 系统信息</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
				  <tr>
                        <td>版本</td>
                        <td style="font-weight:bold;"><i class="layui-icon">&#xe639;</i> <?php echo $config['version']; ?> <?php echo $new_ver; ?></td>
                    </tr>
                    <tr>
                      <td>官方网址</td>
                      <td>&nbsp;</td>
                    </tr>
					    <tr>
                      <td>BUG反馈</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="width: 400px;">网站域名</td>
                        <td><?php echo $config['url']; ?></td>
                    </tr>
                    <tr>
                        <td>网站目录</td>
                        <td><?php echo $config['document_root']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器操作系统</td>
                        <td><?php echo $config['server_os']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器端口</td>
                        <td><?php echo $config['server_port']; ?></td>
                    </tr>
                    <tr>
                        <td>服务器环境</td>
                        <td><?php echo $config['server_soft']; ?></td>
                    </tr>
                    <tr>
                        <td>PHP版本</td>
                        <td><?php echo $config['php_version']; ?></td>
                    </tr>
                    <tr>
                        <td>MySQL版本</td>
                        <td><?php echo $config['mysql_version']; ?></td>
                    </tr>
                    <tr>
                        <td>最大上传限制</td>
                        <td><?php echo $config['max_upload_size']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>



    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2016 &copy; <a href="#" target="_blank">唯美博客</a></p>
        </div>
    </div>
</div>

</body>
</html>