<?php
 
namespace app\admin\validate;
use think\Validate;
/**
*  UC验证模型
*/
class Zushou extends Validate{
    // 验证规则
    protected $rule = [
       //['name', 'require'],
        ['title','require'],
        ['content','require'],
    ];

}