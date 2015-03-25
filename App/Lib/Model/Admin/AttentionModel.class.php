<?php

class AttentionModel extends AdminBaseModel {
	
    /**
     * 设置文章为禁用
     * @param Int $attention_id
     */
    public function setDel($attention_id) {	
        return $this->save_one_data(array('attention_id'=>$attention_id),array('is_del'=>1));
    }

    /**
     * 设置文章为启用
     * @param Int $attention_id
     */
    public function setNotDel($attention_id) {	
        return $this->save_one_data(array('attention_id'=>$attention_id),array('is_del'=>0));
    }
}

?>
