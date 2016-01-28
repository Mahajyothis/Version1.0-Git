<?php

class Friend extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            
           $this->load->helper('url');
      }

      public function index()
      {
      $this->load->model('Language_model');
        $page='friendshipmeter';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
                $this->load->view('friendship',$data);
    
            
   }    
   public function friendship_result(){
        $this->load->model('friendshipmeter');
   		$data=array();
		$data['lang'] = $this->friendshipmeter->index();
                
   
   }
   
   
}