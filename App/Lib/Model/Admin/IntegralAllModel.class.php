<?php

class IntegralAllModel extends AdminBaseModel {
	
    public function getIntegralListHtml ($condition = array(),$fields = '*',$list_rows = 500,$order_by = '',$is_show_page_html =  true) {

       $result = $this->get_spe_page_data($condition,$fields,$list_rows,$order_by,$is_show_page_html);
       
       if (!empty($result['list'])) {
           $INTEGRAL_STATUS = C('INTEGRAL_STATUS');
           foreach ($result['list'] as $key=>$val) {
               $result['list'][$key]['status_explain'] = $INTEGRAL_STATUS[$val['status']]['explain']; 
           }
       }
       
       return $result;
    }
	
}

?>
