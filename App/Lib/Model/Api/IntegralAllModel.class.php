<?php 

/**
 * API-积分模型
 */

class IntegralAllModel extends ApiBaseModel {
	
	public function getInfo($id)
	{
		$info_list = $this->select();
		$now_info = array();
		foreach($info_list as $value)
		{
			$value['is_end'] = $this->exsits_end($value['id'],$id);
			$now_info[] = $value;
		}
		return $now_info;
	}

	private function exsits_end($iid,$uid)
	{
		$where = array('sameday'=>strtotime(date('Y-m-d')),'user_id'=>$uid,'integral_id'=>$iid);
		$or_in = D('IntegralSameday')->where($where)->count();
		return $or_in == 0 ? 1 : 2 ;
	}
}
?>