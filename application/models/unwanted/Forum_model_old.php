<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum_model extends CI_Model {


	function __construct()
	{
		parent::__construct();
	}
	
	
	

	public function insert_question($data)
	{
		$this->db->insert('mahaforum',$data);
		return $this->db->insert_id();	
	}
	
	public function get_questions($limit, $start)
	{   
	   /*
		$this->db->select('m.*,p.photo,c.custName');
		$this->db->from('mahaforum m');
		$this->db->join('personalphoto p','m.custID=p.custID','LEFT OUTER');
		$this->db->join('customermaster c','m.custID=c.custID','LEFT OUTER');
		//$this->db->where('custID',$main);
		$this->db->order_by("m.id_que", "desc");
		 $this->db->limit($limit, $start);
		$q=$this->db->get();
		return $q->result();
		*/
		 $query = $this->db->query('
			SELECT m.*,p.photo,c.custName
			FROM mahaforum m
			LEFT JOIN personalphoto p ON m.custID=p.custID
			LEFT JOIN customermaster c ON m.custID=c.custID
			WHERE m.privacy = 1
			AND m.id_que NOT IN (SELECT id_que FROM hidequestions hq WHERE hq.custID = '.$this->session->userdata['profile_data'][0]['custID'].')
			ORDER BY m.id_que DESC
			LIMIT '.$start.','.$limit.'
			');

		return $query->result();
	
	}
	
	public function delete_question($id)
	{
		 $this->db->where('id_que', $id);
     	 $this->db->delete('mahaforum'); 
         return true;
	}
	
	function questions_total()
    {
          $sql = "SELECT * FROM mahaforum m where m.privacy=1 AND m.id_que NOT IN (SELECT id_que FROM hidequestions hq WHERE hq.custID = '".$this->session->userdata['profile_data'][0]['custID']."')";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
	 
	  public function update_quo($data,$id)
	{
		 $this->db->where('id_que', $id);
     	 $this->db->update('mahaforum',$data); 
		 return $this->db->affected_rows();
	}
    
		public function makeHiddenQue($id)
	   {
	    $ins_data = array(
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'id_que' => $id,
			);
		
		if($this->db->insert('hidequestions',$ins_data)) return $this->db->insert_id();
		return 0;
	   }
	
	    public function hidden_que_checking($id)
        { 
	      $custID = $this->session->userdata['profile_data'][0]['custID'];
          $sql = "SELECT * FROM hidequestions where id_que=$id AND custID=$custID";
          $query = $this->db->query($sql);
          return $query->num_rows();
       }
	
         public function get_que_by_id($id)
	     {   
		
		   $this->db->select('m.*,p.photo,c.custName');
		   $this->db->from('mahaforum m');
		   $this->db->join('personalphoto p','m.custID=p.custID','LEFT OUTER');
		   $this->db->join('customermaster c','m.custID=c.custID','LEFT OUTER');
		   $this->db->where('m.id_que', $id);
		   $q=$this->db->get();
		   return $q->result();
	     }
	function user_comments($id)
    {
	

		$select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$id' AND ua.`uaCategory`='FORUM' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
	
	return $select_com;


	
	
	
}
function user_likes($id){
		
		$cat="FORUM";
		
		
		$like_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		return $like_row;
	}
	
	function total_comments($id){
		
		$cat="FORUM";
		
		
		$comment_count="SELECT COUNT(`catID`) AS `total_replies` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='COMMENT' ";
		$comment = $this->db->query($comment_count);
		$comment_row=$comment->result_array();
		
		return $comment_row;
	}
function liked($id){
		
		$cat="FORUM";
		
		 $profile_row = $this->session->userdata('profile_data');
		
		$likeed="SELECT * FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='LIKE' AND `custID`='".$profile_row['0']['custID']."' ";
		$liked_process = $this->db->query($likeed);
		
		
		return $liked_process;
	}
    function user_more_comments()
    {


        /*$catID = $this->input->get("catID");
        $inc = $this->input->get("inc");

        $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`=$catID AND ua.`uaCategory`='FORUM' ORDER BY ua.`uaID` DESC LIMIT $inc,4
		";
        $select_com = $this->db->query($select_comment);

        return $select_com->result();*/

        $inc = $this->input->get("inc");
        $catID = $this->input->get("catID");
        $limits = $this->input->get("limits");

        if($limits != "limits")
        {
            $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`=$catID AND ua.`uaCategory`='FORUM' ORDER BY ua.`uaID` DESC LIMIT 0,4
		";
            $select_com = $this->db->query($select_comment);

            return $select_com->result();
        }
        else
        {

            $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`=$catID AND ua.`uaCategory`='FORUM' ORDER BY ua.`uaID` DESC LIMIT $inc,4
		";
            $select_com = $this->db->query($select_comment);

            return $select_com->result();
        }





    }
function user_more_comments1()
    {
        $inc = $this->input->get("inc");
        $catID = $this->input->get("catID");
        //$limits = $this->input->get("limits");


            $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`=$catID AND ua.`uaCategory`='FORUM' ORDER BY ua.`uaID` DESC LIMIT $inc,4
		";
            $select_com = $this->db->query($select_comment);

            return $select_com->result();
    }
}

