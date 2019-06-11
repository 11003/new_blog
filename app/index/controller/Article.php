<?php
/**
 * User: Lh
 * Date: 2019/6/9 13:10
 */

namespace app\index\controller;

use app\index\model\Article as ArticleModel;

class Article extends Base
{
    public function index()
    {
        $artres = $this->ArticleList();//文章列表
        cache('artres', $artres);
        return $this->fetch("article", [
            'title' => '博客',
            'artres' => cache('artres'),
        ]);
    }

    public function ArticleList()
    {

        $art = new ArticleModel();
        $join = [
            ['__CATE__ c', 'c.id=a.cid', 'LEFT']
        ];
        $field = "a.id,a.title,a.content,a.desc,a.pic,a.rec,a.is_origin,a.rec_time,a.click,a.look,a.create_time,a.cid,c.catename";
        $artres = $art->alias('a')->field($field)->join($join)->order('rec desc,rec_time desc,create_time desc')->paginate(10);
        $arr = array();
        foreach ($artres as $k => $v) {
            $v['content'] = $this->cutstr_html(urldecode($v['content']), 200);
            $arr[] = $v;
        }
        //把缓存的结果存在redis里面去
        return $artres;
    }
}