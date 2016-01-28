<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Like_process extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
		$ui = $this->input->get('uid');
		$custID = $this->input->get('cid');
		$cat=$this->input->get('cat');
		$act=$this->input->get('act');
		$page=$this->input->get('page');
		$catid=$this->input->get('catid');
		if(!empty($ui)){$plpID =$ui;}if($ui==0){$plpID =$custID;}
		$date=date("Y-m-d");
		if($cat=='PROFILE'){
		$val="SELECT * FROM `recentactivity` WHERE raCategory='$cat' AND custID='$custID' AND raAction='$act' AND `uID`='$plpID' ";
		}else{
		$val="SELECT * FROM `recentactivity` WHERE raCategory='$cat' AND custID='$custID' AND raAction='$act' AND `catID`='$catid' ";
		}
		if($this->db->query($val)->num_rows()<1)
		{
		if($catid!='0'){
		$Like="INSERT INTO `recentactivity`(raCategory,raAction,catID,custID,uID,raMessage,raPage,is_read,raDate)VALUES('$cat','$act','$catid','$custID','$plpID','Likes','$page',1,'$date')";
		$this->db->query($Like);
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
		
}}
?>