<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Forum extends CI_Controller{

	function __construct(){
		parent::__construct();
        
		$this->load->model('Forum_model');
		$this->load->helper('form');
		$this->load->library("pagination");
		$this->load->helper('url');
		$this->load->library('custom_function');
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



			$this->load->view('forum/forum',$data);
	}

	public function add(){
		$results = 0;
		if ($this->input->is_ajax_request()) {
		    $data['custID']        = $this->input->post('custID');
            $data['titleQue']    = $this->input->post('titleQue');
            $data['bodyQue']         = $this->input->post('bodyQue');
            $data['category']     = $this->input->post('category');
			$data['privacy']     = $this->input->post('privacy');
			$data['slug']   = url_title($this->input->post('titleQue'), 'dash', TRUE);
		    $results = $this->Forum_model->insert_question($data); 
		   
		}
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
		$id = $this->uri->segment(3);
		$data['titleQue']    =    $this->input->post('titleDis');
        $data['bodyQue']     = $this->input->post('bodyDis');
        $data['privacy']     = $this->input->post('privacy');
        $data['category']     = $this->input->post('categoryEdit');
		$data['slug']   = url_title($this->input->post('titleDis'), 'dash', TRUE);
		$this->Forum_model->update_quo($data,$id);
		redirect('forum');
	   }
	
	
  
	public function update_visableStatus()
	{
		
			 
			 $id = $this->uri->segment(3);
		    if($this->Forum_model->hidden_que_checking($id) == 0)
			{
		     echo $res = $this->Forum_model->makeHiddenQue($id);
		     redirect('forum');
		    }
			else
			{
			   redirect('forum');
			}
			
		   
		   
	}
	

	 
	public function read_thread(){

		 $url = explode('-',$this->uri->segment(3));
		 $id = $url[0];
		 $data['results'] = $this->Forum_model->get_que_by_id($id);
			
			$this->load->view('read_thread',$data);
		
	}
	
	 public function get_search()
	   {
	     
			//$data['titleHead'] = 'Discussions';
			//$data['totalDis'] =    $this->Discussions_model->discussions_total();
			//$data['page_name'] = 'discussions';
			//$data['redirect_page'] = 'discussions';
            $data["all"] = $this->Forum_model->get_search();
			$this->load->view('forum/search_threads',$data);
	   }


    public function display_comments()
    {
        $datas['data']=$this->Forum_model->display_user_comments();
        foreach($datas['data'] as $all)
        {


            echo "<div class='display_comm' style='margin:1px solid blue; color: #5280A7' id='margin' ><p><img src='/uploads/$all->photo' height='25px' width='25px' style='margin-left:1%'><b style='margin-left:1%'>$all->uaDescription;</b></div>";


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

            echo "<div class='display_comm' style='margin:1px solid blue;' id='margin' ><p>";
			
			if(ISSET($all->photo)){
				echo "<img src='/uploads/".$all->photo."' height='25px' width='25px' style='margin-left:1%'>";
			}
			else{
				echo "<img src='/uploads/profile.png' height='25px' width='25px' style='margin-left:1%'>";
			}
						
	echo "<b style='margin-left:1%;color: #3180A7;font-family: sans-serif;'>".$all->uaDescription."</b></div>";
        }


		
		
		
		
    }
		 public function recent_comment_count()
    {
		$forum_id=$this->input->get('id_forum');
		
$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='FORUM' AND `catID`='$forum_id' AND `raAction`='COMMENT' ";
$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
	echo "<button type='button' class='btn btn-success'><span class='glyphicon glyphicon-repeat' style='margin:2px;'></span>".$comment_row[0]['total_comments']." Replys</button>";	
	
	}
	 public function recent_like_count()
    {
		$forum_id=$this->input->get('id_forum');
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='FORUM' AND `catID`='$forum_id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		echo "<button class='pst-lke btn btn-info'>(".$like_row[0]['total_likes'].")<i class='fa fa-thumbs-up' style='padding-right:5px;color:white;' ></i>liked</button>";
		
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

            echo "<div class='display_comm' style='margin:1px solid blue;margin:2%' id='margin' >";
			
			if(ISSET($all->photo)){
				echo "<img src='/uploads/".$all->photo."' height='25px' width='25px' style='margin-left:1%'>";
			}
			else{
				echo "<img src='/uploads/profile.png' height='25px' width='25px' style='margin-left:1%'>";
			}
						
	echo "<i class='bubble' style='margin-left:1%;color: #3180A7;font-family: sans-serif;'>".$all->uaDescription."</i></div>";
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
	
	
}	


?>
