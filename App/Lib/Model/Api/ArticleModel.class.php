<?php

/*
*	文章
*
*
*/

class ArticleModel extends ApiBaseModel {

	public function article_vote($id,$article_id,$vote_info)
	{
		$ArticleBehaviorLog = D('ArticleBehaviorLog');
		$count = $ArticleBehaviorLog->where(array('article_id'=>$article_id,'user_id'=>$id))->count();
		if($count==0)
		{
			//1 文明 2 不文明
			$sup = $this->where(array('id'=>$article_id))->field('support,nonsupport')->find();
			switch($vote_info)
			{
				case 1:
					$super = array('support'=>$sup['support']+1);
					$bool = $this->where(array('id'=>$article_id))->save($super);
				break;
				case 2:
					$super = array('nonsupport'=>$sup['nonsupport']+1);
					$bool = $this->where(array('id'=>$article_id))->save($super);
				break;
			}
			$log = array('user_id'=>$id,'attention_id'=>$article_id,'status'=>1);
			parent::listen(__CLASS__,__FUNCTION__,$log);
			$new_arr = array('article_id'=>$article_id,'user_id'=>$id);
			$ArticleBehaviorLog->add($new_arr);
			return $bool ? true : false;
		}else{
			return false;
		}
	}

	//照片详情
	public function article_info($user_id,$article_id)
	{
		$big_arr = array();

		$big_arr['photo_info'] = $this->where(array('id'=>$article_id))->find();

        $big_arr['user_info'] = parent::get_user_info($big_arr['photo_info']['user_id']);

        $big_arr['photo_info']['time'] = date('Y-m-d H:i:s',$big_arr['photo_info']['create_time']);

		$big_arr['photo_info']['tag_info'] = D('LabelArticle')->where(array('a.article_id'=>$article_id))
		->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
		->field('l.id,l.label_name')->select();

		$ContentPraise = D('ContentPraise');
		$big_arr['photo_info']['like_list'] = $ContentPraise->where(array('c.article_id'=>$article_id))
		->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
		->field('u.id,u.head_img')->limit(7)->select();

		$big_arr['photo_info']['like_num'] = $ContentPraise->where(array('article_id'=>$article_id))
		->count();

		parent::public_file_dir($big_arr,array('head_img','article_img','background_img'));

		parent::public_file_dir($big_arr['photo_info']['like_list'],array('head_img'));

		return $big_arr;
	}

	//首页
	public function article_index($city,$type,$index,$page_count,$lng,$lat)
	{
		if($city!='')
			$where['city_id'] = $city;
		$p = $index =='' ? 0 : $index;
		$page_count = $page_count == '' ? 10 : $page_count;


		$list = array();
		
		switch($type)
		{
			//最新
			case 1:
				$list_info = $this->where($where)->limit($p * $page_count,$page_count)->order('create_time desc')->select();
				$list['all_count'] = $this->where($where)->count();
			break;
			//最近
			case 2:
				//计算经纬度
				$square_arr = _SquarePoint($lng,$lat);

				$l_where['longitude'] = array(array('gt',$square_arr['left-top']['lng']),array('lt',$square_arr['right-bottom']['lng']),'AND');

				$l_where['latitude'] = array(array('gt',$square_arr['left-top']['lat']),array('lt',$square_arr['right-bottom']['lat']),'AND');

				$list_info = $this->where($l_where)->limit($p * $page_count,$page_count)->order('longitude desc')->order('latitude desc')->select();
				
				$list['all_count'] = $this->where($l_where)->count();

			break;
		}

		if($list_info!='')
		{

			$ContentPraise = D('ContentPraise');

			$LabelArticle = D('LabelArticle');

			$Users = D('Users');

			$Comment = D('Comment');

			foreach($list_info as $key=>$value)
			{

                $list['info'][$key]['user_info'] = parent::get_user_info($value['user_id']);

				parent::public_file_dir($list['info'][$key],array('head_img'));

				$list['info'][$key]['photo_info'] = $value;

                if($lng!='' && $lat!='')
                $list['info'][$key]['photo_info']['distance'] = getdistances($lng,$lat,$value['longitude'],$value['latitude']);

				parent::public_file_dir($list['info'][$key],array('article_img'));

				$list['info'][$key]['photo_info']['photo_time'] = date('Y-m-d H:i:s',$value['create_time']);

				$list['info'][$key]['photo_info']['tag_info'] = $LabelArticle->where(array('a.article_id'=>$value['id']))
				->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
				->field('l.id,l.label_name')->select();

				$list['info'][$key]['photo_info']['like_info']['like_num'] = $ContentPraise->where(array('article_id'=>$value['id']))
				->count();

				$list['info'][$key]['photo_info']['like_info']['like_list'] = $ContentPraise->where(array('c.article_id'=>$value['id']))
				->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
				->field('u.id,u.head_img')->limit(7)->select();

				parent::public_file_dir($list['info'][$key]['photo_info']['like_info']['like_list'],array('head_img'));

				$list['info'][$key]['photo_info']['comment_num'] = $Comment->where(array('article_id'=>array('eq',$value['id'])))->count();
			}

			return $list;

		}
	}

