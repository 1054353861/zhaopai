<?php

/**
 * 	上传
 */


class LikesAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'ContentPraise' => 'ContentPraise'
	);

	//赞的列表
	public function like_list()
	{
		$id = $this->oUser->id;
		$like_id = $this->_post('like_id');
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['ContentPraise']->getLike($like_id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}
	
}