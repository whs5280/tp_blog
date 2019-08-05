<?php
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;
use think\Session;
use think\Cache;

class Gb extends HomeBase {

    protected function _initialize() {

        parent::_initialize();

    }


    public function index($page = 1) {

        // $tell_list  = Db::name('guestbook')->alias('a')->join('user u','a.userid = u.id','RIGHT')->where('a.status','eq',1)->order('a.id desc')->paginate(10, false, ['page' => $page]);

        $tell_list  = Db::name('guestbook')->where('status',1)->order('id desc')->paginate(10, false, ['page' => $page]);
        
        return $this->fetch('', ['tell_list' => $tell_list]);
    }


    public function add() {

       if ($this->request->isPost()) {

           $data = $this->request->post();

      /*if(!Cache::get(getIPaddress().Session::get('user_id')))
         {
         Cache::set(getIPaddress().Session::get('user_id'),getIPaddress().Session::get('user_id'),3600);
        
         }
         else
         {
      
         $this->error('留言失败,你今天已发布过留言');
         }
*/
         $validate_result = $this->validate($data, 'Gb');

         if ($validate_result !== true) {
            $this->error($validate_result);
        } else {

          if (!captcha_check($data['txt_check'])) {
              $this->error('验证码错误');
          } 

          if (Db::name('guestbook')->insert(['nickname' => $data['username'],'userid' => Session::get('user_id'),'headimgurl' => Session::get('user_headimgurl'),'email' => $data['email'],'content' => $data['content'],'os' =>getOS(),'position' =>GetIpLookup(getIPaddress()),'create_time' =>date('Y-m-d H:i:s')])) {
            $this->success('留言成功');
        } else {
            $this->error('留言失败');
        }
    }
}

}
}
