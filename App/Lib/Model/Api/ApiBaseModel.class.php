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
				if($function = 'upload_article')
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

    //封装调用用户信息方法
    public function get_user_info($user_id)
    {
        $list = D('Users')->where(array('u.id'=>$user_id))
            ->table('app_users as u')->join('app_city as c on c.id = u.city_id and c.parent_id = 0')
            ->field('u.id,u.nickname,u.head_img,c.title,u.background_img')->find();
        return $list;
    }
}
?>