<?php
namespace app\admin\controller;
use think\Db;
use think\Validate;
use app\admin\model\Comment as CommentModel;
class Comment extends Base
{
	public function index()
	{
		$model = new CommentModel();
		$res = $model->order('create_time desc')->paginate(10);
		foreach ($res as $k=>$v) {
            $res[$k]['user_email'] = urldecode($v['user_email']);
            $res[$k]['user_comment'] = subtext(urldecode($v['user_comment']),1);
        }
		$page= $res->render();
		$this->assign(array(
			'res'=>$res,
			'page'=>$page
		));
		return view('',['title'=>'评论管理']);
	}
	public function edit()
    {
        $model = new CommentModel();
        $id = input('id');
        $res = $model->where(['id'=>$id])->find();
        $res['img_user_comment'] = isIncludedImg('[图片]',$res['user_comment']);
        $res['user_name'] = urldecode($res['user_name']);
        $replyres = db('reply')->where('mid='.$id)->select();
        foreach ($replyres as $k =>$v){
            $replyres[$k]['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
        }
        $this->assign(array(
            'res'=>$res,
            'replyres' => $replyres
        ));
        return view();
    }
    public function reply($id)
    {
        $res = db('reply')->where('id',$id)->find();
        $this->assign('res',$res);
        return view('comment/replyedit');
    }
    public function replyeditPost()
    {
        $data = $this->request->param();
        $data['content']=urlencode($data['content']);
        $data['create_time']=time();
        $res = DB::name('reply')->update($data);
        if($res){
            return json(['msg'=>'修改回复成功！','status'=>1]);
        }else{
            return json(['msg'=>'修改回复失败！','status'=>0]);
        }
    }
    public function replydel()
    {
        $id = intval(input('id'));
        $res = DB::name('reply')->where('id',$id)->delete();
        if($res){
            return json(['msg'=>'删除回复成功！','status'=>1]);
        }else{
            return json(['msg'=>'删除回复失败！','status'=>0]);
        }
    }
    public function replyPost()
    {
        if($this->request->isPost()){
            $data = [
                'content' => input('content'),
                'create_time' => input('create_time'),
                'mid' => input('mid')
            ];
            $validate = new Validate([
                'content' => 'require'
            ]);
            $validate->message([
                'content.require' =>'评论不能为空！'
            ]);
            $cid = intval(input('cid'));
            $aid = intval(input('aid'));
            $send_email = input('send_email');
            $user_name = input('user_name');
            $user_email = urldecode(input('user_email'));
            $user_comment = urldecode(input('user_comment'));

            if($send_email==1 && !empty($send_email)){
                $title['title'] = DB::name('article')->field('title')->where(['id'=>$aid])->find();
                $str_title = implode('', $title['title']);
                send_email($user_email,$cid,$aid,$str_title,$data['content'],$user_name,$user_comment);
            }
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $data['create_time'] = time();
                $res = DB::name('reply')->insert($data);
                if($res){
                    return json(['msg'=>'回复成功！','status'=>1]);
                }else{
                    return json(['msg'=>'回复失败！','status'=>0]);
                }
            }
        }
    }
    public function delete()
    {
        $id = input('id');
        $res = DB::name('comment')->where(['id'=>$id])->delete();
        if($res){
            //顺带删除我的回复
            db('reply')->where(['mid'=>$id])->delete();
            return json(['msg'=>'删除成功！','status'=>1,'url'=>'index']);
        }else{
            return json(['msg'=>'删除失败！','status'=>0]);
        }
    }

    public function status()
    {
        $id = input('id');
        $status = input('status');
        $db = DB::name('comment');
        if($status == 1){
            //发布
            $db->where('id',$id)->setField('status',1);
            return json(['msg'=>'发布成功！','status'=>1]);
        }elseif($status == 0){
            $db->where('id',$id)->setField('status',0);
            return json(['msg'=>'禁止成功！','status'=>1]);
        }else{
            return json(['msg'=>'发布失败！','status'=>0]);
        }
    }

    public function dels()
    {
        $ids = input('id/a');

        if(empty($ids)){
            $this->error('未选中任何内容！');
        }else{
            $ids = implode(",",$ids);
            CommentModel::destroy($ids);
            $this->success('删除成功！');
        }
    }
}