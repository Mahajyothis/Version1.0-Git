<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Love_process extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	 public function Lovemeter_process(){


	
		
		$this->load->model('loveanalysis');
		
	

	}
}


?>