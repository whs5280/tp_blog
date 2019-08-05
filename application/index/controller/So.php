<?php
namespace app\index\controller;

use app\index\model\Article as ArticleModel;
use app\index\model\Category as CategoryModel;
use app\common\controller\HomeBase;
use think\Db;

class So extends HomeBase {


    protected $category_model;
    protected $article_model;


    protected function _initialize() {

        parent::_initialize();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();

    }


    public function index($key = '', $page = 1) {

       if (empty($key)) {
             $this->error('请输入要搜索的关键词','/');
       }


       
       $map = [];

        $map['keywords|introduction'] = ['like', "%{$key}%"];
        


        $field = 'id,title,cid,introduction,keywords,tag,is_good,photo,thumb,author,reading,status,publish_time,sort';
       
        $article_list  = $this->article_model->field($field)->where($map)->where('status','eq',1)->order('id desc')->paginate(10, false, ['page' => $page, 
'query' => array('key'=>$key)]);

        $getcategoryName = $this->category_model->column('name', 'id');

        return $this->fetch('', ['article_list' => $article_list,'getcategoryName' => $getcategoryName]);
    }

}
