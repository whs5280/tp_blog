<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;

/**
 * 后台首页
 * Class Index
 * @package app\admin\controller
 */
class Index extends AdminBase {
    protected function _initialize() {
        parent::_initialize();
    }

    /**
     * 首页
     * @return mixed
     */
    public function index() {


   

        $version = Db::query('SELECT VERSION() AS ver');
        $config  = [
            'version'             => "V2.0.1",
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            //'server_ip'       => $_SERVER['SERVER_ADDR'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'mysql_version'   => $version[0]['ver'],
            'max_upload_size' => ini_get('upload_max_filesize')
        ];


      //新版本检测
  
     $new_ver     = $this->getVersion();
     $this->assign('new_ver',$new_ver);

    //文章总数
    $approvedarticle_number = Db::name('article')->field('id')->where("status=1")->select();
    $approvedarticle_number    = count($approvedarticle_number);

    $notauditarticle_number = Db::name('article')->field('id')->where("status=0")->select();
    $notauditarticle_number    = count($notauditarticle_number);

    $this->assign('approvedarticle_number',$approvedarticle_number);
    $this->assign('notauditarticle_number',$notauditarticle_number);

    //链接数
    
    $links_number = Db::name('links')->field('id')->select();
    $links_number    = count($links_number);
    $this->assign('links_number',$links_number);

     //说说数
    
    $tell_number = Db::name('tell')->field('id')->select();
    $tell_number    = count($tell_number);
    $this->assign('tell_number',$tell_number);

    //留言数
    
    $guestbook_number = Db::name('guestbook')->field('id')->select();
    $guestbook_number    = count($guestbook_number);
    $this->assign('guestbook_number',$guestbook_number);



    return $this->fetch('index', ['config' => $config]);
    }

     
    //系统更新检测
   
    private function getVersion()
    {
        //暂无
        return "暂无";
    }

}