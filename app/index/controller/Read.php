<?php
/**
 * User: Lh
 * Date: 2019/6/9 13:23
 */

namespace app\index\controller;


use think\Db;

class Read extends Base
{
    private $db;
    public function __construct()
    {
        parent::__construct();
        $this->db = DB::name('Article');
    }

    public function index()
    {
        $id = input('id');
        $cid = input('cid');
        $res = $this->find($id); //文章详细
        $this->commentIndex($cid,$id);//评论列表
        $this->PervAndNext($cid,$id);//上一篇和下一篇
        $this->rec();//推荐的文章
        cache('res',$res);
        return $this->fetch("read",[
            'title' => $res['title'],
            'res' => cache('res')
        ]);
    }
    private function find($id)
    {
        $res = $this->db->where(['id'=>$id])->find();
        if($res == ''){
            abort(404,'页面不存在');
        }
        return $res;
    }
    private function rec()
    {
        $DB = $this->db;
        $lists = $DB->where('rec',1)->order(['click'=>'DESC','rec_time'=>'DESC'])->limit(10)->select();
        cache('lists',$lists);
        $this->assign('rec',cache('lists'));
    }
    //评论列表
    private function commentIndex($cid,$id)
    {
        // 此条评论因作者被系统屏蔽而不显示
        $res = DB::name('comment')->where(['aid'=>$id,'cid'=>$cid])->order('create_time desc')->select();
        foreach ($res as $k=>$v){
            if($v['status'] != 1){
                $res[$k]['user_comment'] = '<span style="color:#666 !important;display: block;">此条评论因被作者屏蔽而不显示</span>';
            }
        }
        $reply = DB::name('reply')->alias('r')->join('comment c','c.id=r.mid')->select();
        cache('comment',$res);
        cache('reply',$reply);
        $this->assign('comment',cache('comment'));
        $this->assign('reply',cache('reply'));
    }
    // 翻页
    private function PervAndNext($cid,$id)
    {
        $DB = $this->db;
        // 上一篇
        $prev = $DB->where('id','<',$id)->where('cid',$cid)->order('id DESC')->limit(1)->value('id');
        $prev_title = $DB->where('id','<',$id)->where('cid',$cid)->order('id DESC')->limit(1)->value('title');
        // 下一篇
        $next = $DB->where('id','>',$id)->where('cid',$cid)->order('id ASC')->limit(1)->value('id');
        $next_title = $DB->where('id','>',$id)->where('cid',$cid)->order('id ASC')->limit(1)->value('title');
        $this->assign(array(
            'prev' => $prev,
            'next' => $next,
            'prev_title' => $prev_title,
            'next_title' => $next_title
        ));
    }
}