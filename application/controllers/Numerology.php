<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Numerology extends CI_Controller{

	function __construct(){
		parent::__construct();

 
	}

	 public function Numer_ology(){
$this->load->model('Language_model');
        
        $page='numerology';
	$data=array();
	
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('numerology',$data);

	}
}


?>