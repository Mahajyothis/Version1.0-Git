<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Controller {

	function __construct()
      {
            parent::__construct();
           $this->Common_model->checkLogin();
            
      }
	public function index()
	{
	
		$this->load->helper('url');
	$this->load->model('like_process');
		
	}
	
public function unlike(){

                $ui = $this->input->get('uid');
		$custID = $this->input->get('cid');
		$cat=$this->input->get('cat');
		$act=$this->input->get('act');
		$page=$this->input->get('page');
		$catid=$this->input->get('catid');
		if(!empty($ui)){$plpID =$ui;}if($ui==0){$plpID =$custID;}

$val="DELETE FROM `recentactivity` WHERE raCategory='$cat' AND custID='$custID' AND raAction='$act' AND `uID`='$plpID ' AND `catID`='$catid' ";
$this->db->query($val);
		  $this->log_array = array(
'pid' => $catid,
'module' => $cat,
'action' => $act,
'table' => 'recentactivity',
'comments' => ''
);
$this->Common_model->create_log($this->log_array);
		  
		  
		  
		
		


}
       
	
}