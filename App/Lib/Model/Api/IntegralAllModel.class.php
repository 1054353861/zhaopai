<?php 

/**
 * API-积分模型
 */

class IntegralAllModel extends ApiBaseModel {

    //1是未完成 2是已完成
	public function getInfo($id)
	{
		$info_list = $this->where(array('status'=>0))->select();
        $IntegralSameday = D('IntegralSameday');
		foreach($info_list as $value)
		{
            if($value['id']==1)
            {
                $info = $IntegralSameday->where(array('user_id'=>$id,'integral_id'=>1))->find();
                $info!='' && $info['status']==0 ? $value['is_end'] = 1 : $value['is_end'] = 2;
            }else{
                $where = array('status'=>0,'sameday'=>strtotime(date('Y-m-d')),'user_id'=>$id,'integral_id'=>$value['id']);
                $or_in = $IntegralSameday->where($where)->count();
                $or_in!=0 ? $value['is_end'] = 1 : $value['is_end'] = 2;
            }
			$now_info[] = $value;
		}
		return $now_info;
	}
}
?>