-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-11-07 18:32:11
-- 服务器版本： 5.5.54-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_511`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_admin_user`
--

CREATE TABLE IF NOT EXISTS `think_admin_user` (
  `id` smallint(5) unsigned NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 启用 0 禁用',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录IP'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `think_admin_user`
--

INSERT INTO `think_admin_user` (`id`, `username`, `password`, `headimgurl`, `status`, `create_time`, `last_login_time`, `last_login_ip`) VALUES
(1, 'admin', 'b63ddacba6c3835cc1b250c5d9de6ac1', '', 1, '2017-10-25 10:13:29', '2017-10-25 10:13:53', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `think_advertising`
--

CREATE TABLE IF NOT EXISTS `think_advertising` (
  `id` int(10) unsigned NOT NULL,
  `adname` varchar(50) NOT NULL DEFAULT '' COMMENT '广告名称',
  `adurl` varchar(50) NOT NULL DEFAULT '' COMMENT '链接地址',
  `adpic` varchar(255) DEFAULT NULL COMMENT '广告图片',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 正常 2 禁止',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `think_advertising`
--

INSERT INTO `think_advertising` (`id`, `adname`, `adurl`, `adpic`, `sort`, `status`, `create_time`) VALUES
(2, 'PK', '#', '/public/uploads/20161222/32ed6923707e9a8feb84d3d971954c53.jpg', 3, 1, '2016-12-15 15:39:29'),
(3, '学习', '#', '/public/uploads/20161222/6998df8e5e2297c16288aacf80ede069.jpg', 2, 1, '2016-12-15 18:52:04'),
(4, '圣诞', '#', '/public/uploads/20161222/5f60a95b2af69f944ab4e07eafc5df3f.jpg', 1, 1, '2016-12-22 16:39:05');

-- --------------------------------------------------------

--
-- 表的结构 `think_article`
--

CREATE TABLE IF NOT EXISTS `think_article` (
  `id` int(10) unsigned NOT NULL COMMENT '文章ID',
  `cid` smallint(5) unsigned NOT NULL COMMENT '分类ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `introduction` varchar(255) DEFAULT '' COMMENT '简介',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词用,隔开也相关于Tag',
  `content` longtext COMMENT '内容',
  `author` varchar(20) DEFAULT '' COMMENT '作者',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 待审核  1 审核',
  `reading` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `photo` text COMMENT '图集',
  `template` varchar(50) DEFAULT '' COMMENT '文章模板',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶  0 不置顶  1 置顶',
  `is_good` tinyint(3) unsigned DEFAULT NULL COMMENT '是否推荐 0 不推荐 1 推荐',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `tag` tinyint(3) unsigned DEFAULT '0' COMMENT '标签 0 转载 1 原创',
  `position` varchar(100) DEFAULT NULL COMMENT '所在位置',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `publish_time` datetime NOT NULL COMMENT '发布时间'
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `think_article`
--

INSERT INTO `think_article` (`id`, `cid`, `title`, `introduction`, `keywords`, `content`, `author`, `status`, `reading`, `thumb`, `photo`, `template`, `is_top`, `is_good`, `sort`, `tag`, `position`, `create_time`, `publish_time`) VALUES
(38, 1, '本博客2.0版本已开源！', '博客后台采用ThinkPHP V5.0，前端页面使用bootstrap3.0开发；\n博客模板为响应式设计，可兼容手机访问。\n亮点：本博客QQ快速登陆,无需申请QQ互联,也不需要任何配置就能用QQ快速登陆博客！', 'ThinkPHP，bootstrap，响应式，兼容手机，QQ互联', '<p>博客后台采用ThinkPHP V5.0，前端页面使用bootstrap3.0开发；</p><p>博客模板为响应式设计，可兼容手机访问。</p><p><b>亮点：</b>本博客QQ快速登陆,无需申请QQ互联,也不需要任何配置就能用QQ快速登陆博客！</p><p><span>适合新手<img src="http://www.xuexiaofeng.com/Public/Common/kindeditor/attached/image/20160307/20160307223955_58373.jpg" alt=""><br><br></span></p><p><span>大神路过看看就行<img src="http://www.xuexiaofeng.com/Public/Common/kindeditor/attached/image/20160307/20160307224017_34126.gif" alt=""></span></p>', 'admin', 1, 266, '/public/uploads/20161222/09ec22db8e85801deff87431f63e80a1.jpg', NULL, '', 1, 1, 0, 1, '广东省广州市', '2016-12-22 17:04:38', '2016-12-22 17:00:42'),
(36, 1, 'php对字符串进行倒叙', '', 'php', '<pre class="prettyprint lang-php">str_split() 函数把字符串分割到数组中。\narray_reverse() 接受数组 array 作为输入并返回一个单元为相反顺序的新数组\nimplode() 函数把数组元素组合为一个字符串。</pre>', 'admin', 1, 52, '/public/uploads/20161222/13e8edc12bd9bf284df8806c581b1512.jpg', NULL, '', 0, 0, 0, 0, '广东省广州市', '2016-12-22 16:51:35', '2016-12-22 16:50:53'),
(37, 1, 'php格式化商品价格', '', 'php，格式化', '<pre class="prettyprint lang-php">/**\n * 格式化商品价格\n * @access  public\n * @param   float   $price  商品价格\n * @return  string\n */\nfunction price_format($price, $change_price = true){\n    if($price===''''){\n        $price=0;\n    }\n    if($change_price){\n        switch ($price){\n            case 0:\n                $price = number_format($price, 2, ''.'', '''');\n                break;\n            case 1: // 保留不为 0 的尾数\n                $price = preg_replace(''/(.*)(\\\\.)([0-9]*?)0+$/'', ''\\1\\2\\3'', number_format($price, 2, ''.'', ''''));\n                if (substr($price, -1) == ''.''){\n                    $price = substr($price, 0, -1);\n                }\n                break;\n            case 2: // 不四舍五入，保留1位\n                $price = substr(number_format($price, 2, ''.'', ''''), 0, -1);\n                break;\n            case 3: // 直接取整\n                $price = intval($price);\n                break;\n            case 4: // 四舍五入，保留 1 位\n                $price = number_format($price, 1, ''.'', '''');\n                break;\n            case 5: // 先四舍五入，不保留小数\n                $price = round($price);\n                break;\n        }\n    }else{\n        $price = number_format($price, 2, ''.'', '''');\n    }\n\n    return $price;\n}</pre>', 'admin', 1, 56, '/public/uploads/20161222/f21919f7e6d09b5763ec2dc08a2ca775.jpg', NULL, '', 0, 0, 0, 0, '广东省广州市', '2016-12-22 16:53:02', '2016-12-22 16:51:36'),
(35, 1, 'php逐个汉字遍历字符串', 'php逐个汉字遍历字符串', '中文分词', '<p><span>php逐个汉字遍历字符串</span></p><p></p><pre class="prettyprint lang-php"><pre class="prettyprint lang-php">function str_split_unicode($str, $l = 0) {\n    if ($l &gt; 0) {\n        $ret = array();\n        $len = mb_strlen($str, "UTF-8");\n        for ($i = 0; $i &lt; $len; $i += $l) {\n            $ret[] = mb_substr($str, $i, $l, "UTF-8");\n        }\n        return $ret;\n    }\n    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);\n}</pre>\n</pre>', 'admin', 1, 15, '/public/uploads/20161222/f6bddbde8defb8a9f44f53af73eb6ccb.jpg', NULL, '', 0, 0, 0, 0, '广东省广州市', '2016-12-22 16:44:07', '2016-12-22 16:42:28'),
(39, 3, 'Apache开启伪静态', 'php访问静态页面报错，这些都是apache伪静态没开启,没支持网站下.htaccess文件原因造成的。因为采用了伪静态技术，所以web服务器必须开启伪静态 。', 'Apache，伪静态', '<p><strong>环境：</strong><br>系统 Windows8.1<br>Apache 2.2</p><p><strong>加载Rewrite模块：</strong></p><p>在conf目录下httpd.conf中找到<br></p><p>LoadModule&nbsp;rewrite_module&nbsp;modules/mod_rewrite.so</p><p><br>这句，去掉前边的注释符号“#”，或添加这句。</p><p>允许在任何目录中使用“.htaccess”文件，将“AllowOverride”改成“All”（默认为“None”）：</p><div id="highlighter_232160" class="syntaxhighlighter  "><div class="lines"><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">1</code></td><td class="content"><code class="plain">#&nbsp;AllowOverride&nbsp;controls&nbsp;what&nbsp;directives&nbsp;may&nbsp;be&nbsp;placed&nbsp;in&nbsp;.htaccess&nbsp;files.</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">2</code></td><td class="content"><code class="plain">#&nbsp;It&nbsp;can&nbsp;be&nbsp;“All”,&nbsp;“None”,&nbsp;</code><code class="keyword">or</code>&nbsp;<code class="plain">any&nbsp;combination&nbsp;of&nbsp;the&nbsp;keywords:</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">3</code></td><td class="content"><code class="plain">#&nbsp;Options&nbsp;FileInfo&nbsp;AuthConfig&nbsp;Limit</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">4</code></td><td class="content"><code class="plain">#</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">5</code></td><td class="content"><code class="plain">AllowOverride&nbsp;All</code></td></tr></tbody></table></div></div></div><p><br></p><p>&nbsp;</p><p>在Windows系统下不能直接建立“.htaccess”文件，可以在命令行下使用“echo a&gt; .htaccess”建立，然后使用记事本编辑。</p><p>Apache Rewrite模块的简单应用：<br>Rewrite的所有判断规则均基于Perl风格的正则表达式，通过以下基础示例能写出符合自己跳转需求的代码。</p><p><strong>1、请求跳转</strong></p><p>目的是如果请求为.jsp文件，则跳转至其它域名访问。</p><p>例如：访问www.clin003.com/a.php跳转至b.clin003.com/b.php网页，访问www.clin003.com/news/index.php跳转至b.clin003.com/news/index.php网页</p><p>注意：不是使用HTML技术中的meta或者javas<wbr><wbr>cript方式，因为www.clin003.com/a.php这个文件并不存在，用的是Apache2.2服务器中的Rewrite模块。</p><p>修改 .htaccess或apche的配置文件httpd.conf文件，添加以下内容</p><div id="highlighter_620675" class="syntaxhighlighter  "><div class="lines"><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">1</code></td><td class="content"><code class="plain">RewriteEngine&nbsp;on</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">2</code></td><td class="content"><code class="plain">#开启Rewrite模块</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">3</code></td><td class="content"><code class="plain">RewriteRule&nbsp;(.*)\\.php$&nbsp;http:</code><code class="comments">//b.clin003.com/$1\\.jsp&nbsp;[R=301,L,NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">4</code></td><td class="content"><code class="plain">#截获所有.jsp请求，跳转到http:</code><code class="comments">//b.clin003.com/加上原来的请求再加上.php。R=301为301跳转，L为rewrite规则到此终止，NC为不区分大小写</code></td></tr></tbody></table></div></div></div><p><br></p><p><br></p><p><strong>2、域名跳转</strong></p><p>如果请求为old.clin003.com下的所有URL，跳转至b.clin003.com</p><div id="highlighter_680934" class="syntaxhighlighter  "><div class="lines"><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">1</code></td><td class="content"><code class="plain">RewriteEngine&nbsp;on</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">2</code></td><td class="content"><code class="plain">#开启Rewrite模块</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">3</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{REMOTE_HOST}&nbsp;^old.studenthome.cn$&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">4</code></td><td class="content"><code class="plain">#针对host为old.clin003.com的主机做处理，^为开始字符，$为结尾字符</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">5</code></td><td class="content"><code class="plain">RewriteRule&nbsp;(.*)&nbsp;http:</code><code class="comments">//b.clin003.com/$1&nbsp;[R=301,L,NC]</code></td></tr></tbody></table></div></div></div><p><br></p><p><strong>3、防盗链</strong></p><p>如果本网站的图片不想让其它网站调用，可以在 .htaccess或者apche的配置文件httpd.conf文件中添加以下内容</p><p><br></p><div id="highlighter_220769" class="syntaxhighlighter  "><div class="lines"><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">01</code></td><td class="content"><code class="plain">RewriteEngine&nbsp;on</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">02</code></td><td class="content"><code class="plain">#开启Rewrite模块</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">03</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!^$</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">04</code></td><td class="content"><code class="plain">#如果不是直接输入图片地址</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">05</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!img.clin003.com$&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">06</code></td><td class="content"><code class="plain">#且如果不是img.clin003.com所有子域名调用的</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">07</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!img.clin003.com/(.*)$&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">08</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!zhuaxia.com&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">09</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!google.com&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">10</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!google.cn&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">11</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!baidu.com&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">12</code></td><td class="content"><code class="plain">RewriteCond&nbsp;%{HTTP_REFERER}&nbsp;!feedsky.com&nbsp;[NC]</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">13</code></td><td class="content"><code class="plain">RewriteRule&nbsp;(.*)\\.(jpg|jpeg|jpe|gif|bmp|png|wma|mp3|wav|avi|mp4|flv|swf)$&nbsp;http:</code><code class="comments">//clin003.com/err.jpg&nbsp;[R=301,L,NC]</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">14</code></td><td class="content"><code class="plain">#截获所有.jpg或.jpeg……请求，跳转到http:</code><code class="comments">//clin003.com/err.jpg提示错误的图片，注：该图片不能在原域名下，也不能在该.htaccess文件有效控制的文件夹中</code></td></tr></tbody></table></div></div></div><p></p><p>4、不需要定义.htaccess文件</p><p>在Apache2\\conf\\httpd.conf 最后一行添加</p><p>RewriteEngine&nbsp;On<br>RewriteRule&nbsp;^(.*)-htm-(.*)$&nbsp;$1.php?$2</p><p><br></p><p>5.重启Apache即可</p>', 'admin', 1, 45, '/public/uploads/20161222/d5056da3b6e6ab9ee3f977c9c2694d2e.png', NULL, '', 0, 0, 0, 0, '广东省广州市', '2016-12-22 17:19:29', '2016-12-22 17:18:51'),
(40, 1, 'PHP实现时间轴函数', '本文介绍如何用PHP将时间显示为“刚刚”、“5分钟前”、“昨天10:23”等时间轴形式，而不是直接显示具体日期和时间。', '', '<p>本文将介绍如何实现基于时间轴的时间的转换。</p><p>首先我们要明白时间的几个函数：</p><p>time():返回当前的 Unix 时间戳</p><p>date():格式化一个本地时间／日期。</p><p>应用举例：</p><pre><code class="php">date(<span class="php__string2">"Y-m-d&nbsp;H:i:s"</span>,time());&nbsp;<br></code></pre><p>格式化当前时间，输出：2010-10-11 05:27:35</p><p>strtotime():将任何英文文本的日期时间描述解析为 Unix 时间戳。</p><p>应用举例：</p><pre><code class="php"><span class="php__keyword">echo</span>&nbsp;strtotime(<span class="php__string2">"+1&nbsp;day"</span>),&nbsp;<span class="php__string2">"n"</span>;&nbsp;<br></code></pre><p>输出1天前的时间戳：1286861475</p><p>date_default_timezone_set():设定要用的默认时区。</p><p>一般我们设置北京时间：date_default_timezone_set("PRC");</p><p>理解上面几个函数后我们来写时间轴函数：</p><p>该函数的原理就是将系统当前时间与目标时间比较，得到一个差值，再将差值与时间范围（转换成秒）比较，根据其处在时间轴的范围输出不同的结果（如：5分钟前）。为了便于计算，我们将时间都转换成Unix时间戳。</p><div id="highlighter_178539" class="syntaxhighlighter  "><div class="lines"><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">01</code></td><td class="content"><code class="keyword">function</code>&nbsp;<code class="plain">tranTime(</code><code class="variable">$time</code><code class="plain">)&nbsp;{&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">02</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$rtime</code>&nbsp;<code class="plain">=&nbsp;</code><code class="functions">date</code><code class="plain">(</code><code class="string">"Y-m-d&nbsp;H:i"</code><code class="plain">,&nbsp;</code><code class="variable">$time</code><code class="plain">);&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">03</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$htime</code>&nbsp;<code class="plain">=&nbsp;</code><code class="functions">date</code><code class="plain">(</code><code class="string">"H:i"</code><code class="plain">,&nbsp;</code><code class="variable">$time</code><code class="plain">);&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">04</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$time</code>&nbsp;<code class="plain">=&nbsp;time()&nbsp;-&nbsp;</code><code class="variable">$time</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">05</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="keyword">if</code>&nbsp;<code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">&lt;&nbsp;60)&nbsp;{&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">06</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="string">''刚刚''</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">07</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="plain">}&nbsp;</code><code class="keyword">elseif</code>&nbsp;<code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">&lt;&nbsp;60&nbsp;*&nbsp;60)&nbsp;{&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">08</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$min</code>&nbsp;<code class="plain">=&nbsp;</code><code class="functions">floor</code><code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">/&nbsp;60);&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">09</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="variable">$min</code>&nbsp;<code class="plain">.&nbsp;</code><code class="string">''分钟前''</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">10</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="plain">}&nbsp;</code><code class="keyword">elseif</code>&nbsp;<code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">&lt;&nbsp;60&nbsp;*&nbsp;60&nbsp;*&nbsp;24)&nbsp;{&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">11</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$h</code>&nbsp;<code class="plain">=&nbsp;</code><code class="functions">floor</code><code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">/&nbsp;(60&nbsp;*&nbsp;60));&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">12</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="variable">$h</code>&nbsp;<code class="plain">.&nbsp;</code><code class="string">''小时前&nbsp;''</code>&nbsp;<code class="plain">.&nbsp;</code><code class="variable">$htime</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">13</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="plain">}&nbsp;</code><code class="keyword">elseif</code>&nbsp;<code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">&lt;&nbsp;60&nbsp;*&nbsp;60&nbsp;*&nbsp;24&nbsp;*&nbsp;3)&nbsp;{&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">14</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$d</code>&nbsp;<code class="plain">=&nbsp;</code><code class="functions">floor</code><code class="plain">(</code><code class="variable">$time</code>&nbsp;<code class="plain">/&nbsp;(60&nbsp;*&nbsp;60&nbsp;*&nbsp;24));&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">15</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="keyword">if</code>&nbsp;<code class="plain">(</code><code class="variable">$d</code>&nbsp;<code class="plain">==&nbsp;1)&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">16</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="string">''昨天&nbsp;''</code>&nbsp;<code class="plain">.&nbsp;</code><code class="variable">$rtime</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">17</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="keyword">else</code>&nbsp;</td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">18</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="string">''前天&nbsp;''</code>&nbsp;<code class="plain">.&nbsp;</code><code class="variable">$rtime</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">19</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="plain">}&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">20</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="keyword">else</code>&nbsp;<code class="plain">{&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">21</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="variable">$str</code>&nbsp;<code class="plain">=&nbsp;</code><code class="variable">$rtime</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">22</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="plain">}&nbsp;</code></td></tr></tbody></table></div><div class="line alt1"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">23</code></td><td class="content"><code class="spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="keyword">return</code>&nbsp;<code class="variable">$str</code><code class="plain">;&nbsp;</code></td></tr></tbody></table></div><div class="line alt2"><table class="layui-table"><tbody><tr><td class="number"><code style="text-align: right;">24</code></td><td class="content"><code class="plain">}</code></td></tr></tbody></table></div></div></div><p>&nbsp; &nbsp; 函数tranTime()中的参数$time必须为Unix时间戳，如果不是请先用strtotime()将其转换成Unix时间戳。上面的代码一看就明白了，不用再多述。</p><p>调用函数，直接输出：</p><pre><code class="php"><span class="php__keyword">$</span><span class="php__variable">times</span>=<span class="php__string2">"1286861696&nbsp;"</span>;&nbsp;<br><span class="php__keyword">echo</span>&nbsp;tranTime(<span class="php__keyword">$</span><span class="php__variable">times</span>);&nbsp;</code></pre><div><code class="php"><br></code></div>', 'admin', 1, 91, '/public/uploads/20161222/3241ceee5d9fd116540b2aca6056349c.jpg', NULL, '', 0, 0, 0, 0, '广东省广州市', '2016-12-22 17:23:03', '2016-12-22 17:22:17');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group`
--

CREATE TABLE IF NOT EXISTS `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL COMMENT '权限规则ID'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='权限组表';

--
-- 转存表中的数据 `think_auth_group`
--

INSERT INTO `think_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理组', 1, '1,2,3,5,6,7,8,9,10,11,12,39,40,41,42,43,14,13,20,21,22,23,24,15,25,26,27,28,29,30,16,17,44,45,46,47,48,18,49,50,51,52,53,19,31,32,33,34,35,36,37,54,55,56,57,58,59,60,61,62'),
(5, '测试组', 1, '14,13,23,15,30');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限组规则表';

--
-- 转存表中的数据 `think_auth_group_access`
--

INSERT INTO `think_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 5);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_rule`
--

CREATE TABLE IF NOT EXISTS `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '规则名称',
  `title` varchar(20) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `pid` smallint(5) unsigned NOT NULL COMMENT '父级ID',
  `icon` varchar(50) DEFAULT '' COMMENT '图标',
  `sort` tinyint(4) unsigned NOT NULL COMMENT '排序',
  `condition` char(100) DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='规则表';

--
-- 转存表中的数据 `think_auth_rule`
--

INSERT INTO `think_auth_rule` (`id`, `name`, `title`, `type`, `status`, `pid`, `icon`, `sort`, `condition`) VALUES
(1, 'admin/System/default', '系统配置', 1, 1, 0, 'fa fa-gear', 0, ''),
(2, 'admin/System/siteConfig', '站点配置', 1, 1, 1, '', 0, ''),
(3, 'admin/System/updateSiteConfig', '更新配置', 1, 0, 2, '', 0, ''),
(5, 'admin/Menu/default', '菜单管理', 1, 1, 0, 'fa fa-list', 0, ''),
(6, 'admin/Menu/index', '后台菜单', 1, 1, 5, '', 0, ''),
(7, 'admin/Menu/add', '添加菜单', 1, 0, 6, '', 0, ''),
(8, 'admin/Menu/save', '保存菜单', 1, 0, 6, '', 0, ''),
(9, 'admin/Menu/edit', '编辑菜单', 1, 0, 6, '', 0, ''),
(10, 'admin/Menu/update', '更新菜单', 1, 0, 6, '', 0, ''),
(11, 'admin/Menu/delete', '删除菜单', 1, 0, 6, '', 0, ''),
(12, 'admin/Nav/index', '导航管理', 1, 1, 5, '', 0, ''),
(13, 'admin/Category/index', '栏目管理', 1, 1, 14, 'fa fa-sitemap', 0, ''),
(14, 'admin/Content/default', '内容管理', 1, 1, 0, 'fa fa-file-text', 0, ''),
(15, 'admin/Article/index', '文章管理', 1, 1, 14, '', 0, ''),
(16, 'admin/User/default', '用户管理', 1, 1, 0, 'fa fa-users', 0, ''),
(17, 'admin/User/index', '普通用户', 1, 1, 16, '', 0, ''),
(18, 'admin/AdminUser/index', '管理员', 1, 1, 16, '', 0, ''),
(19, 'admin/AuthGroup/index', '权限组', 1, 1, 16, '', 0, ''),
(20, 'admin/Category/add', '添加栏目', 1, 0, 13, '', 0, ''),
(21, 'admin/Category/save', '保存栏目', 1, 0, 13, '', 0, ''),
(22, 'admin/Category/edit', '编辑栏目', 1, 0, 13, '', 0, ''),
(23, 'admin/Category/update', '更新栏目', 1, 0, 13, '', 0, ''),
(24, 'admin/Category/delete', '删除栏目', 1, 0, 13, '', 0, ''),
(25, 'admin/Article/add', '添加文章', 1, 0, 15, '', 0, ''),
(26, 'admin/Article/save', '保存文章', 1, 0, 15, '', 0, ''),
(27, 'admin/Article/edit', '编辑文章', 1, 0, 15, '', 0, ''),
(28, 'admin/Article/update', '更新文章', 1, 0, 15, '', 0, ''),
(29, 'admin/Article/delete', '删除文章', 1, 0, 15, '', 0, ''),
(30, 'admin/Article/toggle', '文章审核', 1, 0, 15, '', 0, ''),
(31, 'admin/AuthGroup/add', '添加权限组', 1, 0, 19, '', 0, ''),
(32, 'admin/AuthGroup/save', '保存权限组', 1, 0, 19, '', 0, ''),
(33, 'admin/AuthGroup/edit', '编辑权限组', 1, 0, 19, '', 0, ''),
(34, 'admin/AuthGroup/update', '更新权限组', 1, 0, 19, '', 0, ''),
(35, 'admin/AuthGroup/delete', '删除权限组', 1, 0, 19, '', 0, ''),
(36, 'admin/AuthGroup/auth', '授权', 1, 0, 19, '', 0, ''),
(37, 'admin/AuthGroup/updateAuthGroupRule', '更新权限组规则', 1, 0, 19, '', 0, ''),
(39, 'admin/Nav/add', '添加导航', 1, 0, 12, '', 0, ''),
(40, 'admin/Nav/save', '保存导航', 1, 0, 12, '', 0, ''),
(41, 'admin/Nav/edit', '编辑导航', 1, 0, 12, '', 0, ''),
(42, 'admin/Nav/update', '更新导航', 1, 0, 12, '', 0, ''),
(43, 'admin/Nav/delete', '删除导航', 1, 0, 12, '', 0, ''),
(44, 'admin/User/add', '添加用户', 1, 0, 17, '', 0, ''),
(45, 'admin/User/save', '保存用户', 1, 0, 17, '', 0, ''),
(46, 'admin/User/edit', '编辑用户', 1, 0, 17, '', 0, ''),
(47, 'admin/User/update', '更新用户', 1, 0, 17, '', 0, ''),
(48, 'admin/User/delete', '删除用户', 1, 0, 17, '', 0, ''),
(49, 'admin/AdminUser/add', '添加管理员', 1, 0, 18, '', 0, ''),
(50, 'admin/AdminUser/save', '保存管理员', 1, 0, 18, '', 0, ''),
(51, 'admin/AdminUser/edit', '编辑管理员', 1, 0, 18, '', 0, ''),
(52, 'admin/AdminUser/update', '更新管理员', 1, 0, 18, '', 0, ''),
(53, 'admin/AdminUser/delete', '删除管理员', 1, 0, 18, '', 0, ''),
(54, 'admin/database/default', '数据库', 1, 1, 0, 'fa fa-gears', 0, ''),
(55, '/admin/database/index/type/import', '数据库还原', 1, 1, 54, '', 0, ''),
(56, '/admin/database/index/type/export', '数据库备份', 1, 1, 54, '', 0, ''),
(57, 'admin/Link/default', '插件管理', 1, 1, 0, 'fa fa-link', 0, ''),
(58, 'admin/Links/index', '友情链接', 1, 1, 57, '', 0, ''),
(59, 'admin/Advertising/index', '广告管理', 1, 1, 57, '', 0, ''),
(60, 'admin/Tell/index', '说说管理', 1, 1, 57, '', 0, ''),
(61, 'admin/Guestbook/index', '留言管理', 1, 1, 57, '', 0, ''),
(62, 'admin/Tags/index', '标签管理', 1, 1, 57, '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `think_category`
--

CREATE TABLE IF NOT EXISTS `think_category` (
  `id` int(10) unsigned NOT NULL COMMENT '分类ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `alias` varchar(50) DEFAULT '' COMMENT '导航别名',
  `content` longtext COMMENT '分类内容',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `icon` varchar(20) DEFAULT '' COMMENT '分类图标',
  `template` varchar(50) NOT NULL DEFAULT '' COMMENT '分类模板',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '分类类型  1  列表  2 单页',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 转存表中的数据 `think_category`
--

INSERT INTO `think_category` (`id`, `pid`, `name`, `alias`, `content`, `thumb`, `icon`, `template`, `type`, `sort`) VALUES
(1, 0, 'thinkphp', '', '<p>thinkphp</p>', '', '', '', 1, 4),
(2, 0, '.NET技术', '', '<p>.NET技术</p>', '', '', '', 1, 2),
(3, 0, '学习笔记', '', '<p>学习笔记</p>', '', '', '', 1, 1),
(4, 0, 'PHP技术', '', '<p>PHP技术</p>', '', '', '', 1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_guestbook`
--

CREATE TABLE IF NOT EXISTS `think_guestbook` (
  `id` int(10) unsigned NOT NULL,
  `userid` int(11) DEFAULT '0' COMMENT '发布者ID',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `content` longtext COMMENT '留言内容',
  `userip` varchar(255) DEFAULT NULL COMMENT 'IP',
  `os` varchar(50) DEFAULT NULL COMMENT '操作系统',
  `position` varchar(100) DEFAULT NULL COMMENT '所在位置',
  `headimgurl` varchar(255) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  2 禁止',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `replycontent` longtext COMMENT '回复内容',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱'
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `think_guestbook`
--

INSERT INTO `think_guestbook` (`id`, `userid`, `nickname`, `content`, `userip`, `os`, `position`, `headimgurl`, `status`, `create_time`, `replycontent`, `email`) VALUES
(53, 5, 'Style', '效果杆杆的', NULL, 'windows', '广东广州', 'http://qzapp.qlogo.cn/qzapp/101258055/AD7E93DA25EB36F6E5657184705A323C/100', 1, '2016-12-22 21:14:54', NULL, 'ddd@163.com'),
(52, 7, '概念', '感觉美美哒！', NULL, 'windows', '广东广州', 'http://qzapp.qlogo.cn/qzapp/101258055/EAE7120CAF6C9FCF57D95BB1072CDF55/100', 1, '2016-12-22 18:12:04', NULL, 'kkk@163.com'),
(51, 5, 'Style', '测试下留言效果', NULL, 'windows', '广东省广州市', 'http://qzapp.qlogo.cn/qzapp/101258055/AD7E93DA25EB36F6E5657184705A323C/100', 1, '2016-12-22 16:55:02', NULL, '25845555@qq.com'),
(54, 5, 'Style', '让我说点什么好呢？', NULL, 'windows', '广东广州', 'http://qzapp.qlogo.cn/qzapp/101258055/AD7E93DA25EB36F6E5657184705A323C/100', 1, '2016-12-23 11:23:00', NULL, '225@qq.com'),
(55, 19, '✅绵羊哥哥', '222222222222222222', NULL, 'windows', '江苏南京', 'http://qzapp.qlogo.cn/qzapp/101258055/657568CA11025257E97347D5B094D408/100', 1, '2017-10-25 16:01:11', NULL, '222222222@qq.com'),
(56, 29, 'php-zyy', 'sasasasasas', NULL, 'windows', '河南郑州', 'http://qzapp.qlogo.cn/qzapp/101258055/E4049EE39C9B9A17726CA5F32E45CAF0/100', 1, '2017-10-25 16:29:15', NULL, 'niaho@qq.com'),
(57, 32, '风三郎', '哈哈是吗', NULL, 'windows', '四川成都', 'http://qzapp.qlogo.cn/qzapp/101258055/E899B56FD5B77A58A95584D248E0EABB/100', 1, '2017-10-26 16:32:39', NULL, '397257797@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `think_links`
--

CREATE TABLE IF NOT EXISTS `think_links` (
  `id` int(10) unsigned NOT NULL,
  `linkname` varchar(50) NOT NULL DEFAULT '' COMMENT '链接名称',
  `linkurl` varchar(50) NOT NULL DEFAULT '' COMMENT '镕接地址',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  2 禁止',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `think_links`
--

INSERT INTO `think_links` (`id`, `linkname`, `linkurl`, `status`, `create_time`) VALUES
(2, '百度', 'http://www.baidu.com', 1, '2016-12-15 15:39:29'),
(3, 'thinkphp', 'http://www.thinkphp.cn/', 1, '2016-12-22 16:37:52');

-- --------------------------------------------------------

--
-- 表的结构 `think_nav`
--

CREATE TABLE IF NOT EXISTS `think_nav` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL COMMENT '父ID',
  `name` varchar(20) NOT NULL COMMENT '导航名称',
  `alias` varchar(20) DEFAULT '' COMMENT '导航别称',
  `link` varchar(255) DEFAULT '' COMMENT '导航链接',
  `icon` varchar(255) DEFAULT '' COMMENT '导航图标',
  `target` varchar(10) DEFAULT '' COMMENT '打开方式',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态  0 隐藏  1 显示',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='导航表';

--
-- 转存表中的数据 `think_nav`
--

INSERT INTO `think_nav` (`id`, `pid`, `name`, `alias`, `link`, `icon`, `target`, `status`, `sort`) VALUES
(1, 0, '说说', '', 'tell', '', '_self', 1, 0),
(2, 0, '留言板', '', 'gb', '', '_self', 1, 0),
(3, 0, '访客', '', 'fk', '', '_self', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_system`
--

CREATE TABLE IF NOT EXISTS `think_system` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '配置项名称',
  `value` text NOT NULL COMMENT '配置项值'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

--
-- 转存表中的数据 `think_system`
--

INSERT INTO `think_system` (`id`, `name`, `value`) VALUES
(1, 'site_config', 'a:8:{s:10:"site_title";s:12:"唯美博客";s:9:"seo_title";s:12:"唯美博客";s:11:"seo_keyword";s:12:"唯美博客";s:15:"seo_description";s:12:"唯美博客";s:10:"admin_page";s:2:"15";s:14:"site_copyright";s:12:"唯美博客";s:8:"site_icp";s:15:"粤ICP:25545455";s:11:"site_tongji";s:6:"统计";}');

-- --------------------------------------------------------

--
-- 表的结构 `think_tags`
--

CREATE TABLE IF NOT EXISTS `think_tags` (
  `id` int(10) unsigned NOT NULL,
  `num` int(11) DEFAULT '0' COMMENT '数量',
  `tagname` varchar(255) DEFAULT '' COMMENT 'Tage名称',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `think_tags`
--

INSERT INTO `think_tags` (`id`, `num`, `tagname`, `create_time`) VALUES
(70, 1, '兼容手机', '2016-12-22 17:09:23'),
(68, 1, 'bootstrap', '2016-12-22 17:09:23'),
(66, 3, 'php', '2016-12-22 16:51:35'),
(67, 1, 'ThinkPHP', '2016-12-22 17:09:23'),
(69, 1, '响应式', '2016-12-22 17:09:23'),
(65, 1, '中文分词', '2016-12-22 16:44:07'),
(71, 1, 'QQ互联', '2016-12-22 17:09:23'),
(72, 1, '格式化', '2016-12-22 17:09:52'),
(73, 3, 'Apache', '2016-12-22 17:19:29'),
(74, 3, '伪静态', '2016-12-22 17:19:29');

-- --------------------------------------------------------

--
-- 表的结构 `think_tell`
--

CREATE TABLE IF NOT EXISTS `think_tell` (
  `id` int(10) unsigned NOT NULL,
  `tellid` int(11) DEFAULT '0' COMMENT '发布者ID',
  `tellcontent` longtext COMMENT '说说内容',
  `os` varchar(50) DEFAULT NULL COMMENT '操作系统',
  `position` varchar(100) DEFAULT NULL COMMENT '所在位置',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  2 禁止',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `think_tell`
--

INSERT INTO `think_tell` (`id`, `tellid`, `tellcontent`, `os`, `position`, `status`, `create_time`) VALUES
(38, 1, '&lt;p&gt;&lt;span&gt;本博客QQ快速登陆,无需申请QQ互联,也不需要任何配置就能用QQ快速登陆博客&lt;/span&gt;&lt;/p&gt;', 'windows', '广东省广州市', 1, '2016-12-22 17:11:39'),
(37, 1, '由于时间的原因，&lt;img src=&quot;http://blog.100ncanyin.com/public/static/layui/images/face/7.gif&quot; alt=&quot;[害羞]&quot;&gt;博客的模板是仿别人呵呵', 'windows', '广东省广州市', 1, '2016-12-22 16:59:31'),
(36, 1, '&lt;img src=&quot;http://blog.100ncanyin.com/public/static/layui/images/face/25.gif&quot; alt=&quot;[抱抱]&quot;&gt;唯美博客开源了，源码已传到QQ群文件，有需要的加一下QQ群', 'windows', '广东省广州市', 1, '2016-12-22 16:58:35'),
(35, 1, '&lt;p&gt;今天心情不错，采用thinkphp开发的第一个blog已完成！稍后会开源免费给大家使用！&lt;img src=&quot;http://blog.100ncanyin.com/public/static/layui/images/face/0.gif&quot; alt=&quot;[微笑]&quot;&gt;&lt;/p&gt;', 'windows', '广东省广州市', 1, '2016-12-22 16:56:37'),
(39, 1, '&lt;img src=&quot;http://blog.100ncanyin.com/public/static/layui/images/face/39.gif&quot; alt=&quot;[鼓掌]&quot;&gt;今天广州天气真好，没有雾霾的空气真爽大爱广州', 'windows', '广东省广州市', 1, '2016-12-22 17:12:23'),
(40, 1, '&lt;img src=&quot;http://blog.100ncanyin.com/public/static/layui/images/face/27.gif&quot; alt=&quot;[疑问]&quot;&gt;一年一度的抢票盛宴又开始了！哎你抢到了吗！', 'windows', '广东省广州市', 1, '2016-12-22 17:13:14');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(10) unsigned NOT NULL,
  `openid` varchar(100) DEFAULT NULL COMMENT 'QQ登陆用户的识别码',
  `username` varchar(50) DEFAULT '' COMMENT '用户名',
  `password` varchar(50) DEFAULT '' COMMENT '密码',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  2 禁止',
  `logincount` int(10) DEFAULT '0' COMMENT 'logincount',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(50) DEFAULT '' COMMENT '最后登录IP'
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `openid`, `username`, `password`, `mobile`, `email`, `nickname`, `headimgurl`, `status`, `logincount`, `create_time`, `last_login_time`, `last_login_ip`) VALUES
(5, 'AD7E93DA25EB36F6E5657184705A323C', '', '', '', '', 'Style', 'http://qzapp.qlogo.cn/qzapp/101258055/AD7E93DA25EB36F6E5657184705A323C/100', 1, NULL, '2016-12-22 14:52:43', '2016-12-23 19:08:14', '218.20.159.62'),
(6, 'AF0CC38C81A80B3A17F6473592295DB5', '', '', '', '', 'V5', 'http://qzapp.qlogo.cn/qzapp/101258055/AF0CC38C81A80B3A17F6473592295DB5/100', 1, NULL, '2016-12-22 17:44:32', '2016-12-26 13:48:30', '218.20.158.26'),
(7, 'EAE7120CAF6C9FCF57D95BB1072CDF55', '', '', '', '', '概念', 'http://qzapp.qlogo.cn/qzapp/101258055/EAE7120CAF6C9FCF57D95BB1072CDF55/100', 1, NULL, '2016-12-22 17:53:48', '2016-12-22 21:30:58', '218.20.159.62'),
(8, 'EC116A9C109F8D0254826E38AD9660F9', '', '', '', '', '哦7)蒲也xJ|e5', 'http://qzapp.qlogo.cn/qzapp/101258055/EC116A9C109F8D0254826E38AD9660F9/100', 1, 1, '2016-12-23 19:09:01', '2016-12-24 14:22:16', '218.20.159.62'),
(9, '9498257D7A9462BF7887AFD5579613DC', '', '', '', '', '染的人', 'http://qzapp.qlogo.cn/qzapp/101258055/9498257D7A9462BF7887AFD5579613DC/100', 1, 0, '2016-12-26 13:54:11', '2016-12-26 13:54:11', '14.211.203.103'),
(10, '5A1CD87DA02471140895C65F2456E245', '', '', '', '', '没有人比時間更懂得珍惜', 'http://qzapp.qlogo.cn/qzapp/101258055/5A1CD87DA02471140895C65F2456E245/100', 1, 1, '2016-12-26 13:59:04', '2016-12-26 14:00:39', '222.89.97.110'),
(11, '4BB1483FEDE9D42B383F5BC160911936', '', '', '', '', '倾城笑丶', 'http://qzapp.qlogo.cn/qzapp/101258055/4BB1483FEDE9D42B383F5BC160911936/100', 1, 0, '2016-12-26 14:08:58', '2016-12-26 14:08:58', '58.61.66.68'),
(12, '0FC2C0B97E99F90B2C1FDD81F7285FA1', '', '', '', '', '谁与寄千里', 'http://qzapp.qlogo.cn/qzapp/101258055/0FC2C0B97E99F90B2C1FDD81F7285FA1/100', 1, 0, '2016-12-26 14:15:55', '2016-12-26 14:15:55', '114.225.49.170'),
(13, '2DC8502533311E7D591F721922305B3C', '', '', '', '', '勿忘心安', 'http://qzapp.qlogo.cn/qzapp/101258055/2DC8502533311E7D591F721922305B3C/100', 1, 1, '2016-12-26 14:40:20', '2016-12-26 14:40:35', '180.153.214.178'),
(14, '3DDAFA0D6250FDCE6EFA0540D37FD924', '', '', '', '', '＆☆阿逗仔＆★', 'http://qzapp.qlogo.cn/qzapp/101258055/3DDAFA0D6250FDCE6EFA0540D37FD924/100', 1, 0, '2017-10-25 15:44:00', '2017-10-25 15:44:00', '58.246.140.73'),
(15, 'ED98DE43762FD4C49E14F2BA5F821B47', '', '', '', '', '完美游戏-产品咨询', 'http://qzapp.qlogo.cn/qzapp/101258055/ED98DE43762FD4C49E14F2BA5F821B47/100', 1, 0, '2017-10-25 15:57:38', '2017-10-25 15:57:38', '219.154.160.202'),
(16, 'F7137959E2DCC5D7326A5D5CEFAC566A', '', '', '', '', '洛暖羅', 'http://qzapp.qlogo.cn/qzapp/101258055/F7137959E2DCC5D7326A5D5CEFAC566A/100', 1, 0, '2017-10-25 15:57:40', '2017-10-25 15:57:40', '101.247.197.96'),
(17, '529BDFAC921068FE2B75C596F8252155', '', '', '', '', '0°', 'http://qzapp.qlogo.cn/qzapp/101258055/529BDFAC921068FE2B75C596F8252155/100', 1, 0, '2017-10-25 15:57:58', '2017-10-25 15:57:58', '222.249.179.12'),
(18, '571C19F3AD95A0494493184A6958E03B', '', '', '', '', '烟雨弥漫了江南', 'http://qzapp.qlogo.cn/qzapp/101258055/571C19F3AD95A0494493184A6958E03B/100', 1, 0, '2017-10-25 15:58:13', '2017-10-25 15:58:13', '58.33.137.45'),
(19, '657568CA11025257E97347D5B094D408', '', '', '', '', '✅绵羊哥哥', 'http://qzapp.qlogo.cn/qzapp/101258055/657568CA11025257E97347D5B094D408/100', 1, 0, '2017-10-25 15:58:18', '2017-10-25 15:58:18', '49.77.216.171'),
(20, '37E5B3E44D67E74C918AF8BC1B0047DC', '', '', '', '', '  冷暖自知づ', 'http://qzapp.qlogo.cn/qzapp/101258055/37E5B3E44D67E74C918AF8BC1B0047DC/100', 1, 1, '2017-10-25 15:58:28', '2017-10-25 15:58:37', '101.226.66.173'),
(21, '8C136EF09870D5C67067543762DD307C', '', '', '', '', '日上倾城', 'http://qzapp.qlogo.cn/qzapp/101258055/8C136EF09870D5C67067543762DD307C/100', 1, 1, '2017-10-25 15:58:29', '2017-10-25 15:58:38', '112.65.193.15'),
(22, '1A7669852B1CA72F76677233C83A3E1F', '', '', '', '', '加藤非『团长』', 'http://qzapp.qlogo.cn/qzapp/101258055/1A7669852B1CA72F76677233C83A3E1F/100', 1, 0, '2017-10-25 15:58:34', '2017-10-25 15:58:34', '14.16.14.50'),
(23, '8109F3CA90EE409CF3AECE3F1D567CE0', '', '', '', '', '', 'http://qzapp.qlogo.cn/qzapp/101258055/8109F3CA90EE409CF3AECE3F1D567CE0/100', 1, 1, '2017-10-25 15:59:00', '2017-10-25 15:59:54', '42.243.105.198'),
(24, '04F435A525CD76D185E3E68ABA9A34B1', '', '', '', '', '空白', 'http://qzapp.qlogo.cn/qzapp/101258055/04F435A525CD76D185E3E68ABA9A34B1/100', 1, 0, '2017-10-25 15:59:16', '2017-10-25 15:59:16', '183.13.159.9'),
(25, 'AA9226572BC939238866DCC6AB791867', '', '', '', '', '是是是', 'http://qzapp.qlogo.cn/qzapp/101258055/AA9226572BC939238866DCC6AB791867/100', 1, 0, '2017-10-25 16:00:25', '2017-10-25 16:00:25', '27.210.171.122'),
(26, '673BCCDEF2939A7F9E871E045B914258', '', '', '', '', '独家memory', 'http://qzapp.qlogo.cn/qzapp/101258055/673BCCDEF2939A7F9E871E045B914258/100', 1, 1, '2017-10-25 16:07:46', '2017-10-25 16:08:40', '116.24.136.200'),
(27, 'E8DCFDA27A46569931869ED8192415E8', '', '', '', '', '秀气男神峰大大丶', 'http://qzapp.qlogo.cn/qzapp/101258055/E8DCFDA27A46569931869ED8192415E8/100', 1, 1, '2017-10-25 16:08:34', '2017-10-25 16:08:44', '101.226.33.203'),
(28, 'D71CDC48BCF4573D31DB1DD60EFB2793', '', '', '', '', '`Ku゛Da.na', 'http://qzapp.qlogo.cn/qzapp/101258055/D71CDC48BCF4573D31DB1DD60EFB2793/100', 1, 1, '2017-10-25 16:09:23', '2017-10-25 16:09:32', '101.226.99.195'),
(29, 'E4049EE39C9B9A17726CA5F32E45CAF0', '', '', '', '', 'php-zyy', 'http://qzapp.qlogo.cn/qzapp/101258055/E4049EE39C9B9A17726CA5F32E45CAF0/100', 1, 0, '2017-10-25 16:28:15', '2017-10-25 16:28:15', '115.60.63.232'),
(30, '1EF2878B1E69A203FDB22823B99F3ACE', '', '', '', '', '御宅男', 'http://qzapp.qlogo.cn/qzapp/101258055/1EF2878B1E69A203FDB22823B99F3ACE/100', 1, 0, '2017-10-25 16:43:12', '2017-10-25 16:43:12', '58.240.220.166'),
(31, 'B4E789DAC728F38973B4DC2C6E81800E', '', '', '', '', '殇、如此别致', 'http://qzapp.qlogo.cn/qzapp/101258055/B4E789DAC728F38973B4DC2C6E81800E/100', 1, 0, '2017-10-25 17:17:41', '2017-10-25 17:17:41', '183.68.20.148'),
(32, 'E899B56FD5B77A58A95584D248E0EABB', '', '', '', '', '风三郎', 'http://qzapp.qlogo.cn/qzapp/101258055/E899B56FD5B77A58A95584D248E0EABB/100', 1, 4, '2017-10-25 17:24:27', '2017-10-26 16:29:48', '222.209.34.76'),
(33, '25FEF7CEC9010C9B0DFA1BB392977B10', '', '', '', '', '', 'http://qzapp.qlogo.cn/qzapp/101258055/25FEF7CEC9010C9B0DFA1BB392977B10/100', 1, 3, '2017-10-25 17:37:24', '2017-10-25 17:38:21', '112.65.193.14'),
(34, '2633183F58BC68ED77A4F0B2EB79A92A', '', '', '', '', '宏宇', 'http://qzapp.qlogo.cn/qzapp/101258055/2633183F58BC68ED77A4F0B2EB79A92A/100', 1, 2, '2017-10-25 18:19:04', '2017-10-25 18:59:22', '61.151.218.118'),
(35, 'ED7FDB23275A6FCEE1791ED9598ABBCA', '', '', '', '', '简简单单', 'http://qzapp.qlogo.cn/qzapp/101258055/ED7FDB23275A6FCEE1791ED9598ABBCA/100', 1, 0, '2017-10-25 19:17:15', '2017-10-25 19:17:15', '182.148.56.102'),
(36, 'C0FB999F1BCAEFDE996CAF11E742B7D4', '', '', '', '', '姐牵着毛驴走四方', 'http://qzapp.qlogo.cn/qzapp/101258055/C0FB999F1BCAEFDE996CAF11E742B7D4/100', 1, 0, '2017-10-25 19:19:09', '2017-10-25 19:19:09', '117.172.229.77'),
(37, 'FF5FA89C08D7FE0EDAA93D4F9706A689', '', '', '', '', '素净。', 'http://qzapp.qlogo.cn/qzapp/101258055/FF5FA89C08D7FE0EDAA93D4F9706A689/100', 1, 0, '2017-10-25 20:10:32', '2017-10-25 20:10:32', '221.221.147.214'),
(38, 'C3DB5E98DAC400ACA348123EDD18EE9E', '', '', '', '', 'MagicBlack', 'http://qzapp.qlogo.cn/qzapp/101258055/C3DB5E98DAC400ACA348123EDD18EE9E/100', 1, 0, '2017-10-25 20:23:06', '2017-10-25 20:23:06', '60.1.69.6'),
(39, '61032C09B537F07EBDF82FBD6C07282E', '', '', '', '', '温莎伟', 'http://qzapp.qlogo.cn/qzapp/101258055/61032C09B537F07EBDF82FBD6C07282E/100', 1, 0, '2017-10-25 21:23:46', '2017-10-25 21:23:46', '114.242.250.37'),
(40, 'D47ACB69ABAC898563582314EE96F48E', '', '', '', '', '夏溪', 'http://qzapp.qlogo.cn/qzapp/101258055/D47ACB69ABAC898563582314EE96F48E/100', 1, 1, '2017-10-25 21:26:03', '2017-10-25 21:26:13', '61.151.218.119'),
(41, '6872F3FDB31709CFC022CEC844F187DF', '', '', '', '', '凉', 'http://qzapp.qlogo.cn/qzapp/101258055/6872F3FDB31709CFC022CEC844F187DF/100', 1, 0, '2017-10-25 21:41:05', '2017-10-25 21:41:05', '114.239.201.158'),
(42, '51685E96A67844B624696779A8675F7C', '', '', '', '', '遇善则迁', 'http://qzapp.qlogo.cn/qzapp/101258055/51685E96A67844B624696779A8675F7C/100', 1, 0, '2017-10-26 09:39:41', '2017-10-26 09:39:41', '112.251.179.218'),
(43, '87D168D58486313EDDB698C39AE56CE3', '', '', '', '', '对你何止偏爱、', 'http://qzapp.qlogo.cn/qzapp/101258055/87D168D58486313EDDB698C39AE56CE3/100', 1, 0, '2017-10-26 10:32:33', '2017-10-26 10:32:33', '121.69.62.82'),
(44, 'C90CDA6BB9EB64FB4CBA6E5BF9D716F5', '', '', '', '', 'K’maker', 'http://qzapp.qlogo.cn/qzapp/101258055/C90CDA6BB9EB64FB4CBA6E5BF9D716F5/100', 1, 0, '2017-10-26 12:08:15', '2017-10-26 12:08:15', '27.192.245.60'),
(45, '963321880A1364DFE7D900DA28AC47FD', '', '', '', '', '　嗯？　', 'http://qzapp.qlogo.cn/qzapp/101258055/963321880A1364DFE7D900DA28AC47FD/100', 1, 0, '2017-10-26 13:04:04', '2017-10-26 13:04:04', '106.114.243.86'),
(46, '604251A0612F0464F9C910F3ADAA1FB5', '', '', '', '', '此去径年、终以不顾', 'http://qzapp.qlogo.cn/qzapp/101258055/604251A0612F0464F9C910F3ADAA1FB5/100', 1, 0, '2017-10-26 15:06:07', '2017-10-26 15:06:07', '27.154.110.61'),
(47, 'E8434E8A47B92071710DA79D913120EE', '', '', '', '', 'Journey Start', 'http://qzapp.qlogo.cn/qzapp/101258055/E8434E8A47B92071710DA79D913120EE/100', 1, 0, '2017-10-26 17:00:38', '2017-10-26 17:00:38', '202.105.12.158'),
(48, 'B22EDD93CAAF09ABA6E5A789C591A0F1', '', '', '', '', '天涯明月刀', 'http://qzapp.qlogo.cn/qzapp/101258055/B22EDD93CAAF09ABA6E5A789C591A0F1/100', 1, 0, '2017-10-26 18:04:40', '2017-10-26 18:04:40', '183.39.153.163'),
(49, '3F8FD4EB6BD840420DE291A2E6B014CA', '', '', '', '', '奕程', 'http://qzapp.qlogo.cn/qzapp/101258055/3F8FD4EB6BD840420DE291A2E6B014CA/100', 1, 1, '2017-10-26 19:58:58', '2017-10-26 19:59:08', '120.204.17.68'),
(50, 'ABEADC0BF7DE5A3E6C86EC7976507480', '', '', '', '', '共赢天下', 'http://qzapp.qlogo.cn/qzapp/101258055/ABEADC0BF7DE5A3E6C86EC7976507480/100', 1, 0, '2017-10-26 22:02:01', '2017-10-26 22:02:01', '123.149.0.221'),
(51, '0DC141765144825B4DACF9F97A694C26', '', '', '', '', '大海的蚂蚱', 'http://qzapp.qlogo.cn/qzapp/101258055/0DC141765144825B4DACF9F97A694C26/100', 1, 1, '2017-10-27 11:22:56', '2017-10-27 11:29:20', '49.67.228.192'),
(52, 'F379624CEB711D621B49A0BD546C2CBA', '', '', '', '', 'Y右右', 'http://qzapp.qlogo.cn/qzapp/101258055/F379624CEB711D621B49A0BD546C2CBA/100', 1, 0, '2017-10-27 14:22:12', '2017-10-27 14:22:12', '113.247.53.123'),
(53, '61B8D390EC2EA0A0D82C8DC86CDCB21B', '', '', '', '', '沐筱威', 'http://qzapp.qlogo.cn/qzapp/101258055/61B8D390EC2EA0A0D82C8DC86CDCB21B/100', 1, 0, '2017-10-27 14:43:15', '2017-10-27 14:43:15', '175.167.138.34'),
(54, '62219D0B06E2BCA46F34D8A7F6E3FB6B', '', '', '', '', 'poison  °     ', 'http://qzapp.qlogo.cn/qzapp/101258055/62219D0B06E2BCA46F34D8A7F6E3FB6B/100', 1, 0, '2017-10-27 15:52:33', '2017-10-27 15:52:33', '27.154.77.252'),
(55, 'A8344A6A41A05C7E1537E55E7FBD5EAE', '', '', '', '', '八皇子殿下', 'http://qzapp.qlogo.cn/qzapp/101258055/A8344A6A41A05C7E1537E55E7FBD5EAE/100', 1, 1, '2017-10-27 16:04:39', '2017-10-27 16:04:49', '101.226.33.218'),
(56, '84826B23AF0A6A2B160BF81F83299DC1', '', '', '', '', '皮蛋', 'http://qzapp.qlogo.cn/qzapp/101258055/84826B23AF0A6A2B160BF81F83299DC1/100', 1, 0, '2017-10-30 00:52:54', '2017-10-30 00:52:54', '183.11.74.253'),
(57, '64931B23A2AFFA9FC64303F0561C15BC', '', '', '', '', '星 空', 'http://qzapp.qlogo.cn/qzapp/101258055/64931B23A2AFFA9FC64303F0561C15BC/100', 1, 0, '2017-10-30 08:56:30', '2017-10-30 08:56:30', '183.67.63.191'),
(58, 'B851EF6B64525325DBBC03161D384508', '', '', '', '', 'Gone with the wind', 'http://qzapp.qlogo.cn/qzapp/101258055/B851EF6B64525325DBBC03161D384508/100', 1, 0, '2017-10-30 09:34:44', '2017-10-30 09:34:44', '112.117.193.209'),
(59, 'F1BBE863A60919FA0163353D471F3A47', '', '', '', '', 'Tmanghao', 'http://qzapp.qlogo.cn/qzapp/101258055/F1BBE863A60919FA0163353D471F3A47/100', 1, 0, '2017-10-30 10:00:56', '2017-10-30 10:00:56', '218.17.230.248'),
(60, 'BEF425196825D4BCB6527D2BDDC6E940', '', '', '', '', '天涯路无情客', 'http://qzapp.qlogo.cn/qzapp/101258055/BEF425196825D4BCB6527D2BDDC6E940/100', 1, 0, '2017-10-30 10:04:11', '2017-10-30 10:04:11', '120.202.149.222'),
(61, 'FDB3B2040ADFD0E20891B8BBF6BFD236', '', '', '', '', '胜果科技-吉亮亮', 'http://qzapp.qlogo.cn/qzapp/101258055/FDB3B2040ADFD0E20891B8BBF6BFD236/100', 1, 0, '2017-10-30 15:00:43', '2017-10-30 15:00:43', '42.84.44.171'),
(62, '18D7381D56F522E8474515ACA0BBD644', '', '', '', '', '八分寒', 'http://qzapp.qlogo.cn/qzapp/101258055/18D7381D56F522E8474515ACA0BBD644/100', 1, 0, '2017-10-30 16:05:41', '2017-10-30 16:05:41', '58.53.131.174'),
(63, '1FC7D42B97CE99075F02BCE0E8D9064B', '', '', '', '', 'Lanrenes', 'http://qzapp.qlogo.cn/qzapp/101258055/1FC7D42B97CE99075F02BCE0E8D9064B/100', 1, 0, '2017-10-30 20:19:15', '2017-10-30 20:19:15', '101.247.222.229'),
(64, 'FB91D8BEF793F3C2DB26BE5AD3D577ED', '', '', '', '', 'Tot', 'http://qzapp.qlogo.cn/qzapp/101258055/FB91D8BEF793F3C2DB26BE5AD3D577ED/100', 1, 0, '2017-10-30 20:29:05', '2017-10-30 20:29:05', '39.82.119.45'),
(65, 'A5EB3F3EF3245DEABE3D1CFFC44E1669', '', '', '', '', '老中医', 'http://qzapp.qlogo.cn/qzapp/101258055/A5EB3F3EF3245DEABE3D1CFFC44E1669/100', 1, 1, '2017-10-30 20:52:27', '2017-10-30 20:57:02', '123.14.152.86'),
(66, '713903E846B0CC55703C66BE8FEBF7D4', '', '', '', '', '过好没一天', 'http://qzapp.qlogo.cn/qzapp/101258055/713903E846B0CC55703C66BE8FEBF7D4/100', 1, 0, '2017-10-31 10:21:57', '2017-10-31 10:21:57', '182.121.201.76'),
(67, '0326E7484D17AB88D04442AC63638D58', '', '', '', '', '┢┦aｐΡy', 'http://qzapp.qlogo.cn/qzapp/101258055/0326E7484D17AB88D04442AC63638D58/100', 1, 0, '2017-10-31 10:36:13', '2017-10-31 10:36:13', '120.198.30.156');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_admin_user`
--
ALTER TABLE `think_admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `think_advertising`
--
ALTER TABLE `think_advertising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_article`
--
ALTER TABLE `think_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_auth_group`
--
ALTER TABLE `think_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_auth_group_access`
--
ALTER TABLE `think_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `think_category`
--
ALTER TABLE `think_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `think_guestbook`
--
ALTER TABLE `think_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_links`
--
ALTER TABLE `think_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_nav`
--
ALTER TABLE `think_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_system`
--
ALTER TABLE `think_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_tags`
--
ALTER TABLE `think_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_tell`
--
ALTER TABLE `think_tell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `think_admin_user`
--
ALTER TABLE `think_admin_user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `think_advertising`
--
ALTER TABLE `think_advertising`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `think_article`
--
ALTER TABLE `think_article`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `think_auth_group`
--
ALTER TABLE `think_auth_group`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `think_category`
--
ALTER TABLE `think_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `think_guestbook`
--
ALTER TABLE `think_guestbook`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `think_links`
--
ALTER TABLE `think_links`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `think_nav`
--
ALTER TABLE `think_nav`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `think_system`
--
ALTER TABLE `think_system`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `think_tags`
--
ALTER TABLE `think_tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `think_tell`
--
ALTER TABLE `think_tell`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
