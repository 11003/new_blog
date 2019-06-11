<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Conf as ConfModel;
class Conf extends Base
{
	//配置项
	public function index()
	{
		$model = new ConfModel();
		if($this->request->isPost()){
            $data = input('post.');
            foreach ($data as $k => $v) {
                DB::name('conf')->update(['id'=>$k,'sort'=>$v]);
            }
            return json(['msg'=>'更新成功！','status'=>1]);
        }
		$res = $model->order('sort desc')->select();
		$this->assign("res",$res);
		return view('',['title'=>'系统&nbsp;&nbsp;/&nbsp;&nbsp;配置项']);
	}
	//配置列表
	public function lists()
	{
		$model = new ConfModel();
		if($this->request->isPost()){
			$data = $this->request->param();
			//复选框逻辑 对比
			$formarr = array();
			foreach ($data as $k => $v) {
				$formarr[]=$k;
			}
			$conf_arr = db('conf')->field('en_name')->select();
			$confarr = array();
			foreach ($conf_arr as $k => $v) {
				$confarr[]=$v['en_name'];
			}
			// dump($confarr);die;
			$checkbox_arr=array();
			foreach ($confarr as $k => $v) {	
				if(!in_array($v,$formarr)){
					$checkbox_arr[]=$v;
				}
			}
			if($checkbox_arr){
                foreach ($checkbox_arr as $k => $v) {
                    ConfModel::where('en_name',$v)->update(['value'=>'']);
                }
            }
			if($data){
				foreach ($data as $k => $v) {
					$model->where('en_name',$k)->update(['value'=>$v]);
				}
				return json(['msg'=>'修改配置成功！','status'=>1]);exit;
			}
		}
		$res = $model->select();
		$this->assign('res',$res);
		return view('',['title'=>'系统&nbsp;&nbsp;/&nbsp;&nbsp;配置列表']);
	}
	//中英文转换
	public function refresh()
	{
		$status = input('status');
	}


	public function edit()
	{
		$id = input('id');
		$res = DB::name('conf')->where(['id'=>$id])->find();
		$this->assign('res',$res);
		return view();
	}
	public function editPost()
    {
        if($this->request->isPost()){
            $data = $this->request->param();
             $validate = validate('Conf');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
	            $data['update_time']=time();
	            $data['values']=str_replace("，", ",", $data['values']);
	            $res = DB::name('conf')->update($data);
	            if($res){
	                return json(['msg'=>'修改成功！','status'=>1]);
	            }else{
	                return json(['msg'=>'修改失败！','status'=>0]);
	            }
            }	

        }
    }
	public function add()
	{
		return view();
	}
	public function addPost()
	{
		if($this->request->isPost())
		{
			$data = $this->request->param();
			 //验证
            $validate = validate('Conf');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $data['create_time']=time();
                $data['values']=str_replace("，", ",", $data['values']);
                $res = DB::name('Conf')->insert($data);
                if($res){
                    return json(['msg'=>'添加成功！','status'=>1]);
                }else{
                    return json(['msg'=>'添加失败！','status'=>0]);
                }
            }
		}
	}
	public function delete()
	{
		$id = input('id');
		$res = DB::name('conf')->where(['id'=>$id])->delete();
        if($res){
            return json(['msg'=>'删除成功！','status'=>1,'url'=>'index']);
        }else{
            return json(['msg'=>'删除失败！','status'=>0]);
        }
	}


    /**
     * 图标库
     */
	public function awesome()
    {
        return view('',['title' => 'FontAwesome Icons']);
    }
}