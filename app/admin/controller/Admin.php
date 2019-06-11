<?php
namespace app\admin\controller;
use think\Db;
class Admin extends Base
{
    public function index()
    {
        $res = DB::name('admin')->select();
        $auth = new Auth();
        //把权限加在里面
        foreach ($res as $k=>$v){
            if($v['id'] == 1){
                $res[$k]['auth_title']='*';
            }else{
                $res[$k]['auth_title']=$auth->getGroups($v['id'])?$auth->getGroups($v['id'])[0]['title']:'无';
            }
        }
        $this->assign('res',$res);
        return view('',['title'=>'管理员']);
    }
    public function add()
    {
        $auth_group=$this->getAuthGroup();
        return view('',['auth_group'=>$auth_group]);
    }
    public function addPost()
    {
        if($this->request->isPost()){
            $data = $this->request->param();

            $validate = validate('Admin');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{

                if($data['password']<=6){
                    return json(['msg'=>'密码长度必须大于六位！','status'=>0]);
                }
                unset($data['password_confirm']);

                $insert_data= [
                    'username' => $data['username'],
                    'create_time' => time(),
                    'password' => md5($data['password'] . config('salt'))
                ];
                $res = DB::name('admin')->insertGetId($insert_data);
                if($res){
                    $this->altAuthGroupAccessBb($res,$data['group_id']);
                    return json(['msg'=>'添加成功！','status'=>1]);
                }else{
                    return json(['msg'=>'添加失败！','status'=>0]);
                }
            }
        }
    }
    public function edit()
    {
        $id = input('id');
        $res = DB::name('admin')->find($id);
        $auth_group=$this->getAuthGroup();
        $group_id = $this->getAuthGroupAccessByUid($res['id']);
        return view('',['res' => $res,'auth_group'=>$auth_group,'group_id'=>$group_id]);
    }
    public function editPost()
    {
        if($this->request->isPost()){
            $data = $this->request->param();
            $admins=db('admin')->find($data['id']);

            $validate = validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            } else {
                $update_data= [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'update_time' => time(),
                    'password' => $data['password']?md5($data['password'] . config('salt')):$admins['password']
                ];

                $res = db('admin')->update($update_data);
                if($res){
                    if($data['id'] != 1){
                        $this->altAuthGroupAccessBb($data['id'],$data['group_id'],FALSE);
                    }
                    return json(['msg'=>'修改成功！','status'=>1]);
                }else{
                    return json(['msg'=>'修改失败！','status'=>0]);
                }
            }


        }
    }
    public function delete()
    {
        $id= input('id');
        if($id == 1){
            return json(['msg'=>'超级管理员不能删除！','status'=>0]);
        }

        $res = DB::name('admin')->where('id',$id)->delete();
        if($res){
            $this->delAuthGroupAccessBb($id);
            return json(['msg'=>'删除成功！','status'=>1]);
        }else{
            return json(['msg'=>'删除失败！','status'=>0]);
        }
    }


    private function getAuthGroup()
    {
        return db('auth_group')->where('status',1)->select();
    }

    private function getAuthGroupAccessByUid($uid)
    {
        return db('auth_group_access')->where('uid',$uid)->find()['group_id'];
    }
    private function altAuthGroupAccessBb($uid,$group_id,$is_add = TRUE)
    {
        $data = ['uid' => $uid, 'group_id' => $group_id];

        if($is_add){
            return db('auth_group_access')->insert($data);
        } else {
            return db('auth_group_access')->where('uid',$uid)->update($data);
        }
    }

    private function delAuthGroupAccessBb($uid)
    {
        return db('auth_group_access')->where('uid',$uid)->delete();
    }
}