<?php 

/**
 * API-商城模型
 */

class ShopModel extends ApiBaseModel {
	


	public function getInfoALL()
	{
        $new_list = array();

		$list = $this->select();

        foreach($list as $key=>$value)
        {
            $new_list[$key] = $value;
            $new_list[$key]['shop_url'] = parent::get_shopphoto_url($value['id']);
        }

		parent::public_file_dir($new_list,array('shop_url'));

		return $new_list;
	}
}
?>