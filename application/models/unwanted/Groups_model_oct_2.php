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
			where m.privacy=1 AND m.grp_id NOT IN (SELECT groupID FROM group_invitation WHERE uID = '.$this->session->userdata['profile_data'][0]['custID'].')
			
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
			WHERE gi.gistatus = 1
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
		
		
		public function get_posts($limit = 10,$last_id='')
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
		{
		            $groupID = $this->session->userdata['groupID'];
		            $custID  = $this->session->userdata['profile_data'][0]['custID'];
					$invitation="INSERT INTO `group_invitation`(uID,groupID,gistatus)VALUES('".$custID."','".$groupID."',1)";
                    $results = $this->db->query($invitation);
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
		
		public function getOneGroupMember()
		{
		  
		   
		   $groupID = $this->session->userdata['groupID'];
		   $custID  = $this->session->userdata['profile_data'][0]['custID'];
		   $query_string="SELECT * FROM `group_invitation` WHERE `uID`='".$custID."' AND `groupID`='".$groupID."'";
		   $r_val=$this->db->query($query_string);
		   if($r_val) return ($r_val->result());
		   return 0;
		   
		}
		
		
		
		
		
		public function checkExistingMember()
		{
		
		   $groupID = $this->session->userdata['groupID'];
		   $custID  = $this->session->userdata['profile_data'][0]['custID'];
		   $query_string="SELECT * FROM `group_invitation` WHERE `uID`='".$custID."' AND `groupID`='".$groupID."'";
		   $r_val=$this->db->query($query_string);
		   
		   return $r_val->num_rows();
		
		}
		
		
		public function memberLeaveGroup($id)
	   {
		 if($id){
			$this->db->where('giID', $id);
			return $this->db->delete('group_invitation'); 
		 }
		 return false;
	   }
    public function get_more_comments()
    {
        $postid = $this->input->get("postid");
        $inc = $this->input->get("inc");
        $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='GROUP' AND ua.`catID`=$postid ORDER BY ua.`uaID` DESC LIMIT $inc,4");

        return $query->result();
    }
		
		
		
}
?>