<?php 
class like_and_follow_c extends ci_controller
{
	public function index()
	{}
	public function like()
	{
		$this->load->model('like_and_follow_m');
		
		$cust_id = $this->input->post('cust_id');
		$photo_id = $this->input->post('photo_id');
		
		//$query = $this->db->query("select custID, photoID from profilelike where custID = '$cust_id' AND photoID = '$photo_id'");
		
		$this->db->where('custID',$cust_id);
		$this->db->where('photoID',$photo_id);
		$query = $this->db->get('profilelike');
		
		if($query->num_rows() == 1)
		{
			echo "true";
		}
		else
		{
			$this->like_and_follow_m->like_insert($cust_id, $photo_id);
			echo "false";
		}
	}
	public function check_likes()
	{
		$cust_id = $this->input->post('cust_id');
		$this->session->set_userdata('cust_id');
		$photo_id = $this->input->post('photo_id');
		//$query = $this->db->query("select custID, photoID from profilelike where custID = '$cust_id' AND photoID = '$photo_id'");
		
		$this->db->where('custID',$cust_id);
		$this->db->where('photoID',$photo_id);
		$query = $this->db->get('profilelike');
		
		if($query->num_rows() == 1)
		{
			echo "true";
		}
		else
		{	
			echo "false";
		}	
	}
	public function get_likes()
	{
		$this->load->model('like_and_follow_m');
		$photo_id = $this->input->post('photo_id');
		$this->like_and_follow_m->all_likes($photo_id);
	}
}
?>