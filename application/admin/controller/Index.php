<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Request;
use app\common\controller\Cav;

class Index extends Cav{

	public function index()
	{
		
	}

	public function adduser()
	{
		$postdata = input('post.');
		if (!empty($postdata)) {
			Db::startTrans();
			try{

				$data['username'] = $postdata['name'];
				$data['password'] = $postdata['password'];
				$id = Db::name('user')->insertGetid($data);
 				$data1['uid'] = $id;
 				$data1['group_id'] = $postdata['group'];
 				Db::name('auth_group_access')->insert($data1);
 				Db::commit();
 				echo '添加成功!';
			}catch(\Exception $e){

				Db::rollback();

			}
		}
		$group = Db::name('auth_group')->select();
		$this->assign('group',$group);
		return $this->fetch();

	}

	public function addgroup()
	{
		$arr = input('post.');
		if (!empty($arr)) {
			$data['title'] = $arr['name'];
			$data['status'] = $arr['status'];
			$res = Db::name('auth_group')->insert($data);
			if ($res) {
				echo '添加成功';
			}
		}
		return $this->fetch();
	}

}