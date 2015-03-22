<?php

class PushLogModel extends AdminBaseModel {
	
	public function add_log($type,$content,$to_user_id = 0) {
	   $this->type=$type;
	   $this->content = $content;
	   $this->to_user_id = $to_user_id;
	   $this->time = time();
	   return $this->add();
	}
	
}

?>
