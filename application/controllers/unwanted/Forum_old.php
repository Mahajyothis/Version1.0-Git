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

			$this->load->view('forum',$data);
	}

	public function add(){
		$results = 0;
		if ($this->input->is_ajax_request()) {
		    $data['custID']        = $this->input->post('custID');
            $data['titleQue']    = $this->input->post('titleQue');
            $data['bodyQue']         = $this->input->post('bodyQue');
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
		$data['slug']   = url_title($this->input->post('titleDis'), 'dash', TRUE);
		//print_r($data); exit;
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
		 $data['replays'] = $this->Forum_model->user_comments($id);
		 $data['total_likes'] = $this->Forum_model->user_likes($id); 
		 $data['total_replies'] = $this->Forum_model->total_comments($id);
		 $data['liked'] = $this->Forum_model->liked($id);
			
			
			$this->load->view('read_thread',$data);
		
	}
    //----------------------------------------------------------------------------------------------------------
   

   public function comment_views()
    {

        $data['replays'] = $this->Forum_model->user_more_comments();

        foreach($data['replays'] as $all_comments)
        {


echo "<div class='col-md-12 even chld-cls' id='first0' style='margin-bottom:7px;border: 1px solid green;padding: 1%;width: 82%;background: rgba(8, 93, 8, 0.34)'><span><img src='/uploads/$all_comments->photo'  alt='User Profile' style='width: 5%;float: left;margin-bottom:7px;'/></span>
                                        <p id='recents' style='margin-left: 7%'>$all_comments->uaDescription</p></div>";



        }


    }
    public function comment_views1()
    {
        $data['replays']=$this->Forum_model->user_more_comments1();
        foreach($data['replays'] as $all_comments)
        {


            echo "<div class='col-md-12 even chld-cls' id='first0' style='margin-bottom:7px;border: 1px solid green;padding: 1%;width: 82%;background: rgba(8, 93, 8, 0.34)'><span><img src='/uploads/$all_comments->photo'  alt='User Profile' style='width: 5%;float: left;margin-bottom:7px;'/></span>
                                        <p id='recents' style='margin-left: 7%'>$all_comments->uaDescription</p></div>";



		}
	
	
	
	
	
}}	


?>
