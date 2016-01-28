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
		
		 $forum_query = '
			SELECT m.*,p.photo,c.*,pd.*,
			(SELECT COUNT(`catID`)  FROM `recentactivity` WHERE `raCategory`=\'FORUM\' AND `raAction`=\'LIKE\' AND `catID`=m.`id_que`) AS `total_likes`,
			(SELECT COUNT(`uaID`) FROM `useraction` WHERE `uaCategory`=\'FORUM\' AND `catID`=m.`id_que` )  AS `total_comments`,
			(SELECT `catID` FROM `recentactivity` WHERE `raCategory`=\'FORUM\' AND `raAction`=\'LIKE\' AND `catID`=m.`id_que` AND `custID`='.$this->session->userdata['profile_data'][0]['custID'].' ) AS `liked`
			FROM mahaforum m
			LEFT JOIN personalphoto p ON m.custID=p.custID
			LEFT JOIN customermaster c ON m.custID=c.custID
			LEFT JOIN `personaldata` pd ON(pd.`custID` = c.`custID`)
			WHERE m.privacy = 1
			AND m.id_que NOT IN (SELECT id_que FROM hidequestions hq WHERE hq.custID = '.$this->session->userdata['profile_data'][0]['custID'].')
			ORDER BY m.id_que DESC
			LIMIT '.$start.','.$limit.'
			';
			
			

$forum=$this->db->query($forum_query)->result();

if(!empty($forum)){
$query="";
foreach($forum as $row){
	if($query!="") $query.= ' UNION ';
	
	$query.="(SELECT pp.`photo`,pd.*,ua.`uaDescription`,cm.*,ua.`uaID`,ua.`uID`,ua.`catID` FROM `useraction` ua
			LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			WHERE ua.`uaCategory`='FORUM' AND ua.`catID`='".$row->id_que."' ORDER BY ua.`uaID` DESC  LIMIT 4)
			";
		
	}
}

if(!empty($query)) $forum_comments = $this->db->query($query)->result();
$i=0;
foreach($forum as $forum_array){
foreach($forum_comments as $comments){
	if($forum_array->id_que === $comments->catID)
	{
		$forum[$i]->comments[] = array(
			'comment'	=> $comments->uaDescription,
			'photo'	=> $comments->photo,
			'custID'	=> $comments->custID,
			'custName'	=> $comments->custName,
			'uaID'	=> $comments->uaID,
			'uID'	=> $comments->uID,
			'catID'	=> $comments->catID
		);
	
	}

}
$i++;

}
		return $forum;
	
	}
	
	public function delete_question($id)
	{
		 $this->db->where('id_que', $id);
		  $this->db->where('custID', $this->session->userdata['profile_data'][0]['custID']);
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
		 $this->db->where('custID', $this->session->userdata['profile_data'][0]['custID']);
     	 $this->db->update('mahaforum',$data); 
		 if($this->db->affected_rows())return 1;
		 return 0;
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
		   return $q->result_array();
	     }
	
	 public function get_search() 
	 {
     
	 $match = $this->input->get('search');
     
	  $forum_query= '
			SELECT mf.*,p.photo,c.custName,pd.*, 
			(SELECT COUNT(`catID`)  FROM `recentactivity` WHERE `raCategory`=\'FORUM\' AND `raAction`=\'LIKE\' AND `catID`=mf.`id_que`) AS `total_likes`,
			(SELECT count(uaID) FROM `useraction` WHERE `uaCategory`=\'FORUM\' AND `catID`=mf.`id_que` )  AS `total_comments`,
			(SELECT `catID` FROM `recentactivity` WHERE `raCategory`=\'FORUM\' AND `raAction`=\'LIKE\' AND `catID`=mf.`id_que` AND `custID`='.$this->session->userdata['profile_data'][0]['custID'].' ) AS `liked` 
			FROM mahaforum mf
			LEFT JOIN personalphoto p ON mf.custID=p.custID
			LEFT JOIN customermaster c ON mf.custID=c.custID
			LEFT JOIN `personaldata` pd ON(pd.`custID` = c.`custID`)
			WHERE mf.privacy = 1 AND (mf.titleQue LIKE "%'.$match.'%"  OR mf.bodyQue LIKE "%'.$match.'%" OR mf.category LIKE "%'.$match.'%")
			AND mf.id_que NOT IN (SELECT id_que FROM hidequestions hq WHERE hq.custID = '.$this->session->userdata['profile_data'][0]['custID'].')
			ORDER BY mf.id_que DESC
			';
			$forum=$this->db->query($forum_query)->result();

	if(!empty($forum)){
	$query="";
	foreach($forum as $row){
		if($query!="") $query.= ' UNION ';
	
			$query.="(SELECT pp.`photo`,pd.*,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID` FROM `useraction` ua
			LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			WHERE ua.`uaCategory`='FORUM' AND ua.`catID`='".$row->id_que."' ORDER BY ua.`catID` DESC  LIMIT 4)
			";
	
	
	}
}

	if(!empty($query)) $forum_comments = $this->db->query($query)->result();
	$i=0;
	foreach($forum as $forum_array){
	foreach($forum_comments as $comments){
		if($forum_array->id_que === $comments->catID){
			$forum[$i]->comments[] = array(
			'comment'	=> $comments->uaDescription,
			'photo'	=> $comments->photo,
			'custID'	=> $comments->custID,
			'custName'	=> $comments->custName,
			'uaID'	=> $comments->uaID,
			'catID'	=> $comments->catID
		);
	
	}

}
$i++;

}

		return $forum;
   }

    //---------------------------------------RohitDutta---------------------------------------------
     public function display_user_comments()
    {
        $postid = $this->input->get('postid');
        //$limits = $this->input->get('limits');


        $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='FORUM' AND ua.`catID`= $postid ORDER BY ua.`uaID` DESC");
        return $query->result();
    }
    public function delete_single_forum_comment($comment_id)
    {
    	 
	 $this->db->where('uaID', $comment_id);
	 $this->db->where('custID', $this->session->userdata['profile_data'][0]['custID']);

     	 $delete_success = $this->db->delete('useraction');
     	 
     	 if($delete_success)
     
        echo  true;
         
        else
         
        echo false;
        
        /*
        $this->db->where('uaID', $comment_id);
	 $this->db->where('custID', $this->session->userdata['profile_data'][0]['custID']);

     	 $this->db->delete('useraction');
     	 
        echo "row deleted".$this->db->affected_rows();
        */
    
    }
    
    public function delete_single_forum_comment1($comment_id)
    {
    	 
	 $this->db->where('uaID', $comment_id);
	 $this->db->where('uID', $this->session->userdata['profile_data'][0]['custID']);


     	 $delete_success = $this->db->delete('useraction');
     	 
     	 if($delete_success)
     
        echo  true;
         
        else
         
        echo false;
    /*
    $this->db->where('uaID', $comment_id);
	 $this->db->where('custID', $this->session->userdata['profile_data'][0]['custID']);

     	 $this->db->delete('useraction');
     	 
        echo "row deleted".$this->db->affected_rows();
        */
    }
    public function get_single_forum_comment($comment_id)
    {
    
  	$query = $this->db->query("select * from useraction where uaID='".$comment_id."'");
  	return $query->result();
    }
    
    
     public function update_single_forum_comment($comment_id,$comment_value)
    {
    	 
	 
	 $data = array(
               
               'uaDescription' => $comment_value,
               
            );
            
	 $this->db->where('uaID', $comment_id);
     	 $update = $this->db->update('useraction',$data); 
     	 if($update)
     	 return 1;
     	 else
     	 return 0;
  
    }
   
   
}