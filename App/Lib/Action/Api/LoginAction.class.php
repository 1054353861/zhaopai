<?php

/**
 * 用户登录注册模块
 */
class LoginAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名
	
	//初始化数据库连接
	protected  $db = array(
		'Users' => 'Users',
		'Verify'=>'Verify',
	);
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
		
		$this->_init_data();
	}
	
	
	private function _init_data () {
		$this->request['account'] = $_POST['account'];							//用户账号
		$this->request['password'] = $_POST['password'];					//用户密码
		$this->request['password_confirm'] = $_POST['password_confirm'];		//确认密码
	}
	
	
	//登录验证
	public function login () {

		if ($this->isPost()) {
			
			$Users = $this->db['Users'];						//用户模型表
			
			$account = $this->request['account'];				//用户账号
			$password = pass_encryption($this->request['password']);		//用户密码
			
			$this->check_me();									//验证提交数据
			
			//数据库验证用户信息
			$user_info = $Users->get_available_pt_user_info($account);

			if (empty($user_info)) {
				parent::callback(C('STATUS_NOT_DATA'),'此用户不存在，或已被禁用');
			} else {
				if ($password != $user_info['password']) {
					parent::callback(C('STATUS_OTHER'),'密码错误');
				} else {
					
					//生成秘钥
					$encryption = $user_info['id'].':'.$user_info['account'].':'.date('Y-m-d');					//生成解密后的数据
					$identity_encryption = passport_encrypt($encryption,C('UNLOCAKING_KEY'));	//生成加密字符串,给客户端
					
					//更新用户登录信息
					$Users->up_login_info($user_info['id']);
					//查找会员信息

// 					$result = array(
// 						'token'=>$identity_encryption,
// 					);
					
					$result = $user_info;

					//返回给客户端数据
					parent::callback(C('STATUS_SUCCESS'),'登录成功',$result,array('token'=>$identity_encryption));
				}	
			}
		}
	}
	
	
	
	//用户注册	
	public function register () {	

		if ($this->isPost()) {		
			//初始化数据
			//验证提交数据
			$this->check_me();		
			$account = $this->request['account'];										//注册账号	
			$password = $this->request['password'];								//密码
			$password_confirm = $this->request['password_confirm'];		//密码确认
			//密码确认验证
			if ($password != $password_confirm) {
				parent::callback(C('STATUS_OTHER'),'二次密码输入不一致');
			}
			
			//短信验证模块
			parent::check_verify($account,1);			//验证类型1为注册验证
			
			//数据库验证
			$Users = $this->db['Member'];						//用户表模型	
			
			//账号验证、数据写入模块
			$is_have = $Users->account_is_have($account);		//查看账号是否存在
			if ($is_have) {
				parent::callback(C('STATUS_OTHER'),'此账号已存在');
			} else {		//添加注册用户
				$Users->create();
				$id = $Users->add_account(C('ACCOUNT_TYPE.USER'));		//写入数据库
				if ($id) {
					
					//生成秘钥
					$encryption = $id.':'.$account.':'.date('Y-m-d');					//生成解密后的数据
					$identity_encryption = passport_encrypt($encryption,C('UNLOCAKING_KEY'));	//生成加密字符串,给客户端
					
					//返回客户端
					$return_data = array('token' => $identity_encryption);
					parent::callback(C('STATUS_SUCCESS'),'注册成功',$return_data);
				} else {
					parent::callback(C('STATUS_UPDATE_DATA'),'注册失败');
				}	
			}
		} 
			
		//$this->display('Login:register');
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

	

	//验证提交数据
	private function check_me() {
		import("@.Tool.Validate");							//验证类
		//数据验证
		if (Validate::checkNull($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号为空');
		if ($this->request['account'] != 'admin') {
			//if (!Validate::checkPhone($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号必须为11位的手机号码');
		}
		if (Validate::checkNull($this->request['password'])) parent::callback(C('STATUS_OTHER'),'密码为空');		
	}


	//登入
	public function login_bak()
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


}

?>