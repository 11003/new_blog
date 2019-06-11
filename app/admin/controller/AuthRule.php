<?php
/**
 * User: Lh
 * Date: 2019/4/23 23:04
 */

namespace app\admin\controller;
use app\admin\server\GetChildrenId;
use app\admin\server\UnlimitTree;
use app\admin\model\AuthRule as AuthRuleModel;
class AuthRule extends Base
{
    protected $beforeActionList = [
        'delsonAuth' => ['only' => 'delete'],
    ];

    public function index()
    {
        if($this->request->isPost()){
            $data = input('post.');
            foreach ($data as $k => $v) {
                db('auth_rule')->update(['id'=>$k,'sort'=>$v]);
            }
            return json(['msg'=>'更新成功！','status'=>1]);
        }
        $res = (new UnlimitTree())->catetree('auth_rule');
        return view('',['title'=>'权限组管理','res'=>$res]);
    }
    public function add()
    {
        $pid = (new UnlimitTree())->catetree('auth_rule');
        return view('',['pid'=>$pid]);
    }
    public function addPost()
    {
        if($this->request->isPost()){
            $data = $this->request->param();
            if($data['pid']==0){
                $data['name'] = ucwords($data['name']);
            }else{
                $data['name'] = strtolower($data['name']);
            }
            $data['is_fun'] = isset($data['is_fun'])?:0;
            $data['style'] = trim($data['style']);
            $validate = validate('AuthRule');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $p_level=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            if($p_level){
                $data['level'] = $p_level['level']+1;
            }else{
                $data['level'] = 0;
            }
            db('auth_rule')->insert($data);
            return json([ 'status' => 1, 'msg' => '添加权限组成功']);
        }
    }
    public function edit()
    {
        $id = input('id');
        $res = $this->getAuthRuleInfoByid($id);
        $pid = (new UnlimitTree())->catetree('auth_rule');
        return view('',['res' => $res,'pid'=>$pid]);
    }
    public function editPost()
    {
        if($this->request->isPost()){
            $data = $this->request->param();
            if($data['pid']==0){
                $data['name'] = ucwords($data['name']);
            }else{
                $data['name'] = strtolower($data['name']);
            }
            $data['is_fun'] = isset($data['is_fun'])?:0;
            $data['style'] = trim($data['style']);
            $validate = validate('AuthRule');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = db('auth_rule')->update($data);
                if($res){
                    return json(['msg'=>'修改权限组成功！','status'=>1]);
                }else{
                    return json(['msg'=>'修改权限组失败！','status'=>0]);
                }
            }
        }
    }

    public function delete()
    {
        $id = input('id');
        $auth_rule_ids = (new GetChildrenId())->getchildrenid('auth_rule',$id);
        $auth_rule_ids[] = $id;
        // 先走 delsonAuth 才会删除掉
        $res = AuthRuleModel::destroy($auth_rule_ids);
        if($res){
            return json(['msg'=>'删除权限组成功！','status'=>1]);
        }else{
            return json(['msg'=>'删除权限组失败！','status'=>0]);
        }
    }

    public function dels()
    {
        $id_arr = input('id/a');
        if(empty($id_arr)){
            $this->error('未选中任何内容！');
        }else{
            $ids = implode(",",$id_arr);
            if(!empty($ids)){
                AuthRuleModel::destroy($ids);
                $this->success('删除成功！');
            }
        }
    }

    public function delsonAuth()
    {
        $id = input('id');
        //检查栏目下是否有子栏目
        $auth_rule_sonids = (new GetChildrenId())->getchildrenid('auth_rule',$id);
        foreach($auth_rule_sonids as $k=>$v){
            if(isset($v)){
                $this->error('删除失败！请检查该栏目下是否有子权限！');
            }
            if($auth_rule_sonids){
                db('auth_rule')->delete($auth_rule_sonids);
            }
        }
    }

    public function status()
    {
        $id = input('id');
        $rec = input('rec');

        $auth_rule_ids = (new GetChildrenId())->getchildrenid('auth_rule',$id);
        $auth_rule_ids[] = $id;

        $res = $this->getAuthRuleInfoByid($id)['title'];

        foreach ($auth_rule_ids as $k=>$v){
            if($rec == 1){
                //发布
                db('auth_rule')->where('id',$id)->update(['status'=>1]);
                return json(['msg'=>$res.' 开启成功！','status'=>1]);
            }elseif($rec == 0){
                db('auth_rule')->where('id',$id)->update(['status'=>0]);
                return json(['msg'=>$res.' 已禁用！','status'=>1]);
            }
        }
    }

    private function getAuthRuleInfoByid($id)
    {
        return db('auth_rule')->where(['id'=>$id])->find();
    }

}