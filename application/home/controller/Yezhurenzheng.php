<?php
namespace app\home\controller;
use think\Db;

class Yezhurenzheng extends Home
{

    public function index()
    {
        if (request()->isPost()) {
            $Channel = model('Yezhurenzheng');
            $post_data = \think\Request::instance()->post();
            //自动验证
            $validate = validate('Yezhurenzheng');
            if (!$validate->check($post_data)) {
                return $this->error($validate->getError());
            }

            $post_data['sta']="0";
            $data = Db::name('Yezhurenzheng')->insert($post_data);
            //   $data = $Channel->create($post_data);
            if ($data) {
                $this->success('新增成功', url('index5/index'));
                //记录行为
                action_log('update_Yezhurenzheng', 'Yezhurenzheng', $data->id, UID);
            } else {
                $this->error($Channel->getError());
            }
        } else {
            $this->assign('info', null);
            return $this->fetch('index');
        }
    }
}
