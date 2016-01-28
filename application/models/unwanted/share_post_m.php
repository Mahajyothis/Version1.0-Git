<?php 
class share_post_m extends ci_model
{
	public function post_insert($cust_name)
	{
		$this->db->query("insert into temp_share_post values ('','$cust_name')");
	}
}
?>