<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Registration extends CI_Controller{

	function __construct(){
		parent::__construct();		
			 $this->load->database();
			 $this->load->library('session');
 			 $this->load->helper(array('form', 'url'));
	}
	
	public function register_user(){                              
    
		$reg = $_POST['reg'];	

		$this->load->model('register_model');
		
		switch($reg){
			case 1:
		
				$status = $this->register_model->register_one();
		
				echo $status;
				break;
		
			case 2:
				$status = $this->register_model->register_two();
			
				echo $status;
				break;
			
			case 3:
				$status = $this->register_model->register_three();
			
				echo $status;
				break;	
			}				
		
			
		
	}

	public function check_username($abc){
	
		$this->load->model('register_model');
					
			$uname = $abc;//$_POST['uname'];	
			$chk = $this->register_model->chk_user($uname);
			echo $chk;
			
	}
	public function register_secondpage(){
	$this->load->model('register_model');
	$this->load->model('Language_model');
	$page='maha_home';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$data['categories'] = $this->register_model->get_categories();
		
		if(MOBILE_SITE) {
		$data['logo_login_part'] = $this->load->view('modules/logo-login',$data,TRUE);
		$this->load->view('modules/header',$data);
		$this->load->view('home',$data);
		$this->load->view('modules/footer',$data);
	}
	else	$this->load->view('register2',$data);
	
	}
	public function register_thirdpage(){
	$this->load->model('Language_model');
	$page='maha_home';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('register3',$data);
	
	}
	public function register_finalpage(){
	$this->load->model('Language_model');
	$page='maha_home';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('register4',$data);
	
	}
	
	
}	

	
?>