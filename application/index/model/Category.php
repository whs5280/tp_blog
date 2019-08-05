<?php
namespace app\index\model;

use think\Db;
use think\Model;

class Category extends Model {


    /**
     * 获取层级缩进列表数据
     * @return array
     */
    public function getLevelList() {
        $category_level = $this->order(['sort' => 'DESC', 'id' => 'ASC'])->select();

        return array2level($category_level);
    }

}