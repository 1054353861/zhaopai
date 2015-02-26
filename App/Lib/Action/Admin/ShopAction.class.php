<?php
/**
 * 商品管理
 */
class ShopAction extends AdminBaseAction {
  	
	//控制器说明
	private $module_name = '订单管理';
	
	//初始化数据库连接
	protected  $db = array(
		//新闻媒体订单
		'GeneralizeNewsOrder'=>'GeneralizeNewsOrder',
	);
	
	
	public function index () {
	    
	}

}
