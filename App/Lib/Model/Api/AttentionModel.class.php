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

		$Users = D('Users');

		foreach($list as $key=>$value)
		{
			$list_arr[$key]['user_info'] = $Users->where(array('id'=>$value['user_id']))
			->field('id,nickname,head_img,city_id')->find();
			$list_arr[$key]['content']['type'] = $value['status'];
			$list_arr[$key]['content']['info'] = D('Article')
			->where(array('id'=>$value['attention_id']))->field('content,article_img')->find();
			$list_arr[$key]['content']['info']['like_num'] = D('ContentPraise')
			->where(array('article_id'=>$value['attention_id']))->count();
			$list_arr[$key]['time'] = date('Y-m-d H:i:s',$value['create_time']);
		}

		return $list_arr;
	}
}