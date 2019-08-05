<?php
namespace app\admin\controller;

use app\admin\model\Guestbook as GuestbookModel;
//use app\admin\model\AdminUser as AdminUserModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 说说管理
 * Class Tell
 * @package app\admin\controller
 */
class Guestbook extends AdminBase {
    protected $guestbook_model;
   // protected $admin_user_model;

    protected function _initialize() {
        parent::_initialize();
        $this->guestbook_model = new GuestbookModel();
      //  $this->admin_user_model        = new AdminUserModel();
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
            $map['content|userid'] = ['like', "%{$keyword}%"];
        }
        $guestbook_list = $this->guestbook_model->where($map)->order('id DESC')->paginate($this->getConfig("admin_page"), false, ['page' => $page]);

       // $author = $this->admin_user_model->column('username', 'id');

        return $this->fetch('index', ['guestbook_list' => $guestbook_list, 'keyword' => $keyword]);
    }

  /**
     * 回复留言
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        $guestbook = $this->guestbook_model->find($id);

        return $this->fetch('edit', ['guestbook' => $guestbook]);
    }



    /**
     * 更新回复
     * @param $id
     */
 
    public function update($id) {
        if ($this->request->isPost()) {
            $data            = $this->request->post();

                $tell           = $this->guestbook_model->find($id);
                $tell->id       = $id;
                $tell->content = $data['bookcontent'];
                $tell->replycontent = $data['replycontent'];
                $tell->status   = $data['status'];
                if ($tell->save() !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
        }
    }


    /**
     * 删除回复
     * @param $id
     * @param array $ids
     */
      public function delete($id = 0, $ids = []) {
        $id = $ids ? $ids : $id;
        if ($id) {
            if ($this->guestbook_model->destroy($id)) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的留言');
        }
    }


  /**
     * 回复审核状态切换
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
            if ($this->guestbook_model->saveAll($data)) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        } else {
            $this->error('请选择需要操作的留言');
        }
    }


}