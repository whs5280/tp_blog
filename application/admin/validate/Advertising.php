<?php
namespace app\admin\validate;

use think\Validate;

class Advertising extends Validate {
    protected $rule = [
        'adname'         => 'require',
        'adurl'           => 'require',
        'thumb'           => 'require',
    
    ];

    protected $message = [
        'adname.require'         => '请输入广告名称',
        'adurl.require'          => '请输入广告地址',
        'thumb.require'          => '请上传广告图片',

    ];
}