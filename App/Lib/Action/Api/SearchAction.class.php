<?php

/**
 * 	搜索
 */


class SearchAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Users' => 'Users',
		'Label' => 'Label'
	);

	//搜索-拍友
	public function search_friends()
	{
		$where['u.id'] = array('neq',$this->oUser->id);
		$user_name = $this->_post('user_name');
		$where['u.nickname'] = array('like',$user_name.'%');
		$list = $this->db['Users']->where($where)->table('app_users as u')
		->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
		->field('u.id,u.nickname,u.head_img,c.title')->select();

		parent::public_file_dir($list,array('head_img'));

		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//搜索-标签-随机
	public function search_tag_random()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Label']->getLabelInfo($user_name,$p,$index,false);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//搜索-标签
	public function search_tag()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$label_name = $this->_post('label_name');
		$list = $this->db['Label']->getLabelInfo($label_name,$p,$index,true);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//搜索-拍友-随机
	public function search_friends_random()
	{
		$user = $this->db['Users']->where(array('id'=>array('neq',$this->oUser->id)))->order('rand()')
		->field('id,nickname,head_img,city_id')->limit(10)->select();

		parent::public_file_dir($user,array('head_img'));

		parent::callback(C('STATUS_SUCCESS'),'',$user);
	}
	
}