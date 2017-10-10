<?php
namespace app\home\controller;
use think\Db;

class Service extends Home
{
    public function index(){
        $service=Db::name('service')->paginate(8);

        $page =$service->render();
        $this->assign('service',$service);
        $this->assign('page',$page);
        return $this->fetch('index');

    }
    public function service_detail($id){
        $data=Db::name('document_article')->where('id',$id)->select();

        $service=$document=Db::name('service')->where('id',$id)->select();
        $this->assign('service',$data);
        $this->assign('service',$service);
        return $this->fetch();

    }

}