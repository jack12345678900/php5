<?php
 
namespace app\admin\validate;
use think\Validate;
/**
*  UC验证模型
*/
class Diaocha extends Validate{
    // 验证规则
    protected $rule = [
       //['name', 'require'],
        ['name','require'],
        ['intro','require'],
    ];

}