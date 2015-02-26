<?php

class ShopPhotoModel extends AdminBaseModel {
	
    
	public function getImgList ($condition = array(),$fields = '*',$offset = 0,$limit = 500,$order_by = "") {
		
	    $result = parent::get_spe_data($condition,$fields ,$offset,$limit,$order_by );
	    
	    parent::public_file_dir($result,array('shop_url'));
	    
	    $result = regroupKey($result,'type');
	    
	    return $result;
	}
    
}

?>
