<?php
namespace app\index\validate;

use think\Validate;

class Gb extends Validate {
    protected $rule = [
        'username'         => 'require',
        'email'           => 'require|email',
        'content'         => 'require|min:5',
        'txt_check'   => 'require',
    
    ];

    protected $message = [
        'username.require'         => '请输入昵称',
        'email.require'          => '请输入邮箱',
        'content.require'          => '说点什么吧....不能短于5个字符',
        'txt_check.require'   => '请输入验证码'

    ];
}