<?php

/*
*	赞的列表
*
*
*/

class ContentPraiseModel extends ApiBaseModel {

	public function getLike($id,$p,$index)
	{
		$first = $p =='' ? 0 : $p;
		$offset = $index == '' ? 10 : $index;
		$list = array();
		$list['like_list'] = $this->where(array('p.article_id'=>$id))->table('app_content_praise as p')
		->join('app_users as u on u.id = p.user_praise_id')
		->field('u.id,u.nickname,u.head_img,u.city_id,p.create_time')->limit($first,$offset)->select();
		$list['like_num'] = $this->where(array('article_id'=>$id))->count();
		return $list;
	}
}