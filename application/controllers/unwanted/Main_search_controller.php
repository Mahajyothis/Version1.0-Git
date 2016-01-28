<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main_search_controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		
 $this->load->helper('url');
$this->load->library('session');
	}

	 public function index(){


	
		
		$this->load->model('main_search');
		
	

	}
}


?>