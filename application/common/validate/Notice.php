<?php
 namespace app\home\validate;

 use think\Validate;

 class Notice extends Validate {
     protected $rule=[
         ['name', 'require'],
     ];
 }