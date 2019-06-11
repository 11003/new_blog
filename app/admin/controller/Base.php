<?php
namespace app\admin\controller;

use think\Controller;
use think\Hook;

class Base extends Controller
{
    const DOWN_MENU = 1; //菜单(只是做下拉框)
    const SHOW_LIST = 2; //列表(显示数据)
    const ALT = 3; //不显示(删除或者修改等隐藏操作)
    const FUN = 1; //修改、删除功能

    public function _initialize()
    {
        //注册行为
        Hook::add('app_init','app\\admin\\behavior\\CheckAuth');
        //监听行为
        Hook::listen('app_init');

        $this->leftNav();
        $this->checkAuth();
        $this->resources();
    }

    private function checkAuth()
    {
        $uid = session('id');
        $BlogPHP = $this->getModelHttp();
        $notCheck = ['index/index','login/logout'];
        $auth = new Auth();
        if(in_array($BlogPHP,$notCheck)){
            return true;
        }
        if($uid == 1){
            return true;
        }
        if(!$auth->check($BlogPHP,$uid,self::SHOW_LIST)){
            $this->error('权限不足！',url('login/login'));
        }
    }

    private function getModelHttp()
    {
        $controller = $this->toUnderScore(request()->controller());
        $action = strtolower(request()->action());
        return $controller . '/' . $action;
    }

    private function leftNav()
    {
        $where['is_fun'] = ['<>',self::FUN];
        $where['status'] = ['<>',0];
        $auth_rule = db('auth_rule')->where($where)->field('id,title,name,pid,sort,style,type')->order('sort desc')->select();
        $node = prepareMenu($auth_rule);
        cache('node',$node);
        return $this->assign([
            'node' => cache('node'),
            'model' => $this->getModelHttp(),
            'controller' => request()->controller(),
            'url' => request()->url()
        ]);
    }
    private function resources()
    {
        //头像
        $avatar = db('img')->where(['rec_index'=>2])->field('pic')->find()['pic'];
        //评论
        $comment = db('comment')->whereTime('create_time','d')->field('user_name,user_comment,ip,create_time')->order('create_time DESC')->select();
        foreach ($comment as $k=>$v){
            $comment[$k]['user_name'] = urldecode($v['user_name']);
            $comment[$k]['user_comment'] = isIncludedImg('[图片]',$v['user_comment']);
            $comment[$k]['address'] = getAddressByIp($v['ip']);
        }
        $comment_count = db('comment')->whereTime('create_time','d')->field('id')->count('id');
        return $this->assign([
            'avatar'=> $avatar,
            'comment' => $comment,
            'comment_count' => $comment_count
        ]);
    }
    private static $_arr_auth_str =[];
    private function toUnderScore($str)
    {
        if(!isset(self::$_arr_auth_str[$str])){
            $auth_str = preg_replace_callback('/([A-Z]+)/',function($matchs)
            {
                return '_'.strtolower($matchs[0]);
            },$str);
            self::$_arr_auth_str[$str] = trim(preg_replace('/_{2,}/','_',$auth_str),'_');
        }

        return self::$_arr_auth_str[$str];
    }
}