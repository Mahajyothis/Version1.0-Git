<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Articles extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	public function index(){

			$this->load->view('blog',$this->session->userdata('profile_data'));
	}
}	


?>
