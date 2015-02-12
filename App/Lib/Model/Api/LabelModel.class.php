<?php
	/*
	*	标签
	*
	*
	*
	*/

	class LabelModel extends ApiBaseModel
	{

		//获取标签相关的文章
		public function getLabelInfo($user_name,$p,$index,$type=false)
		{
			$first = $p == '' ? 0 : $p;
			$offset = $index == '' ? 6 : $index;
			if($type==true)
			{
				$where['label_name'] = array('like',$user_name.'%');
				$label_list = $this->where($where)->getField('id',0);
			}else{
                $label_list = $this->order('rand()')->limit(1)->getField('id',0);
			}

            if($label_list!='')
            {
                $lab_li = D('LabelArticle')->where(array('label_id'=>array('IN',$label_list)))
                ->field('distinct article_id')->select();

                $new_list = array();

                foreach($lab_li as $value)
                {
                    $new_list[] = $value['article_id'];
                }

                $arr_list = array();

                $list = D('Article')->where(array('id'=>array('IN',$new_list)))->limit($first,$offset)
                ->order('create_time desc')->select();

                $Users = D('Users');

                $ContentPraise = D('ContentPraise');

                foreach($list as $key=>$value)
                {
                    $arr_list[$key]['user_info'] = $Users->where(array('u.id'=>$value['user_id']))
                        ->table('app_users as u')->join('app_city as c on c.id = u.city_id')
                        ->field('u.id,u.nickname,u.head_img,c.title')->find();

                    $arr_list[$key]['content'] = $value;

                    parent::public_file_dir($arr_list[$key],array('head_img','article_img'));

                    $arr_list[$key]['content']['time'] = date('Y-m-d H:i:s',$value['create_time']);

                    $arr_list[$key]['content']['list_num'] = $ContentPraise->where(array('article_id'=>$value['id']))->count();
                }

			    return $arr_list;
            }else{
                return '';
            }
		}

        //上传标签
        public function get_tagnames($name)
        {
            $where['label_name'] = $name;
            $val = $this->where($where)->find();
            if($val!='')
            {
                return $val;
            }else{
                $insert_id = $this->add($where);
                return array('id'=>$insert_id,'label_name'=>$name,'is_hot'=>0);
            }
        }


	}