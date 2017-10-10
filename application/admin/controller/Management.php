<?php
  namespace app\admin\controller;

  use think\Db;

  class Management extends Admin{
      public function index(){
          $map = array('status'=>array('gt',-1));
          $list = $this->lists('management',$map,'id desc');
          int_to_string($list);
          // 记录当前列表页的cookie
          Cookie('__forward__',$_SERVER['REQUEST_URI']);

          $this->assign('_list', $list);
          $this->assign('meta_title','模型管理');
          return $this->fetch();
      }
      public function add(){
          if(request()->isPost()){
              $Channel = model('management');
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
      public function edit($id = 0){
          if($this->request->isPost()){
              $postdata = \think\Request::instance()->post();
              $Channel = Db::name("management");
              $data = $Channel->update($postdata);
              if($data !== false){
                  $this->success('编辑成功', url('index'));
              } else {
                  $this->error('编辑失败');
              }
          } else {
              $info = array();
              /* 获取数据 */
              $info = \think\Db::name('management')->find($id);

              if(false === $info){
                  $this->error('获取配置信息错误');
              }

              $pid = input('get.id', 0);
              //获取父导航
              if(!empty($pid)){
                  $parent = \think\Db::name('management')->where(array('id'=>$id))->field('title')->find();
                  $this->assign('parent', $parent);
              }

              $this->assign('id', $id);
              $this->assign('info', $info);
              return $this->fetch();
          }
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