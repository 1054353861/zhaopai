<?php

//用户数据模型
class UserFriendsModel extends ApiBaseModel {

	public function agree_friends($user_ids,$id)
	{
        $where['user_id'] = $id;
        $where['friend_id'] = $user_ids;
        $update = array('friend_statis'=>1);
        $this->where($where)->save($update);

        $new_add = array('user_id'=>$user_ids,'friend_id'=>$id,'friend_statis'=>1);
        $bool = $this->add($new_add);
		return $bool ? true : false;
	}


	public function friends_list($id,$type)
	{
		$list['info'] = $this->where(array('f.user_id'=>$id,'f.friend_statis'=>$type))->table('app_user_friends as f')
		->join('app_users as u on u.id = f.friend_id')
		->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
		->field('u.id,u.nickname,u.head_img,u.city_id,c.title')->select();

		parent::public_file_dir($list['info'],array('head_img'));

		$list['no_friends'] = $this->where(array('user_id'=>$id,'friend_statis'=>0))->count();

		return $list;
	}


	public function add_friends($new_friend,$id)
	{
        //判断自己有没有对方这个好友
        $is_friend = $this->where(array('user_id'=>$id,'friend_id'=>$new_friend))->count();
        if($is_friend!=0)
        {
            return false;
        }

        //判断有没有已经申请加对方好友
		$is_add = $this->where(array('user_id'=>$new_friend,'friend_id'=>$id))->count();
		if($is_add==0)
		{
			$add = array('user_id'=>$new_friend,'friend_id'=>$id,'friend_statis'=>0);
			$bool = $this->add($add);
			return $bool ? true : false;
		}else{
			return false;
		}
	}
}