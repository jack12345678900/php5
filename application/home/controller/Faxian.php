<?php
namespace app\home\controller;
use think\Db;

class Faxian extends Home
{
    public function index()
    {
        $Faxian = Db::name('zushou')->paginate(8);

        $page = $Faxian->render();
        $this->assign('Faxian', $Faxian);
        $this->assign('page', $page);
        return $this->fetch('index');

    }
}