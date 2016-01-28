<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	function __construct()
      {
            parent::__construct();
           $this->Common_model->checkLogin();
            
      }
	public function index()
	{
	
		$this->load->helper('url');
		$this->load->model('user_activity');
		
	}
	
    public function event_status_change(){
    
                 $pid = urldecode($this->input->get('pid'));
		 $cat=urldecode($this->input->get('cat'));
		 $ui=$this->input->get('uid');
		
		 $cid=$this->input->get('cid');
		 if(!empty($ui)){$uid=$ui;}if($ui==0){$uid=$cid;}
		 $user_comment=$this->input->get('user_comment');
		 $act=$this->input->get('act');
		 $status=$this->input->get('status');
                 $data=array( 'eventID' => $pid,
		 	       'custID' => $cid
		 	       );
		 $data1=array(
		 		'raCategory' => $cat,
		 		'custID' => $cid,
		 		'catID' => $pid
		 		 );
		 
		 if($status=='Joined'){
		 $update="UPDATE `recentactivity` SET `raMessage`='$status' WHERE `raCategory`='$cat' AND `custID`='$cid' AND `catID`='$pid' ";
		 $this->db->query($update);
		 $update_status="UPDATE `event_status` SET `status`='1' WHERE `eventID`='$pid' AND `custID`='$cid' ";
		 $this->db->query($update_status);
		
		 }
		 if($status=='MaybeJoin'){
		 $update="UPDATE `recentactivity` SET `raMessage`='May be Join' WHERE `raCategory`='$cat' AND `custID`='$cid' AND `catID`='$pid' ";
		 $this->db->query($update);
		 $update_status="UPDATE `event_status` SET `status`='2' WHERE `eventID`='$pid' AND `custID`='$cid' ";
		 $this->db->query($update_status);
		 }
		 if($status=='Declined'){
		 $this->db->delete('recentactivity',$data1);
		 $this->db->delete('event_status',$data);
		  }
    
    
    }
    
    
    
    
    public function get_four_comments()
    {


        
        $pid = urldecode($this->input->get('pid'));
        
       
        $act=$this->input->get('act');
        $inc=$this->input->get('inc');


        if($act=='COMMENT')
        {

        $select_comment=$this->db->query("SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`=$pid ORDER BY ua.`uaID` DESC LIMIT $inc,4
		");



            if($select_comment->result() == true)
            {

                foreach ($select_comment->result() as $comment_row)
                {

                    echo "<div class='col-md-12 even chld-cls no-padding1 wrap-com' id='first0' style='margin-bottom:7px;width: 90%;height: auto;'>
                                <div style='float: left;background-color: rgba(185, 214, 214, 0.48);border-radius: 8px 0 0 8px;'><div class='col-md-2 img-cls-pro'><span>

                                ";
                    if(ISSET($comment_row->photo))
                    {
                        echo "<img src='../uploads/".$comment_row->photo."'  alt='User Profile' style='width:35px;height:35px;float: left;margin-bottom:7px;border-radius: 50px;margin-top: 6px;'/>";
                    }
                    else{
                        echo "<img src='../uploads/profile.png'  alt='User Profile' style='width:35px;height:35px;float: left;margin-bottom:7px;border-radius: 50px;margin-top: 6px;'/>";
                    }



                    echo "</span></div></div>
                <p id='recents' >".$comment_row->uaDescription."</p>
                </div>";


                }
                return 1;
            }
            else
            {
                return 0;
            }


            

        }

        

    }
       
	
}