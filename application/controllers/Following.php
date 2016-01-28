<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Following extends CI_Controller {

	
	public function index()
	{
	
		$this->load->helper('url');
		//$this->load->model('search_process');
	$this->load->model('following_process');
		//$this->load->view('footer');
	}
       
	
}