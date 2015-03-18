<?php

/**
 * 	上传
 */


class UploadphotoAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('upload_tags','upload_tag_search','upload_tags_random','upload_afile');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Label' => 'Label',
		'Article' => 'Article',
		'LabelArticle' => 'LabelArticle'
	);

	//上传图片-热门标签
	public function upload_tags()
	{
		$list = $this->db['Label']->where('is_hot = 1')->limit(9)->select();
		$sort_arr = array();
		foreach($list as $key=>$value)
		{
			$list[$key]['strlen'] = mb_strlen($value['label_name']);
			$sort_arr[] = mb_strlen($value['label_name']);
		}

		$array_unique = array_values(array_unique($sort_arr));
		rsort($array_unique);

		$new_list = array();

		foreach($array_unique as $value)
		{
			foreach($list as $val)
			{
				if($value==$val['strlen'])
				{
					$new_list[] = $val;
				}
			}
		}

		parent::callback(C('STATUS_SUCCESS'),'获取成功',$new_list);
	}

	//上传图片-标签搜索
	public function upload_tag_search()
	{
		$tag_name = $this->_post('tag_name');
		$where['label_name'] = array('like',$tag_name.'%');
		$list = $this->db['Label']->where($where)->select();
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//上传图片
	public function upload_photo()
	{
		$arr['user_id'] = $this->oUser->id;
		$arr['content'] = $this->_post('content');
		$arr['longitude'] = $this->_post('longitude');
		$arr['latitude'] = $this->_post('latitude');
		$arr['city_id'] = $this->_post('city_id');
		$tags = explode(':',$this->_post('tags'));

        //上传图片
		if($_FILES['img']!='')
		{
			$file_list = parent::upload_file($_FILES['img']);
			$file_list['status']==true ? $arr['article_img'] = $file_list['info'][0]['savename'] : parent::callback(C('STATUS_DATA_ERROR'),'','照片参数有误');
		}else{
			$this->_post('article_img')!='' ? $arr['article_img'] = $this->_post('article_img') : parent::callback(C('STATUS_DATA_ERROR'),'','请上传照片');
		}

		$arr['create_time'] = time();
		$bool = $this->db['Article']->upload_article($arr,$tags);
        //触发完成发表文章事件
        if($bool)
            parent::end_integral_all_info($arr['user_id'],3);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'发表文章成功','') : parent::callback(C('STATUS_DATA_ERROR'),'发表文章失败','');
	}

	//上传文件
	public function upload_afile()
	{
        if($_FILES['img']!='')
        {
            $file_list = parent::upload_file($_FILES['img']);
            if($file_list['status']==true)
            {
                parent::callback(C('STATUS_SUCCESS'),'',$file_list['info'][0]['savename']);
            }else{
                parent::callback(C('STATUS_DATA_ERROR'),'图片格式不正确','');
            }
        }

	}

	//上传图片-标签-随机
	public function upload_tags_random()
	{
		$list = $this->db['Label']->order('rand()')->limit(10)->select();
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//上传标签
    public function upload_tags_name()
    {
        $id = $this->oUser->id;
        $name = $this->_post('name');
        $list = $this->db['Label']->get_tagnames($name);
        parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
    }
}