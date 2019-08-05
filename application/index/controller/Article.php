<?php
namespace app\index\controller;

use app\index\model\Article as ArticleModel;
use app\index\model\Category as CategoryModel;
use app\common\controller\HomeBase;
use think\Cache;

class article extends HomeBase {


    protected $category_model;
    protected $article_model;


    protected function _initialize() {

        parent::_initialize();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();

    }


    public function index($id=0) {

           if ($id==0) {
             $this->error('请选择需要的文章');
        }

       
         //取文章主体
      $article = $this->article_model->find($id);

       if(!$article)
       {
    
       $this->error('文章不存在！');
       }

         if(!Cache::get(getIPaddress().$id))
         {
         Cache::set(getIPaddress().$id,getIPaddress().$id,3600);
         $this->article_model->where('id',$id)->setInc('reading');
         }

        //取类别名称
         $getcategoryName = $this->category_model->column('name', 'id');
        
        //上一篇
        $prevs  = $this->article_model->field('id,title')->where(array('cid'=>$article['cid']))->where('id<'.$id)->order('id desc')->find();
         //下一篇
        $nexts  = $this->article_model->field('id,title')->where(array('cid'=>$article['cid']))->where('id>'.$id)->order('id asc')->find();

         //相关文章

         $map['id']  = array('neq',$id);

         $article_related  = $this->article_model->field('id,title')->where(array('cid'=>$article['cid']))->where($map)->order('id desc')->limit(10)->select();

        
        return $this->fetch('index', ['article' => $article,'prevs' => $prevs,'nexts' => $nexts,'getcategoryName' => $getcategoryName,'article_related' => $article_related]);


    }

}
