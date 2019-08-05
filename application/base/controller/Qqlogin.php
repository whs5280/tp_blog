<?php
namespace app\base\controller;
use app\common\controller\HomeBase;
use think\Db;
use think\Session;

class Qqlogin extends HomeBase {

    public function index() {

        $user_nickname = Session::get('user_nickname');
        if (!empty($user_nickname)) {
            $this->success('登录成功', '/');
        } else {
            $YY_CODE_ID = $_GET['YY_CODE_ID'];
            $QQ_json = file_get_contents("http://www.cn300.cn/API/QQ/DB.php?YY_CODE_ID=" . $YY_CODE_ID);
            $QQ_json_array = json_decode($QQ_json, true);

            if (!empty($QQ_json_array['openid'])) {

                $list = Db::name('user')->where('openid', $QQ_json_array['openid'])->select();
                if ($list) {
                    Session::set('user_id', $list[0]['id']);
                    Session::set('user_nickname', $list[0]['nickname']);
                    Session::set('user_headimgurl', $list[0]['headimgurl']);

                     Db::name('user')->where('id',$list[0]['id'])->update(['last_login_time' => date('Y-m-d H:i:s'),'last_login_ip' => getIPaddress(),'logincount' => array('exp', 'logincount+1')]);

                    $this->success('登录成功', '/');
                } else {
                    $reg = Db::name('user')->insert(['openid' => $QQ_json_array['openid'], 'nickname' => $QQ_json_array['Info']['nickname'], 'headimgurl' => $QQ_json_array['Info']['figureurl_2'], 'create_time' => date('Y-m-d H:i:s'),'last_login_time' => date('Y-m-d H:i:s'), 'last_login_ip' => getIPaddress() ]);
                    if ($reg) {

                     $listt = Db::name('user')->where('openid', $QQ_json_array['openid'])->select();
                        Session::set('user_id', $listt[0]['id']);
                        Session::set('user_nickname', $listt[0]['nickname']);
                        Session::set('user_headimgurl', $listt[0]['headimgurl']);
                        $this->success('注册成功', '/');
                    } else {
                        $this->error('注册失败！', '/');
                    }
                }
            } else {
                $this->error('注册失败！', '/');
            }
        }
    }
    /**
     * 退出登录
     */
    public function out() {
        Session::delete('user_id');
        Session::delete('user_nickname');
        Session::delete('user_headimgurl');
        $this->success('退出成功', '/');
    }
}
