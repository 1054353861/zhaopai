<?php

/**
 * 	商城
 */


class MarkeAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('marke_list');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Shop' => 'Shop',
		'ShopPhoto' => 'ShopPhoto',
		'Exchange' => 'Exchange',
		'Users' => 'Users'
	);

	//积分商城
	public function marke_list()
	{
		$list = $this->db['Shop']->getInfoALL();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//商品详情
	public function marke_detail()
	{
		$user_id = $this->oUser->id;	//用户ID
		$shop_id = $this->_post('shop_id');
        
		$list = $this->db['Shop']->where(array('id'=>$shop_id))->find();

		$image_list = $this->db['ShopPhoto']->where(array('shop_id'=>$shop_id))->field('shop_url')->select();

		parent::public_file_dir($image_list,array('shop_url'));
		
		foreach($image_list as $key=>$value)
		{
			$list['image_list'][] = $value['shop_url'];
		}

		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//商品兑换
	public function market_get()
	{
		$user_id = $this->oUser->id;	//用户ID
		$shop_id = $this->_post('shop_id');	//商品ID
		$name = $this->_post('name');	//姓名
		$cellphone = $this->_post('cellphone');	//手机号
		$address = $this->_post('address');
		$shop_integral = $this->db['Shop']->where(array('id'=>$shop_id))->getField('shop_integral');
		$Users = $this->db['Users'];
		$integral = $Users->where(array('id'=>$user_id))->getField('integral');
		$low_score = $integral - $shop_integral;
		if($low_score >= 0)
		{
			$save = array('integral'=>$low_score);
			$Users->where(array('id'=>$user_id))->save($save);
			$arr = array(
				'user_id' => $user_id,
				'shop_id' => $shop_id,
				'shop_integral' => $shop_integral,
				'name' => $name,
				'phone' => $cellphone,
				'area' => $address,
				'create_time' => time()
			);
			$bool = $this->db['Exchange']->add($arr);
			$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'',''); 
		}else{
			parent::callback(C('STATUS_DATA_ERROR'),'','');
		}
	}

	
}