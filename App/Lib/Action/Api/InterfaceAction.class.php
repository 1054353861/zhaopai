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
		'Users' => 'Users',
		'Label' => 'Label',
		'Shop'	=>	'Shop',
		'Exchange' => 'Exchange',
		'ShopPhoto' => 'ShopPhoto',
		'IntegralAll' => 'IntegralAll',
		'UserFriends' => 'UserFriends',
		'Comment' => 'Comment',
		'Article' => 'Article',
		'ContentPraise' => 'ContentPraise',
		'Attention' => 'Attention',
		'Collection' => 'Collection'
	);

	//http://localhost/zhaopai/index.php/Api/Login/login
	//XzBWPlXhDZhXtgCxVJ0GowXkV9Vc/VQ+AjEAMFJjVTVYKQdlCGsKLlQ1BmU=

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
		$list = $this->db['Article']->article_index($city,$type,$index,$page_count);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//照片详情
	public function photo_verify()
	{
		$id = $this->token_arr[0];
		$article_id = $this->_post('photo_id');
		$list = $this->db['Article']->article_info($id,$article_id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//照片详情讨论
	public function photo_verify_content()
	{
		$id = $this->token_arr[0];
		$article_id = $this->_post('photo_id');
		$p = $this->_post('p');	//第几页
		$index = $this->_post('index');	//多少条
		$list = $this->db['Comment']->select_info($p,$index,$article_id);
	 	parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//照片投票
	public function photo_vote()
	{
		$id = $this->token_arr[0];
		$article_id = $this->_post('photo_id');
		$vote_info = $this->_post('vote_info');	 //1-文明 2-不文明
		$bool = $this->db['Article']->article_vote($id,$article_id,$vote_info);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//照片评论
	public function photo_comment()
	{
		$id = $this->token_arr[0];
		$article_id = $this->_post('photo_id');
		$comment_content = $this->_post('comment_content');
		$bool = $this->db['Comment']->add_comment($id,$article_id,$comment_content);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//赞的列表
	public function like_list()
	{
		$id = $this->token_arr[0];
		$like_id = $this->_post('like_id');
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['ContentPraise']->getLike($like_id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//申请好友
	public function friend_add()
	{
		$id = $this->token_arr[0];
		$new_friend = $this->_post('user_id');
		$bool = $this->db['UserFriends']->add_friends($new_friend,$id);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//动态-动态
	public function news_active()
	{
		$id = $this->token_arr[0];
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Attention']->getNewsList($id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//动态收藏
	public function news_save()
	{
		$id = $this->token_arr[0];
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Collection']->getCollList($id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//动态推荐
	public function news_hot()
	{
		$list = $this->db['Article']->getRemmend();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//拍友
	public function friend_list()
	{
		$id = $this->token_arr[0];
		$list = $this->db['UserFriends']->friends_list($id,1);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//拍友-新的拍友
	public function friend_new_list()
	{
		$id = $this->token_arr[0];
		$list = $this->db['UserFriends']->friends_list($id,0);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//拍友-同意申请
	public function friend_agree()
	{
		$id = $this->token_arr[0];
		$user_ids = $this->_post('user_ids');
		$bool = $this->db['UserFriends']->agree_friends($user_ids,$id);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//拍友-搜索
	public function friend_search()
	{
		$id = $this->token_arr[0];
		$user_name = $this->_post('user_name');
		$list = $this->db['Users']->selectFriend($user_name,$id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

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
		$id = $this->token_arr[0];
		$list['store'] = $this->db['Users']->where(array('id'=>$id))->getField('integral');
		$list['task_list'] = $this->db['IntegralAll']->getInfo($id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//积分商城
	public function marke_list()
	{
		$list = $this->db['Shop']->getInfoALL();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//商品详情
	public function marke_detail()
	{
		$user_id = $this->token_arr[0];	//用户ID
		$shop_id = $this->_post('id');
		$list = $this->db['Shop']->where(array('id'=>$shop_id))
		->field('shop_name,shop_content,shop_number,shop_integral')->find();
		$list['image_list'] = $this->db['ShopPhoto']->where(array('shop_id'=>$shop_id))->getField('shop_url',0);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//商品兑换
	public function market_get()
	{
		$user_id = $this->token_arr[0];	//用户ID
		$shop_id = $this->_post('id');	//商品ID
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

	//个人中心-头像
	public function personal_edit_head()
	{

	}

	//个人中心-昵称
	public function personal_edit_nickname()
	{
		$id = $this->token_arr[0];
		$user['nickname'] = $this->_post('nickName');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//个人中心-性别
	public function personal_edit_sex()
	{
		$id = $this->token_arr[0];
		$user['sex'] = $this->_post('user_sex');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//个人中心-城市
	public function personal_edit_city()
	{
		$id = $this->token_arr[0];
		$city['city_id'] = $this->_post('city');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($city);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

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

	//上传图片-热门标签
	public function upload_tags()
	{
		$list = $this->db['Label']->where('is_hot = 1')->select();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//上传图片-标签搜索
	public function upload_tag_search()
	{
		$tag_name = $this->_post('tag_name');
		$where['label_name'] = array('like',$tag_name.'%');
		$list = $this->db['Label']->where($where)->select();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//上传图片
	public function upload_photo()
	{

	}

	//上传图片-标签-随机
	public function upload_tags_random()
	{
		$list = $this->db['Label']->order('rand()')->limit(10)->select();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}
}