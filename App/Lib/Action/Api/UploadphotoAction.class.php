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

		parent::callback(C('STATUS_SUCCESS'),'',$new_list);
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
		$arr['user_id'] = $this->oUser->id;
		$arr['content'] = $this->_post('content');
		$arr['longitude'] = $this->_post('longitude');
		$arr['latitude'] = $this->_post('latitude');
		$arr['city_id'] = $this->_post('city_id');
		$tags = json_decode($this->_post('tags'));
		if($_FILES['img']!='')
		{
			$file_list = parent::upload_file($_FILES['img']);
			if($file_list['status']==true)
			{
				// $file_url = $file_list['info'][0]['savename'];
				// if(pathinfo($file_url)['extension']=='mp4')
				// {
				// 	//开始处理
				// 	//检测有没有加载插件
				// 	if(extension_loaded('ffmpeg'))
				// 	{
				// 		$y_url = $dir.$file_url;
				// 		$z_url = pathinfo($y_url);
				// 		$n_url = $z_url['dirname'].'\\'.$z_url['filename'].'.gif';
				// 		$ffm_url = 'D:\wamp\bin\ffmpeg.exe';
				// 		if(file_exists($ffm_url))
				// 		{
				// 			$exc = $ffm_url.' '.$y_url.' '.$n_url;
				// 			exec($exc);
				// 		}
				// 		$arr['article_img'] = $path['image'].$z_url['filename'].'.gif';
				// 	}
				// }else{
				$arr['article_img'] = $file_list['info'][0]['savename'];
				//}
				//处理结束
				$arr['create_time'] = time();
				$bool = $this->db['Article']->upload_article($arr,$tags);
				$bool ? parent::callback(C('STATUS_SUCCESS'),'','') : parent::callback(C('STATUS_DATA_ERROR'),'','');
			}else{
				parent::callback(C('STATUS_DATA_ERROR'),'','');
			}
		}else{
			parent::callback(C('STATUS_DATA_ERROR'),'',$arr['user_id']);
		}
	}

	//上传图片-标签-随机
	public function upload_tags_random()
	{
		$list = $this->db['Label']->order('rand()')->limit(10)->select();
		parent::callback(C('STATUS_SUCCESS'),'',$list);
	}

	
}