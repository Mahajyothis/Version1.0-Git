<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tarotreading extends CI_Controller{

	function __construct(){
		parent::__construct();
		
 $this->load->helper('url');
$this->load->library('session');
	}

	 public function Tarot_process(){

	$this->load->model('numerology_process');
	$this->load->model('Language_model');
        $page='taroet';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('tarot',$data);
		
	

	}
}


?>