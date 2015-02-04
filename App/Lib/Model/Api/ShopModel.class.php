<?php 

/**
 * API-商城模型
 */

class ShopModel extends ApiBaseModel {
	


	public function getInfoALL()
	{
		$list = $this->table('app_shop as s')
		->join('app_shop_photo as p on s.id = p.shop_id')
		->group('p.shop_id')->select();

		parent::public_file_dir($list,array('shop_url'));

		return $list;
	}
}
?>