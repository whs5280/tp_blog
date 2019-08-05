<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"application\install\view\index\index.html";i:1482755628;s:41:"application\install\view\Public\head.html";i:1482755643;s:43:"application\install\view\Public\header.html";i:1482756510;s:43:"application\install\view\Public\footer.html";i:1482755854;}*/ ?>
<!doctype html>
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
		<div class="section">
			<div class="main">
				<pre class="agreement">
 	<h1><?php echo config('systemname'); ?>安装协议</h1><hr>
版权所有 (c) 2016<?php echo config('systemname'); ?><br>
感谢您选择<?php echo config('systemname'); ?>，希望我们的努力能为您提供一个简单、强大的站点解决方案。
<br><?php echo config('systemname'); ?>遵循Apache Licence2开源协议，并且免费使用（但不包括其衍生产品、插件或者服务）。
关的约束和限制。</pre>
			</div>
			<div class="bottom text-center">
				<a href="<?php echo url('index/step2'); ?>" class="btn btn-primary">接 受</a>
			</div>
		</div>
	</div>

	<div class="footer">
	&copy; 2015-<?php echo date('Y'); ?> <?php echo config('systemname'); ?>
</div> 
</body>
</html>