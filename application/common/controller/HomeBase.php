<?php
namespace app\common\controller;

use think\Controller;
use think\Db;
use think\Cache;

class HomeBase extends Controller {
    protected function _initialize() {
      parent::_initialize();


      if(!is_file(ROOT_PATH . 'data/install.lock')){
       header('Location: /index.php/install');
    }

     
       if (Cache::has('site_config')) {
            $site_config = Cache::get('site_config');
        } else {
            $site_config = Db::name('system')->field('value')->where('name', 'site_config')->find();
            $site_config = unserialize($site_config['value']);
        }
       

        $banner  = Db::name('advertising')->where('status','eq',1)->order('sort asc')->select();
        $category= Db::name('category')->where('type','eq',1)->select();
        $links=Db::name('links')->where('status','eq',1)->limit(10)->select();
        $tags=Db::name('tags')->order('num desc')->limit(10)->select();

        $randarticle=Db::name('article')->field('id,title,introduction,thumb')->where('status','eq',1)->order('rand()')->limit(3)->select();

        $htorticle=Db::name('article')->field('id,title,introduction,thumb')->where('status','eq',1)->order('reading desc')->limit(10)->select();

        $toparticle=Db::name('article')->field('id,title,cid,introduction,keywords,tag,is_top,is_good,photo,thumb,author,reading,status,publish_time,sort')->where('status','eq',1)->where('is_top',1)->limit(1)->select();

       // $messageinfo = Db::name('guestbook')->alias('a')->join('user u','a.userid = u.id','RIGHT')->limit(4)->select();
         $messageinfo = Db::name('guestbook')->where('status',1)->limit(4)->select();

        $nav=Db::name('nav')->where('status',1)->select();

        $currenturl= $_SERVER['REQUEST_URI'];

        $this->assign('site_config', $site_config);
        $this->assign('banner', $banner);
        $this->assign('category', $category);
        $this->assign('links', $links);
        $this->assign('tags', $tags);
        $this->assign('randarticle', $randarticle);
        $this->assign('htorticle', $htorticle);
        $this->assign('messageinfo', $messageinfo);
        $this->assign('nav', $nav);
        $this->assign('currenturl', $currenturl);
        $this->assign('toparticle', $toparticle);
    
        
    }
   
}