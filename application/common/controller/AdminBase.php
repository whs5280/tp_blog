<?php
namespace app\common\controller;

use think\auth\Auth;
use think\Loader;
use think\Cache;
use think\Controller;
use think\Db;
use think\Session;

/**
 * 后台公用基础控制器
 * Class AdminBase
 * @package app\common\controller
 */
class AdminBase extends Controller {


    protected function _initialize() {
        parent::_initialize();

        $this->checkAuth();
        $this->getMenu();

        $site_config = Db::name('system')->field('value')->where('name', 'site_config')->find();
        $site_config = unserialize($site_config['value']);
           
          
        $this->assign('site_config', $site_config);
 

        // 输出当前请求控制器（配合后台侧边菜单选中状态）
        $this->assign('controller', Loader::parseName($this->request->controller()));
    }


    public function getConfig($name){

      $site_config = Db::name('system')->field('value')->where('name', 'site_config')->find();
      $site_config = unserialize($site_config['value']); 

      return $site_config[$name]; 

    }


   //新增或更新tags
    public function saveTags($tag,$isadd=1){

        $tagobj = Db::name('tags');

        //多关键字
        if(strpos($tag,',') !== false){
            $tags = explode(',',trim($tag));
            foreach($tags as $key => $val){
                $result = $tagobj->where(array('tagname'=>$val))->find();
                if($result){
                    if($isadd){
                        $tagobj->where(array('tagname'=>$val))->setInc('num',1);
                    }
                }
                else{
                    $data['tagname'] = $val;
                    $data['num'] = '1';
                    $data['create_time'] = date('Y-m-d H:i:s');
                    $tagobj->insert($data);
                }
            }
        }
        else{
            $result = $tagobj->where(array('tagname'=>$tag))->find();
            if($result){
                if($isadd){
                    $tagobj->where(array('tagname'=>$tag))->setInc('num',1);
                }
            }
            else{
         
                    $data['tagname'] = $tag;
                    $data['num'] = '1';
                    $data['create_time'] = date('Y-m-d H:i:s');
                    $tagobj->insert($data);
            }
        }
    }


    /**
     * 权限检查
     * @return bool
     */
    protected function checkAuth() {

        if (!Session::has('admin_id')) {
            $this->redirect('admin/login/index');
        }

        $module     = $this->request->module();
        $controller = $this->request->controller();
        $action     = $this->request->action();

        // 排除权限
        $not_check = ['admin/Index/index', 'admin/AuthGroup/getjson', 'admin/System/clear'];

        if (!in_array($module . '/' . $controller . '/' . $action, $not_check)) {
            $auth     = new Auth();
            $admin_id = Session::get('admin_id');
            if (!$auth->check($module . '/' . $controller . '/' . $action, $admin_id) && $admin_id != 1) {
                $this->error('没有权限');
            }
        }
    }

    /**
     * 获取侧边栏菜单
     */
    protected function getMenu() {
        $menu     = [];
        $admin_id = Session::get('admin_id');
        $auth     = new Auth();

        $auth_rule_list = Db::name('auth_rule')->where('status', 1)->order(['sort' => 'desc', 'id' => 'asc'])->select();

        foreach ($auth_rule_list as $value) {
            if ($auth->check($value['name'], $admin_id) || $admin_id == 1) {
                $menu[] = $value;
            }
        }
        $menu = !empty($menu) ? array2tree($menu) : [];

        $this->assign('menu', $menu);
    }
}