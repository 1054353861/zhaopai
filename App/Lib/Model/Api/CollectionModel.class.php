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
			$list_arr[$key]['user_info'] = $Users->where(array('id'=>$value['user_id']))
			->field('id,nickname,head_img,city_id')->find();

			$list_arr[$key]['user_info']['time'] = date('Y-m-d H:i:s',$value['create_time']);

			$list_arr[$key]['content'] = $value;
		}

		$list_arr['news_num'] = $this->where(array('user_id'=>$id))->count();

		return $list_arr;
	}
}