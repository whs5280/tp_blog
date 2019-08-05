<?php
namespace app\admin\model;

use think\Model;
use think\Session;

class Tell extends Model {

    protected $insert = ['create_time'];

    /**
     * 创建时间
     * @return bool|string
     */
    protected function setCreateTimeAttr() {
        return date('Y-m-d H:i:s');
    }


       /**
     * 说说发布者ID
     * @param $value
     * @return mixed
     */
    protected function setTellIdAttr($value) {
        return $value ? $value : Session::get('admin_id');
    }

     /**
     * 反转义HTML实体标签
     * @param $value
     * @return string
     */
    protected function setContentAttr($value) {
        return htmlspecialchars_decode($value);
    }
}