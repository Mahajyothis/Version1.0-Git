<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tarot extends CI_Controller{

	function __construct(){
		parent::__construct();
 		 $this->load->database();
		 $this->load->library('session');
	}

	public function index(){

		$this->load->model('tarot_model');

		$imgs = $this->input->post('tarImg');

		$tarotImage = implode(',', $imgs);

		$result = $this->tarot_model->tarot($imgs);	
		//print_r($result);
		
		}
		
}	


?>
