<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/9/23
 * Time: 19:14
 */
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{
    protected $rule = [
        'title'=>'require|unique:article',
    ];
    protected $message=[
        'title.require'  =>  '文章名称不能为空！',
        'title.unique'   =>  '文章名称重复！',
    ];
}