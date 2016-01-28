<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Theme extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	 public function index(){

	$this->load->model('theme_model');
	$stat = $this->theme_model->set_theme();

	echo $stat;


	}
}


?>