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
			$new_arr = array('article_id'=>$article_id,'user_id'=>$id);
			$ArticleBehaviorLog->add($new_arr);
			return $bool ? true : false;
		}else{
			return false;
		}
	}

	public function article_info($user_id,$article_id)
	{
		$big_arr = array();

		$big_arr['user_info'] = D('Users')->where(array('id'=>$user_id))->field('id,nickname,head_img,city_id')->find();
		
		$big_arr['photo_info'] = $this->where(array('id'=>$article_id))->find();
		
		$big_arr['photo_info']['tag_info'] = D('LabelArticle')->where(array('a.iarticle_id'=>$article_id))
		->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
		->field('l.id,l.label_name')->select();

		$big_arr['photo_info']['like_list'] = D('ContentPraise')->where(array('c.article_id'=>$article_id))
		->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
		->field('u.id,u.head_img')->limit(8)->select();

		$big_arr['photo_info']['like_num'] = D('ContentPraise')->where(array('c.article_id'=>$article_id))
		->count();

		$big_arr['photo_info']['comment_info'] = D('Comment')->where(array('c.article_id'=>$article_id))
		->table('app_comment as c')->join('app_users as u on u.id = c.user_id')
		->field('c.id,c.content,c.create_time,u.uid as user_id,u.nickname,u.head_img')->select();

		return $big_arr;
	}

}