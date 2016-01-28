<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Gemology extends CI_Controller{

	function __construct(){

		parent::__construct();

 		 $this->load->database();
		 $this->load->library('session');
	}

	public function index(){

		$this->load->model('gemology_model');
		$result = $this->gemology_model->get_gemology();
		
	}
	public function gemology_view(){
	
	$this->load->model('Language_model');
        $page='gemology';
	$data=array();
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$this->load->view('gemology',$data);
	}

}	


?>