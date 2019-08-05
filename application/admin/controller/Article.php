<?php
namespace app\admin\controller;

use app\admin\model\Article as ArticleModel;
use app\admin\model\Category as CategoryModel;
use app\admin\model\Tags as TagsModel;
use app\common\controller\AdminBase;


/**
 * 文章管理
 * Class Article
 * @package app\admin\controller
 */
class Article extends AdminBase{
    protected $article_model;
    protected $category_model;
    protected $tags_model;

    protected function _initialize() {
        parent::_initialize();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();
        $this->tags_model = new TagsModel();

        $category_level_list = $this->category_model->getLevelList();
        $this->assign('category_level_list', $category_level_list);
    }

    /**
     * 文章管理
     * @param int    $cid 分类ID
     * @param string $keyword 关键词
     * @param int    $page
     * @return mixed
     */
    public function index($cid = 0, $keyword = '', $page = 1) {
        $map   = [];
        $field = 'id,title,cid,author,reading,status,publish_time,sort';
        if ($cid > 0) {
            $map['cid'] = $cid;
        }
        if (!empty($keyword)) {
            $map['title'] = ['like', "%{$keyword}%"];
        }

        $article_list  = $this->article_model->field($field)->where($map)->order('id desc')->paginate($this->getConfig("admin_page"), false, ['page' => $page]);
        $category_list = $this->category_model->column('name', 'id');


        return $this->fetch('index', ['article_list' => $article_list, 'category_list' => $category_list, 'cid' => $cid, 'keyword' => $keyword]);
    }

    /**
     * 添加文章
     * @return mixed
     */
    public function add() {
        return $this->fetch();
    }

    /**
     * 保存文章
     */
    public function save() {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Article');
            $data['position']=taobaoIP(getIPaddress());
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {

                if ($this->article_model->allowField(true)->save($data)) {

           if (!empty($data['keywords'])) {
              $this->saveTags(str_replace("，",",",$data['keywords']));
            }

               $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑文章
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $article = $this->article_model->find($id);

        return $this->fetch('edit', ['article' => $article]);
    }

    /**
     * 更新文章
     * @param $id
     */
    public function update($id) {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Article');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->article_model->allowField(true)->save($data, $id) !== false) {
                     if (!empty($data['keywords'])) {
              $this->saveTags(str_replace("，",",",$data['keywords']));
            }
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除文章
     * @param int   $id
     * @param array $ids
     */
    public function delete($id = 0, $ids = []) {
        $id = $ids ? $ids : $id;
        if ($id) {
            if ($this->article_model->destroy($id)) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的文章');
        }
    }

    /**
     * 文章审核状态切换
     * @param array  $ids
     * @param string $type 操作类型
     */
    public function toggle($ids = [], $type = '') {
        $data   = [];
        $status = $type == 'audit' ? 1 : 0;

        if (!empty($ids)) {
            foreach ($ids as $value) {
                $data[] = ['id' => $value, 'status' => $status];
            }
            if ($this->article_model->saveAll($data)) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        } else {
            $this->error('请选择需要操作的文章');
        }
    }

}