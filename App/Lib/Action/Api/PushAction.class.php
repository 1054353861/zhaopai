<?php
require_once 'App/vendor/autoload.php';

use JPush\Model as M;
use JPush\JPushClient;
use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;


/**
 * 推送
 */
class PushAction extends ApiBaseAction {
	
	protected  $is_check_rbac = false;		//当前控制是否开启身份验证
	
	protected  $not_check_fn = array();	//登陆后无需登录验证方法
	
	private $app_key = 'b630b69041d1ec8a7bdef983';
	private $master_secret = '25610a966468d2f2b1ed926f';
	
	
	//和构造方法
	public function __construct() {
		parent::__construct();
	
	}
	
	//初始化数据库连接
	protected  $db = array(
		
	);
	
	
	//发送给所有的用户
	public function seed_to_all () {
	    $app_key = $this->app_key;
	    $master_secret = $this->master_secret;
	    
	    $client = new JPushClient($app_key, $master_secret);
	    
	    try {
	        $result = $client->push()
	        ->setPlatform(M\all)
	        ->setAudience(M\all)
	        ->setNotification(M\notification('Hellow World'))
	        ->send();
	        echo 'Push Success.' . $br;
	        echo 'sendno : ' . $result->sendno . $br;
	        echo 'msg_id : ' .$result->msg_id . $br;
	        echo 'Response JSON : ' . $result->json . $br;
	    } catch (APIRequestException $e) {
	        echo 'Push Fail.' . $br;
	        echo 'Http Code : ' . $e->httpCode . $br;
	        echo 'code : ' . $e->code . $br;
	        echo 'message : ' . $e->message . $br;
	        echo 'Response JSON : ' . $e->json . $br;
	        echo 'rateLimitLimit : ' . $e->rateLimitLimit . $br;
	        echo 'rateLimitRemaining : ' . $e->rateLimitRemaining . $br;
	        echo 'rateLimitReset : ' . $e->rateLimitReset . $br;
	    } catch (APIConnectionException $e) {
	        echo 'Push Fail.' . $br;
	        echo 'message' . $e->getMessage() . $br;
	    }
	}
	
	
	
	
}

?>