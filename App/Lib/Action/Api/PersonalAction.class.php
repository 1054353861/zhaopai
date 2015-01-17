<?php

/**
 * 	个人中心
 */


class PersonalAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'IntegralAll' => 'IntegralAll',
		'Users' => 'Users'
	);

	
	//个人中心-他人
	public function personal_other()
	{

	}

	//个人中心-自己
	public function personal_owner()
	{

	}

	//个人中心-话题
	public function personal_news()
	{

	}

	//个人中心-积分
	public function personal_score()
	{
		$id = $this->oUser->id;
		$list['store'] = $this->db['Users']->where(array('id'=>$id))->getField('integral');
		$list['task_list'] = $this->db['IntegralAll']->getInfo($id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//个人中心-头像
	public function personal_edit_head()
	{

	}

	//个人中心-昵称
	public function personal_edit_nickname()
	{
		$id = $this->oUser->id;
		$user['nickname'] = $this->_post('nickName');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//个人中心-性别
	public function personal_edit_sex()
	{
		$id = $this->oUser->id;
		$user['sex'] = $this->_post('user_sex');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//个人中心-城市
	public function personal_edit_city()
	{
		$id = $this->oUser->id;
		$city['city_id'] = $this->_post('city');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($city);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}
}