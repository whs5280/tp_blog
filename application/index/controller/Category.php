<?php
namespace app\index\controller;

use app\index\model\Article as ArticleModel;
use app\index\model\Category as CategoryModel;
use app\common\controller\HomeBase;
use think\Db;

class Category extends HomeBase {


    protected $category_model;
    protected $article_model;


    protected function _initialize() {

        parent::_initialize();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();

    }


    public function index($cid=0,$page = 1) {

       
        if ($cid==0) {
          $this->error('请选择需要的分类');
        }


        $field = 'id,title,cid,introduction,tag,is_good,thumb,author,reading,status,publish_time,sort';
       
        $article_list  = $this->article_model->field($field)->where('cid',$cid)->where('status','eq',1)->order('id desc')->paginate(5, false, ['page' => $page, 
'query' => array('cid'=>$cid)]);

        $getcategoryName = $this->category_model->column('name', 'id');

        $getcategory = $this->category_model->where('id',$cid)->find();
        
        return $this->fetch('', ['article_list' => $article_list,'getcategoryName' => $getcategoryName,'getcategory' => $getcategory]);
    }

}
