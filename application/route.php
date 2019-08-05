<?php
use think\Route;
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
   
    '__pattern__' => [
        
        'name'  => '\w+',
        'id'    => '\d+',
        'cid'    => '\d+',
        
    ],
     
    'tell/[:name]' => 'tell/index',
    'gb/[:name]' => 'gb/index',
    'fk/[:name]' => 'fk/index',
    'category/[:cid]' => 'category/index',
    'article/[:id]' => 'article/index',

];
