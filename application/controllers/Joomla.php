<?php
class Joomla extends CI_Controller {
//CONSTRUCTOR
	public function __construct()
	{
		parent::__construct();
	}
	// update joomla id to ci table
	public function index(){
		$updata = array('joomlaID' => $this->input->post('id'));
		$this->db->where('custID',$_COOKIE['uid4joomla'])->update('customermaster',$updata);
		//redirect('');
	}

	public function blog(){
		if(!empty($this->session->userdata['profile_data'][0]['custID'])){
			$this->load->view('joomla_login');
			//redirect('http://localhost/joomla/login.php');
		}
		else redirect('');
	}
	
}
/* End of file */