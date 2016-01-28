<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends CI_Model {


	function __construct()
	{
		parent::__construct();
	}
	
	
	

	public function create_group($data)
	{
		$this->db->insert('mahagroups',$data);
		return $this->db->insert_id();	
	}
	
	public function get_groups($fetch_type='own')
	{   
	   if($fetch_type == 'own')
	   {
		$this->db->select('m.*,p.photo,c.custName');
		$this->db->from('mahagroups m');
		$this->db->join('personalphoto p','m.custID=p.custID','LEFT OUTER');
		$this->db->join('customermaster c','m.custID=c.custID','LEFT OUTER');
		if($fetch_type == 'own') $this->db->where('m.custID',$this->session->userdata['profile_data'][0]['custID']);
		$this->db->order_by("m.grp_id", "desc");
		$q=$this->db->get();
		return $q->result();
		
		}
		else
		{
		   $query = $this->db->query('
			SELECT m.*,p.photo,c.custName 
			FROM mahagroups m
			LEFT JOIN personalphoto p ON m.custID=p.custID
			LEFT JOIN customermaster c ON m.custID=c.custID
			LEFT JOIN group_invitation gi ON gi.groupID=m.grp_id
			where m.privacy=1 AND m.status=0 AND m.grp_id NOT IN (SELECT groupID FROM group_invitation WHERE (uID = '.$this->session->userdata['profile_data'][0]['custID'].') AND gistatus = 1)
			
			AND m.custID != '.$this->session->userdata['profile_data'][0]['custID'].'
			
			');

             return $query->result();
		}
	
	}
	
	public function get_networks_groups()
	{   
		
		$query = $this->db->query('
			SELECT m.*,p.photo,c.custName 
			FROM mahagroups m
			LEFT JOIN personalphoto p ON m.custID=p.custID
			LEFT JOIN customermaster c ON m.custID=c.custID
			LEFT JOIN group_invitation gi ON gi.groupID=m.grp_id
			WHERE gi.gistatus = 1 AND m.status = 0
			AND m.grp_id IN (SELECT groupID FROM group_invitation WHERE uID = '.$this->session->userdata['profile_data'][0]['custID'].')
			
			');

		return $query->result();
	
	}
	
	public function update_group(){
		    
		$data = array(
			'custID'              => $this->session->userdata['profile_data'][0]['custID'],
            'grp_name'           => $this->input->post('edit_groupTitle'),
            'grp_description'    => $this->input->post('edit_groupDes'),
			'privacy'             => $this->input->post('edit_groupPrivacy'),
			
		);
		
		    $data['join']             = $this->input->post('edit_joinRadio');
			$data['postRes']             = $this->input->post('edit_postRadio');
			$data['status']             = $this->input->post('edit_PublishRadio');
		
		if($_FILES['edit_groupCover']['name']){
			$this->load->library('upload');
			$config['upload_path'] = UPLOADS."groups/banners";
            $config['allowed_types'] = 'gif|jpg|png';
         
		    $this->upload->initialize($config);
			$field_name = "edit_groupCover";
            $this->upload->do_upload($field_name);
			if($this->upload->display_errors()) $data['grp_cover']  = '600x300.gif';
			else $data['grp_cover']  =   $this->upload->data('file_name');
		}
		
		return $this->db->where('grp_id',$this->input->post('edit_groupid'))->update('mahagroups',$data);
	}
	
	public function get_group_data($id)
	{   
	   
	   
		 $query = $this->db->query('
			SELECT m.*,p.photo,c.custName 
			FROM mahagroups m
			LEFT JOIN personalphoto p ON m.custID=p.custID
			LEFT JOIN customermaster c ON m.custID=c.custID
			WHERE m.grp_id = '.$id.'
			');
	   
	   	    return $query->row();
	  
	}
	
	public function delete($id)
	{
		 if($id){
			$this->db->where('grp_id', $id)->where('custID', $this->session->userdata['profile_data'][0]['custID']);
			return $this->db->delete('mahagroups'); 
		 }
		 return false;
	}
	
	
	function groups_total($id)
    {
          $sql = "SELECT * FROM mahaforum where custID=$id";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
	 
	   

		 	/* GROUP POSTING OPERATIONS  */
		
		public function createPost($pData){
		$ins_data = array(
			'grp_id' => $this->session->userdata['groupID'],
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'postType' => 1,
			'postContent' => $pData,
			'doDate' => date("Y-m-d H:i:s"),
			);
		if($this->db->insert('mahagroups_data',$ins_data)) return $this->db->insert_id();
		return 0;
	    }
		
		
		public function get_posts($limit = 100,$last_id='')
	    {   
	     
		$this->db->select('m.*,p.photo,c.custName');
		$this->db->from('mahagroups_data m');
		$this->db->join('personalphoto p','m.custID=p.custID','LEFT OUTER');
		$this->db->join('customermaster c','m.custID=c.custID','LEFT OUTER');
		//$this->db->where('m.custID',$this->session->userdata['profile_data'][0]['custID']);
		$this->db->where('m.grp_id',$this->session->userdata['groupID']);
		if($last_id) $this->db->where('m.id <',$last_id);
		$this->db->order_by("id", "desc");
		$this->db->limit($limit);
		$q=$this->db->get();
		return $q->result();
	   }
	   
	   public function delete_post_group($id)
	   {
		 if($id){
			$this->db->where('id', $id);
			return $this->db->delete('mahagroups_data'); 
		 }
		 return false;
	   }
       
	   public function get_group_post_data($id)
	{   
	   
		$this->db->select('m.*');
		$this->db->from('mahagroups_data m');
		//$this->db->where('m.custID',$this->session->userdata['profile_data'][0]['custID']);
		$this->db->where('m.id',$id);
		$q=$this->db->get();
		return $q->row();

		
	
	}
	
	 public function update_post_data($id)
	     {
		   $ins_data = array(
			'postContent' => $this->input->post('postContent'),
			);
		 $this->db->where('id', $id);
     	 $q = $this->db->update('mahagroups_data',$ins_data); 
		 if($q) return 1;
		 return 0;
	    }
		
		/* EVENT MODULE METHODS */
	public function doEvent(){
		   $ins_data = array(
			  'grp_id' => $this->session->userdata['groupID'],
			  'custID' => $this->session->userdata['profile_data'][0]['custID'],
			  'postType' => 2,
			  'eventTitle' => $this->input->post('eventTitle'),
			  'eventLocation' => $this->input->post('eventLocation'),
			  'eventDate' => $this->input->post('eventDate'),
			  'postContent' => $this->input->post('eventDes'),
			   'doDate' => date("Y-m-d H:i:s"),
			);
		if($this->db->insert('mahagroups_data',$ins_data)) return $this->db->insert_id();
		return 0;
	    }
	
	
	   public function update_event_data($id)
	    {
		       $ins_data = array(
			       'postContent' => $this->input->post('eventDes'),
			       'eventTitle' => $this->input->post('eventTitle'),
			       'eventLocation' => $this->input->post('eventLocation'),
			       'eventDate' => $this->input->post('eventDate'),
			);
		 
		   $this->db->where('id', $id);
     	   $q = $this->db->update('mahagroups_data',$ins_data); 
		   if($q) return 1;
		     return 0;
	    }
		
		/* POST WITH IMAGE MODULE METHODS */
		
		public function doPostwithImage($img)
		{
		   $ins_data = array(
			'grp_id' => $this->session->userdata['groupID'],
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'postType' => 3,
			'postContent' => $this->input->post('postTextinImage'),
			'postImage' => $img,
			'doDate' => date("Y-m-d H:i:s"),
			);
		    if($this->db->insert('mahagroups_data',$ins_data)) return $this->db->insert_id();
		    return 0;
	    }
		
		
		 public function updatePostwithImage($img)
	    {
		      if($img == NULL)
			  {
			      $ins_data = array(
			       
			       'postContent' => $this->input->post('editPhotoContent'),
			       );
			  }
			  else
			  {
		       $ins_data = array(
			       
			       'postContent' => $this->input->post('editPhotoContent'),
			       'postImage' => $img,
			);
			}
		 
		   $this->db->where('id',$this->input->post('editStatusPhotoId'));
		 //  $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID']);
     	   $q = $this->db->update('mahagroups_data',$ins_data); 
		   if($q) return 1;
		     return 0;
	    }
		
		
		
		/*  GROUP MEMBERS MANAGEMENT  */
		
		public function makeAMemberInGroup()
		{           $grpInformation = $this->session->userdata['groupInfo'];
	                //print_r($grpInformation);
					if($grpInformation->join == 11)
					{
		            $groupID = $this->session->userdata['groupID'];
		            $custID  = $this->session->userdata['profile_data'][0]['custID'];
					$invitation="INSERT INTO `group_invitation`(uID,groupID,gistatus)VALUES('".$custID."','".$groupID."',1)";
                    $results = $this->db->query($invitation);
					}
					else
					{
					    $groupID = $this->session->userdata['groupID'];
						$custID  = $this->session->userdata['profile_data'][0]['custID'];
		                $adminID  = $grpInformation->custID;
					    $invitation="INSERT INTO `group_invitation`(custID,uID,groupID,gistatus)VALUES('".$adminID."','".$custID."','".$groupID."',3)";
                        $results = $this->db->query($invitation);
					}
					
					 if($results) return $this->db->insert_id();
		             return 0;
		}
		
		public function getGroupMembers()
		{
		   $groupID = $this->session->userdata['groupID'];
		   
		   $query = $this->db->query('
			SELECT gi.*,p.photo,c.custName 
			FROM group_invitation gi
			
			LEFT JOIN personalphoto p ON gi.uID = p.custID
			LEFT JOIN customermaster c ON gi.uID = c.custID
			WHERE gi.groupID = '.$groupID.' AND gi.gistatus = 1
			');
	   
	   	    return $query->result();
		   
		}
		
                          public function RequestAccept()
						  {
						  $usrRid=$this->input->post('id');
		                  $update="UPDATE `group_invitation` SET `gistatus`=1 WHERE giID = $usrRid";
		                  $res = $this->db->query($update);
		                  if($res) return (1);
		                    return 0;
						  }  
		
		
		public function getOneGroupMember()
		{
		  
		   
		   $groupID = $this->session->userdata['groupID'];
		   $custID  = $this->session->userdata['profile_data'][0]['custID'];
		   $query_string="SELECT * FROM `group_invitation` WHERE (`uID`='".$custID."') AND `groupID`='".$groupID."'";
		   $r_val=$this->db->query($query_string);
		   if($r_val) return ($r_val->result());
		   return 0;
		   
		}
		
		public function getRequests()
		{
		   $groupID = $this->session->userdata['groupID'];
		   
		   $query = $this->db->query('
			SELECT gi.*,p.photo,c.custName 
			FROM group_invitation gi
			LEFT JOIN personalphoto p ON gi.uID = p.custID
			LEFT JOIN customermaster c ON gi.uID = c.custID
			WHERE gi.groupID = '.$groupID.' AND gi.gistatus = 3
			');
	   
	   	    return $query->result();
		   
		}
		
		
		
		
		
		public function checkExistingMember()
		{
		
		   $groupID = $this->session->userdata['groupID'];
		   $custID  = $this->session->userdata['profile_data'][0]['custID'];
		   $query_string="SELECT * FROM `group_invitation` WHERE (`uID`='".$custID."') AND `groupID`='".$groupID."'";
		   $r_val=$this->db->query($query_string);
		   
		   return $r_val->num_rows();
		
		}
		
		
		public function memberLeaveGroup($id)
	   {
		 if($id){
			$this->db->where('giID', $id);
			 if($this->db->delete('group_invitation'))
                  { 
				     return 1;
				  }
				  else
				  {
				    return 0;
				  }
			
		 }
		 
	   }
		
		
		
}
?>
