<?php

/**
 * 	好友
 */


class FriendAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'UserFriends' => 'UserFriends',
		'Users' => 'Users'
	);

	//申请好友
	public function friend_add()
	{
		$id = $this->oUser->id;
		$new_friend = $this->_post('friend_id');
		$bool = $this->db['UserFriends']->add_friends($new_friend,$id);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'申请成功','') : parent::callback(C('STATUS_DATA_ERROR'),'申请失败','');
	}

	//拍友
	public function friend_list()
	{
		$id = $this->oUser->id;
		$list = $this->db['UserFriends']->friends_list($id,1);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//拍友-新的拍友
	public function friend_new_list()
	{
		$id = $this->oUser->id;
		$list = $this->db['UserFriends']->friends_list($id,0);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//拍友-同意申请
	public function friend_agree()
	{
		$id = $this->oUser->id;
		$user_ids = $this->_post('friend_id');
		$bool = $this->db['UserFriends']->agree_friends($user_ids,$id);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'好友申请成功','') : parent::callback(C('STATUS_DATA_ERROR'),'好友申请失败','');
	}

	//拍友-搜索
	public function friend_search()
	{
		$id = $this->oUser->id;
		$user_name = $this->_post('user_name');
		$list = $this->db['Users']->selectFriend($user_name,$id);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}
}