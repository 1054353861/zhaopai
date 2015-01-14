<?php

//评论
class CommentModel extends ApiBaseModel {

	public function add_comment($id,$article_id,$comment_content)
	{
		$count = $this->where(array('article_id'=>$article_id,'user_id'=>$id))->count();
		if($count==0)
		{
			$new_add = array(
				'article_id' => $article_id,
				'user_id' => $id,
				'content' => $comment_content,
				'create_time' => time()
			);
			$bool = $this->add($new_add);
			return $bool ? true : false;
		}else{
			return false;
		}
	}
}