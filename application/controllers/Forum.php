<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Forum extends CI_Controller{

	function __construct(){
		parent::__construct();
                 if(!$this->session->userdata('profile_data')) redirect('');
		$this->load->model('Forum_model');
		$this->load->helper('form');
		$this->load->library("pagination");
		$this->Common_model->checkLogin();
		 $this->load->model('Language_model');
		
	    }

	        public function index(){
	
	         $config = array();
             $config["base_url"] = base_url() . "forum/index";
             $config["total_rows"] = $this->Forum_model->questions_total();
             $config["per_page"] = 5;
             $config["uri_segment"] = 3;
		     $config['full_tag_open'] = '<li>';
			 $config['full_tag_close'] = '</li>';

             $this->pagination->initialize($config);

			 $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

             $data["results"] = $this->Forum_model->get_questions($config["per_page"], $page);
             $data["links"] = $this->pagination->create_links();
             
              $page_name = 'forum';
              
        	
        	$data['lang'] = $this->Language_model->LangCompatible($page_name);
		//$data['title'] = $data['lang']['groups']; 
		
		if(MOBILE_SITE) 
			{
				
				$data['logo_login_part'] = $this->load->view('modules/logo-login',$data,TRUE);
				$this->load->view('modules/header',$data);
				$this->load->view('forum/forum');
				$this->load->view('modules/footer',$data);
				
				
			}
			 
		

			else $this->load->view('forum/forum',$data);
	}

	public function add(){
		$results = 0;
		if ($this->input->is_ajax_request()) {
		    $data['custID']        = $this->input->post('custID');
            $data['titleQue']    = trim($this->input->post('titleQue'));
            $data['bodyQue']         = trim($this->input->post('bodyQue'));
            $data['category']     = $this->input->post('category');
             $data['dDate']   = date("Y-m-d H:i:s");
			$data['privacy']     = $this->input->post('privacy');
			$data['slug']   = url_title($this->input->post('titleQue'), 'dash', TRUE);
		    $results = $this->Forum_model->insert_question($data); 
		   
		}
		
		 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $results,
		'module'	=> 'Forum',
		'action'	=> 'Create new question',
		'table'	=> 'mahaforum',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
		
		
		
		echo $results;exit;
	}
	
	     public function delete()
	    {
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('id')) 
		     {
		        $results = $this->Forum_model->delete_question($this->input->post('id'));
				
		     }
		echo $results;exit;
	   }
	
	
	
	    public function update()
	    {
		$id = $this->input->post('id');
		$data['titleQue']    =    trim($this->input->post('titleQue'));
        $data['bodyQue']     = trim($this->input->post('bodyQue'));
        $data['privacy']     = $this->input->post('privacy');
        $data['category']     = $this->input->post('category');
		$data['slug']   = url_title($this->input->post('titleQue'), 'dash', TRUE);
		$res = $this->Forum_model->update_quo($data,$id);
		
		echo $res;
		
		//redirect('forum');
	   }
	
	
  
	public function update_visableStatus()
	{
		
			 
			$id = $this->input->post('id');
			
		    if($this->Forum_model->hidden_que_checking($id) == 0)
			{
		      $res = $this->Forum_model->makeHiddenQue($id);
		      echo $res;
		    }
			
			
			
		   
		   
	}
	
	
	public function getOnethread(){

		
		 $id = $this->input->post('id');
		 
		 $results = $this->Forum_model->get_que_by_id($id);
			
	    header("content-type:application/json");
		echo json_encode($results);exit;
			
		//	$this->load->view('read_thread',$data);
		
	}

	
	 
	public function read_thread(){

		 $url = explode('-',$this->uri->segment(3));
		 $id = $url[0];
		 
		 /* Create activity log */
		$this->log_array = array(
		'pid'	=> $id,
		'module'	=> 'Forum',
		'action'	=> 'Read thread',
		'table'	=> 'mahaforum',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
		 
		 
		 
		 
		 $data['results'] = $this->Forum_model->get_que_by_id($id);
			
			$this->load->view('read_thread',$data);
		
	}
	
	 public function search()
	   {
	     
			
			$page_name = 'forum';
        
                      $data['lang'] = $this->Language_model->LangCompatible($page_name);
                        $data["all"] = $this->Forum_model->get_search();
			$this->load->view('forum/search_threads',$data);
	   }


    public function display_comments()
    {
	$postid = $this->input->get('postid');
        $datas['data']=$this->Forum_model->display_user_comments();
        foreach($datas['data'] as $all)
        {




echo "<div id='singlecomment_".$all->uaID."' class='x'><div class='display_comm' style='min-height:45px;' id='margin' ><p>";
			
			if(ISSET($all->photo)){
				echo "<img  src='/uploads/".$all->photo."' height='40px' width='40px' style=' border: 1px solid #CABFBF;padding: 3px;border-radius: 5px;float: left;margin-top:0.15%;'>";
			}
			else{
				echo "<img  src='/uploads/profile.png' height='40px' width='40px' style=' border: 1px solid #CABFBF;padding: 3px;border-radius: 5px;float: left;margin-top:0.15%;'>";
			}
						
echo "<p id='singlcomment_".$all->uaID."' style='margin-left:5%;margin-bottom: 3%; white-space: pre-wrap;  white-space: -moz-pre-wrap; white-space: -pre-wrap;white-space: -o-pre-wrap;  word-wrap: break-word; width:60%;border-radius: 5px;padding:10px;border:1px solid #ccc; font-family: sans-serif;color: #3180A7;min-height:45px;'>".$all->uaDescription."</p>";
if($this->session->userdata['profile_data'][0]['custID'] == $all->custID)
{
	 echo "<div class='ed'><a href='#deleteComment' data-toggle='modal' data-q='".$postid."'  data-comment='".$all->uaID."'  data-target='#deleteComment' class='deleteComment'><img src='http://version.mahajyothis.net/assets/forum_n/images/delete.png' width='15' height='15' alt=''></a>
<a href='#editComment' data-toggle='modal' data-commentid='".$all->uaID."'  data-commentonly='".$all->uaDescription."'  data-target='#editComment' class='editComment'>
    <img src='http://version.mahajyothis.net/assets/forum_n/images/edit.png' width='15' height='15' alt=''></a></p>
    </div>";


        }
        else if($this->session->userdata['profile_data'][0]['custID'] == $all->uID)
        {
        	echo "<div class='ed'><a href='#deleteComment' data-toggle='modal' data-q='".$postid."'  data-comment='".$all->uaID."'  data-target='#deleteComment' class='deleteComment'><img src='http://version.mahajyothis.net/assets/forum_n/images/delete.png' width='15' height='15' alt=''></a>
    </div>";
        }
        echo "</div></div>";
         
       
        
       } 

    }
	 public function recent_comments()
    {
		$forum_id=$this->input->get('id_forum');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='FORUM' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC LIMIT 4 ";




        $datas=$this->db->query($qwerty);

       
        foreach($datas->result() as $all)
        {

            echo "<div id='singlecomment_".$all->uaID."' class='x'><div class='display_comm'  id='margin' ><p>";
			
			if(ISSET($all->photo)){
				echo "<img  src='/uploads/".$all->photo."' height='40px' width='40px' style=' border: 1px solid #CABFBF;padding: 3px;border-radius: 5px;float: left;margin-top:0.15%;'>";
			}
			else{
				echo "<img  src='/uploads/profile.png' height='40px' width='40px' style=' border: 1px solid #CABFBF;padding: 3px;border-radius: 5px;float: left;margin-top:0.15%;'>";
			}
					
echo "<p id='singlcomment_".$all->uaID."' style='margin-left:5%; margin-bottom: 3%; white-space: pre-wrap;  white-space: -moz-pre-wrap; white-space: -pre-wrap;white-space: -o-pre-wrap;  word-wrap: break-word; width:60%;border-radius: 5px;padding:10px;border:1px solid #ccc; font-family: sans-serif;color: #3180A7;min-height:45px;'>".$all->uaDescription."</p>";
if($this->session->userdata['profile_data'][0]['custID'] == $all->custID)

{	
echo "<div class='ed'><a href='#deleteComment'  data-toggle='modal' data-q='$forum_id'  data-comment='".$all->uaID."'  data-target='#deleteComment' class='deleteComment'><img src='http://version.mahajyothis.net/assets/forum_n/images/delete.png' width='10' height='10' alt=''></a>
<a href='#editComment' data-toggle='modal' data-commentid='".$all->uaID."'  data-commentonly='".$all->uaDescription."'  data-target='#editComment' class='editComment'>
    <img src='http://version.mahajyothis.net/assets/forum_n/images/edit.png' width='10' height='10' alt=''></a></p>
    </div>";
	
	}
	else if($this->session->userdata['profile_data'][0]['custID'] == $all->uID)
	
        {
        	echo "<a href='#deleteComment'  data-toggle='modal' data-q='".$forum_id."'  data-comment='".$all->uaID."'  data-target='#deleteComment' class='deleteComment1'><img src='http://version.mahajyothis.net/assets/forum_n/images/delete.png' width='10' height='10' alt=''></a>";
        }
        echo "</div></div>";
	
        }
        


		
		
		
		
    }
		 /*
		 public function recent_comment_count()
    {
		$forum_id=$this->input->get('id_forum');
		
$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='FORUM' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo "<button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-repeat' style='margin:2px;'></span>".$comment_row[0]['total_comments']."</button>";	
	
	}
	*/
	
	public function recent_comment_count()
    	{
    	        $page_name = 'forum';
        
        $data['lang'] = $this->Language_model->LangCompatible($page_name);
    	        
		$forum_id=$this->input->get('id_forum');
		
		$comment_count="SELECT count(uaID) as total_comments FROM `useraction` WHERE `catID` = '$forum_id'  and `uaCategory`='FORUM' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		
	echo "<button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-repeat' style='margin:2px;'></span>&nbsp;".$comment_row[0]['total_comments']." ".$data['lang']['replies']."</button>";	
	
	}
	
	 public function recent_like_count()
    {
		$forum_id=$this->input->get('id_forum');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='FORUM' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}
	
	 public function recent_comments_article()
    {
		$forum_id=$this->input->get('id_article');
		
		
		$qwerty = "SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='ARTICLE' AND ua.`catID`='$forum_id' ORDER BY ua.`uaID` DESC LIMIT 4 ";
        
		$datas=$this->db->query($qwerty);
		
       
        foreach($datas->result() as $all)
        {

            echo "<div class='display_comm' style='margin-bottom: 1%;text-align: justify; border: 1px solid #95959A;border-radius: 8px;padding: 1%;box-shadow: 1px 0px 0px -5px;' id='margin' >";
			
			if(ISSET($all->photo)){
				echo "<img src='/uploads/".$all->photo."' height='25px' width='25px' style='margin-left:1%'>";
			}
			else{
				echo "<img src='/uploads/profile.png' height='25px' width='25px' style='margin-left:1%'>";
			}
						
	echo "<i style='margin-left:1%;color: #3180A7;font-family: sans-serif;line-height: 3.42857;'>".$all->uaDescription."</i></div>";
        }


		
		
		
		
    }
		 public function recent_comment_count_article()
    {
		$forum_id=$this->input->get('id_article');
		
$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='ARTICLE' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo $comment_row[0]['total_comments'];	
	
	}
	 public function recent_like_count_article()
    {
		$forum_id=$this->input->get('id_article');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='ARTICLE' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo $like_row[0]['total_likes'];
		
	}
	
	//-----------------------------RohitDutta-------------------------------
	public function null()
    	{

    	}
    	public function delete_single_comment()
    	{
    	
		$comment_id = $this->input->post('comment_id');
		
                $this->Forum_model->delete_single_forum_comment($comment_id);
                
				
		 
    	}
    	
    	public function delete_single_comment1()
    	{
    	
		$comment_id = $this->input->post('comment_id');
		
                $this->Forum_model->delete_single_forum_comment1($comment_id);
                
				
		 
    	}
    	
    	
    	public function edit_single_comment()
    	{
    	
		
		$comment_id = $this->input->post('comment_id');
		
		$comment_value = $this->input->post('comment_value');
		
                $results = $this->Forum_model->update_single_forum_comment($comment_id,$comment_value);
                
                header("content-type:application/json");
		echo json_encode($results);exit;
                
				
		 
    	}
    	
    	
    		public function get_single_comment()
    	{
    	
		
		$comment_id = $this->input->post('comment_id');
		
		
		
                $results = $this->Forum_model->get_single_forum_comment($comment_id);
                
                header("content-type:application/json");
		echo json_encode($results);exit;
                
				
		 
    	}
    	//----------------------------------------------------------------------

	
	
}	


?>