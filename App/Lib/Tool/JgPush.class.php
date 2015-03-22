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
        $app_key = $this->app_key;
        $master_secret = $this->master_secret;
         
        $client = new JPushClient($app_key, $master_secret);
         
        try {
            $result = $client->push()
            ->setPlatform(M\all)
            ->setAudience(M\all)
            ->setNotification(M\notification($content))
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
    
    
    public function seedToOne () {
        $app_key = $this->app_key;
        $master_secret = $this->master_secret;
    }
	
}




?>