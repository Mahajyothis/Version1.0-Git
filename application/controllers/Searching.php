<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Searching extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	 public function index(){
		 
	$this->load->model('main_search');
	$this->load->model('Language_model');
      	$page='maha_search';	 
	$q=$this->input->get('q');
	$cat=$this->input->get('cat');
	if(!empty($cat) & !empty($q)){
	$data=array();
	$data['result']=$this->main_search->mainsearchresult($cat,$q);
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$this->load->view('main_search_view',$data);
		}
		}
	public function blogs(){
	$this->load->model('Language_model');
      	$page='maha_search';	
	$q=$this->input->get('q');
	$this->load->model('main_search');
	$data['result']=$this->main_search->searchblog($q);
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$this->load->view('main_search_view',$data);
	}
	public function allsearch(){
	$q=$this->input->get('q');
	$this->load->model('main_search');
	$this->load->model('Language_model');
      	$page='maha_search';	
	$data=array();
	$data['result1']=$this->main_search->searchuser($q);
	$data['result3']=$this->main_search->searchblog($q);
	$data['result2']=$this->main_search->searcharticle($q);
	$data['result4']=$this->main_search->searchdiscussion($q);
	$data['result5']=$this->main_search->searchforum($q);
	$data['result6']=$this->main_search->searchgroup($q);
	$data['result7']=$this->main_search->searchevents($q);
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$this->load->view('main_search_view',$data);
	
	}
	public function search_results(){
	$this->load->model('main_search');
	$this->load->model('Language_model');
      	$page='maha_search';
	$q=$this->input->get('keyword');
	//$my_data=mysql_real_escape_string($q);
	$data=array();
	$data['result']=$this->main_search->home_search($q);
	$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
	$data['name']=$q;
	$this->load->view('search_result',$data);
	}
	
	public function groupaddmembers(){
			$q=$this->input->get('keyword');
			$groupID=$this->input->get('groupID');
			$admin=$this->input->get('admin');
			//$my_data=mysql_real_escape_string($q);
					$my_data=str_replace("'", "", $q);		
								/*** query the database ***/
						
						$select ="SELECT DISTINCT pd.`perdataFirstName`,pd.`perdataLastName`,pp.`photo`,prd.`profDesignation`,a.`addrState`,a.`addrCity`,a.`addrPostCode`,cm.`custID` FROM `userfollowing` uf
						LEFT JOIN `customermaster` cm ON(cm.`custID`=uf.`custID` )
						LEFT JOIN `personaldata` pd ON(pd.custID=cm.custID)
						LEFT JOIN `profdata` prd ON(prd.`custID`=pd.`custID`)
						LEFT JOIN `address` a ON(a.`custID`=pd.`custID`)
						LEFT JOIN `personalphoto` pp ON(pp.`custID`=pd.`custID`)
						LEFT JOIN `group_invitation` gi ON (gi.`uID`=cm.`custID`)
						WHERE (pd.`perdataFirstName` LIKE '%$my_data%' OR pd.`perdataLastName` LIKE '%$my_data%') AND cm.`custID`!='$admin'  ORDER BY pd.`perdataFirstName` ASC LIMIT 5";
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");
                                                 $result=$this->db->query($select);
						/*** loop over the results ***/
						
						$final_result="";
						foreach($result->result() as $row) {
					
					$valid="SELECT * FROM `group_invitation` WHERE `uID`='".$row->custID."' AND `groupID`='$groupID'";
				if(!empty($valid)){
				if($this->db->query($valid)->num_rows() ==0){
					$final_result .= '<span class="user_details" title="'.$row->perdataFirstName.' '. $row->perdataLastName.'" id="'.$row->custID.'"><li class="row add_members"><div class="padding-cls-search"><div class="col-xs-3"><img src="'.base_url().'uploads/';
					if(!empty($row->photo)) $final_result.=$row->photo; else{ $final_result.='profile.png';}
						$final_result.='" class="img-responsive center-block search-img"  width="100"></div><div class="col-xs-7 no-paddings-search align-desc-text"><span class="user-profile-name">'.$row->perdataFirstName.$row->perdataLastName.'</span><br><span class="user-profile-description">';
						if(strlen($row->profDesignation) > 20)  $final_result .= substr($row->profDesignation,0,20).'...';   else $final_result .= $row->profDesignation;
						
						
						$final_result .= '</span><br><span class="user-profile-description">'.$row->addrCity.','.$row->addrState.'-'.$row->addrPostCode.'</span></div></div></li></span>
						'; 
								
					}
								}
						else{
						
						$final_result .="No user Found";
		
				}}
						echo $final_result;
						Exit;
	
	}
	
	
}


?>