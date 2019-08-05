<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:20:"themes\fk\index.html";i:1482403554;s:26:"themes\\header\header.html";i:1482413546;s:24:"themes\\right\right.html";i:1565015110;s:26:"themes\\footer\footer.html";i:1482388149;}*/ ?>
﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>		
	<title>访客-<?php echo $site_config['site_title']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="__public__css/lunbo.css" />
	<link rel="stylesheet" href="__public__css/pintuer.css">
	<link rel="stylesheet" href="__public__css/my.css">
	<link rel="stylesheet" href="__public__css/page_css.css">	
	<link rel="stylesheet" href="__public__css/gotop.css" />
	<script src="__public__js/jquery.js"></script>
	<script src="__public__js/pintuer.js"></script>
	<script src="__public__js/respond.js"></script>
	<script src="__public__layer/layer.js"></script>
	<script src="__public__js/gotop.js" ></script>
	<script src="__public__js/jquery.touchSlider.js"></script>
</head>
	<body>
<script type="text/javascript">
$(document).ready(function(){

	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 600,//轮播播放速度，单位是毫秒
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 4000); //轮播间隔时间，单位是毫秒
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},4000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 4000);
	});
	
});
</script>
		<div style="display: none;" id="rocket-to-top">
    <div style="opacity:0;display: block;" class="level-2"></div>
    <div class="level-3"></div>
</div>
<div class="demo-nav padding-big-top fixed">
	<div class="container padding-top padding-bottom">
		<div class="line">
			<div class="xl12 xs3 xm3 xb2">
				<button class="button icon-navicon float-right" data-target="#header-demo"></button>
				<a href="/"><img src="__public__images/logo.png" class="ring-hover"/></a>
			</div>
			<div class=" xl12 xs9 xm9 xb10 nav-navicon" id="header-demo">
				<div class="xs8 xm6 xb8 padding-small">
					<ul class="nav nav-menu nav-inline nav-big">
						  <li<?php if(strtoupper(strlen($currenturl)) == '1'): ?> class="l_active"<?php endif; ?>><a href="/">首页</a></li>
						<li<?php if(strstr($currenturl,'category'))echo' class="l_active"' ?>>
							<a href="#">分类<span class="arrow"></span></a>
							<ul class="drop-menu">
							 <?php if(is_array($category) || $category instanceof \think\Collection): if( count($category)==0 ) : echo "" ;else: foreach($category as $key=>$vo): ?>
								<li><a href="<?php echo url('category/index','cid='.$vo['id']); ?>"><?php echo $vo['name']; ?></a></li>
						       <?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</li>
						 <?php if(is_array($nav) || $nav instanceof \think\Collection): if( count($nav)==0 ) : echo "" ;else: foreach($nav as $key=>$vo): ?>
						 <li<?php if(strstr($currenturl,$vo['link']))echo' class="l_active"' ?>><a href="/<?php echo $vo['link']; ?>"><?php echo $vo['name']; ?></a></li>
						  <?php endforeach; endif; else: echo "" ;endif; ?>
			
					</ul>
				</div>
				<div class="xs4 xm3 xb4">
					   <form class="layui-form layui-form-pane" action="/index/so/index.html" method="get">

						<div class="input-group padding-little-top">
							<input type="text" class="input border-main" name="key" size="30" placeholder="请输入关键词" />
							<span class="addbtn"><button class="button bg-main icon-search layui-btn"></button></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main_visual">
	<div class="flicking_con">
	 <?php if(is_array($banner) || $banner instanceof \think\Collection): if( count($banner)==0 ) : echo "" ;else: foreach($banner as $key=>$vo): ?><a href="#"><?php echo $vo['id']; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="main_image">
		<ul>
	<?php if(is_array($banner) || $banner instanceof \think\Collection): if( count($banner)==0 ) : echo "" ;else: foreach($banner as $key=>$vo): ?>
	<li><span class="img"><img src="<?php echo $vo['adpic']; ?>"  width="100%" height="400px"/></span></li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<a href="javascript:;" id="btn_prev"></a>
		<a href="javascript:;" id="btn_next"></a>
	</div>
