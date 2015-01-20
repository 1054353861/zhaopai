<?php

/*
*	收藏文章
*
*
*/

class CollectionModel extends ApiBaseModel {

	public function getCollList($id,$p,$index)
	{
		$first = $p == '' ? 0 : $p;

		$offset = $index =='' ? 6 : $index;

		$list_arr = array();

		$list = $this->where(array('c.user_id'=>$id))->table('app_collection as c')
		->join('app_article as a on a.id = c.article_coll_id')->limit($first,$offset)
		->order('c.create_time desc')->order('a.create_time desc')
		->field('a.id,a.content,a.article_img,a.user_id,a.create_time')->select();

		$Users = D('Users');

		foreach($list as $key=>$value)
		{
			$list_arr[$key]['user_info'] = $Users->where(array('u.id'=>$value['user_id']))
			->table('app_users as u')->join('app_city as c on c.id = u.city_id and parent_id = 0')
			->field('u.id,u.nickname,u.head_img,c.title')->find();

			$list_arr[$key]['content'] = $value;
			
			$list_arr[$key]['content']['time'] = date('Y-m-d H:i:s',$value['create_time']);
		}

		$list_arr['news_num'] = $this->where(array('user_id'=>$id))->count();

		return $list_arr;
	}

	public function collect_like($id,$photo_id)
	{
		$where = array('user_id'=>$id,'article_coll_id'=>$photo_id);
		$count = $this->where($where)->count();
		if($count==0)
		{
			$where['create_time'] = time();
			$bool = $this->add($where);
			$log = array('user_id'=>$id,'attention_id'=>$photo_id,'status'=>2);
			parent::listen(__CLASS__,__FUNCTION__,$log);
			return $bool ? true : false;
		}
	}
}