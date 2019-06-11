<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'username'=>'require|max:15|unique:admin',
        'password'=>'require|confirm',
    ];
    protected $message=[
        'username.require'  =>  '名称不能为空！',
        'username.unique'   =>  '名称重复！',
        'username.max'      =>  '名称不能超过15字符！',
        'password.require'  =>  '密码不能为空！',
        'password.confirm'  =>  '密码不一致！',
    ];

    protected $scene = [
        'edit'  =>  'username',
    ];
}