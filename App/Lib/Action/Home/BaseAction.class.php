<?php 
/**
* 基础控制器，需要登录
*/
class BaseAction extends GetinfoAction
{
	public function _initialize()
	{
		if (!$this->isLogin()) {
			
		}else {
			//往下执行
		}
	}

	// 是否登录
	private function isLogin()
	{
		return ;
	}
}
 ?>