<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:30:"admin_themes\article\edit.html";i:1482298849;s:22:"admin_themes\base.html";i:1482389208;}*/ ?>
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
            <li class=""><a href="<?php echo url('admin/article/index'); ?>">文章管理</a></li>
            <li class=""><a href="<?php echo url('admin/article/add'); ?>">添加文章</a></li>
            <li class="layui-this">编辑文章</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="<?php echo url('admin/article/update'); ?>" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属栏目</label>
                        <div class="layui-input-block">
                            <select name="cid" lay-verify="required">
                                <?php if(is_array($category_level_list) || $category_level_list instanceof \think\Collection): if( count($category_level_list)==0 ) : echo "" ;else: foreach($category_level_list as $key=>$vo): ?>
                                <option value="<?php echo $vo['id']; ?>" <?php if($article['cid']==$vo['id']): ?> selected="selected"<?php endif; ?>><?php if($vo['level'] != '1'): ?>|<?php for($i=1;$i<$vo['level'];$i++){echo ' ----';} endif; ?> <?php echo $vo['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" value="<?php echo $article['title']; ?>" required  lay-verify="required" placeholder="请输入标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者</label>
                        <div class="layui-input-block">
                            <input type="text" name="author" value="<?php echo $article['author']; ?>" placeholder="（选填）请输入作者" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">简介</label>
                        <div class="layui-input-block">
                            <textarea name="introduction" placeholder="（选填）请输入简介" class="layui-textarea"><?php echo $article['introduction']; ?></textarea>
                        </div>
                    </div>
						  <div class="layui-form-item">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-block">
                           <input type="text" name="keywords" value="<?php echo $article['keywords']; ?>" placeholder="（选填）请输关键词 ,号隔开" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <textarea name="content" lay-verify="content" placeholder="" class="layui-textarea" id="content"><?php echo $article['content']; ?></textarea>
                        </div>
                    </div>
		
                    <div class="layui-form-item">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block">
                            <input type="text" name="thumb" value="<?php echo $article['thumb']; ?>" class="layui-input layui-input-inline" id="thumb">
                            <input type="file" name="file" class="layui-upload-file">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="status" value="1" title="已审核" <?php if($article['status']==1): ?> checked="checked"<?php endif; ?>>
                            <input type="radio" name="status" value="0" title="未审核" <?php if($article['status']==0): ?> checked="checked"<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">置顶</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_top" value="1" title="置顶" <?php if($article['is_top']==1): ?> checked="checked"<?php endif; ?>>
                            <input type="radio" name="is_top" value="0" title="未置顶" <?php if($article['is_top']==0): ?> checked="checked"<?php endif; ?>>
                        </div>
                    </div>
					    <div class="layui-form-item">
                        <label class="layui-form-label">推荐</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_good" value="1" title="推荐" <?php if($article['is_good']==1): ?> checked="checked"<?php endif; ?>>
                            <input type="radio" name="is_good" value="0" title="未推荐" <?php if($article['is_good']==0): ?> checked="checked"<?php endif; ?>>
                        </div>
                    </div>
					   <div class="layui-form-item">
                        <label class="layui-form-label">标签</label>
                        <div class="layui-input-block">
                            <input type="radio" name="tag" value="1" title="原创" <?php if($article['tag']==1): ?> checked="checked"<?php endif; ?>>
                            <input type="radio" name="tag" value="0" title="转载" <?php if($article['tag']==0): ?> checked="checked"<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">发布时间</label>
                        <div class="layui-input-block">
                            <input type="text" name="publish_time" value="<?php echo $article['publish_time']; ?>" class="layui-input" id="datetime">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" value="<?php echo $article['sort']; ?>" required  lay-verify="required" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
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