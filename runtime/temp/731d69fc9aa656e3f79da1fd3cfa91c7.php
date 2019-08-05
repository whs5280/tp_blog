<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"application\install\view\index\step3.html";i:1482756346;s:41:"application\install\view\Public\head.html";i:1482755643;s:43:"application\install\view\Public\header.html";i:1482756510;s:43:"application\install\view\Public\footer.html";i:1482755854;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo config('systemname'); ?>安装</title>
<link href="__PUBLIC__install/css/adminstyle.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__install/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
<style>
body {
	font: 12px/1.5 Arial, Microsoft Yahei, Simsun;
	color: #333;
}

.wrap {
	margin: 50px auto 0;
	box-shadow: 0 0 1px #ccc;
	width: 750px;
	background: #fff;
	border-radius: 3px;
}

.main{
	padding-top:30px;
}

.header {
	background: #2c3e50;
	height: 60px;
	position: relative;
	color: #fff;
	border-radius: 3px 3px 0 0;
}

.footer {
	text-align: center;
	padding: 15px 0 50px;
	color: #999999;
}

.footer a {
	color: #999;
	text-decoration: none;
}
.unstyled{list-style-type: none;}
.bottom {
	padding: 0 0 25px;
}

.agreement {
	box-shadow: 5px 5px 5px #f7f7f7 inset;
	border: 1px solid #bdbcbc;
	width: 670px;
	height: 350px;
	padding: 10px;
	overflow: hidden;
	display: block;
	overflow-y: scroll;
	margin: 0 auto;
	font-size: 12px;
	line-height: 1.5;
	margin-bottom: 22px;
	outline: none;
}

pre {
	white-space: pre-wrap;
	white-space: -moz-pre-wrap;
	white-space: -pre-wrap;
	white-space: -o-pre-wrap;
	word-wrap: break-word;
	word-break: normal;
}

.version {
	float: right;
	margin: 0 20px 0 0;
	height: 100%;
	line-height: 60px;
}

.logo {
	float: left;
	width: auto;
	height: 60px;
	overflow: hidden;
	font-size: 24px;
	line-height: 60px;
	padding: 0 15px;
	margin: 0;
	font-weight:normal;
}

.step {
	border-bottom: 1px solid #dce1e5;
	height: 60px;
	background-color: #fff;
}

.step li {
	float: left;
	height: 60px;
	line-height: 60px;
	width: 33%;
	text-align: center;
	font-size: 14px;
	color: #6f7885;
	font-weight: 700;
}

.step li em {
	width: 32px;
	height: 32px;
	text-align: center;
	line-height: 32px;
	display: inline-block;
	font-size: 20px;
	color: #fff;
	font-family: Microsoft Yahei;
	margin-right: 10px;
	vertical-align: 0;
	background-color: #ddd;
    border-radius: 50%;
}

.step li.current {
	color: #2c3e50;
}

.step li.current em {
	background:#2c3e50;
}

.server {
	padding: 20px 20px 10px 65px;
}

.server table {
	margin-bottom: 20px;
}

.server td {
	padding: 3px 5px;
}

.server .td1 {
	color: #2c3e50;
	font-weight: 700;
}

.server .input {
	border-width: 1px;
	/* padding: 3px; */
	width: 200px;
	margin:0;
}

.server .input:hover, .server .input:focus {
	outline: none;
}

.gray {
	color: #bbb;
}

.server tr:hover .gray {
	color: #333;
}

.correct.fa{
	color:#1dccaa;
	font-size:16px;
}
.error.fa{
	color:#e95d4e;
	font-size:16px;
}

.install {
	box-shadow: 5px 5px 5px #f7f7f7 inset;
	border: 1px solid #bdbcbc;
	width: 670px;
	height: 350px;
	padding: 10px;
	overflow: hidden;
	display: block;
	overflow-y: scroll;
	margin: 25px auto;
	font-size: 12px;
	margin-bottom: 22px;
	outline: none;
}

.install ul {
	line-height: 1.8;
}

/*
===================
操作提示
>>	tips					普通
>>	tips-error		错误
>>	tips-success	正确
>>	tips-loading	加载中
使用方法
	可独立样式使用，亦可与tips组装，例：
	<div class="tips"><span class="tips-error">错误内容</span></div>
	
	可在外出包裹 tips-block 对错误提示进行块级效果展示
===================
*/
.tips, .tips-block span {
	line-height: 25px;
	padding: 0 6px;
}

