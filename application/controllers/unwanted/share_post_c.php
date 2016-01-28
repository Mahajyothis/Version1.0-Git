<?php 
class share_post_c extends ci_controller
{
	public function index()
	{}
	public function share()
	{
		
		$this->load->model('share_post_m');
		$cust_name = $this->input->post('cust_name');
		
		$this->share_post_m->post_insert($cust_name);
		echo $cust_name;
	}
}
?>