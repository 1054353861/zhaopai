<?php

/**
 * 	首页
 */


class HomeAction extends ApiBaseAction {
	
	//每个类都要重写此变量
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array('home_data','home_advertment');	//无需登录和验证rbac的方法名

	public function __construct()
	{
		parent:: __construct();			//重写父类构造方法
	}

	//初始化数据库连接
	protected  $db = array(
		'Article' => 'Article'
	);

	//首页
	public function home_data()
	{
	    if ($this->isPost()) {
    		$city = $this->_post('city_id');
    		$type = $this->_post('type');	//1是根据 2是根据最近
    		$p = $this->_post('p');
    		$lng = $this->_post('longitude');	//精度
    		$lat = $this->_post('latitude');	//纬度
    		$count = $this->_post('count');
    		$list = $this->db['Article']->article_index($city,$type,$p,$count,$lng,$lat);
    		parent::callback(C('STATUS_SUCCESS'),'获取成功',$list);
	    }
	    
	}

	//广告主页
    public function home_advertment()
    {
        $advert_id = $this->_get('advert_id');
        if(!is_numeric($advert_id))
            return false;
        $list = $this->db['Article']->get_advert_info($advert_id);
        parent::data_to_view($list);
        $this->display();
    }
}