<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:28:"admin_themes\tags\index.html";i:1481966969;s:22:"admin_themes\base.html";i:1482389208;}*/ ?>
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
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li class="layui-this">Tags管理</li>
        </ul>
        <div class="layui-tab-content">

            <form class="layui-form layui-form-pane" action="<?php echo url('admin/tags/index'); ?>" method="get">
  
                <div class="layui-inline">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="请输入关键词" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn"><i class="layui-icon">&#xe615;</i> 搜索</button>
                </div>
            </form>
            <hr>

            <form action="" method="post" class="ajax-form">
                <button type="button" class="layui-btn layui-btn-danger layui-btn-small ajax-action" data-action="<?php echo url('admin/tags/delete'); ?>"><i class="layui-icon">&#xe640;</i> 删除</button>
                <div class="layui-tab-item layui-show">
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th style="width: 15px;"><input type="checkbox" class="check-all"></th>
                            <th style="width: 30px;">ID</th>
                            <th>Tags内容</th>
							<th>使用次数</th>
                            <th>加入时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($tags_model) || $tags_model instanceof \think\Collection): if( count($tags_model)==0 ) : echo "" ;else: foreach($tags_model as $key=>$vo): ?>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"></td>
                            <td><?php echo $vo['id']; ?></td>
                            <td><?php echo $vo['tagname']; ?></td>
							 <td><?php echo $vo['num']; ?></td>
                            <td><?php echo $vo['create_time']; ?></td>
                            <td>
                                <a href="<?php echo url('admin/tags/delete',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete"><i class="layui-icon">&#xe640;</i> 删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <!--分页-->
                    <?php echo $tags_model->render(); ?>
                </div>
            </form>
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