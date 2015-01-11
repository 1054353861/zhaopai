<?php

/**
 * 测试
 */
class DemoAction extends ApiBaseAction {
	
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//登陆后无需登录验证方法
	
	//和构造方法
	public function __construct() {
		parent::__construct();
	
	}
	
	//初始化数据库连接
	protected  $db = array(
		
	);
	
	public function index() {
		print_r($this->oUser);
	}
	
	
	
}

?>