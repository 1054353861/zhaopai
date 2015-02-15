<?php
/**
 * Created by PhpStorm.
 * User: zhuchencong
 * Date: 15/2/12
 * Time: 下午12:45
 */

class LabelArticleModel extends ApiBaseModel
{

    //获取标签ID相关的信息
    public function get_tag_info($tag_id,$p,$index)
    {
        $first = $p !='' ? 0 : $p;
        $offset = $index != '' ? 10 : $index;

        $list = $this->table('app_label_article as a')->where(array('a.label_id'=>$tag_id))
            ->join('app_article as c on c.id = a.article_id')->limit($first * $offset,$offset)
            ->order('c.create_time desc')->select();

        parent::public_file_dir($list,array('article_img'));

        $new_list = array();

        $new_list['all_count'] = $this->where(array('label_id'=>$tag_id))->count();

        if($list!='')
        {

            $ContentPraise = D('ContentPraise');

            $LabelArticle = D('LabelArticle');

            $Users = D('Users');

            $Comment = D('Comment');

            foreach($list as $key=>$value) {

                $new_list['info'][$key]['user_info'] = parent::get_user_info($value['user_id']);

                parent::public_file_dir($list['info'][$key], array('head_img','background_img'));

                $new_list['info'][$key]['photo_info'] = $value;

                $new_list['info'][$key]['photo_info']['photo_time'] = date('Y-m-d H:i:s', $value['create_time']);

                $new_list['info'][$key]['photo_info']['tag_info'] = $LabelArticle->where(array('a.article_id' => $value['id']))
                    ->table('app_label_article as a')->join('app_label as l on l.id = a.label_id')
                    ->field('l.id,l.label_name')->select();

                $new_list['info'][$key]['photo_info']['like_info']['like_num'] = $ContentPraise->where(array('article_id' => $value['id']))
                    ->count();

                $new_list['info'][$key]['photo_info']['like_info']['like_list'] = $ContentPraise->where(array('c.article_id' => $value['id']))
                    ->table('app_content_praise as c')->join('app_users as u on u.id = c.user_praise_id')
                    ->field('u.id,u.head_img')->limit(7)->select();

                parent::public_file_dir($list['info'][$key]['photo_info']['like_info']['like_list'], array('head_img'));

                $new_list['info'][$key]['photo_info']['comment_num'] = $Comment->where(array('article_id' => array('eq', $value['id'])))->count();
            }

            return $new_list;

        }else{
            return '';
        }
    }
}