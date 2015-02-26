<?php
/**
 * 演示管理
 */
class DemoAction extends AdminBaseAction {
  	
	//控制器说明
	private $module_name = '演示管理';
	
	//初始化数据库连接
	protected  $db = array(

	);

	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
		
		$this->_init_data();
	}
	
	private function _init_data () {
	    
	}
	
	public function index () {
	    $data = array();
	     
	    parent::global_tpl_view( array(
	        'action_name'=>'列表',
	        'title_name'=>'列表',
	        'add_name'=>'列表'
	    ));
	    
	    parent::data_to_view($data);
	    $this->display();
	} 
	
	//新闻订单编辑
	public function edit() {
	   
	    $data = array();
	    
		parent::global_tpl_view( array(
				'action_name'=>'编辑',
				'title_name'=>'编辑',
				'add_name'=>'编辑'
		));
		
		parent::data_to_view($data);
		$this->display();
	}
	
	
	
}