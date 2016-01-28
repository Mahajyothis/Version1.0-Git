<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class EditProfile extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	public function index(){

		$this->load->model('EditProfile_model');
		$stat = $this->EditProfile_model->edit_profile();

	echo $stat;


	}
	public function edit_pic(){
		$this->load->model('EditProfile_model');
		$stat = $this->EditProfile_model->new_pic();
		echo $stat;
	}
}


?>