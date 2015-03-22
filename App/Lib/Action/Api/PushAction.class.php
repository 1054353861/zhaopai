<?php

/**
 * 推送控制接口
 */
class PushAction extends ApiBaseAction {
	
	protected  $is_check_rbac = true;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//登陆后无需登录验证方法
	
	
	//和构造方法
	public function __construct() {
		parent::__construct();
	
	}
	
	//初始化数据库连接
	protected  $db = array(
		'PushLog' => 'PushLog'
	);
	
	
	//获取推送记录
	public function get_push_log_for_user () {
	    $PushLog = $this->db['PushLog'];
	    
	    $user_id = $this->oUser->id;	//用户ID
	   // $user_id = 7;
	    
	    //用户推送日志
	    $where = array('to_user_id'=>$user_id,'type'=>1);
	    $user_log = $PushLog->get_user_log_list($where,'*',500,'id DESC');
	    
	    //系统推送日志
	    $system_log = $PushLog->get_system_log_list();
	    
	    $result = array_merge($system_log,$user_log);
	    
	    if (!empty($result)) {
	        parent::callback(C('STATUS_SUCCESS'),'获取成功',$result);
	    } else {
	        parent::callback(C('STATUS_NOT_DATA'),'暂无数据');
	    }
	}
	
}

?>