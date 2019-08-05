<?php
namespace app\admin\controller;

use app\admin\model\Advertising as AdvertisingModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 广告管理
 * Class Link
 * @package app\admin\controller
 */
class Advertising extends AdminBase {
    protected $links_model;

    protected function _initialize() {
        parent::_initialize();
        $this->advertising_model = new AdvertisingModel();
    }

    /**
     * 广告管理
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index($keyword = '', $page = 1) {
        $map = [];
        if ($keyword) {
            $map['adname|adurl'] = ['like', "%{$keyword}%"];
        }
        $advertising_list = $this->advertising_model->where($map)->order('sort asc')->paginate(15, false, ['page' => $page]);

        return $this->fetch('index', ['advertising_list' => $advertising_list, 'keyword' => $keyword]);
    }

    /**
     * 添加广告
     * @return mixed
     */
    public function add() {
        return $this->fetch();
    }

    /**
     * 保存广告
     */
    public function save() {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Advertising');
            $data['adpic'] = $data['thumb'];
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                
                if ($this->advertising_model->allowField(true)->save($data)) {
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑广告
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $advertising = $this->advertising_model->find($id);

        return $this->fetch('edit', ['advertising' => $advertising]);
    }

    /**
     * 更新广告
     * @param $id
     */
     public function update($id) {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Advertising');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $advertising           = $this->advertising_model->find($id);
                $advertising->id       = $id;
                $advertising->adname = $data['adname'];
                $advertising->adurl = $data['adurl'];
                $advertising->adpic = $data['thumb'];
                $advertising->status   = $data['status'];
                $advertising->sort   = $data['sort'];
                if ($advertising->save() !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除广告
     * @param $id
     */
    public function delete($id) {
        if ($this->advertising_model->destroy($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}