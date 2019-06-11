<?php
/**
 * User: admin
 * Date: 2018/10/5
 * Time: 19:51
 */

namespace app\admin\model;
use think\Model;
use think\Request;

class Admin extends Model
{
    protected $table = 'be_admin';

    public function addadmin($data)
    {
        if(empty($data) || !is_array($data)){
            return false;
        }
    }
    public function login($data)
    {
        $table = db('admin');

        $name = trim($data['username']);
        $result = $table->where(['username' => $name])->find();
        if(!empty($result)){
            if($result['status']  == 0){
                if((time() - $result['last_time']) > 300){
                    //过了锁定时间 恢复正常状态
                    $count['status'] = 1;
                    $table->where(['username' => $name])->update($count);
                }else{
                    //5分钟之后登录
                    return 3;
                }
            }
            if($result['password']== md5($data['password'] . config('salt'))){
                $table->where(['username' => $name])->update(['ip' => Request::instance()->ip(), 'last_time' => time()]);
                session('id',$result['id']);
                session('username',$result['username']);
                session('last_time', time() + 1800);
                //登录成功
                return 4;
            }else{
                if($result['count'] < 3){
                    // 错误小于三次 字段值增加
                    $count['count'] = $result['count']+1;
                    $table->where(['username' => $name])->update($count);
                } else {
                    // 错误次数大于3时 属性恢复 清空 锁定
                    $count['count'] = 0;
                    $count['last_time'] = time();
                    $count['status']  = 0;
                    $table->where(['username' => $name])->update($count);
                }
                //密码错误
                return 2;
            }
        }else{
            //用户不存在
            return 1;
        }
    }
}