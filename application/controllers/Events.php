<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Common_model->checkLogin();
		$this->load->library('form_validation');
		$this->load->model('events_model');
		$this->load->model('Category_model');
		$this->load->model('Language_model');
	}

	

	public function index($type='all',$offset=1)
	{
		$data = array(
			'title' => 'Events',
			'page_name' => 'events'
		);

		$this->load->library('pagination');
		$per_page = 1; 
		
		if($type == 'all' || is_numeric($type)) {
			$pagination_url = '';
			$config['uri_segment'] = 2; 
			$config['base_url'] = base_url()."events/";
		}
		else{
			$pagination_url = $type.'/';
			$config['uri_segment'] = 3;
			$config['base_url'] = base_url()."events/".$pagination_url;
		}

		$config['total_rows'] 		= $this->events_model->totalEvents($type);
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = $per_page; 
		$config['cur_tag_open'] = '<li class="active"><a href="'.base_url().'events/'.$pagination_url.$config['uri_segment'].'">';
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

		$data['events'] = $this->events_model->getEvents($type,$per_page,$offset);
		$data['DashboardCounts'] = $this->events_model->getEventDashboardCounts();
		$data['categories']	= $this->Category_model->getCategories()->result();
		$this->session->set_userdata('back_url', current_url()); // SET BACK URL TO COME BACK TO SAME PAGE FROM VIEW EVENT
		$data['event_activity'] = $this->events_model->event_activity();
		$data['event_notifi'] = $this->events_model->event_notifi();
		
		$page_name = 'events';
        
               $data['lang'] = $this->Language_model->LangCompatible($page_name);
		
		$this->load->view('events/events',$data);	
	}

	public function add(){

		$data = array(
			'title' => 'Add Event',
			'page_name' => 'add_event',
		);

		$this->form_validation->set_rules('name', 'name','required');
		$this->form_validation->set_rules('description','dscription','required');
		$this->form_validation->set_rules('venue', 'venue', 'required');
		$this->form_validation->set_rules('place', 'place','required');
		//$this->form_validation->set_rules('latitude', 'latitude','');
		//$this->form_validation->set_rules('longitude', 'longitude','');
		$this->form_validation->set_rules('start_date', 'start_date','required');
		//$this->form_validation->set_rules('end_date', 'end_date','');
		$this->form_validation->set_rules('type', 'Type','required');
		//$this->form_validation->set_rules('featured','featured', '');

		if ($this->form_validation->run() == TRUE){
			$q = $this->events_model->addEvent(true);
			if($q === 1){
				$this->session->set_flashdata('flash_message', 'Event Submitted successfully !');
			}	
		}
		else $q['validation_err'] = 'Fields marked with * are mandatory !';
		header("content-type:application/json");
		echo json_encode($q);exit;	
		//redirect('events');
	}

	public function edit($id){
		
		if($id == ""){
			redirect('404');
		}

		$url = explode('-',$id);
		$id = $url[0];

		$event_exist = $this->events_model->event_exist($id,$check_owner=true)->num_rows();
		
		if(!$event_exist){
			redirect('404');
		}
		
		$data = array(
			'title' => 'Edit Event',
			'page_name' => 'edit_event'
		);

		//---EVENT UPDATEION STARTS HERE---//

		$this->form_validation->set_rules('name', 'name','required');
		$this->form_validation->set_rules('description','dscription','required');
		$this->form_validation->set_rules('venue', 'venue', 'required');
		$this->form_validation->set_rules('start_date', 'start_date','required');
		$this->form_validation->set_rules('type', 'Type','required');
		if ($this->form_validation->run() == TRUE){
			$data['up_res'] = $this->events_model->updateEvent($id);
			if($data['up_res'] === 1){
				// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $id,
						'module'	=> 'Event',
						'action'	=> 'update',
						'table'		=> 'events',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //

				$this->session->set_flashdata('flash_message', 'Event updated successfully !');
				redirect('events/view/'.$this->custom_function->create_ViewUrl($id,$this->input->post('name')),'refresh');
			}
		}
		//---EVENT UPDATEION ENDS HERE---//


		$data['event'] = $event = $this->events_model->getEvent($id);	

		$data['event']->end_time = $data['event']->start_time = '';
		if($event->start_date){
			$start_date = explode(' ',$event->start_date);
			$data['event']->start_date = $start_date[0];
			$data['event']->start_time = date("g:i a", strtotime($start_date[1]));
		}
		else $data['event']->start_date = '';

		if($event->end_date != '0000-00-00 00:00:00'){
			$end_date = explode(' ',$event->end_date);
			$data['event']->end_date = $end_date[0];
			$data['event']->end_time = date("g:i a", strtotime($end_date[1]));
		}
		else $data['event']->end_date = '';
		$data['categories']	= $this->Category_model->getCategories()->result();
		
		$page_name = 'events';
        
               $data['lang'] = $this->Language_model->LangCompatible($page_name);
		
		$this->load->view('events/edit',$data);

	}

	public function update(){
		$id = $this->input->post('event_id');
		if($id){
			$this->form_validation->set_rules('name', 'name','required');
			$this->form_validation->set_rules('description','dscription','required');
			$this->form_validation->set_rules('venue', 'venue', 'required');
			$this->form_validation->set_rules('start_date', 'start_date','required');
			$this->form_validation->set_rules('type', 'Type','required');

			if ($this->form_validation->run() == TRUE){
				$q = $this->events_model->updateEvent($id);
				if($q){
					$this->session->set_flashdata('message', 'Event updated successfully !');
					redirect('events','refresh');
				}
				exit;
			}
		}
		else redirect('events','refresh');

	}

	

	public function delete(){

		$id = $this->input->post('event_id');
		$q = $this->events_model->deleteEvent($id);
		if($q){
			redirect('events','refresh');
		}
	}

	public function delete_ajax(){

		/*if(!$this->input->is_ajax_request()){
			die();
		}*/

		$id = $this->input->post('id');
		$publicEvent = $this->input->post('publicEvent');
		$q = $this->events_model->deleteEvent($id,$publicEvent);
		if($q){
			echo json_encode(true);
		}
	}

	public function post_delete(){

		if(!$this->input->is_ajax_request()){
			die();
		}

		$id = $this->input->post('id');
		$q = $this->events_model->deleteEventPost($id);
		if($q){
			echo 1;
		}
		else echo 0;
		exit;
	}

	public function get_post(){
		$results = array();
		if ($this->input->is_ajax_request() && $this->input->post('getPost') && $this->input->post('id')) {
		   $results = $this->events_model->getSinglePost($this->input->post('id'));
		   if(!file_exists(EVENTS.'post/'.$results->file)) $results->postImage = '';
		   
		}
		header("content-type:application/json");
		echo json_encode($results);exit;
	}

	public function upload_status_image(){
		$this->load->library('upload');
		$this->load->library('image_lib');
		if(!empty($_FILES['eventPostImage']))	$up_res = $this->upload_image('eventPostImage',EVENTS.'post/',true);
		else if(!empty($_FILES['eventPostImagePhoto']))	{
			$up_res['image'] = $this->upload_image('eventPostImagePhoto',EVENTS.'post/',true);
			$up_res['comm_id'] = $this->events_model->createPost($up_res['image'],1);
		}
		else if(!empty($_FILES['editEventPostImage']))	{
			$up_res = $this->upload_image('editEventPostImage',EVENTS.'post/',true);
		}
        header("content-type:application/json");
		echo json_encode($up_res);exit;	
	}

	public function post_update(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost')) {
		   $results = $this->events_model->updatePost($this->input->post('id'));
	   		
	   		// ------ CREATE ACTIVITY LOG ------ //
			$this->log_array = array(
					'pid'		=> $this->input->post('id'),
					'module'	=> 'EventPost',
					'action'	=> 'update',
					'table'		=> 'event_posts',
					'comments'	=> ''
				);
			$this->Common_model->create_log($this->log_array);
			/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
		   
		}
		echo $results;exit;
	}

	public function upload_image($field_name,$upload_path,$thumb=false){

		if($_FILES[$field_name]['error'] == 0){
			//upload and update the file
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['max_size'] = '1000'; 
			$config['max_width'] = ''; 
			$config['max_height'] = ''; 
			$config['overwrite'] = false;
			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload($field_name))
			{
				$ret_data['img_error'] = $this->upload->display_errors('', '');
				return $ret_data;
			}
			elseif($thumb)
			{
				
				//Image Resizing
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;				
				$config['new_image'] = $this->upload->upload_path.'thumbs/'.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 270;
				$config['height'] = 250;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){
					$ret_data['img_error'] = $this->upload->display_errors('', '');
					$ret_data['img_error'] = $this->image_lib->display_errors('', '');
				}
				
			}
			if(!empty($ret_data)) return $ret_data;
			return $this->upload->file_name;
		}
	}

	public function delete_image(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('deleteStatusImage') && $this->input->post('image_name')) {
			$img = $this->input->post('image_name');
		   @unlink(EVENTS.'post/'.$img);
		   @unlink(EVENTS.'post/thumbs/'.$img);
		   $results = 1;
		}
		echo $results;exit;
	}

	public function post(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost') && $this->input->post('postContent')) {
		   $results = $this->events_model->createPost();
		   if($results){
		   		// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $results,
						'module'	=> 'EventPost',
						'action'	=> 'create',
						'table'		=> 'event_posts',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
		   }
		   
		}
		echo $results;exit;
	}


	public function view($id){


		if(empty($id)){
			redirect('404');
		}

		$url = explode('-',$id);
		$id = $url[0];

		$event_exist = $this->events_model->event_exist($id,$check_owner=false)->num_rows();
		if(!$event_exist){
			redirect('404');
		}
		
		$data = array(
			'title' => 'View Event',
			'page_name' => 'view_event'
		);

		// ------ CREATE ACTIVITY LOG ------ //
		$this->log_array = array(
				'pid'		=> $id,
				'module'	=> 'Event',
				'action'	=> 'view',
				'table'		=> 'events',
				'comments'	=> ''
			);
		$this->Common_model->create_log($this->log_array);
		/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
	
		$data['event'] = $this->events_model->getEvent($id);
		$data['eventPosts'] = $this->events_model->getEventPosts($id);
		$data['event_status'] = $this->events_model->event_status($id);
		$data['join_users'] = $this->events_model->getUsers($id,'join');
		$data['maybe_users'] = $this->events_model->getUsers($id,'maybe');
		
		$page_name = 'events';
        
               $data['lang'] = $this->Language_model->LangCompatible($page_name);

		$data['ownPage'] = false;
		if($this->session->userdata['profile_data'][0]['custID'] == $data['event']->custID) $data['ownPage'] = true;

		$this->load->view('events/view',$data);

	}
	//--------------------------RohitDutta------------------------------------
	public function null()
	{
	}
	/*
	public function display_comments_event()
	{
		
		$forum_id=$this->input->get('id_event');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC ";
        
		$datas=$this->db->query($qwerty);
		
       
		        foreach($datas->result() as $all)
		        {
		
						echo "<div class='cmnt-area-bottm'>
						<div class='thumbnail' style='float:left; border:none; padding:0'>";
						
						
						if(ISSET($all->photo)){
						
						echo "<img src='/uploads/".$all->photo."' class='pf-img-pst' alt='User Profile'/>";
							
						}else{	
							echo "	<img src='/uploads/profile.png' class='pf-img-pst' alt='User Profile'/>";
							}
						echo "</div>
						<span style='    margin-left: 3%;'>".$all->uaDescription."</span>
					</div>";
         
        		}


	}
	*/
	public function display_comments_event()
	{
		
		$forum_id=$this->input->get('id_event');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC ";
        
		$datas=$this->db->query($qwerty);
		
       
		        foreach($datas->result() as $all)
		        {
		                echo '<div id="subcomment_'.$all->uaID.'">';
						echo "<div class='cmnt-area-bottm'>
						<div class='thumbnail' style='float:left; border:none; padding:0'>";
						
						
						if(ISSET($all->photo)){
						
						echo "<img src='/uploads/".$all->photo."' class='pf-img-pst' alt='User Profile'/>";
							
						}else{	
							echo "	<img src='/uploads/profile.png' class='pf-img-pst' alt='User Profile'/>";
							}
						echo "</div>
						<span id='singlcomment_".$all->uaID."' style='margin-left: 3%;'>".$all->uaDescription."</span>";

              if($this->session->userdata['profile_data'][0]['custID'] ==$all->custID)
              {



                  echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                  echo '<a class="deleteComment" data-p="'.$forum_id.'" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



              }
            else
            {



            }

					echo "</div></div>";
         
        }


	}
	public function delete_single_comment()
    {

        $comment_id = $this->input->post('comment_id');

        $this->Events_model->delete_single_forum_comment($comment_id);



    }
    public function edit_single_comment()
    {


        $comment_id = $this->input->post('comment_id');

        $comment_value = $this->input->post('comment_value');

        $results = $this->Events_model->update_single_forum_comment($comment_id,$comment_value);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }


    public function get_single_comment()
    {


        $comment_id = $this->input->post('comment_id');



        $results = $this->Events_model->get_single_forum_comment($comment_id);

        header("content-type:application/json");
        echo json_encode($results);exit;



    }
	//-----------------------------------------------------------------------
	public function recent_comments()
	{
		
		$forum_id=$this->input->get('id_event');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC ";
        
		$datas=$this->db->query($qwerty);
		
       
		        foreach($datas->result() as $all)
		        {
		                echo '<div id="subcomment_'.$all->uaID.'">';
						echo "<div class='cmnt-area-bottm'>
						<div class='thumbnail' style='float:left; border:none; padding:0'>";
						
						
						if(ISSET($all->photo)){
						
						echo "<img src='/uploads/".$all->photo."' class='pf-img-pst' alt='User Profile'/>";
							
						}else{	
							echo "	<img src='/uploads/profile.png' class='pf-img-pst' alt='User Profile'/>";
							}
						echo "</div>
						<span id='singlcomment_".$all->uaID."' style='margin-left: 3%;'>".$all->uaDescription."</span>";

              if($this->session->userdata['profile_data'][0]['custID'] ==$all->custID)
              {



                  echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                  echo '<a class="deleteComment" data-p="<?php echo $result->->id;?>" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



              }
            else
            {



            }

					echo "</div></div>";
         
        }


	}
	
	
	
	
	public function recent_comments_event()
    {
		$forum_id=$this->input->get('id_event');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC 4";
        
		$datas=$this->db->query($qwerty);
		
       
		        foreach($datas->result() as $all)
		        {
		                echo '<div id="subcomment_'.$all->uaID.'">';
						echo "<div class='cmnt-area-bottm'>
						<div class='thumbnail' style='float:left; border:none; padding:0'>";
						
						
						if(ISSET($all->photo)){
						
						echo "<img src='/uploads/".$all->photo."' class='pf-img-pst' alt='User Profile'/>";
							
						}else{	
							echo "	<img src='/uploads/profile.png' class='pf-img-pst' alt='User Profile'/>";
							}
						echo "</div>
						<span id='singlcomment_".$all->uaID."' style='margin-left: 3%;'>".$all->uaDescription."</span>";

              if($this->session->userdata['profile_data'][0]['custID'] ==$all->custID)
              {



                  echo '<a  class="editComment" data-commentid="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal" data-commentonly="'.$all->uaDescription.'"  data-target="#editComment"  ><span class="icn-spce-grp"><i class="fa fa-pencil-square-o" style="color:darkgreen"></i></span></a>';

                  echo '<a class="deleteComment" data-p="<?php echo $result->->id;?>" data-comment="'.$all->uaID.'" href="javascript:void(0)" data-toggle="modal"  data-target="#deleteComment" ><span class="icn-spce-grp"><i class="fa fa-trash-o" style="color:darkred"></i></span></a>';



              }
            else
            {



            }

					echo "</div></div>";
         
        }
    }
		 public function recent_comment_count_event()
    {
		$forum_id=$this->input->get('id_event');
		
//$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";

$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='EVENT' AND `catID`='$forum_id'";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	public function recent_comment_count()
    {
		$forum_id=$this->input->get('id_post');
		
$comment_count="SELECT COUNT(`uaID`) AS `total_comments` FROM `useraction` WHERE `uaCategory`='GROUP' AND `catID`='$forum_id'";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	//-----------------------------------------------------------------------
	


	






}

/* End of file events.php */
/* Location: ./application/controllers/events.php */