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
            ->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
            ->field('u.id,u.nickname,u.head_img,c.title,p.create_time')
            ->order('p.create_time desc')->limit($first,$offset)->select();

		parent::public_file_dir($list['like_list'],array('head_img'));

		$list['like_num'] = $this->where(array('article_id'=>$id))->count();
		return $list;
	}

	public function set_like($user_id,$article_id)
	{
		$where = array('article_id'=>$article_id,'user_praise_id'=>$user_id);
		$count = $this->where($where)->count();
		$log = array('user_id'=>$user_id,'attention_id'=>$article_id,'status'=>1);
		parent::listen(__CLASS__,__FUNCTION__,$log);
		if($count==0)
		{
			$where['create_time'] = time();
			$bool = $this->add($where);
			return $bool ? true : false;
		}else{
			$bool = $this->where($where)->delete();
			return $bool ? true : false;
		}
	}
}