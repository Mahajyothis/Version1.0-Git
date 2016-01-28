<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Networks extends CI_Controller {

	
	function __construct(){
		parent::__construct();
            $this->Common_model->checkLogin();
	}

	
	
	
	public function index()
	{
	
		$this->load->helper('url');
		$this->load->model('Language_model');
                $page='maha_network';
		$this->load->model('networking_process');
		$data=array();
	
		$data['langresult'] = $this->networking_process->networkfollowlist();
		$data['followerlist'] = $this->networking_process->networkfollowerlist();
		$data['totalcircles']=$this->networking_process->totalcircles();
		$data['totalfollowings']=$this->networking_process->totalfollowings();
		$data['totalfollowers']=$this->networking_process->totalfollowers();
		$data['people_you_may_now']=$this->networking_process->people_you_may_now();
       		 $data['total_groups']=$this->networking_process->total_groups();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$this->load->view('network_process',$data);
		
	}
	public function network_members(){
	
	$q=$this->input->get('q');
	//$my_data=mysql_real_escape_string($q);
			$my_data=str_replace("'", "", $q);		
						/*** query the database ***/
						
						$select ="SELECT DISTINCT pd.`perdataFirstName`,pd.`perdataLastName` FROM customermaster cm
						LEFT JOIN `personaldata` pd ON(pd.custID=cm.custID) WHERE (pd.`perdataFirstName` LIKE '%$my_data%' OR pd.`perdataLastName` LIKE '%$my_data%') AND cm.custID !=".$this->session->userdata['profile_data'][0]['custID']." ORDER BY pd.`perdataFirstName` ASC";
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");
                                                 $result=$this->db->query($select);
						/*** loop over the results ***/
						$count= 0;
						
						foreach($result->result() as $row) {
					
						echo $row->perdataFirstName." ".$row->perdataLastName."\n";
						
						}
	
	
	}
       public function update_password(){
       $select=$this->db->select('accPWD,custID')->from('accessmaster')->where('custID != 17')->get()->result();
       foreach($select as $password){
           $crypt_options = array(
'cost' => 12
);
       $pwd=array(
              'accPWD' => password_hash($password->accPWD, PASSWORD_BCRYPT,$crypt_options)  
        );
   
      $accPWD= password_hash($password->accPWD, PASSWORD_BCRYPT,$crypt_options);
       $this->db->where('custID', $password->custID);
       $this->db->update('accessmaster', $pwd); 
      
       }
      // print_r($id); exit;
       }
	
}