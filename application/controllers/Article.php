<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->Common_model->checkLogin();
		$this->load->model('Article_model');
		$this->load->model('Category_model');
		$this->comment_limit = 4;
		$this->site_url = base_url();
		if(MOBILE_SITE) $this->site_url = $this->config->item('mobile_url');
	}

	
	public function index($type='',$id='',$offset=1)
	{
		
		$data = array(
			'title' => 'Articles',
			'page_name' => 'articles'
		);

		/* Pagination starts here */ 

		$this->load->library('pagination');
		$per_page = 8; 
		
		if($type == '' || is_numeric($type)) {
			$pagination_url = '';
			$config['uri_segment'] = 2; 
			$config['base_url'] = $this->site_url."article/";
		}
		elseif($type == 'category'){
			if(empty($id)) redirect('article');
			$pagination_url = $type.'/'.$id.'/';
			$url = explode('-',$id);
			$data['category_id'] = $id = $url[0]; // stored in data array to give active class for li tag
			$config['uri_segment'] = 4;
			$config['base_url'] = $this->site_url."article/".$pagination_url;
		}
		else{
			$pagination_url = $type.'/';
			$config['uri_segment'] = 3;
			$config['base_url'] = $this->site_url."article/".$pagination_url;
		}
		$config['total_rows'] 		= $this->Article_model->totalArticles($type,$id);
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = $per_page; 
		$config['cur_tag_open'] = '<li class="active"><a href="'.$this->site_url.'article/'.$pagination_url.$config['uri_segment'].'">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['suffix'] = '';
        if (isset($_GET) && $_GET) {
            $config['suffix'] = '?';
            foreach ($_GET as $key => $val) {
                $config['suffix'] .= $key . '=' . $val . '&';
            }
            $config['suffix'] = substr($config['suffix'], 0, -1);
        }
		if($offset){
			$offset = ($offset-1)*$per_page;
		}
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		/* Pagination ends here */
		
		$data['results'] = $this->Article_model->get_categorised_article($type,$id,$per_page,$offset);
		$data['categories'] = $this->Category_model->getCategories()->result();
		$data['saved_articles'] = $this->Article_model->check_draft();
		$data['category_type'] = $type;
		$this->session->set_userdata('back_url', current_url()); // SET BACK URL TO COME BACK TO SAME PAGE FROM VIEW ARTICLE
		//Language
		$this->load->model('Language_model');
		$page='article';
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		// Views
		if(MOBILE_SITE) {
			$data['logo_login_part'] = $this->load->view('modules/logo-login',$data,TRUE);
			$this->load->view('modules/header',$data);
			$this->load->view('article/article',$data);
			$this->load->view('modules/footer',$data);
		}
		else {
			$data['menuIcons'] = $this->load->view('article/modules/menuIcons',$data,TRUE);
			$data['menuCategories'] = $this->load->view('article/modules/menuCategories',$data,TRUE);
			$data['createArticlePopup'] = $this->load->view('article/modules/createArticlePopup','',TRUE);
			$this->load->view('article/article',$data);
		}
		
	}

	public function publish()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('artTitle', 'Title','required');
		$this->form_validation->set_rules('artSummary','Summary','required');
		$this->form_validation->set_rules('artDesc','Description','required');

		if ($this->form_validation->run() == TRUE){

			$data['up_res'] = $this->Article_model->create_article();
			if($data['up_res'] === 1){
				if($this->input->post('doPublish')) $this->session->set_flashdata('flash_message', 'Article Submitted successfully !');
				else if($this->input->post('doSaveDraft')) $this->session->set_flashdata('flash_message', 'Article saved to draft successfully !');
				redirect('article');
			}
		}
		//Language
		$this->load->model('Language_model');
		$page='article';
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		//
		$data['categories']	= $this->Category_model->getCategories()->result();
		$this->load->view('article/article_publish',$data);
	}

	public function edit($id='')
	{
		$this->load->model('Language_model');
		$page ='article';
		$lang = $this->Language_model->LangCompatible($page,$lang="");
		
		$data = array(
			'title' => 'Edit Articles',
			'page_name' => 'article_edit'
		);

		if(empty($id)) {
			show_404();
			exit;
		}

		$url = explode('-',$id);
		$id = $url[0];


		$this->load->library('form_validation');
		$this->form_validation->set_rules('artTitle', 'Title','required');
		$this->form_validation->set_rules('artSummary','Summary','required');
		$this->form_validation->set_rules('artDesc','Description','required');

		if ($this->form_validation->run() == TRUE){

			/* Create activity log */
			$this->log_array = array(
					'pid'		=> $id,
					'module'	=> 'Article',
					'action'	=> 'update',
					'table'		=> 'article',
					'comments'	=> ''
				);
			$this->Common_model->create_log($this->log_array);
			/* Create activity log ends */

			$data['up_res'] = $this->Article_model->edit_article($id);
			if($data['up_res'] === 1){
				if($this->input->post('doPublish')) $this->session->set_flashdata('flash_message', $lang['update_message'].'!');
				redirect('article');
			}
		}

		$data['result'] = $this->Article_model->get_article($id,$check_owner=true);
		if(empty($data['result'])) show_404();
		else {
			$data['title'] = $data['result']->artTitle;
			$data['categories']	= $this->Category_model->getCategories()->result();
			//Language
		$this->load->model('Language_model');
		$page='article';
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		//
			$this->load->view('article/article_edit',$data);
		}
	}

	public function view($id='')
	{
		$data = array(
			'title' => 'Edit Articles',
			'page_name' => 'article_view'
		);

		if(empty($id)) {
			show_404();
			exit;
		}

		$url = explode('-',$id);
		$id = $url[0];

		$data['results'] = $this->Article_model->get_article($id,false,true);
		if(empty($data['results'])) show_404();
		else {
			$data['title'] = $data['results']->artTitle;
			$data['saved_articles'] = $this->Article_model->check_draft();
			$data['categories']	= $this->Category_model->getCategories()->result();
			$data['category_type'] = $data['results']->artCategory;
			$data['comment_limit'] = $this->comment_limit;
			$data['total_comments'] = $this->Article_model->view_total_comments($id);
			if($data['total_comments']){
				$data['comments']	= $this->Article_model->view_comments($id,'',$this->comment_limit)->result();
			}
			
			/* Create activity log */
			$this->log_array = array(
					'pid'		=> $id,
					'module'	=> 'Article',
					'action'	=> 'view',
					'table'		=> 'article',
					'comments'	=> ''
				);
			$this->Common_model->create_log($this->log_array);
			/* Create activity log ends */
			//Language
			$this->load->model('Language_model');
			$page='article';
			$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");

			// Views
			$data['menuIcons'] = $this->load->view('article/modules/menuIcons',$data,TRUE);
			$data['menuCategories'] = $this->load->view('article/modules/menuCategories',$data,TRUE);
			$data['createArticlePopup'] = $this->load->view('article/modules/createArticlePopup','',TRUE);
			$data['deletePopup'] = $this->load->view('article/modules/deletePopup','',TRUE);
			
			//
			$this->load->view('article/view',$data);
		}
	}

	public function categorised_article(){
		if ($this->input->is_ajax_request() && $this->input->post('getArticles') && $this->input->post('article_type')) {
		   $results = $this->Article_model->get_categorised_article($this->input->post('article_type'));
		   header("content-type:application/json");
		   echo json_encode($results);exit;
		}
	}

	public function article_content(){
		if ($this->input->is_ajax_request() && $this->input->post('getArticle') && $this->input->post('article_id')) {
		   $results = $this->Article_model->get_article($this->input->post('article_id'));
		   $results->editArticle = $results->deleteArticle = '';
		   if($results && $results->artCustID == $this->session->userdata['profile_data'][0]['custID']){
		   		$results->editArticle = '<a href="'.$this->site_url.'article/edit/'.$this->custom_function->create_ViewUrl($results->artID,$results->artTitle).'"><img src="'.$this->site_url.IMAGES.'events/edit.png'.'" class="edit-icon"></a>'; 
		   		$results->deleteArticle = '<a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="deleteConfirmation"  id="deleteConfirmation"><img src="'.$this->site_url.IMAGES.'events/trash.png'.'" class="trash-icon"></a>'; 
		   } 
		   header("content-type:application/json");
		   echo json_encode($results);exit;
		}
	}

	public function delete(){

		$q = $this->Article_model->deleteArticle($this->input->post('article_id'));
		/* Create activity log */
		$this->log_array = array(
				'pid'		=> $this->input->post('article_id'),
				'module'	=> 'Article',
				'action'	=> 'delete',
				'table'		=> 'article',
				'comments'	=> ''
			);
		$this->Common_model->create_log($this->log_array);
		/* Create activity log ends */

		$this->session->set_flashdata('flash_message', 'Article removed successfully !');
		redirect('article');

	}

	public function delete_ajax(){

		if(!$this->input->is_ajax_request()){
			die();
		}
		$q = $this->Article_model->deleteArticle($this->input->post('id'));
		if($q){
			echo json_encode(1);
		}
	}

	public function recent_comments() {

		$forum_id=$this->input->get('id_article');

		$qwerty = "SELECT * FROM `useraction` ua
			LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			WHERE ua.`uaCategory`='ARTICLE' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC LIMIT 4 ";
		$datas=$this->db->query($qwerty);

		foreach($datas->result() as $all) {
			echo "<div class='display_comm' style='margin:1px solid blue;' id='margin' ><p>";
			if(ISSET($all->photo)) {
				echo "<img src='/uploads/".$all->photo."' height='25px' width='25px' style='margin-left:1%'>";
			} else {
				echo "<img src='/uploads/profile.png' height='25px' width='25px' style='margin-left:1%'>";
			}
			echo "<b style='margin-left:1%;color: #3180A7;font-family: sans-serif;'>".$all->uaDescription."</b></div>";
		}
	}
	
	public function recent_comment_count() {
		$forum_id=$this->input->get('id_article');
		$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='ARTICLE' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		echo "<button type='button' class='btn btn-success'><span class='glyphicon glyphicon-repeat' style='margin:2px;'></span>".$comment_row[0]['total_comments']." Replys</button>";
	}

	public function recent_like_count() {
		$forum_id=$this->input->get('id_article');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='ARTICLE' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		echo "<button class='pst-lke btn btn-info'>(".$like_row[0]['total_likes'].")<i class='fa fa-thumbs-up' style='padding-right:5px;color:white;' ></i>liked</button>";
	}

    public function display_more_article_comments() {
		$data['view_comments']	= $this->Article_model->view_comments();
		foreach($data['view_comments'] as $all_comments) {
			//echo $all_comments->uaDescription."<br>";
			echo "<div id='dd_cc' class='coment_display' style='margin:3%;margin-bottom: 1%;text-align: justify;border: 1px solid #95959A;border-radius: 0px;padding: 1%; box-shadow: 1px 0px 0px -5px;padding: 3%'><img src='/uploads/$all_comments->photo' style='width:30px;float:left'><i class='bubble' style='margin-left:2%;font-weight: bolder;color:#3180A7'>$all_comments->uaDescription;</i></div>";
		}
	}

	public function five_comments() {
		$query = $this->db->query("SELECT count(*)  FROM `useraction` WHERE `catID` = 6 AND `uaCategory` LIKE 'ARTICLE'");
	}

	public function recent_comments_article($articleId,$commentLastId = '')
    {
    	$final_result['results'] = '';
        	$comments	= $this->Article_model->view_comments($articleId,$commentLastId,$this->comment_limit)->result();
        	$this->load->model('Language_model');
		$page='article';
		$lang = $this->Language_model->LangCompatible($page,$lang="");
        	if($comments){

	        	foreach($comments as $key => $value)
	            {
	                $edit_delete = '';
        		
	                if($this->session->userdata['profile_data'][0]['custID'] == $value->custID){
	                	$edit_delete = '<span class="glyphicon glyphicon-edit edit-comment" title="'.$lang['edit'].'"></span>
                                       	<span class="glyphicon glyphicon-trash trash-comment" title="'.$lang['delete'].'"></span>';
	                }
	                $final_result['results'] .=  '<div id="'.$value->uaID.'" class="coment_single" >
									                <a href="'.$this->site_url."basicprofile/?uid=".$value->custID.'">
									                	<img class="pro_art_new" src="'.$this->site_url.UPLOADS.$value->photo.'" >
									                </a>
									                <div class="com_art_new">
										                <a href="'.$this->site_url."basicprofile/?uid=".$value->custID.'">
										                	<b>'.ucwords($value->perdataFullName).':</b>
										                </a>
										                <p>'.$value->uaDescription.'</p>
									                </div>
									                '.$edit_delete.'
									             </div>';
	            }
	            $final_result['rem_cmts'] = $this->Article_model->view_total_comments($articleId,$commentLastId);
	            $final_result['rem_cmts'] -= $this->comment_limit;
	            if($final_result['rem_cmts'] < 0) $final_result['rem_cmts'] = 0; 
        	}
        else $final_result['rem_cmts'] = 0; 
        echo json_encode($final_result);exit;
        


    }

    public function update_comment()
    {
    	if($this->input->post('id') && $this->input->post('editComment')){
    		if($this->Article_model->update_comment()) {
    			// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $this->input->post('id'),
						'module'	=> 'Article Comment',
						'action'	=> 'update',
						'table'		=> 'useraction',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //

    			echo 1;
    		}
    	}   
    	else echo 0;
    	exit;

    }

    public function delete_comment()
    {
    	if($this->input->post('id') && $this->input->post('trashComment')){
    		if($this->Article_model->delete_comment()) {
    			// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $this->input->post('id'),
						'module'	=> 'Article Delete',
						'action'	=> 'delete',
						'table'		=> 'useraction',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
    			echo 1;
    		}
    	}   
    	else echo 0;
    	exit;

    }
       
	
}