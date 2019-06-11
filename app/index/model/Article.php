<?php
/**
 * User: Lh
 * Date: 2019/6/9 15:32
 */

namespace app\index\model;
use think\Model;

class Article extends Model
{
    protected $name = "Article";
    //所有文章
    public function getAllArticles($cid)
    {
        $cate=new Cate();
        $allCateId=$cate->getchildrenid($cid);
        $artRes=db('article')->where("cid IN($allCateId)")->order('sort desc')->paginate(5);
        cache('artRes',$artRes);
        // $artRes=db('article')->whereIn('cid',$allCateId)->order('sort desc')->paginate(6);
        return cache('artRes');
    }
    //文章总数
    public function getAllCount($cid)
    {
        $artCount = db('article')->where('cid',$cid)->count();
        return $artCount;
    }
    //热门文章无条件
    public function HotRes()
    {
        $res = db('article')->limit(5)->order('click desc')->select();
        return $res;
    }
    //热门文章有条件
    public function HotRes_y($cid)
    {
        $cate=new Cate();
        $allCateId=$cate->getchildrenid($cid);
        //连接评论
        $res = db('article')->whereIn('cid',$allCateId)->limit(5)->order('click desc')->select();
        return $res;
    }
}