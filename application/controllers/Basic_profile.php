<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_profile extends CI_Controller {

	
	public function index()
	{
	
		$this->load->model('Basicprofile_process');
		$this->load->model('Language_model');
      	        $page='maha_basicprofile';
		$data=array();
		$data['user_row']=$this->Basicprofile_process->getUserData();
		$this->Basicprofile_process->update_views();
		$data['totalcircles'] = $this->Basicprofile_process->totalcircles();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('basicprofile',$data);
		
	}
       
	
}