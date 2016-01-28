<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {


	function __construct()
	{
		parent::__construct();
		$this->table_name = 'post';
	}
	
	
	public function createPost(){
		$ins_data = array(
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'postContent' => $this->input->post('postContent'),
			'postType' => $this->input->post('postType'),
			);
		if($this->db->insert($this->table_name,$ins_data)) return $this->db->insert_id();
		return 0;
	}

	public function updatePost($id){
		$ins_data = array(
			'postContent' => $this->input->post('postContent'),
			'postType' => $this->input->post('postType'),
			);
		return $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID'])->where('postId',$id)->update($this->table_name,$ins_data);
	}

	public function deletePost(){
		return $this->db->where('postId',$this->input->post('id'))->where('custID',$this->session->userdata['profile_data'][0]['custID'])->delete($this->table_name);
	}

	public function get_data($type='',$last_id='')
 { 

 $this->db->select('p.*,c.custName,c.custID,ph.photo')->from($this->table_name.' p')
 ->join('customermaster c','c.custID=p.custID')
 ->join('personalphoto ph','ph.custID=p.custID','LEFT OUTER')
 ->where('c.custStatus',15);
 if($last_id) $this->db->where('p.postId <',$last_id);
 if($type == 'own') $this->db->where('p.custID',$this->session->userdata['profile_data'][0]['custID']);
 if($type == 'public')  $this->db->where('p.postType',0);
 if($type == 'private') {
	$this->db->where('p.postType = 1 AND p.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].' )',NULL,FALSE);
 }
 return $this->db->order_by("postId", "desc")->limit(4)->get()->result();
 }

	public function getSinglePost($id)
	{   
		
		return $this->db->select('p.*')->from($this->table_name.' p')
		->where('p.postId',$id)
		->where('p.custID',$this->session->userdata['profile_data'][0]['custID'])
		->get()->row();
	}

	function user_comments(){
	



        $limits=$this->input->get("limits");
        $postid=$this->input->get("postid");
        $inc = $this->input->get("inc");

        if($limits != 'limits')
        {

            $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='POST' ORDER BY ua.`uaID` DESC LIMIT 4
		";
            $select_com = $this->db->query($select_comment);

            return $select_com;
        }
        else
        {
            $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='POST' AND ua.`catID`= $postid ORDER BY ua.`uaID` DESC LIMIT $inc,4");

            return $query->result();
        }
	
	
	
	
}
function user_likes(){
		
		$cat="POST";
		
		
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='$cat'  AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		return $like_row;
	}
	
	function total_comments(){
		
		$cat="POST";
		
		
		$comment_count="SELECT COUNT(`catID`) AS `total_replies` FROM `recentactivity` WHERE `raCategory`='$cat' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		
		return $comment_row;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
