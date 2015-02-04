<?php
	/*
	*	标签
	*
	*
	*
	*/

	class LabelModel extends ApiBaseModel
	{

		//获取标签相关的文章
		public function getLabelInfo($user_name,$p,$index,$type=false)
		{
			$first = $p == '' ? 0 : $p;
			$offset = $index == '' ? 6 : $index;
			if($type==true)
			{
				$where['label_name'] = array('like',$user_name.'%');
				$label_list = $this->where($where)->getField('id',0);
			}else{
				$tag_list = $this->order('rand()')->limit(1)->field('id')->find();
				$label_list[] = $tag_list['id'];
			}

			$lab_li = D('LabelArticle')->where(array('label_id'=>array('IN',$label_list)))
			->field('distinct article_id')->select();

			$new_list = array();

			foreach($lab_li as $value)
			{
				$new_list[] = $value['article_id'];
			}

			$arr_list = array();

			$list = D('Article')->where(array('id'=>array('IN',$new_list)))->limit($first,$offset)
			->order('create_time desc')->select();

			$Users = D('Users');

			$ContentPraise = D('ContentPraise');

			foreach($list as $key=>$value)
			{
				$arr_list[$key]['user_info'] = $Users->where(array('u.id'=>$value['user_id']))->table('app_users as u')
				->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
				->field('u.id,u.nickname,u.head_img,c.title')->find();

				$arr_list[$key]['content'] = $value;

				parent::public_file_dir($arr_list[$key],array('head_img','article_img'));

				$arr_list[$key]['content']['time'] = date('Y-m-d H:i:s',$value['create_time']);

				$arr_list[$key]['content']['list_num'] = $ContentPraise->where(array('article_id'=>$value['id']))->count();
			}

			return $arr_list;
		}


	}