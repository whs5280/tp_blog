<?php
namespace app\admin\validate;

use think\Validate;

class Links extends Validate {
    protected $rule = [
        'linkname'         => 'require',
        'linkurl'           => 'require',
    
    ];

    protected $message = [
        'linkname.require'         => '请输入链接名称',
        'linkurl.require'          => '请输入链接地址',

    ];
}