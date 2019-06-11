<?php
/**
 * User: admin
 * Date: 2018/10/5
 * Time: 22:52
 */

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Login as LoginModel;
use app\admin\model\Admin;
class Login extends Controller
{
    public function login()
    {
        if($this->request->isPost()){
            $data = $this->request->param();
            $admin = new Admin();
            $res = $admin->login($data);
            p($res);die;
            switch ($res){
                case 1 :
                    return json(['msg'=>'用户不存在！','status'=>0]);
                    break;
                case 2:
                    return json(['msg'=>'密码错误！','status'=>2]);
                    break;
                case 3:
                    return json(['msg'=>'账号或密码错误超过3次,请5分钟之后登录！']);
                    break;
                default:
                    return json(['msg'=>'登陆成功!','status'=>1]);

            }
        }
        return view('',['title' => '后台登录']);
    }
    public function logout()
    {
//        Cache::clear('username');
        session('username',null);
        session('id',null);
        return view('login');
    }
}