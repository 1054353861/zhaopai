<?php

/**
 * 	动态
 */


class NewsAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('news_hot');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Attention' => 'Attention',
		'Collection' => 'Collection',
		'Article' => 'Article'
	);

	//动态-动态
	public function news_active()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Attention']->getNewsList($id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//动态收藏
	public function news_save()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Collection']->getCollList($id,$p,$index);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//动态推荐
	public function news_hot()
	{
		$list = $this->db['Article']->getRemmend();
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}
}