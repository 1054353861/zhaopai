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

    //得到标签信息
    public function get_label_info($article_id)
    {
       $list = D('LabelArticle')->where(array('a.article_id'=>$article_id))
           ->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
           ->field('l.id,l.label_name')->select();
       return $list;
    }

    //得到赞大用户信息最多7条
    public function get_contentpraise_info($article_id)
    {
        $list = D('ContentPraise')->where(array('c.article_id'=>$article_id))
            ->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
            ->field('u.id,u.head_img')->order('c.create_time desc')->limit(7)->select();
        return $list;
    }

    //得到赞大数量
    public function get_contentpraise_count($article_id)
    {
        $count = D('ContentPraise')->where(array('article_id'=>$article_id))->count();
        return $count;
    }

    //得到评论数量
    public function get_comment_count($article_id)
    {
        $count = D('Comment')->where(array('article_id'=>array('eq',$article_id)))->count();
        return $count;
    }

    //得到商品图片路径取其中一个
    public function get_shopphoto_url($id)
    {
        $shop_url = D('ShopPhoto')->where(array('shop_id'=>$id))->limit(1)->field('shop_url')->find();
        return $shop_url['shop_url'];
    }

    /*
	 * author zhucc 判断任务完成数量
	 *  1.完成组册(永久) 2.每天登入 3.发表话题 4.文明点赞 5.评论话题 6.参与文明PK 7.邀请好友 8.分享给朋友 9.给建议
	 */

    public function check_integral_num($user_id)
    {
        //获取未被禁用的任务
        $int_all_info = D('IntegralAll')->where(array('status'=>0))->find();
        $IntegralSameday = D('IntegralSameday');
        //未完成任务数量
        $integail = 0;
        foreach($int_all_info as $value)
        {
            if($value['id']==1)
            {
                $info = $IntegralSameday->where(array('user_id'=>$user_id,'integral_id'=>1,'status'=>1))->find();
                if($info['status']==0)
                    $integail++;
            }else{
                $where = array('status'=>0,'user_id'=>$user_id,'integral_id'=>$value['id'],'sameday'=>strtotime(date('Y-m-d')));
                $count = $IntegralSameday->where($where)->count();
                if($count!=0)
                    $integail++;
            }
        }
        return $integail;
    }
}
?>