	//推荐文章
	public function getRemmend()
	{
		$list = $this->where(array('recommend'=>1))->select();

		$list_arr = array();

		$Users = D('Users');

		$ContentPraise = D('ContentPraise');

		foreach($list as $key=>$value)
		{
			$list_arr[$key]['user_info'] = $Users->where(array('u.id'=>$value['user_id']))->table('app_users as u')
			->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
			->field('u.id,u.nickname,u.head_img,c.title')->find();

			$list_arr[$key]['content_info'] = $value;

            $list_arr[$key]['content_info']['create_time'] = date('Y-m-d H:i:s',$value['create_time']);

			parent::public_file_dir($list_arr[$key],array('head_img','article_img'));

			$list_arr[$key]['like_num'] = $ContentPraise->where(array('article_id'=>$value['id']))->count();
		}

		return $list_arr;
	}


	//获得个人中心数据
	public function getOwnInfo($p,$index,$user_id,$type,$other_id=NULL)
	{
		$first = $p == '' ? 0 : $p;
		$offset = $index == '' ? 10 : $index;
		$arr_list = array();

		$Users = D('Users');

        $arr_list['user_info'] = parent::get_user_info($user_id);

		parent::public_file_dir($arr_list,array('head_img','background_img'));

		$arr_list['user_info']['save_num'] = D('Collection')->where(array('user_id'=>$user_id))->count();

		$arr_list['user_info']['friend_num_yes'] = D('UserFriends')->where(array('user_id'=>$user_id,'friend_statis'=>1))->count();

		$arr_list['user_info']['artcile_num'] = $this->where(array('user_id'=>$user_id))->count();

		$int_all_count = D('IntegralAll')->count();

		$now_count = D('IntegralSameday')->where(array('sameday'=>array('eq',strtotime(date('Y-m-d')))))->count();

		$arr_list['user_info']['integral_num'] = $int_all_count - $now_count;

		if($type==false)
		{
			$arr_list['user_info']['friend_num_no'] = D('UserFriends')->where(array('user_id'=>$user_id,'friend_statis'=>0))->count();
		}

		if($type==true)
		{
			$count = D('UserFriends')->where(array('user_id'=>$user_id,'friend_id'=>$other_id,'friend_statis'=>1))->count();
			if($count==0)
			{
				$arr_list['user_info']['is_friend'] = 2;
			}else{
				$arr_list['user_info']['is_friend'] = 1;
			}
		}

		$list = $this->where(array('user_id'=>$user_id))->limit($first * $offset,$offset)
		->field('id,content,article_img,create_time,longitude,latitude')->select();
        if($list!='')
        {

            $LabelArticle = D('LabelArticle');

            $ContentPraise = D('ContentPraise');

            $Comment = D('Comment');
            foreach($list as $key=>$value)
            {
                $arr_list['photo_info'][$key] = $value;
                $arr_list['photo_info'][$key]['create_time'] = date('Y-m-d H:i:s',$value['create_time']);

                parent::public_file_dir($arr_list['photo_info'],array('article_img'));

                $arr_list['photo_info'][$key]['tag_info'] = $LabelArticle->table('app_label_article as a')
                ->where(array('a.article_id'=>$value['id']))->join('app_label as l on l.id = a.label_id')
                ->field('l.id,l.label_name')->select();

                $arr_list['photo_info'][$key]['like_info']['like_list'] = $ContentPraise->table('app_content_praise as p')
                ->where(array('p.article_id'=>$value['id']))->join('app_users as u on u.id = p.user_praise_id')
                ->field('u.id,u.head_img')->order('p.create_time desc')->limit(7)->select();

                parent::public_file_dir($arr_list['photo_info'][$key]['like_info']['like_list'],array('head_img'));

                $arr_list['photo_info'][$key]['like_info']['like_num'] = $ContentPraise->where(array('article_id'=>$value['id']))->count();

                $arr_list['photo_info'][$key]['comment_num'] = $Comment->where(array('article_id'=>$value['id']))->count();
            }
        }else{
            $arr_list['photo_info'] = array();
        }
		$arr_list['article_num'] = $this->where(array('user_id'=>$user_id))->count();

		return $arr_list;
	}

	//上传文章
	public function upload_article($arr,$tags)
	{
		$new_insert_id = $this->add($arr);
		if($new_insert_id!='')
		{
			$log = array('user_id'=>$arr['user_id'],'attention_id'=>$new_insert_id,'status'=>3);
			parent::listen(__CLASS__,__FUNCTION__,$log);
			if(is_array($tags))
			{
                $LabelArticle = D('LabelArticle');
				foreach($tags as $value)
				{
					$tag_arr = array('article_id'=>$new_insert_id,'label_id'=>$value);
                    $LabelArticle->add($tag_arr);
				}
			}
			return true;
		}else{
			return false;
		}
	}
}