<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Logout extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	 public function index(){

		$user_row = $this->session->userdata('profile_data')[0]['custID'];
		
		$now=mktime(date('h')+5,date('i')+30,date('s'));
		$time2=date('h:i:s A',$now);
		$update="UPDATE `accesslog` SET `logOutTime`='$time2' WHERE `custID`='".$user_row."' && `logOutTime` = '' ORDER BY `logID` DESC LIMIT 1";
		$query = $this->db->query($update);
		
		$sql_online ="update customermaster SET is_online='0',last_online = '".$this->config->item('global_datetime')."' where custID ='".$user_row."'";
		 $this->db->query($sql_online);		
		
		
		$this->session->unset_userdata('profile_data');
		$this->session->sess_destroy();
		
		redirect('http://blog.mahajyothis.net/index.php?option=com_users&task=user.logout');
		redirect('home','refresh');


	}
}


?>