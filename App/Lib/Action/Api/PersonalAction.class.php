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
		'Users' => 'Users',
		'Article' => 'Article'
	);

	
	//个人中心-他人
	public function personal_other()
	{
		$id = $this->oUser->id;
		$friend_id = $this->_post('user_id');
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$friend_id,true,$id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//个人中心-自己
	public function personal_owner()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$id,false);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//个人中心-话题
	public function personal_news()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$id,false);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
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
		$id = $this->oUser->id;
		$path = C('UPLOAD_DIR');
		$dir = $path['web_dir'].$path['image'];
		$file_list = parent::upload_file($_FILES['data'],$dir);
		if($file_list['status']==true)
		{
			$url = array('head_img'=>$file_list['info'][0]['savename']);
			$bool = $this->db['Users']->where(array('id'=>$id))->save($url);
			$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
		}else{
			parent::callback(C('STATUS_DATA_ERROR'),'','');
		}

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
		$city['city_id'] = $this->_post('city_id');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($city);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}
}