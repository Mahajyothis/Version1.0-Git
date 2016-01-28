<?php 
class comment_m extends ci_model
{
	public function comment_insert($custID,$comment_area)
	{
		$datas = $this->db->query("insert into postcomment values ('',4,'5',$custID,'$comment_area',now())");
		
		/*
		$datas = array(
					'cID'=>'',
					'pID'=>4,
					'uID'=>5,
					'custID'=>$custID,
					'comment'=>$comment_area,
					'newDate'=>now()
				      );
		$this->db->insert('postcomment',$datas);
		*/
		
		if($datas)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function insert_comment($custID,$comment_area)
	{
		
		$datas = $this->db->query("insert into temp_post values ('',$custID,'5','$comment_area',now())");
		
		if($datas)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_all_coments()
	{
		$query = $this->db->query('select comments from temp_post');
		return $query->result();
	}
}
?>