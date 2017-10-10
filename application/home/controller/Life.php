<?php
namespace app\home\controller;
use think\Db;

class Life extends Home
{
    public function index(){
        $life=Db::name('life')->paginate(8);

        $page =$life->render();
        $this->assign('life',$life);
        $this->assign('page',$page);
        return $this->fetch('index');

    }
    public function life_detail($id){
        $data=Db::name('document_article')->where('id',$id)->select();

        $life=$document=Db::name('life')->where('id',$id)->select();
        $this->assign('life',$data);
        $this->assign('life',$life);
        return $this->fetch();

    }

}