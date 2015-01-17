<?php

/**
 * 	搜索
 */


class SearchAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('search_friends','search_friends_random');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Users' => 'Users'
	);

	//搜索-拍友
	public function search_friends()
	{
		$user_name = $this->_post('user_name');
		$where['nickname'] = array('like',$user_name.'%');
		$list = $this->db['Users']->where($where)->field('id,nickname,head_img,city_id')->select();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//搜索-标签-随机
	public function search_tag_random()
	{

	}

	//搜索-标签
	public function search_tag()
	{

	}

	//搜索-拍友-随机
	public function search_friends_random()
	{
		$user = $this->db['Users']->order('rand()')->field('id,nickname,head_img,city_id')->limit(10)->select();
		parent::callback(C('STATUS_SUCCESS'),'',$user);
	}
	
}