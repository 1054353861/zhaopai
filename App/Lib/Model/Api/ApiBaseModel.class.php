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
            ->table('app_users as u')->join('app_city as c on c.id = u.city_id')
            ->field('u.*,c.title')->find();
        return $list;
    }

    public function get_label_info($article_id)
    {
       $list = D('LabelArticle')->where(array('a.article_id'=>$article_id))
           ->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
           ->field('l.id,l.label_name')->select();
       return $list;
    }

    public function get_contentpraise_info($article_id)
    {
        $list = D('ContentPraise')->where(array('c.article_id'=>$article_id))
            ->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
            ->field('u.id,u.head_img')->order('c.create_time desc')->limit(7)->select();
        return $list;
    }

    public function get_contentpraise_count($article_id)
    {
        $count = D('ContentPraise')->where(array('article_id'=>$article_id))->count();
        return $count;
    }

    public function get_comment_count($article_id)
    {
        $count = D('Comment')->where(array('article_id'=>array('eq',$article_id)))->count();
        return $count;
    }

    public function get_shopphoto_url($id)
    {
        $shop_url = D('ShopPhoto')->where(array('shop_id'=>$id))->limit(1)->field('shop_url')->find();
        return $shop_url[0]['shop_url'];
    }
}
?>