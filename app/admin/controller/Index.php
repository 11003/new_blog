<?php
namespace app\admin\controller;
use think\Cache;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
class Index extends Base
{
    public function index()
    {
        return view('',['title'=>'博客后台']);
    }
    /**
     * 清除缓存
     */
    public function clear() {
        if (delete_dir_file(CACHE_PATH) || delete_dir_file(TEMP_PATH)) {
            $this->success('清除缓存成功');
        } else {
            $this->error('清除缓存失败');
        }
    }

}
