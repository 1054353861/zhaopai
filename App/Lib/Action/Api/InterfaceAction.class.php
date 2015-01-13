<?php

/**
 * 	用户接口
 */


class InterfaceAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名
	
	//解密的token
	private $token_arr = '';

	//初始化数据库连接
	protected  $db = array(
		'Users' => 'Users'
	);

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法

		$token = $this->_post('token');
		if($token!='')
		{
			//获得TOKEN
			$this->token_arr = explode(':',passport_decrypt($token,C('UNLOCAKING_KEY')));
		}
	}

	//登入
	public function login()
	{
		$cell_phone = $this->_post('cell_phone');
		$password = $this->_post('password');
		if($cell_phone!='' && $password!='')
		{
			$user_val = $this->db['Users']->where(array('phone'=>$cell_phone))->find();
			if($user_val!='')
			{
				if($user_val['password']==pass_encryption($password))
				{
					//生成秘钥
					$encryption = $user_val['id'].':'.$user_val['account'].':'.date('Y-m-d');
					//返回数据
					parent::callback(C('STATUS_SUCCESS'),'登录成功',$user_val,array('token'=>passport_encrypt($encryption,C('UNLOCAKING_KEY'))));
				}else{
					parent::callback(C('STATUS_DATA_ERROR'),'密码错误');
				}
			}else{
				parent::callback(C('STATUS_NOT_DATA'),'手机号不存在');
			}
		}
	}

	//注册手机号验证
	public function regeister_cell_veritify()
	{
		$cell_phone = $this->_post('cell_phone');
		$user_val = $this->db['Users']->where(array('phone'=>$cell_phone))->find();
		if($user_val!='')
		{
			parent::callback(C('STATUS_HAVE_DATA'),'手机号已被注册');
		}else{
			parent::callback(C('STATUS_SUCCESS'),'手机号未被注册');
		}
	}

	//首页
	public function home_data()
	{
		$city = $this->_post('city');
		$type = $this->_post('type');
		$index = $this->_post('index');
		$page_count = $this->_post('page_count');
		if($index!=''&&$page_count!='')
		{
			switch($type)
			{
				//最新
				case 1:
					
				break;
				//最近
				case 2:

				break;
			}
		}
		
	}
}