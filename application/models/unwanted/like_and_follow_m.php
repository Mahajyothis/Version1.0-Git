<?php 
class like_and_follow_m extends ci_model
{
	public function like_insert($cust_id, $photo_id)
	{
		
		//$data = $this->db->query("insert into profilelike values('','$cust_id','$photo_id')");
		$datas = array(
					'pID'=>'',
					'custID'=>$cust_id,
					'photoID'=>$photo_id
		            	);
        $this->db->insert('profilelike', $datas);	
		
		if($datas == true)
		{
			return true;
		}
		else
		{
			return false;
		}	
		
	}
	public function all_likes($photo_id)
	{
		//$result = $this->db->query("select photoID from profilelike where photoID = $photo_id");
		$this->db->where('photoID',$photo_id);
		$result = $this->db->get('profilelike');
		echo  $result->num_rows();
	}
}
?>