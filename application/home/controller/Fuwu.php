<?php
namespace app\home\controller;
use think\Db;

class Fuwu extends Home
{
    public function index()
    {
        $fuwu = Db::name('zushou')->paginate(8);

        $page = $fuwu->render();
        $this->assign('fuwu', $fuwu);
        $this->assign('page', $page);
        return $this->fetch('index');

    }
}