<?php
namespace app\admin\controller;

use app\admin\model\Tags as TagsModel;
use app\common\controller\AdminBase;

/**
 * 说说管理
 * Class Tell
 * @package app\admin\controller
 */
class Tags extends AdminBase {
    protected $tags_model;
    protected function _initialize() {
        parent::_initialize();
        $this->tags_model = new TagsModel();
      
    }

      /**
     * Tags管理
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index($keyword = '', $page = 1) {
        $map = [];
        if ($keyword) {
            $map['tagname'] = ['like', "%{$keyword}%"];
        }
        $tags_model = $this->tags_model->where($map)->order('id DESC')->paginate($this->getConfig("admin_page"), false, ['page' => $page]);


        return $this->fetch('index', ['tags_model' => $tags_model, 'keyword' => $keyword]);
    }

        /**
     * 删除Tags
     * @param $id
     * @param array $ids
     */
      public function delete($id = 0, $ids = []) {
        $id = $ids ? $ids : $id;
        if ($id) {
            if ($this->tags_model->destroy($id)) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的说说');
        }
    }



}