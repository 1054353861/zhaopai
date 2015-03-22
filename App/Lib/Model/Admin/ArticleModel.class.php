<?php

class ArticleModel extends AdminBaseModel {
	
    public function getListHtml ($condition = array(),$fields = '*',$list_rows = 500,$order_by = '',$is_show_page_html =  true) {

       $result = $this->get_spe_page_data($condition,$fields,$list_rows,$order_by,$is_show_page_html);
       
       if (!empty($result['list'])) {
           
           $City = D('City');
           $city_list = $City->get_data_by_parent_id(0,true);

           //格式化日期
           $this->set_all_time($result['list'],array('create_time'));
           
           $ARTICLE_STATUS = C('ARTICLE_STATUS');
           foreach ($result['list'] as $key=>$val) {
               $result['list'][$key]['status_explain'] = $ARTICLE_STATUS[$val['status']]['explain']; 
               $result['list'][$key]['city_title'] = $city_list[$val['city_id']]['title'];
           }
       }

       return $result;
    }
	
}

?>
