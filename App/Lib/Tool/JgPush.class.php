<?php
/**
 * 极光推送
 * @author jack
 *
 */

require_once 'App/vendor/autoload.php';

use JPush\Model as M;
use JPush\JPushClient;
use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;

class JgPush { 
		
    private $app_key = 'b630b69041d1ec8a7bdef983';
    private $master_secret = '25610a966468d2f2b1ed926f';
    
    //发送给所有的用户
    public function seedToAll ($content) {
        $result_data = array();
        $app_key = $this->app_key;
        $master_secret = $this->master_secret;
         
        $client = new JPushClient($app_key, $master_secret);
         
        try {
            $result = $client->push()
            ->setPlatform(M\all)
            ->setAudience(M\all)
            ->setNotification(M\notification($content))
            ->send();
            $result_data[] = 'Push Success.' . $br;
            $result_data[] = 'sendno : ' . $result->sendno . $br;
            $result_data[] = 'msg_id : ' .$result->msg_id . $br;
            $result_data[] = 'Response JSON : ' . $result->json . $br;
        } catch (APIRequestException $e) {
            $result_data[] = 'Push Fail.' . $br;
            $result_data[] = 'Http Code : ' . $e->httpCode . $br;
            $result_data[] = 'code : ' . $e->code . $br;
            $result_data[] = 'message : ' . $e->message . $br;
            $result_data[] = 'Response JSON : ' . $e->json . $br;
            $result_data[] = 'rateLimitLimit : ' . $e->rateLimitLimit . $br;
            $result_data[] = 'rateLimitRemaining : ' . $e->rateLimitRemaining . $br;
            $result_data[] = 'rateLimitReset : ' . $e->rateLimitReset . $br;
        } catch (APIConnectionException $e) {
            $result_data[] = 'Push Fail.' . $br;
            $result_data[] = 'message' . $e->getMessage() . $br;
        }
        
        return $result_data;
    }
    
    
    /**
     * 推送给单个用户
     * @param unknown $user
     * @param unknown $content
     */
    public function seedToOne ($user,$content) {
        $app_key = $this->app_key;
        $master_secret = $this->master_secret;
    }
	
}




?>