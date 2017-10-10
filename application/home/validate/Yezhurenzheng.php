<?php

namespace app\home\validate;
use think\Validate;
/**
 *  UC验证模型
 */
class Yezhurenzheng extends Validate{
    // 验证规则
    protected $rule = [
        ['name', 'require'],
        ['tel','require'],
        ['sn','require'],
        ['status','require'],
        ['id_card','require'],
    ];

}