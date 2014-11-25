<?php 
/**
* 第三方登录
*/
class LoginAction extends EmptyAction
{
	// 登录界面
	public function index()
	{
		$this->display();
	}

	//登录地址
	public function login($type = null){
		empty($type) && $this->error('参数错误');

		//加载ThinkOauth类并实例化一个对象
		import("@.Common.ThinkSDK.ThinkOauth");
		$sns  = ThinkOauth::getInstance($type);

		//跳转到授权页面
		redirect($sns->getRequestCodeURL());
	}

	public function login2()
	{
		if (IS_POST) {
			empty($_POST['username']) && $this->error('用户名不能为空');
			empty($_POST['password']) && $this->error('密码不能为空');

			$User = D("User"); // 实例化User对象
			$where['user_name'] = $_POST['username'];
			$where['password'] = $_POST['password'];
			$UserInfo = $User->where($where)->find();
			if ($UserInfo) {
				session('uid',$UserInfo['id']);
				session('UserInfo',$UserInfo);
				$this->success('登录成功',U('/'));
			}else {
				$this->error('账号密码错误');
			}
		}
	}

	public function logout()
	{
		session('uid',null);
		session('UserInfo',null);
		$this->success('登出成功');
	}

	// 注册地址
	public function register()
	{
		$User = D("User"); // 实例化User对象
		if (IS_POST) {
			if ($_POST['password'] != $_POST['repassword']) {
				$this->error('两次密码输入不一致');
			}
			$_POST['is_effect'] = 1;
			if (!$User->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($User->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $User->addUser();
				if ($re !== false) {
					$this->success('注册成功！');
				} else {
					$this->error($User->getError());
				}
			}
		}else {
			$cate_name = "用户注册";
			$this->assign('cate_name',$cate_name);
			$this->display();
		}
	}

	//授权回调地址
	public function callback($type = null, $code = null){
		(empty($type) || empty($code)) && $this->error('参数错误');
		
		//加载ThinkOauth类并实例化一个对象
		import("@.Common.ThinkSDK.ThinkOauth");
		$sns  = ThinkOauth::getInstance($type);

		//腾讯微博需传递的额外参数
		$extend = null;
		if($type == 'tencent'){
			$extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
		}

		//请妥善保管这里获取到的Token信息，方便以后API调用
		//调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
		//如： $qq = ThinkOauth::getInstance('qq', $token);
		$token = $sns->getAccessToken($code , $extend);

		//获取当前登录用户信息
		if(is_array($token)){
			$user_info = A('Type', 'Event')->$type($token);

			$User = D('User');
			$data['user_name'] = $user_info['nick'];
			$data['password'] = 123456;
			$data['face'] = $user_info['head'];
			$re = $User->add($data);
			session('uid',$re);
			session('UserInfo',$data);
			$this->success('登录成功',U('/'));
		}
	}
}
 ?>