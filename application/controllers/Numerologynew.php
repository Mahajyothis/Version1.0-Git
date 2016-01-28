<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Numerologynew extends CI_Controller{

	function __construct(){
		parent::__construct();
 
	}

	 public function Numer_ologynew(){


	$this->load->model('numerology_process');
	$this->load->model('Language_model');
       
        $page='numerology';
		$data=array();
		$data['rowan']=$this->numerology_process->numerology_result();
		$data['lang'] = $this->Language_model->LangCompatible($page,"");
		$this->load->view('numerology_result',$data);
		
	

	}
}


?>