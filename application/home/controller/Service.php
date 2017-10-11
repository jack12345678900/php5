<?php
namespace app\home\controller;
use think\Db;

class Service extends Home
{
    public function index(){

        return $this->fetch('index');

    }
    public function ajaxpage($page=1){
        $service=DB::name('service')->paginate(1);
        $this->assign('service',$service);
        $this->assign('num',++$page);
        return $this->fetch();
    }
    public function service_detail($id){
        $data=Db::name('document_article')->where('id',$id)->select();

        $service=$document=Db::name('service')->where('id',$id)->select();
        $this->assign('service',$data);
        $this->assign('service',$service);
        return $this->fetch();

    }

}