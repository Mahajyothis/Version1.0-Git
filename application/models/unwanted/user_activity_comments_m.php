<?php
class user_activity_comments_m extends ci_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        $pid = urldecode($this->input->get('pid'));
        $cat=urldecode($this->input->get('cat'));
        $uid=$this->input->get('uid');
        $cid=$this->input->get('cid');
        $user_comment=$this->input->get('user_comment');
        $act=$this->input->get('act');
        $inc=$this->input->get('inc');

        if($act=='COMMENT')
        {
        $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$pid' ORDER BY ua.`uaID` DESC LIMIT $inc,4
		";
            $select_com = $this->db->query($select_comment);
            return $select_com->result();

            /*foreach ($select_com->result() as $comment_row)
            {
                echo "<div class='col-md-12 even' id='first0' style='margin-bottom:7px;'><img src='../uploads/".$comment_row->photo."' alt='User Profile' style='width: 10%;float: left;'/>
					<h4 id='recents'>".$comment_row->uaDescription."</h4>
				</div>";




            }*/
        }
    }
}

?>