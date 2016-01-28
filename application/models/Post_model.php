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
			'postImage' => $this->input->post('postImage'),
			'postCreated' => $this->config->item('global_datetime'),
			);
		if($this->db->insert($this->table_name,$ins_data)) return $this->db->insert_id();
		return 0;
	}

	public function updatePost($id){
		$ins_data = array(
			'postContent' => $this->input->post('postContent'),
			'postType' => $this->input->post('postType'),
			'postImage' => $this->input->post('postImage'),
			'postUpdated' => $this->config->item('global_datetime'),
			);
		return $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID'])->where('postId',$id)->update($this->table_name,$ins_data);
	}

	public function deletePost(){
		$banner_res = $this->db->select('postImage')->from($this->table_name)->where('postId',$this->input->post('id'))->where('custID', $this->session->userdata['profile_data'][0]['custID'])->get()->row();
			if($banner_res && $banner_res->postImage != 'default-post.png' && file_exists(POSTS.$banner_res->postImage)){
				@unlink(POSTS.$banner_res->postImage);
				@unlink(POSTS.'thumbs/'.$banner_res->postImage);
			}
		return $this->db->where('postId',$this->input->post('id'))->where('custID',$this->session->userdata['profile_data'][0]['custID'])->delete($this->table_name);
	}

	public function get_data($type='',$last_id='')
	{   
		
		$this->db->select('p.*,c.custName,c.custID,ph.photo,
			(SELECT count(*) FROM `recentactivity` WHERE `raCategory`=\'POST\' AND `catID`=p.`postId` AND `raAction`=\'LIKE\' AND `custID`='.$this->session->userdata['profile_data'][0]['custID'].' ) AS liked,
			(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`=\'POST\' AND `catID`=p.`postId` AND `raAction`=\'LIKE\' ) AS `total_likes`,
			(SELECT COUNT(`uaID`) FROM `useraction` WHERE `uaCategory`=\'POST\' AND `catID`=p.`postId`) AS `total_comments`
			')->from($this->table_name.' p')
		->join('customermaster c','c.custID=p.custID')
		->join('personalphoto ph','ph.custID=p.custID','LEFT OUTER')
		->where('c.custStatus',15);
		if($last_id) $this->db->where('p.postId <',$last_id);
		if($type == 'own')	$this->db->where('p.custID',$this->session->userdata['profile_data'][0]['custID']);
		if($type == 'public') $this->db->where('p.postType',0);
		if($type == 'private') {
			$this->db->where('p.postType = 1 AND ( p.custID = '.$this->session->userdata['profile_data'][0]['custID'].' OR p.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].'))',NULL,FALSE);
		}
		
		
		$post = $this->db->order_by("postId", "desc")->limit(4)->get()->result();
		
		
		if(!empty($post)){
		$query="";
		foreach($post as $row){
			if($query!="") $query.= ' UNION ';
			
			$query.="
				(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT count(*) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_LIKE' ) AS `total_likes`,
				(SELECT COUNT(`uaID`) FROM `useraction` WHERE `uaCategory`='POST' AND `catID`=ua.`uaID` AND `uaAction`='SUB_COMMENT' ) AS `total_comments` 
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='".$row->postId."' ORDER BY ua.`uaID` DESC  LIMIT 4)
				";
			
			}
			
		}

		if(!empty($query)) $post_comments = $this->db->query($query)->result();


		if(!empty($post_comments)){

			$sub_query="";
			foreach($post_comments as $sub_row){
				if($sub_query!="") $sub_query.= ' UNION ';
				
				$sub_query.="(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID`,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS sub_sub_liked,
				(SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`='POST' AND `catID`=ua.`uaID` AND `raAction`='SUB_SUB_LIKE' ) AS `sub_total_likes`
				FROM `useraction` ua 
			    LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
			    LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
			    WHERE ua.`uaCategory`='POST' AND ua.`catID`='".$sub_row->uaID."' AND ua.`uaAction`='SUB_COMMENT' ORDER BY ua.`uaID` DESC LIMIT 2)
				";			
				
			}
		}



		if(!empty($sub_query)) $post_sub_comments = $this->db->query($sub_query)->result();


		$i=0;
		foreach($post as $post_array){
			$j=0;
			foreach($post_comments  as $comments){
				if($post_array->postId === $comments->catID){
					$post[$i]->comments[] = array(
						'comment'	=> $comments->uaDescription,
						'photo'	=> $comments->photo,
						'custID'	=> $comments->custID,
						'custName'	=> $comments->custName,
						'uaID'	=> $comments->uaID,
						'catID'	=> $comments->catID,
						'sub_liked' => $comments->sub_liked,
						'total_likes' => $comments->total_likes,
						'total_comments' => $comments->total_comments					
					);
					
					foreach($post_sub_comments  as $sub_comments){
						if($comments->uaID === $sub_comments->catID){
							$post[$i]->comments[$j]['sub_comments'][] = array(
								'sub_comment'	=> $sub_comments->uaDescription,
								'sub_photo'	=> $sub_comments->photo,
								'sub_custID'	=> $sub_comments->custID,
								'sub_custName'	=> $sub_comments->custName,
								'sub_uaID'	=> $sub_comments->uaID,
								'sub_catID'	=> $sub_comments->catID,
								'sub_sub_liked' => $sub_comments->sub_sub_liked,
								'sub_total_likes' => $sub_comments->sub_total_likes
							);
						
						}

					}						
					$j++;	
				}				
			}
			$i++;
		}
		return $post;
		
	}

	public function getSinglePost($id)
	{   
		
		return $this->db->select('p.*')->from($this->table_name.' p')
		->where('p.postId',$id)
		->where('p.custID',$this->session->userdata['profile_data'][0]['custID'])
		->get()->row();
	}

/*	function user_comments(){
	



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
	}*/
	public function display_comment_post()
	{
	$postid = $this->input->get('postid');
        //$limits = $this->input->get('limits');
        $inc = $this->input->get('inc');

        $query = $this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`uaCategory`='POST' AND ua.`catID`= $postid ORDER BY ua.`uaID` DESC LIMIT $inc,4");
        return $query->result();
	}
	public function delete_single_forum_comment()
    	{

		return $this->db->where('uaID',$this->input->post('comment_id'))
				->where('custID',$this->session->userdata['profile_data'][0]['custID'])
				->delete('useraction');

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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */