<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tarotnew extends CI_Controller{

	function __construct(){
		parent::__construct();
 $this->load->helper('url');
$this->load->library('session');
	}

	 public function Tarot_new(){


	$this->load->model('tarot_reading');
		
		
		
	

	}
}


?>