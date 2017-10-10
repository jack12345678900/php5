<?php
namespace app\home\controller;
use think\Db;

class Notice extends Home
{
    public function index(){
        $notice=Db::name('active')->paginate(8);

        $page =$notice->render();
        $this->assign('notice',$notice);
        $this->assign('page',$page);
        return $this->fetch('index');

    }
    public function notice_detail($id){
        $data=Db::name('document_article')->where('id',$id)->select();

        $notice=$document=Db::name('active')->where('id',$id)->select();
        $this->assign('article',$data);
        $this->assign('notice',$notice);
        return $this->fetch();

    }

}