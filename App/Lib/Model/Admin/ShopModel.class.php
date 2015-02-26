<?php

class ShopModel extends AdminBaseModel {
	
    public function getShopListHtml ($condition = array(),$fields = '*',$list_rows = 500,$order_by = '',$is_show_page_html =  true) {

       $result = $this->get_spe_page_data($condition,$fields,$list_rows,$order_by,$is_show_page_html);
       
       if (!empty($result['list'])) {
           $SHOP_STATUS = C('SHOP_STATUS');
           foreach ($result['list'] as $key=>$val) {
               $result['list'][$key]['status_explain'] = $SHOP_STATUS[$val['status']]['explain']; 
           }
       }
       
       return $result;
    }
	
}

?>
