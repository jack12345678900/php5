<?php

namespace app\common\validate;
use think\Validate;
/**
 *  UC验证模型
 */
class Baoxiu extends Validate{
    // 验证规则
    protected $rule = [
        ['name', 'require'],
        ['tel','require'],
        ['area','require'],
        ['intro','require'],
    ];

}