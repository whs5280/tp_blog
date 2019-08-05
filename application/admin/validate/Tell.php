<?php
namespace app\admin\validate;

use think\Validate;

class Tell extends Validate {
    protected $rule = [
        'status'         => 'require',
       
    
    ];

    protected $message = [
        'status.require'         => '是否审核',
      

    ];
}