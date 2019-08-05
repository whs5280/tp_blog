<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用调试模式
    'app_debug'      => true,
    // 应用Trace
    'app_trace'      => true,
    // 开启应用Trace调试

    // 默认全局过滤方法 用逗号分隔多个
    'default_filter' => 'htmlspecialchars',

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template' => [
        // 模板路径
        'view_path' => 'themes' . DS,
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------

    'trace' => [
        // 内置Html Console 支持扩展
        //'type' => 'Console',
        'type' => 'html',
    ],

   // 'url_common_param' => false, 

    // URL参数方式 0 按名称成对解析 1 按顺序解析

    //'url_param_type'         => 1,
    // 是否开启路由
     //'url_route_on'           => true,
    // 是否强制使用路由
   // 'url_route_must'         => false,

    // +----------------------------------------------------------------------
    // | auth配置
    // +----------------------------------------------------------------------

    'auth'        => [
        // 权限开关
        'auth_on'           => 1,
        // 认证方式，1为实时认证；2为登录认证。
        'auth_type'         => 1,
        // 用户组数据不带前缀表名
        'auth_group'        => 'auth_group',
        // 用户-用户组关系不带前缀表
        'auth_group_access' => 'auth_group_access',
        // 权限规则不带前缀表
        'auth_rule'         => 'auth_rule',
        // 用户信息不带前缀表
        'auth_user'         => 'admin_user',
    ],

    // 全站加密密钥（开发新站点前请修改此项）
    'salt'        => '1dFlxLhiuLpnUZ79kA',

    // 验证码配置
    'captcha'  => [
        // 验证码字符集合
        'codeSet'  => '0123456789',
        // 验证码字体大小(px)
        'fontSize' => 12,
        // 是否画混淆曲线
        'useCurve' => false,
        // 验证码位数
        'length'   => 3,
        // 验证成功后是否重置
        'reset'    => true
    ],
  
   // 第三方登录配置，暂时放在这里
    'think_sdk_wechat'      =>[
        'app_id'       => '*******************', 
        'app_secret'   => '*******************',
        'callback'     => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'/index/open_auth/wechat',
    ],
    'think_sdk_qq'          =>[
        'app_key'      => '101375074', 
        'app_secret'   => '7d8fa24a8cb1f17753f99d58df5fb7e0',
        'callback'     => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'/base/qlogin',
    ],
    'think_sdk_sina'          =>[
        'app_key'      => '*******************', 
        'app_secret'   => '*******************',
        'callback'     => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'/index/open_auth/callback?type=sina',
    ],

    'data_backup_puth' => 'data/',
];
