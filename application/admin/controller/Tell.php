<?php
namespace app\admin\controller;

use app\admin\model\Tell as TellModel;
use app\admin\model\AdminUser as AdminUserModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 说说管理
 * Class Tell
 * @package app\admin\controller
 */
class Tell extends AdminBase {
    protected $tell_model;
    protected $admin_user_model;

    protected function _initialize() {
        parent::_initialize();
        $this->tell_model = new TellModel();
        $this->admin_user_model        = new AdminUserModel();
    }

    /**
     * 说说管理
     * @param string $keyword
     * @param int    $page
     * @return mixed
     */
    public function index($keyword = '', $page = 1) {
        $map = [];
        if ($keyword) {
            $map['tellcontent|tellid'] = ['like', "%{$keyword}%"];
        }
        $tell_list = $this->tell_model->where($map)->order('id DESC')->paginate($this->getConfig("admin_page"), false, ['page' => $page]);

        $author = $this->admin_user_model->column('username', 'id');

        return $this->fetch('index', ['tell_list' => $tell_list, 'keyword' => $keyword,'author' => $author]);
    }

    /**
     * 添加说说
     * @return mixed
     */
    public function add() {
        return $this->fetch();
    }

    /**
     * 保存说说
     */

    public function save() {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Tell');
            $data['tellid'] = session('admin_id');
            $data['tellcontent'] = $data['content'];
            $data['os']=getOS();
            $data['position']=GetIpLookup(getIPaddress());

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->tell_model->allowField(true)->save($data)) {
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }


    /**
     * 编辑说说
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $tell = $this->tell_model->find($id);

        return $this->fetch('edit', ['tell' => $tell]);
    }

    /**
     * 更新说说
     * @param $id
     */
    public function update($id) {
        if ($this->request->isPost()) {
            $data            = $this->request->post();
            $validate_result = $this->validate($data, 'Tell');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $tell           = $this->tell_model->find($id);
                $tell->id       = $id;
                $tell->tellcontent = $data['content'];
                $tell->status   = $data['status'];
                if ($tell->save() !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除说说
     * @param $id
     * @param array $ids
     */
      public function delete($id = 0, $ids = []) {
        $id = $ids ? $ids : $id;
        if ($id) {
            if ($this->tell_model->destroy($id)) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的说说');
        }
    }


  /**
     * 说说审核状态切换
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
            if ($this->tell_model->saveAll($data)) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        } else {
            $this->error('请选择需要操作的说说');
        }
    }


}