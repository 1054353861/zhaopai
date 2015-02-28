<?php

/**
 * 	个人中心
 */


class PersonalAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'IntegralAll' => 'IntegralAll',
		'Users' => 'Users',
		'Article' => 'Article',
        'UsersFeedback' => 'UsersFeedback'
	);

	
	//个人中心-他人
	public function personal_other()
	{
		$id = $this->oUser->id;
		$friend_id = $this->_post('user_id');
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$friend_id,true,$id);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//个人中心-自己
	public function personal_owner()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$id,false);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

	//个人中心-话题
	public function personal_news()
	{
		$id = $this->oUser->id;
		$p = $this->_post('p');
		$index = $this->_post('index');
		$list = $this->db['Article']->getOwnInfo($p,$index,$id,false);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

    //个人中心-他人话题
    public function personal_other_news()
    {
        $id = $this->oUser->id;
        $other_id = $this->_post('other_user_id');
        $p = $this->_post('p');
        $index = $this->_post('index');
        $list = $this->db['Article']->getOwnInfo($p,$index,$other_id,false);
        parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
    }

	//个人中心-积分
	public function personal_score()
	{
		$id = $this->oUser->id;
		$list['store'] = $this->db['Users']->where(array('id'=>$id))->getField('integral');
		$list['task_list'] = $this->db['IntegralAll']->getInfo($id);
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	}

    //个人中心－领取积分
    public function personal_score_insert()
    {
        $id = $this->oUser->id;
        $score_id = $this->_post('score_id');
        $bool = $this->db['IntegralAll']->insert_user_score($id,$score_id);
        $bool ? parent::callback(C('STATUS_SUCCESS'),'领取成功','') : parent::callback(C('STATUS_DATA_ERROR'),'领取失败','');
    }

    //任务调用接口
    //1.完成组册 2.每天登入 3.发表话题 4.文明点赞 5.评论话题 6.参与文明PK 7.邀请好友 8.分享给朋友 9.给建议
    public function personal_msg()
    {
        $id = $this->oUser->id;
        $type_id = $this->_post('type_id');
        parent::end_integral_all_info($id,$type_id);
        parent::callback(C('STATUS_SUCCESS'),'接受成功','');
    }

	//个人中心-头像
	public function personal_edit_head()
	{
		$id = $this->oUser->id;
		$file_list = parent::upload_file($_FILES['data']);
		if($file_list['status']==true)
		{
			$url = array('head_img'=>$file_list['info'][0]['savename']);
			$bool = $this->db['Users']->where(array('id'=>$id))->save($url);
			$bool ? parent::callback(C('STATUS_SUCCESS'),'头像修改成功','') : parent::callback(C('STATUS_DATA_ERROR'),'头像修改失败','');
		}else{
			parent::callback(C('STATUS_DATA_ERROR'),'头像上传失败','');
		}

	}

    //个人中心-背景
    public function personal_edit_background()
    {
        $id = $this->oUser->id;

        if($this->_post('background_url')!='')
            $url['background_img'] = $this->_post('background_url');

        if($_FILES['background_img']!='')
        {
            $file_list = parent::upload_file($_FILES['background_img']);
            if($file_list['status']==true)
            {
                $url['background_img'] = $file_list['info'][0]['savename'];
            }else{
                parent::callback(C('STATUS_DATA_ERROR'),'','图片上传有误');
            }
        }

        if($url['background_img']=='')
            parent::callback(C('STATUS_DATA_ERROR'),'','图片上传有误');

        $bool = $this->db['Users']->where(array('id'=>$id))->save($url);
        $bool ? parent::callback(C('STATUS_SUCCESS'),'修改背景成功','') : parent::callback(C('STATUS_DATA_ERROR'),'修改背景失败','');
    }

	//个人中心-昵称
	public function personal_edit_nickname()
	{
		$id = $this->oUser->id;
		$user['nickname'] = $this->_post('nickName');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
		$bool ? parent::callback(C('STATUS_SUCCESS'),'修改成功','') : parent::callback(C('STATUS_DATA_ERROR'),'修改失败','');
	}

	//个人中心-性别
	public function personal_edit_sex()
	{
		$id = $this->oUser->id;
		$user['sex'] = $this->_post('user_sex');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($user);
        $bool ? parent::callback(C('STATUS_SUCCESS'),'修改成功','') : parent::callback(C('STATUS_DATA_ERROR'),'修改失败','');
	}

	//个人中心-城市
	public function personal_edit_city()
	{
		$id = $this->oUser->id;
		$city['city_id'] = $this->_post('city_id');
		$bool = $this->db['Users']->where(array('id'=>$id))->save($city);
        $bool ? parent::callback(C('STATUS_SUCCESS'),'修改成功','') : parent::callback(C('STATUS_DATA_ERROR'),'修改失败','');
	}

	//个人中心-修改全部信息
	public function personal_all_change()
	{
		$id = $this->oUser->id;
		
		if ($this->isPost()) {
		    $arr = array();
		    $format_fields = array('user_sex'=>'sex');//需要格式化的字段
            
            foreach ($this->_post() as $key=>$val) {
               if ($val != '') {
                   if (!empty($format_fields[$key])) {
                       $arr[$format_fields[$key]] = $val;
                   } else {
                       $arr[$key] = $val;
                   }
               }
            }
            
//     		$arr['sex'] = $this->_post('user_sex');
//     		$arr['city_id'] = $this->_post('city_id');
//     		$arr['nickname'] = $this->_post('nickname');
    		
//     		$arr['interest'] = $this->_post('interest');  //兴趣
//     		$arr['name'] = $this->_post('name');  //收获地址姓名
//     		$arr['address'] = $this->_post('address');    //收获地址
//     		$arr['address_phone'] = $this->_post('address_phone');//收货人联系电话
    		
    		if($this->_post('article_img')!='')
    			$arr['head_img'] = $this->_post('article_img');
    		if($_FILES['img']!='')
    		{
    			$file_list = parent::upload_file($_FILES['img']);
    			if($file_list['status']==true)
    			{
    				$arr['head_img'] = $file_list['info'][0]['savename'];
    			}else{
    				parent::callback(C('STATUS_DATA_ERROR'),'','图片格式不正确');
    			}
    		}
    		$bool = $this->db['Users']->where(array('id'=>$id))->save($arr);
    		$bool ? parent::callback(C('STATUS_SUCCESS'),'修改成功','') : parent::callback(C('STATUS_DATA_ERROR'),'修改失败','');
		}
	}

    //反馈
    public function personal_feedback()
    {
        $info['user_id'] = $this->oUser->id;
        $info['content'] = $this->_post('content');
        $info['create_time'] = time();
        $bool = $this->db['UsersFeedback']->add($info);
        if($bool)
            parent::end_integral_all_info($info['user_id'],9);
        $bool ? parent::callback(C('STATUS_SUCCESS'),'反馈成功','') : parent::callback(C('STATUS_DATA_ERROR'),'反馈失败','');
    }
}