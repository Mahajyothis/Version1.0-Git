<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Lovemeter extends CI_Controller{

	function __construct(){
		parent::__construct();
		

	}

	 public function Love_meter(){


	$this->load->model('Language_model');
        $page='lovecalculator';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('lovemeter',$data);
	}
	public function love_result(){
	$this->load->model('Language_model');
	$this->load->model('Loveanalysis');
	 $page='lovecalculator';
	$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$data['love_result'] = $this->Loveanalysis->index();
		$this->load->view('lovemeter_result',$data);
	}
}


?>