.tips {
	border: 1px solid #faebd2;
	background: #ffffe9;
	color: #666;
}

.tips-error, .tips-success {
	color: #cc3333;
	padding-left: 0px;
	display: inline-block;
	line-height: 18px;
}

.tips-success {
	color: #008800;
	background-position: 0 -19px;
}

.tips-loading {
	color: #cc3333;
	color: #333333;
	display: inline-block;
	line-height: 20px;
}

.question{
	color:#f4a425;
	cursor:pointer;
}

.question:hover{
	color:#D08207;
}
</style> 
</head>
<body>
	<div class="wrap">
		<div class="header">
	<h1 class="logo"><?php echo config('systemname'); ?> 安装向导</h1>
	<div class="version"><?php echo config('version'); ?> </div>
</div> 
		<section class="section">
			<div class="step">
				<ul class="unstyled">
					<li class="on"><em>1</em>检测环境</li>
					<li class="current"><em>2</em>创建数据</li>
					<li><em>3</em>完成安装</li>
				</ul>
			</div>
			<form class="form-horizontal" action="<?php echo url('index/step4'); ?>" id="form" method="post">
				<input type="hidden" name="force" value="0" />
				<div class="server">
					<table width="100%">
						<tr>
							<td class="td1" width="100">数据库信息</td>
							<td class="td1" width="200">&nbsp;</td>
							<td class="td1">&nbsp;</td>
						</tr>
							<tr>
							<td class="text-left">数据库类型：</td>
							<td><input type="text"  name="db[]" id="input1" readonly="redonly" value="mysql"  class="form-control">
</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td class="text-left">数据库服务器：</td>
							<td><input type="text" name="db[]" id="input2" value="127.0.0.1" class="form-control"></td>
							<td>
								<div id="js-install-tip-dbhost">
									<span class="gray">数据库服务器地址，一般为localhost或127.0.0.1</span>
								</div>
							</td>
						</tr>
									<tr>
							<td class="text-left">数据库名：</td>
							<td><input type="text" name="db[]" id="input6" value="KenCMS" class="form-control"></td>
							<td></td>
						</tr>
						
						<tr>
							<td class="text-left">数据库用户名：</td>
							<td><input type="text" name="db[]" id="input4" value="root" class="form-control"></td>
							<td><div id="js-install-tip-dbuser"></div></td>
						</tr>
						<tr>
							<td class="text-left">数据库密码：</td>
							<td><input type="password" name="db[]" id="input5" value="" class="form-control" autoComplete="off" onBlur="TestDbPwd()"></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-left">数据库端口：</td>
							<td><input type="text" name="db[]" id="input3" value="3306" class="form-control"></td>
							<td>
								<div id="js-install-tip-dbport">
									<span class="gray">数据库服务器端口，一般为3306</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="text-left">数据库表前缀：</td>
							<td><input type="text" name="db[]" id="input7" value="<?php echo config('original_table_prefix'); ?>" class="form-control"></td>
							<td>
								<div id="js-install-tip-dbprefix">
									<span class="gray">建议使用默认，同一数据库安装多个时需修改</span>
								</div>
							</td>
						</tr>
					</table>
					
					<table width="100%">
						<tr>
				
							<td class="td1" width="100">创始人信息</td>
							<td class="td1" width="200">&nbsp;</td>
							<td class="td1">&nbsp;</td>
						</tr>
						<tr>
							<td class="text-left">管理员帐号：</td>
							<td><input type="text" name="admin[]" id="input8" class="form-control"></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-left">密码：</td>
							<td><input type="password" name="admin[]" id="input9" class="form-control" ></td>
							<td></td>
						</tr>
						<tr>
							<td class="text-left">重复密码：</td>
							<td><input type="password" name="admin[]" id="input10" class="form-control"></td>
							<td></td>
						</tr>
					
					</table>
					<div id="js-response-tips" style="display: none;"></div>
				</div>
				<div class="bottom text-center">
					<a href="<?php echo url('index/step2'); ?>" class="btn btn-primary">上一步</a>
					<button type="submit" class="btn btn-primary" onClick="Createinfo()">创建数据</button>
				</div>
			</form>
		</section>
	</div>
	<div class="footer">
	&copy; 2015-<?php echo date('Y'); ?> <?php echo config('systemname'); ?>
</div> 
</body>
</html>