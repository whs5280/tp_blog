<?php
namespace app\index\controller;

use app\index\model\Article as ArticleModel;
use app\index\model\Category as CategoryModel;
use app\common\controller\HomeBase;
use think\Db;


class Index extends HomeBase {


    protected $category_model;
    protected $article_model;


    protected function _initialize() {
        
       // \think\Url::root('index.php'); 

       
        parent::_initialize();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();
      
        $category_level_list  = $this->category_model->getLevelList();

        $this->assign('category_level_list', $category_level_list);  

    }

    public function index($page = 1) {



        $field = 'id,title,cid,introduction,tag,is_good,thumb,author,reading,status,publish_time,sort';
       
        $article_list  = $this->article_model->field($field)->where('status','eq',1)->order('id desc')->paginate(5, false, ['page' => $page]);

        $getcategoryName = $this->category_model->column('name', 'id');


        return $this->fetch('index', ['article_list' => $article_list,'getcategoryName' => $getcategoryName]);
    }

}
