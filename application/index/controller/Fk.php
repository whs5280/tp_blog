<?php
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;

class Fk extends HomeBase {

    protected function _initialize() {

        parent::_initialize();

    }


    public function index($page = 1) {


    $login_number = Db::name('user')->field('id')->select();
    $login_number    = count($login_number);
    $this->assign('login_number',$login_number);
       
        $userlogin_list  = Db::name('user')->where('status','eq',1)->order('id desc')->paginate(100, false, ['page' => $page]);
        
        return $this->fetch('', ['userlogin_list' => $userlogin_list]);
    }

}
