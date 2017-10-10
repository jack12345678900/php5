<?php
  namespace app\admin\controller;

  use think\Db;

  class Yezhurenzheng extends Admin{
      public function index(){
          $map = array('sta'=>array('gt',-1));
          $list = $this->lists('yezhurenzheng',$map,'id desc');
          int_to_string($list);
          // 记录当前列表页的cookie
          Cookie('__forward__',$_SERVER['REQUEST_URI']);

          $this->assign('_list', $list);
          $this->assign('meta_title','模型管理');
          return $this->fetch();
      }
      public function add(){
          if(request()->isPost()){
              $Channel = model('yezhurenzheng');
              $post_data=\think\Request::instance()->post();
              //自动验证
              $validate = validate('management');
              if(!$validate->check($post_data)){
                  return $this->error($validate->getError());
              }
                                $post_data['create_time']=time();
                                $post_data['sn']=date('Ymd').+date('His');
            $data=Db::name('management')->insert($post_data);
           //   $data = $Channel->create($post_data);
              if($data){
                  $this->success('新增成功', url('index'));
                  //记录行为
                 action_log('update_management', 'management', $data->id, UID);
              } else {
                  $this->error($Channel->getError());
              }
          } else {
              $this->assign('info',null);
              return $this->fetch('add');
          }
      }
      public function edit($id){
        Db::name('yezhurenzheng')->where('id',$id)->update(['sta'=>1]);
             $this->redirect('yezhurenzheng/index');
      }

      /**
       * 删除频道
       * @author 艺品网络  <twothink.cn>
       */
      public function del(){
          $id = array_unique((array)input('id/a',0));

          if ( empty($id) ) {
              $this->error('请选择要操作的数据!');
          }

          $map = array('id' => array('in', $id) );
          if(\think\Db::name('management')->where($map)->delete()){
              //记录行为
              action_log('del_management', 'management', $id, UID);
              $this->success('删除成功');
          } else {
              $this->error('删除失败！');
          }
      }

  }