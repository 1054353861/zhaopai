<?php
/**
 * 文章管理
 */
class ArticleAction extends AdminBaseAction {
  	
	//控制器说明
	private $module_name = '文章管理';
	
	//初始化数据库连接
	protected  $db = array(
        'Article' => 'Article',
	    'PushLog'=>'PushLog',
        'LabelArticle'=>'LabelArticle',
        'Attention' => 'Attention',
        'ContentPraise' => 'ContentPraise',
        'Comment' => 'Comment',
        'Collection' => 'Collection',
        'ArticleReport' => 'ArticleReport',
        'ArticleBehaviorLog' => 'ArticleBehaviorLog'
	);
	
	//文章禁用状态
	private $article_status;

	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		$this->_init_data();
	}
	
	private function _init_data () {
	   parent::global_tpl_view(array('module_name'=>$this->module_name));
	   
	   $this->article_status = C('ARTICLE_STATUS');
	}
	
    public function index_report () {
        $result = array();
      
        $where = array();
        $this->_get('or')=='is_report' ? $where['is_report'] = array('gt',0) : $where['is_report'] = array('eq',0);
        //分页
        $db_result = $this->db['Article']->getListHtml($where,'*',500,'id DESC');
        
	    $result['list'] = $db_result['list'];
        $result['page_html'] = $db_result['page_html'];
        
	    parent::global_tpl_view( array(
	        'action_name'=> $this->_get('or')=='is_report' ? '举报列表' : '文章列表',
	        'title_name'=> $this->_get('or')=='is_report' ? '举报列表' : '文章列表'
	    ));
	     
	    parent::data_to_view($result);
	    $this->display();
	}

	
	public function edit () {
	    $result = array();
	   
	    $Article = $this->db['Article'];
	    $act = $this->_get('act');
	    $id = $this->_get('id');
	    
	    if ($act == 'add') {
	        if ($this->isPost()) {
	            $Article->create();
	            $Article->add() ? $this->success('添加成功') : $this->error('添加失败请稍后再试！');
	            exit;
	        }
	    } else if ($act == 'update') {
	        if ($this->isPost()) {

	            $Article->create();
	            $update_status = $Article->save_one_data(array('id'=>$id));
	            if ($update_status == true) {
	                
	                $result = $Article->get_one_data(array('id'=>$id));
	                $push_content = $this->_post('push_content');
	                
	                //记录推送记录
	                $this->db['PushLog']->add_log(1,$push_content,$result['user_id']);
	                //推送给用户
	                $this->push_user($result['user_id'],$push_content);
	                
	                $this->success('操作成功！');
	            } else {
	                $this->error('请换个状态！');
	            }
	            exit;
	        } 
	        
	        $result = $Article->get_one_data(array('id'=>$id));

	    } else if ($act == 'delete') {

            if($Article->delete_real(array('id'=>$id)))
            {
                $this->db['Comment']->where(array('article_id'=>$id))->delete();
                $this->db['ContentPraise']->where(array('article_id'=>$id))->delete();
                $this->db['LabelArticle']->where(array('article_id'=>$id))->delete();
                $this->db['Attention']->where(array('attention_id'=>$id))->delete();
                $this->db['Collection']->where(array('article_coll_id'=>$id))->delete();
                $this->db['ArticleReport']->where(array('article_id'=>$id))->delete();
                $this->db['ArticleBehaviorLog']->where(array('article_id'=>$id))->delete();
                $this->success('删除成功');
            }else{
                $this->error('删除失败请稍后再试！');
            }
	        exit;
	    } 
	    
	    
	    parent::data_to_view(array(
	        'article_status' => $this->article_status,
	    ));
	    
	    parent::global_tpl_view( array(
	        'action_name'=>'驳回编辑',
	        'title_name'=>'驳回编辑',
	    ));
	    
	    parent::data_to_view($result);
	    $this->display();
	}
	
	
	
}