</div>
		<br /> 
		<div class="container">
			<div class="">
				<ul class="bread">
					<h4>
					<li><a href="/" class="icon-home"> 首页</a> </li>					
					<li><a href="#">访客</a></li>
					</h4>
				</ul>
			</div>
			<div class="line-big">
				<div class="xl12 xm8">
					<div class="line-small">
						<div class="xs12">
							<h4>最近QQ访客</h4>
							此处为通过QQ登陆本网站<span style="color:red">(已有<?php echo $login_number; ?>人登录本站)</span><hr>
				            <div class="friends">
				                <div class="QQfriends">		
								 <?php if(is_array($userlogin_list) || $userlogin_list instanceof \think\Collection): if( count($userlogin_list)==0 ) : echo "暂时没有数据" ;else: foreach($userlogin_list as $key=>$vo): ?>	                    
			                        <img src="<?php echo $vo['headimgurl']; ?>" title="<?php echo $vo['nickname']; ?> 最近登陆<?php echo $vo['logincount']; ?>次" class="radius-circle" width="60px" height="60px">	 
									    <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>	                  
				                </div>
				            </div>							
							<br />							
						</div>						
						<hr />
						<div class="pages" style=" text-align: right;">
						<?php echo $userlogin_list->render(); ?></div>
					</div>
					<br />
					<br />
					<br />
				</div>				
<div class="xl12 xm4">
	<div>
		<h3><span class="icon-user"></span> 用户登录</h3>
		<br />
		<form method="post" class="form-x form-auto">
	<div class="form-group">
		<div class="label">
			<label for="username">
				用户名</label>
		</div>
		<div class="field">
			<input type="text" class="input input-auto" id="username" name="username" size="30" data-validate="required:必填" placeholder="手机/邮箱/账号" />
		</div>
	</div>
	<div class="form-group">
		<div class="label">
			<label for="detail">
				密&nbsp;&nbsp;码</label>
		</div>
		<div class="field">
			<input type="text" class="input input-auto" id="username" name="username" size="30" data-validate="required:必填" placeholder="密码" />
		</div>
	</div>
	<div class="form-button">
		<button class="button bg-blue" type="submit">
			登录</button>&nbsp;&nbsp;&nbsp;&nbsp;
			
			<?php if(strtoupper(session('user_nickname')) == ''): ?>
			<a class="button bg" href="http://www.cn300.cn/API/QQ/?url=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].'/index.php/base/qqlogin/')?>"><img height="20px" src="__public__/images/qq.png" /> QQ登录</a>
			
			
			<?php else: ?>
					<div class="button-group">
					<button type="button" class="button">
						<img height="20px" src="__public__/images/qq.png" />  <?php echo session('user_nickname'); ?> </button>
					<button type="button" class="button dropdown-toggle">
						<span class="downward"></span>
					</button>
					<ul class="drop-menu">
						<li><a href="<?php echo url('/base/qqlogin/out'); ?>">退出登录</a> </li>					
					</ul>
				</div>
				<?php endif; ?>
			
	</div>
</form>
	</div>
	<br /><hr />

	<div>
		<h3><span class="icon-wrench"></span> 我的标签</h3>
		
		<h4>
			<div class="tag-ul">
			
			    <?php if(is_array($tags) || $tags instanceof \think\Collection): if( count($tags)==0 ) : echo "" ;else: foreach($tags as $i=>$vo): ?>
			 <a class="button button-little <?php echo rand_color($vo['tagname']); ?> shake-hover" href="/index/so/index.html?key=<?php echo $vo['tagname']; ?>"><?php echo $vo['tagname']; ?></a>  
			 <?php endforeach; endif; else: echo "" ;endif; ?>	
             </div>			
		</h4>
	</div>
	<hr />
	<h2 class="bg-main text-white padding">随机文章</h2>
	<div class="padding-big bg">
		<ul class="list-media list-underline">
		
		<?php if(is_array($randarticle) || $randarticle instanceof \think\Collection): if( count($randarticle)==0 ) : echo "" ;else: foreach($randarticle as $i=>$vo): ?>
			         <li>					
					<div class="media media-x img-small">						
						<a class="float-left" href="<?php echo url('article/index','id='.$vo['id']); ?>"><?php if(strtoupper($vo['thumb']) != ''): ?><img src="<?php echo $vo['thumb']; ?>" onerror="this.src='__public__images/default_thumb.png'"  class="radius" />
