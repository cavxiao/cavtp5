<?php
namespace app\common\controller;


use think\Auth;
use think\Db;
use think\Controller;
use think\Request;

class Cav extends Controller{

	public function _initialize()
	{
		$uid = session('uid');

		$controller = request()->controller();
		$action = request()->action();
		$module = request()->module();
		$auth = new Auth();
		dump($module.'/'.$controller.'/'.$action);
		dump($auth);
	}

}