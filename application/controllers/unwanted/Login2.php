<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	 public function login_process(){

	$this->load->model('login_model');
	$result = $this->login_model->login_validate();
	$data['user_row'] = $result;

	if(! $result){
		$this->load->view('home');
		
	}
	else{
		$this->load->view('profile',$data);
		
		  

	} 

	}
}


?>