<?php else: ?><img src="__public__images/default_thumb.png" class="radius"/>
<?php endif; ?></a>						
						<div class="media-body">
							<strong> <?php echo $vo['title']; ?></strong><?php echo $vo['introduction']; ?>
							<a class="button button-little border-red swing-hover" href="<?php echo url('article/index','id='.$vo['id']); ?>">查看详情</a>
						</div>
					</div>						
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>	
				</ul>
	</div>
	<br />
	<div class="tab border-main" data-toggle="hover" style="height: 470px;">
		<div class="tab-head">

			<ul class="tab-nav">
				<li class="active"><a href="#tab-start2">最新留言</a> </li>
				<li><a href="#tab-css2">最多点击</a> </li>
				<li><a href="#tab-units2">申请友链</a> </li>
			</ul>
		</div>
		<div class="tab-body ">
			<div class="tab-panel active" id="tab-start2">				
				<?php if(is_array($messageinfo) || $messageinfo instanceof \think\Collection): if( count($messageinfo)==0 ) : echo "" ;else: foreach($messageinfo as $key=>$vo): ?>
								<div class="panel-group" style="border-top: solid 0px #ddd;">
						<div class="media media-x">
							<a class="float-left" href="/Liuyan/index.html">
														<?php if(strtoupper($vo['headimgurl']) != ''): ?><img src="<?php echo $vo['headimgurl']; ?>" class="radius-circle" width="60px" height="60px">
<?php else: ?><img src="__public__images/default_thumb.png" class="radius"/>
<?php endif; ?>
							</a>
							<div class="media-body">
								<strong><span class="icon-paper-plane"></span>  <?php echo $vo['nickname']; ?></strong>
								<span class="tag bg-dot"><?php echo $vo['os']; ?></span> <?php echo htmlspecialchars_decode($vo['content']) ?>
							</div>
						</div>
					</div>
					 <?php endforeach; endif; else: echo "" ;endif; ?>	
												
			</div>
			<div class="tab-panel" id="tab-css2" >
				   <?php if(is_array($htorticle) || $htorticle instanceof \think\Collection): if( count($htorticle)==0 ) : echo "" ;else: foreach($htorticle as $key=>$vo): ?>
				    <li style="margin-bottom:8px"><h4><a href="<?php echo url('article/index','id='.$vo['id']); ?>"><span class="icon-leaf"></span> <?php echo $vo['title']; ?></a></h4></li>
			      <?php endforeach; endif; else: echo "" ;endif; ?>	
		       <li style="margin-bottom:8px"></li>
			   </div>
			<div class="tab-panel" id="tab-units2">												
				<div class="panel-body">
					正在开发中，敬请期待。。。。
				</div>									
			</div>
		</div>
	</div>
	<div>
		<h3><span class="icon-retweet"></span> 友情链接</h3>
		<br />
		<div class="links">
		    <?php if(is_array($links) || $links instanceof \think\Collection): if( count($links)==0 ) : echo "" ;else: foreach($links as $key=>$vo): ?>
			<a href="<?php echo $vo['linkurl']; ?>" target="_blank" class="button border-blue" role="button"><?php echo $vo['linkname']; ?></a>&nbsp;
			 <?php endforeach; endif; else: echo "" ;endif; ?>	
			</div>
	</div>
	<br />
	<hr />
	<br />
	
</div>

	<script>
	
		$(function(){
		    $('#download').click(function(){
		    	var node ="<?php echo session('user_nickname'); ?>";

		    	if( node =='' || node == null){ 
					layer.alert("请您使用QQ登录后下载!",{icon: 5,}); 
					return false;
				}

				 return true;
		    });		    
		})

	</script> 	
			</div>
		</div>	
		<div class="container-layout bg-black">
    <div class="border-top padding-top foot">
        <div class="text-center">
            <ul class="nav nav-inline">
            	
                <li><a href="/">网站首页</a> </li>
                <li><a href="#">技术反馈</a> </li>
                <li><a href="#">留言反馈</a> </li>
                <li><a href="#">联系方式</a> </li>
            </ul>
			
        </div>
        <div class="text-center height-big">
            Copyright © 2014 - 2016  <?php echo $site_config['site_copyright']; ?>  & 版权所有&nbsp;&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn/" class="foot-my" target="_blank"><?php echo $site_config['site_icp']; ?></a>        |<a href="/index.php/admin/" target="_blank"> 博客管理  </a>
        |<?php echo $site_config['site_tongji']; ?>
        </div>
    </div>
</div> 	

	</body>
</html>