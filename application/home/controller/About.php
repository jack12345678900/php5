<?php
namespace app\home\controller;
use think\Db;

class About extends Home
{
    public function index()
    {
        $Service = Db::name('service')->paginate(8);

        $page = $Service->render();
        $this->assign('Service', $Service);
        $this->assign('page', $page);
        return $this->fetch('index');

    }
}