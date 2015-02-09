<?php

/*
*	赞的列表
*
*
*/

class AttentionModel extends ApiBaseModel {

	//获得关注人
	public function getNewsList($id,$p,$index)
	{
		$first = $p == '' ? 0 : $p;
		$offset = $index =='' ? 6 : $index;

		$freind_arr = D('UserFriends')->where(array('user_id'=>$id,'friend_statis'=>1))->getField('friend_id',0);

		$where['user_id'] = array('IN',$freind_arr);

		$list = $this->where($where)->order('create_time desc')->limit($first,$offset)->select();

		$list_arr = array();
		
		$list_arr['all_num'] = $this->where($where)->count();

		$Users = D('Users');

		foreach($list as $key=>$value)
		{
			$list_arr['info'][$key]['user_info'] = $Users->where(array('u.id'=>$value['user_id']))
			->table('app_users as u')->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
			->field('u.id,u.nickname,u.head_img,c.title')->find();

			parent::public_file_dir($list_arr['info'][$key],array('head_img'));

			$list_arr['info'][$key]['content']['type'] = $value['status'];
			$list_arr['info'][$key]['content']['info'] = D('Article')
			->where(array('id'=>$value['attention_id']))->field('id,content,article_img')->find();

			parent::public_file_dir($list_arr['info'][$key]['content'],array('article_img'));

			$list_arr['info'][$key]['content']['info']['like_num'] = D('ContentPraise')
			->where(array('article_id'=>$value['attention_id']))->count();

			$list_arr['info'][$key]['time'] = date('Y-m-d H:i:s',$value['create_time']);
		}

		return $list_arr;
	}
}