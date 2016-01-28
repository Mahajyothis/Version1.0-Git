<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	
	function __construct(){
		parent::__construct();
            $this->Common_model->checkLogin();
	}

	public function index()
	{
	
		$this->load->helper('url');
		$this->load->model('search_process');
		$this->load->model('Language_model');
	        $page='maha_network';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$data['langresult']=$this->search_process->searchresult();	
	$this->load->view('search',$data);
		//$this->load->view('footer');
	}
       function search_liveupdate(){
		   $user_row = $this->session->userdata('profile_data');
		   $user = $this->input->get('keyword');
	  $u = explode(" ", $user);
	  if(!empty($u[1])){
				$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   	LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[1]%') AND pd.`custID`!='0' AND cm.`custID`!='".$user_row[0]['custID']."'"; 
				
				}
				else{
				$langquery="SELECT * FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			   	LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[0]%') AND pd.`custID`!='0' AND cm.`custID`!='".$user_row[0]['custID']."'"; 
				
				}
$langresult= $this->db->query($langquery);
		  return $langresult;
	   }
	
}