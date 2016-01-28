<?php 
class comment_c extends ci_controller
{
	public function view_comment()
	{
		$this->load->view('recent');
	}
	public function post_comment()
	{
		$this->load->model('comment_m');
		
		$custID = $this->input->post('custID');
		
		$comment_area = $this->input->post('comment_area');
		
		
		$this->comment_m->comment_insert($custID,$comment_area);
		echo "Comment inserted successfully";
	}
	public function view_discussion()
	{
		$this->load->view('discussion');
	}
	public function comment_post()
	{
		$this->load->model('comment_m');
		$custID = $this->input->post('custID');
		$comment_area = $this->input->post('comment_area');
		
		
		$this->comment_m->insert_comment($custID,$comment_area);
		echo "Comment has been send";
	}
	public function get_comments()
	{
		$this->load->model('comment_m');
		$datas = $this->comment_m->get_all_coments();
		foreach($datas as $all)
		{
			echo "<table>";
			echo "<tr><td>".$all->comments."</td></tr>";
			echo "</table>";
		}
	}

}
?>