<?php

return [
    // +----------------------------------------------------------------------
    // | 后台模板设置
    // +----------------------------------------------------------------------

    'template' => [
        // 模板路径
        'view_path'    => 'admin_themes' . DS,
        // 模板布局开关
        'layout_on'    => false,
        // 模板布局文件
        'layout_name'  => 'layout',
    ],

       'view_replace_str'=>[
        '__img__'=>'/public/static/images',
       ],
];