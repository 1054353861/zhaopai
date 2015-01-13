<?php

/**
 * 	用户接口
 */


class InterfaceAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名
	
	//解密的token
	private $token = '';

	public function __construct()
	{
		$token = $this->_post('token');
		if($token!='')
		{
			$this->token = passport_decrypt($token,C('UNLOCAKING_KEY'));
		}
	}

	//登入
	public function login()
	{
		$cell_phone = $this->_post('cell_phone');
		$password = $this->_post('password');
		parent::callback(C('STATUS_SUCCESS'),'登录成功',$result,array('token'=>$this->token));
	}


}