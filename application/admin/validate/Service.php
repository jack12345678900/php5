<?php
 
namespace app\admin\validate;
use think\Validate;
/**
*  UC验证模型
*/
class Service extends Validate{
    // 验证规则
    protected $rule = [
        ['title','require'],
        ['description','require'],
    ];

}