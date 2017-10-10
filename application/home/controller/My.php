<?php
namespace app\home\controller;
use think\Db;

class My extends Home
{
    public function index()
    {
        $my = Db::name('my')->paginate(8);

        $page = $my->render();
        $this->assign('my', $my);
        $this->assign('page', $page);
        return $this->fetch('index');

    }
}