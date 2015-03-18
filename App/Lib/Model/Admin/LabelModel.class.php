<?php

class LabelModel extends AdminBaseModel {
	
    public function getLabelListHtml ($condition = array(),$fields = '*',$list_rows = 500,$order_by = '',$is_show_page_html =  true) {

       $result = $this->get_spe_page_data($condition,$fields,$list_rows,$order_by,$is_show_page_html);
       
       if (!empty($result['list'])) {
           $LABEL_STATUS = C('LABEL_STATUS');
           foreach ($result['list'] as $key=>$val) {
               $result['list'][$key]['status_explain'] = $LABEL_STATUS[$val['is_hot']]['explain']; 
           }
       }
       
       return $result;
    }
	
}

?>
