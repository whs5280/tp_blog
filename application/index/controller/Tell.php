<?php
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;

class Tell extends HomeBase {




    protected function _initialize() {

        parent::_initialize();

    }

    public function index($page = 1) {
       
        $tell_list  = Db::name('tell')->alias('a')->join('admin_user u','a.tellid = u.id','RIGHT')->where('a.status','eq',1)->order('a.id desc')->paginate(15, false, ['page' => $page]);
        
        return $this->fetch('', ['tell_list' => $tell_list]);
    }

}
