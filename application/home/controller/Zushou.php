<?php
namespace app\home\controller;
use think\Db;

class Zushou extends Home
{
    public function index()
    {
        $zushou = Db::name('zushou')->where(['form'=>"1"])->select();
        $zushou1 = Db::name('zushou')->where(['form'=>"0"])->select();

       // $page = $zushou->render();
        $this->assign('zushou', $zushou);
        $this->assign('zushou1', $zushou1);
        //$this->assign('page', $page);
        return $this->fetch('index');
    }

    public function zushou_detail($id){
        $zushou=Db::name('zushou')->find($id);
        $this->assign('zushou',$zushou);
        return $this->fetch('zushou_detail');
    }

}