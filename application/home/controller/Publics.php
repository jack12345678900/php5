<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +---------------------------------------------------------------------- 

namespace app\home\controller;

use app\common\controller\UcApi;
use think\Controller;

/**
 * 后台首页控制器 
 */
class Publics extends Controller {
	public function __construct(){
		/* 读取数据库中的配置 */
		$config = cache('db_config_data');
		if(!$config){
			$config =   api('Config/lists');
			$config ['var_module'] = request()->module();
			$config ['var_controller'] = request()->controller();
			$config ['var_action'] = request()->action(); 
			$config ['template']['view_path'] = APP_PATH.'home/view/'.$config['home_view_path'].'/'; //模板主题
			$config['dispatch_error_tmpl' ]    =  APP_PATH .'home'. DS .'view' . DS .$config['home_view_path'].DS. 'public' . DS . 'error.html'; // 默认错误跳转对应的模板文件
			$config['dispatch_success_tmpl' ]  =  APP_PATH .'home'. DS .'view' . DS .$config['home_view_path'].DS. 'public' . DS . 'success.html'; // 默认成功跳转对应的模板文件
			cache('db_config_data', $config);
		}
		config($config);//添加配置
		parent::__construct();
	}

    /**
     * 后台用户登录 
     */
    public function login($username = null, $password = null, $verify = null){
        if(request()->isPost()){
            /* 检测验证码 TODO: */
           if(!captcha_check($verify)){
                $this->error('验证码输入错误！');
            }

            /* 调用UC登录接口登录 */
            $User = new UcApi;
            $uid = $User->login($username, $password);
            if(0 < $uid){ //UC登录成功
                /* 登录用户 */
                $Member = model('name');
                if($Member->login($uid)){ //登录用户
                    //TODO:跳转到登录前页面
                    $this->success('登录成功！', url('Index/index'));
                } else {
                    $this->error($Member->getError());
                }

            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }
        } else {
            if(is_login()){
                $this->redirect('Index/index');
            }else{
                /* 读取数据库中的配置 */
                $config = cache('db_config_data');
                if (!$config) {
                    $config = model('Config')->lists();
                    cache('db_config_data', $config);
                }
                config($config);//添加配置
                
                return $this->fetch();
            }
        }
    }

    /* 退出登录 */
    public function logout(){
        if(is_login()){
            model('name')->logout();
            session('[destroy]');
            $this->success('退出成功！', url('login1'));
        } else {
            $this->redirect('login1');
        }
    } 

}
