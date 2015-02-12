<?php

/**
 * 	相册
 */


class PhotoAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Comment' => 'Comment',
		'Article' => 'Article',
		'ContentPraise' => 'ContentPraise'
	);

	//照片详情
	public function photo_verify()
	{
		$id = $this->oUser->id;
		$article_id = $this->_post('photo_id');
		$list = $this->db['Article']->article_info($id,$article_id);
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//照片详情讨论
	public function photo_verify_content()
	{
		$id = $this->oUser->id;
		$article_id = $this->_post('photo_id');
		$p = $this->_post('p');	//第几页
		$index = $this->_post('index');	//多少条
		$list = $this->db['Comment']->select_info($p,$index,$article_id);
	 	parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	//照片投票
	public function photo_vote()
	{
		$id = $this->oUser->id;
		$article_id = $this->_post('photo_id');
		$vote_info = $this->_post('vote_info');	 //1-文明 2-不文明
		$bool = $this->db['Article']->article_vote($id,$article_id,$vote_info);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
	}

	//照片评论
	public function photo_comment()
	{
		$id = $this->oUser->id;
		$article_id = $this->_post('photo_id');
		$comment_content = $this->_post('comment_content');
		$bool = $this->db['Comment']->add_comment($id,$article_id,$comment_content);
        $list = $this->db['Comment']->select_info('','',$article_id);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'',$list) : parent::callback(C('STATUS_DATA_ERROR'),'',$list);
	}

	//照片赞
	public function photo_like()
	{
		$id = $this->oUser->id;
		$article_id = $this->_post('photo_id');
		$bool = $this->db['ContentPraise']->set_like($id,$article_id);
        $list = $this->db['ContentPraise']->getLike('','',$index);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'',$list) : parent::callback(C('STATUS_DATA_ERROR'),'',$list);
	}
}