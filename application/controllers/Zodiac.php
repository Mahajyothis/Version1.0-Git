<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Zodiac extends CI_Controller{

	function __construct(){
		parent::__construct();
 		 $this->load->database();
		 $this->load->library('session');
	}

	public function index(){

		$this->load->model('zodiac_model');

		$month = $this->input->post('month');
		$date = $this->input->post('date');
		$bdate = $month.'-'.$date;
		$result = $this->zodiac_model->zodiac($bdate);

		echo $result;		
		
		}
		public function zodiac_view(){
		
		$this->load->model('Language_model');
	        $page='zodiac';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('zodiac',$data);
		}
		
}	


?>