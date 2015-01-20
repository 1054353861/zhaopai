<?php 

/**
 * API-基础模型
 */

class ApiBaseModel extends AppBaseModel {
	
	public function __construct() {
		parent::__construct();
	}

	//生成记录
	protected function listen($class,$function,$log)
	{
		switch($class)
		{
			case 'ArticleModel':
				if($function = 'article_vote')
					$this->insert_att($log);
			break;
			case 'CommentModel':
				if($function = 'add_comment')
					$this->insert_att($log);
			break;
			case 'ContentPraiseModel':
				if($function = 'photo_like')
					$this->insert_att($log);
			break;
			case 'CollectionModel':
				if($function = 'collect_like')
					$this->insert_att($log);
			break;
		}
	}

	private function insert_att($log)
	{
		$attention = D('attention');
		$count = $attention->where($log)->count();
		if($count==0)
		{
			$log['create_time'] = time();
			$attention->add($log);
		}
	}
}
?>