<?php 

/**
 * API-积分模型
 */

class IntegralAllModel extends ApiBaseModel {

    //1是未领取 2是已领取
	public function getInfo($id)
	{
		$info_list = $this->where(array('status'=>0))->select();
        $IntegralSameday = D('IntegralSameday');
		foreach($info_list as $value)
		{
            if($value['id']==1)
            {
                $info = $IntegralSameday->where(array('user_id'=>$id,'integral_id'=>1))->find();
                $value['end_number'] = 1;
                if($info!='')
                    $info['status']==0 ? $value['is_end'] = 1 : $value['is_end'] = 2;
            }else{
                $where = array('sameday'=>strtotime(date('Y-m-d')),'user_id'=>$id,'integral_id'=>$value['id']);
                $or_in = $IntegralSameday->where($where)->select();
                $is_no = 0;
                $all_count = 0;
                foreach($or_in as $value)
                {
                    if($value['status']==0)
                    {
                        $is_no++;
                    }
                    $all_count++;
                }
                $value['end_number'] = $all_count;
                $is_no!=0 ? $value['is_end'] = 1 : $value['is_end'] = 2;
            }
			$now_info[] = $value;
		}
		return $now_info;
	}

    //完成任务获取积分
    public function insert_user_score($user_id,$score_id)
    {
        $IntegralSameday = D('IntegralSameday');
        $where = array('sameday'=>strtotime(date('Y-m-d')),'user_id'=>$user_id,'integral_id'=>$score_id);
        $count = $IntegralSameday->where($where)->count();
        $int_integral = $this->where(array('id'=>$score_id))->getField('integral');
        $Users = D('Users');
        $user_integral = $Users->where(array('id'=>$user_id))->getField('integral');
        $new_integral['integral'] = $count * $int_integral + $user_integral;
        $user_bool = $Users->where(array('id'=>$user_id))->save($new_integral);
        if($user_bool)
        {
            $update = array('status'=>1);
            $bool = $IntegralSameday->where($where)->save($update);
            return $bool ? true : false;
        }else{
            return false;
        }
    }
}
?>