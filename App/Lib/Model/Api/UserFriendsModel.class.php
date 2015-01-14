<?php

//用户数据模型
class UserFriendsModel extends ApiBaseModel {

	public function agree_friends($user_ids,$id)
	{
		$where['friend_id'] = array('in',$user_ids);
		$where['user_id'] = $id;
		$update = array('friend_statis'=>1);
		$bool = $this->where($where)->save($update);
		return $bool ? true : false;
	}


	public function friends_list($id,$type)
	{
		$list = $this->where(array('user_id'=>$id,'friend_statis'=>$type))->table('app_user_friends as f')
		->join('app_users as u on u.id = f.friend_id')->field('u.id,u.nickname,u.head_img,u.city_id')->select();
		return $list;
	}

	public function add_friends($new_friend,$id)
	{
		$is_friend = $this->where(array('user_id'=>$id,'friend_id'=>$new_friend))->count();
		if($is_friend==0)
		{
			$add = array('user_id'=>$id,'friend_id'=>$new_friend,'friend_statis'=>0);
			$bool = $this->add($add);
			return $bool ? true : false;
		}else{
			return false;
		}
	}
}