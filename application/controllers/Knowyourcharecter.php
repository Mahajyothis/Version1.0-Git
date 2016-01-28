<?php

class Knowyourcharecter extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            
           $this->load->helper('url');

      }

      public function Know()
      {
        $this->load->model('Language_model');
        $page='know_your_charecter';
	$data=array();
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
        $this->load->view('knowyourcharecter',$data);
    
            
   }    
   public function charecter_result(){
        $this->load->model('Language_model');
        $this->load->model('charecter_process');
        $page='know_your_charecter';
	$data=array();
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$data['kyc'] = $this->charecter_process->index();
        $this->load->view('knowyourcharecter_result',$data);
   
   }
}