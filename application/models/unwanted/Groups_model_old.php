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
	   
		$this->db->select('m.*,p.photo,c.custName');
		$this->db->from('mahagroups m');
		$this->db->join('personalphoto p','m.custID=p.custID','LEFT OUTER');
		$this->db->join('customermaster c','m.custID=c.custID','LEFT OUTER');
		if($fetch_type == 'own') $this->db->where('m.custID',$this->session->userdata['profile_data'][0]['custID']);
		if($fetch_type == 'private') $this->db->where('m.privacy',2);
		if($fetch_type == 'public') $this->db->where('m.privacy',1);
		$this->db->order_by("m.grp_id", "desc");
		//$this->db->limit($limit, $start);
		$q=$this->db->get();
		return $q->result();

		
	
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
			if($this->upload->display_errors()) $data['grp_cover']  = 'profile.png';
			else $data['grp_cover']  =   $this->upload->data('file_name');
		}
		
		return $this->db->where('grp_id',$this->input->post('edit_groupid'))->update('mahagroups',$data);
	}
	
	public function get_group_data($id)
	{   
	   
		$this->db->select('m.*');
		$this->db->from('mahagroups m');
		//$this->db->where('m.custID',$this->session->userdata['profile_data'][0]['custID']);
		$this->db->where('m.grp_id',$id);
		$q=$this->db->get();
		return $q->row();

		
	
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
	 
	      public function update_quo($data,$id)
	     {
		 $this->db->where('id_que', $id);
     	 $this->db->update('mahaforum',$data); 
		 return $this->db->affected_rows();
	    }

		 	/* GROUP POSTING OPERATIONS  */
		
		public function createPost($pData){
		$ins_data = array(
			'grp_id' => $this->session->userdata['groupID'],
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'postType' => 1,
			'postContent' => $pData
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
			$this->db->where('id', $id)->where('custID', $this->session->userdata['profile_data'][0]['custID']);
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
			);
		    if($this->db->insert('mahagroups_data',$ins_data)) return $this->db->insert_id();
		    return 0;
	    }
		
		
		 public function updatePostwithImage($img)
	    {
		       $ins_data = array(
			       
			       'postContent' => $this->input->post('editPhotoContent'),
			       'postImage' => $img,
			);
		 
		   $this->db->where('id',$this->input->post('editStatusPhotoId'));
		   $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID']);
     	   $q = $this->db->update('mahagroups_data',$ins_data); 
		   if($q) return 1;
		     return 0;
	    }
}
?>
