<?php

/**
 * 	首页
 */


class HomeAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Article' => 'Article'
	);

	//首页
	public function home_data()
	{
		$city = $this->_post('city');
		$type = $this->_post('type');
		$index = $this->_post('index');
		$lng = $this->_post('lng');	//精度
		$lat = $this->_post('lat');	//纬度
		$page_count = $this->_post('page_count');
		$list = $this->db['Article']->article_index($city,$type,$index,$page_count,$lng,$lat);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	
}