<?php

//评论
class ArticleModel extends ApiBaseModel {

	public function article_vote($id,$article_id,$vote_info)
	{
		$count = D('ArticleBehaviorLog')->where(array('article_id'=>$article_id,'user_id'=>$id))->count();
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
			return $bool ? true : false;
		}else{
			return false;
		}
	}


}