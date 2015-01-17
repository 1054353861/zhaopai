<?php

/**
 * 	上传
 */


class UploadphotoAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('upload_tags','upload_tag_search','upload_tags_random');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Label' => 'Label'
	);

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