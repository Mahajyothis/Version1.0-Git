<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// FUNCTION OR CHECKING LOGIN
	public function checkLogin()
	{	
		if(!isset($this->session->userdata['profile_data'])){
			$red_url = current_url();
			$session_arr = array('red_url'  => $red_url);
			$this->session->set_userdata($session_arr);
			redirect('');
		}
		else return true;	
		
	}

	public function create_log($log_array = array())
	{
		/*
		Sample data for log_array 
		$log_array = array(
				'pid'	=> 1,
				'module'	=> 'Article',
				'action'	=> 'like',
				'table'	=> 'article',
				'comments'	=> '',
			);
		*/

		if(is_array($log_array['pid'])){
				foreach($log_array['pid'] as $id){
					$insert_array = array(
						'pid'			=> $id,
						'module'		=> $log_array['module'],
						'action'		=> $log_array['action'],
						'table'			=> $log_array['table'],
						'comments'		=> $log_array['comments'],
						'uid'			=> $this->session->userdata['profile_data']['0']['custID'],
						'created_on'	=> $this->config->item('global_datetime'),
						'ip_address'	=> $this->config->item('ip_address')
					);
				}
				if($insert_array) return $this->db->insert_batch('activity_log',$insert_array);
		}
		else{
			$insert_array = array(
				'uid'			=> $this->session->userdata['profile_data']['0']['custID'],
				'created_on'	=> $this->config->item('global_datetime'),
				'ip_address'	=> $this->config->item('ip_address')
			);
			$insert_array = array_merge($log_array,$insert_array);
			return $this->db->insert('activity_log',$insert_array);
		}
	}	
}

?>