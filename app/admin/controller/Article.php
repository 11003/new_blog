<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Article as ArticleModel;
use app\admin\server\GetChildrenId;
use app\admin\server\UnlimitTree;
class Article extends Base
{
    private $db;
    public function __construct()
    {
        parent::__construct();
        $this->db = DB::name('article');
    }

    public function index()
    {   
        $model = new ArticleModel();
        if(input('key')){
            $key=$model->keyselect(input('key'));
            return json(['status'=>1,'msg'=>$key]);
        }
        $res = $model->selects();
        foreach($res as $k=>$v){
            $res[$k]['unlimit_desc'] = $v['desc'];
            $res[$k]['desc'] = subtext($v['desc'],50);
        }
        $this->assign('res',$res);
        return view('',['title'=>'文章']);
    }
    public function add()
    {
        $pid = (new UnlimitTree())->catetree('cate');
        $this->assign('pid',$pid);
        return view();
    }
    public function addPost()
    {
        if($this->request->isPost()){
            $art = new ArticleModel();
            $data = $this->request->param();
            $validate = validate('Article');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $data['create_time']=time();
                // $data['content']=urlencode(strip_tags($data['content']));//清除HTML格式
//                $data['content']=urlencode($data['content']);//编码格式
                $data['keywords']=str_replace("，", ",", $data['keywords']);
                $res = $art->save($data);
                if($res){
                    return json(['msg'=>'添加成功！','status'=>1]);
                }else{
                    return json(['msg'=>'添加失败！','status'=>0]);
                }
            }
        }
    }
    public function edit()
    {
        $pid = (new UnlimitTree())->catetree('cate');
        $id = input('id');
        $res = $this->db->where('id',$id)->find();
        $this->assign(array(
            'res'=>$res,
            'pid'=>$pid
        ));
        return view();
    }
    public function editPost()
    {
        if($this->request->isPost()){
            $art = new ArticleModel();
            $data = $this->request->param();
            $validate = validate('Article');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $data['keywords']=str_replace('，',',',$data['keywords']);
                $data['update_time']=time();
//                $data['content']=urlencode($data['content']);//编码格式
                $res = $art->update($data);
                if($res){
                    return json(['msg'=>'修改成功！','status'=>1]);
                }else{
                    return json(['msg'=>'修改失败！','status'=>0]);
                }
            }
        }
    }
    public function delete()
    {
        $id = input('id');
        $art = new ArticleModel();
        $res = $art->destroy($id);
        if($res){
            return json(['msg'=>'删除成功！','status'=>1,'url'=>'index']);
        }else{
            return json(['msg'=>'删除失败！','status'=>0]);
        }
    }
    public function dels()
    {
        $ids = input('post.id/a');
        if(empty($ids)){
            $this->error('未选中任何内容！');
        }
        if($ids){
            $res = ArticleModel::destroy($ids);
            if($res){
                $this->success('删除成功！');
            }else{
                $this->error('删除失败！');
            }
        }
    }
    public function status()
    {
        $id = input('id');
        $rec = input('rec');

        $title = $this->getArticleInfoByid($id)['title'];
        if($rec == 1){
            //发布
            $this->db->where('id',$id)->setField(['rec'=>1,'rec_time'=>time()]);
            return json(['msg'=>$title.' 推荐成功！','status'=>1]);
        }elseif($rec == 0){
            $this->db->where('id',$id)->setField('rec',0);
            return json(['msg'=> $title.' 取消推荐！','status'=>1]);
        }else{
            return json(['msg'=>$title.' 推荐失败！','status'=>0]);
        }
    }

    private function getArticleInfoByid($id)
    {
        return db('article')->where(['id'=>$id])->find();
    }
}
