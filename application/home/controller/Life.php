<?php
namespace app\home\controller;
use think\Db;

class Life extends Home
{
    public function index(){
        return $this->fetch('index');

    }
    public function ajaxpage($page=1){
        $life=DB::name('life')->paginate(1);
        $this->assign('life',$life);
        $this->assign('num',++$page);
        return $this->fetch();
    }
    public function life_detail($id){
        $data=Db::name('document_article')->where('id',$id)->select();

        $life=$document=Db::name('life')->where('id',$id)->select();
        $this->assign('life',$data);
        $this->assign('life',$life);
        return $this->fetch();

    }

}