<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"application\install\view\index\step1.html";i:1482241212;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>安装</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/install/css/install.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/install/css/bootstrap.min.css">

</head>
<body style="background:#EBF0F5">
<div style="background:#228BB5;height:80px;line-height:80px;margin-bottom:10px"><span style="margin-left:50px;"><img src="__PUBLIC__/install/images/logo.png" alt=""></span></div>
	<div class="container" style="background:#EBF0F5">
<div class="row">
  <div class="col-md-10 col-md-offset-1" >
  		<div class="row">
  			<div class="col-md-3" >
  						<div class="left fl">
							<div class="title">安装步骤</div>
							<div><span>安装协议</span></div>
							<div class="active"><span>环境检测</span></div>
							<div><span>创建数据库</span></div>
							<div><span>安装</span></div>
							<div><span>完成</span></div>
						</div>
			</div>
			<div class="col-md-9 right" >
				
			 	<h3>系统环境检测</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>检测项目</th>
							<th>最低需求</th>
							<th>当前配置</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($env) || $env instanceof \think\Collection): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$env): $mod = ($i % 2 );++$i;?>
						<tr>
							<td><?php echo $env['0']; ?></td>
							<td><?php echo $env['1']; ?></td>
							<td><?php echo $env['2']; ?></td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<h3>文件权限检测</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>目录/文件</th>
							<th>运行要求</th>
							<th>当前状态</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($dirfile) || $dirfile instanceof \think\Collection): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dirfile): $mod = ($i % 2 );++$i;?>
						<tr>
							<td><?php echo $dirfile['3']; ?></td>
							<td>可写</td>
							<td><?php echo get_write_color($dirfile['1']); ?></td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<h3>运行函数检测</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>函数名称</th>
							<th>运行要求</th>
							<th>检测结果</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($fun) || $fun instanceof \think\Collection): $i = 0; $__LIST__ = $fun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fun): $mod = ($i % 2 );++$i;?>
						<tr>
							<td><?php echo $fun['0']; ?></td>
							<td>支持</td>
							<td><?php echo get_fun_color($fun['1']); ?></td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				
			</div>
			<div class="col-md-9 col-md-offset-3 footer" >
				<a class="btn btn-info" href="<?php echo url('index/index'); ?>">上一步</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="btn btn-success" href="<?php echo url('index/step2'); ?>">下一步</a>
			</div> 
			
		</div>
  </div>
</div>


	
</body>

</html>