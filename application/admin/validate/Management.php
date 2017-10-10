<?php
 
namespace app\admin\validate;
use think\Validate;
/**
*  UC验证模型
*/
class Management extends Validate{
    // 验证规则
    protected $rule = [
        ['name', 'require'],
        ['tel','require'],
        ['area','require'],
        ['intro','require'],
    ];

}