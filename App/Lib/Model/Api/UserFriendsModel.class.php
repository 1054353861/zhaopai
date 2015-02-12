<?php

//用户数据模型
class UserFriendsModel extends ApiBaseModel {

	public function agree_friends($user_ids,$id)
	{
		$where['user_id'] = $user_ids;
		$where['friend_id'] = $id;
		$update = array('friend_statis'=>1);
		$this->where($where)->save($update);

        $new_add = array('user_id'=>$id,'friend_id'=>$user_ids,'friend_statis'=>1);
        $bool = $this->add($new_add);
        
		return $bool ? true : false;
	}


	public function friends_list($id)
	{
		$list['info'] = $this->where(array('f.user_id'=>$id,'f.friend_statis'=>1))->table('app_user_friends as f')
		->join('app_users as u on u.id = f.friend_id')
		->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
		->field('u.id,u.nickname,u.head_img,u.city_id,c.title')->select();

		parent::public_file_dir($list['info'],array('head_img'));

		$list['no_friends'] = $this->where(array('friend_id'=>$id,'friend_statis'=>0))->count();

		return $list;
	}

    public function new_friends_list($id)
    {
        $list['info'] = $this->where(array('f.friend_id'=>$id,'f.friend_statis'=>0))->table('app_user_friends as f')
            ->join('app_users as u on u.id = f.friend_id')
            ->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
            ->field('u.id,u.nickname,u.head_img,u.city_id,c.title')->select();

        parent::public_file_dir($list['info'],array('head_img'));
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