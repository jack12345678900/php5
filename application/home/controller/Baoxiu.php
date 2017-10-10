<?php
namespace app\home\controller;
use think\Db;

class Baoxiu extends Home
{
    public function index(){
    if(request()->isPost()){
        $Channel = model('baoxiu');
        $post_data=\think\Request::instance()->post();
        //自动验证
        $validate = validate('baoxiu');
        if(!$validate->check($post_data)){
            return $this->error($validate->getError());
        }
        $post_data['create_time']=time();
        $post_data['sn']=date('Ymd').+date('His');
        $post_data['status']='1';
        $data=Db::name('management')->insert($post_data);
        //   $data = $Channel->create($post_data);
        if($data){
            $this->success('新增成功', url('notice/index'));
            //记录行为
            action_log('update_management', 'management', $data->id, UID);
        } else {
            $this->error($Channel->getError());
        }
    } else {
        $this->assign('info',null);
        return $this->fetch('baoxiu/index');
    }
}
}