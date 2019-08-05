<?php
namespace app\admin\controller;

use app\admin\model\Links as LinksModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 友情链接管理
 * Class Link
 * @package app\admin\controller
 */
class Links extends AdminBase {
    protected $links_model;

    protected function _initialize() {
        parent::_initialize();
        $this->links_model = new LinksModel();
    }

    /**
     * 友情链接管理
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index($keyword = '', $page = 1) {
        $map = [];
        if ($keyword) {
            $map['linkname|linkurl'] = ['like', "%{$keyword}%"];
        }
        $links_list = $this->links_model->where($map)->order('id DESC')->paginate($this->getConfig("admin_page"), false, ['page' => $page]);

        return $this->fetch('index', ['links_list' => $links_list, 'keyword' => $keyword]);
    }

    /**
     * 添加友情链接
     * @return mixed
     */
    public function add() {
        return $this->fetch();
    }

    /**
     * 保存友情链接
     */
    public function save() {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Links');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
        
                if ($this->links_model->allowField(true)->save($data)) {
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑友情链接
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $links = $this->links_model->find($id);

        return $this->fetch('edit', ['links' => $links]);
    }

    /**
     * 更新友情链接
     * @param $id
     */
    public function update($id) {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Links');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $links           = $this->links_model->find($id);
                $links->id       = $id;
                $links->linkname = $data['linkname'];
                $links->linkurl = $data['linkurl'];
                $links->status   = $data['status'];
                if ($links->save() !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除友情链接
     * @param $id
     */
    public function delete($id) {
        if ($this->links_model->destroy($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}