<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recent_activity extends CI_Controller {

	function __construct(){
		parent::__construct();

 $this->Common_model->checkLogin();
	}
	
	public function index()
	{
	
		$this->load->helper('url');
		$this->load->model('recentactivity_process');
		$this->load->model('Language_model');
                $page='recent_updates';
		$data=array();
                $data['lang'] = $this->Language_model->LangCompatible($page);
		$data['notification_row'] = $this->recentactivity_process->recent();
		$data['select_com'] = $this->recentactivity_process->user_comments();
		$data['user_likes'] = $this->recentactivity_process->user_likes();
		$data['total_comments'] = $this->recentactivity_process->total_comments();
        $data['liked'] = $this->recentactivity_process->liked();
		$data['shared'] = $this->recentactivity_process->shared();
		$data['total_share'] = $this->recentactivity_process->total_share();
		
	$this->load->view('recentactivity',$data);
		
	}
       
	
}