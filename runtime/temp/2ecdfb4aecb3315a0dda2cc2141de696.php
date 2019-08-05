<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:33:"admin_themes\database\import.html";i:1481966809;s:22:"admin_themes\base.html";i:1482389208;}*/ ?>
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
            <li class="layui-this">数据库还原</li>
            <li class=""><a href="<?php echo url('/admin/database/index/type/export'); ?>">数据库备份</a></li>
        </ul>
        <div class="layui-tab-content">

            <div class="layui-form layui-form-pane">
                <div class="layui-inline">
                    <label class="layui-form-label">选项</label>
                    <div class="layui-input-inline">
                 <select class="form-control input-sm setStatus" name="status">
                <option value="0">批量操作</option>
                <option value="1">删除备份</option>
              </select>
                    </div>
                </div>
                
                <div class="layui-inline">
                    <button class="layui-btn"><i class="layui-icon">&#xe616;</i> 应用</button>
                </div>
            </div>
            <hr>

       
                <div class="layui-tab-item layui-show">
                <table class="layui-table">
                  <thead>
                  <tr>
                    <th><input type="checkbox" class="check-all"></th>
                    <th>备份名称</th>
                    <th>卷数</th>
                    <th>压缩</th>
                    <th>数据大小</th>
                    <th>备份时间</th>
                    <th>状态</th>
                    <th>操作</th>      
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                  <tr>
                    <td ><input type="checkbox" class="check" name="ids" value="<?php echo $data['time']; ?>" /></td>
                    <td><?php echo date('Ymd-His',$data['time']); ?></td>
                    <td><?php echo $data['part']; ?></td>
                    <td><?php echo $data['compress']; ?></td>
                    <td><?php echo format_bytes($data['size']); ?></td>
                    <td><?php echo $key; ?></td>
                    <td>-</td>
                    <td class="action">
                        <a class="db-import" href="<?php echo url('import?time='.$data['time']); ?>">还原</a>
                    </td>

                  </tr>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                  
                  </tbody>
                  <thead>
                  
                  </thead>
                  
                </table>
                
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var url;
var tables;
  $('document').ready(function(argument){
    //全选、取消全选的事件
    $("th .selectAll").click(function(){
      if(this.checked){
        $(".check").each(function(){this.checked=true;});
      }else{
        $(".check").each(function(){this.checked=false;});
      }
    });
    //设置状态方法
    $('.layui-btn').click(function(){
      setStatus = $(".setStatus").val();
      var ids = new Array();//声明一个存放id的数组
      $("[name='ids']:checked").each(function(){
        ids.push($(this).val());
      });
      if(setStatus==0){
 
		layer.msg('请选择操作类型');
        return;
      }
      if(ids.length==0){
		layer.msg('请选择要操作的数据');
        return;
      }
      
      $.ajax({
        cache:true,
        type :"POST",
        url  :'<?php echo url('del'); ?>',
        data :{time:ids},
        async:false,
           success:function(data){
            if(data.code){
              alert(data.msg);
              setTimeout(function(){
                location.href=data.url;
              },1000);
            } else {
              alert(data.msg);
            }
           },
           error:function(request){
			 layer.msg('页面错误');
           }
      });        
    });

     // select选中
    $(".filterStatus").val("<?php echo (\think\Request::instance()->get('status')) ? \think\Request::instance()->get('status') :  '0'; ?>");

    $(".db-import").click(function(){
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
            return false;
        
            function success(data){
                if(data.code){
                    if(data.data.gz){
                        data.msg += status;
                        if(status.length === 5){
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.msg);
                    if(data.data.part){
                        $.get(self.href, 
                            {"part" : data.data.part, "start" : data.data.start}, 
                            success, 
                            "json"
                        );
                    }  else {
                        window.onbeforeunload = function(){ return null; }
                    }
                } else {
                   
				   layer.msg(data.msg);
                }
            }
        });



  })
</script>



    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2016 &copy; <a href="#" target="_blank">唯美博客</a></p>
        </div>
    </div>
</div>

</body>
</html>