<?php

class Log_out extends CI_Model {
 function __construct()
	{
		parent::__construct();
		 $this->load->database();
	$this->load->library('session');
	}
 
 
 
function Log_outp()
{

 
$this->session->unset_userdata($session_user,FALSE);
			$this->session->unset_userdata('profile_data',$row);

$this->session->sess_destroy();

//redirect('home','refresh'); 
}
}

?>