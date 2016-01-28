<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Home_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	
	}

	
	public function recentblogs(){
		/* $CI = &get_instance();
		$this->db2 = $CI->load->database('blog', TRUE);
		$select="SELECT permalink,image,title FROM `jos_easyblog_post` WHERE `image`!=''  ORDER BY `id` DESC LIMIT 4";
		$result=$this->db2->query($select)->result();
		return $result; */
		
	}
	public function personalities(){
		
		$this->db->select("cm.custID,cm.custName,ph.photo,CONCAT(pd.perdataFirstName, ' ', pd.perdataLastName) AS perdataFullName,pda.profProfession,
		(SELECT count(*) FROM `totalviews` WHERE `uID` = cm.custID) as views,
		(SELECT COUNT(*) FROM `userfollowing` WHERE `cID`=cm.`custID` OR `custID`=cm.`custID`) as circles,
		(SELECT count(*) FROM `recentactivity` WHERE `raAction` = 'LIKE' AND raCategory = 'PROFILE' AND uID=cm.custID) as likes,
		((SELECT count(*) FROM `totalviews` WHERE `uID` = cm.custID)+(SELECT COUNT(*) FROM `userfollowing` WHERE `cID`=cm.`custID` OR `custID`=cm.`custID`)+
		(SELECT count(*) FROM `recentactivity` WHERE `raAction` = 'LIKE' AND raCategory = 'PROFILE' AND uID=cm.custID))
		as sum
		",FALSE)
		->from('customermaster cm')	
		->join('personaldata pd','pd.custID=cm.custID','LEFT OUTER')
		->join('personalphoto ph','ph.custID=cm.custID','LEFT OUTER')
		->join('profdata pda','pda.custID=cm.custID','LEFT OUTER')
		->where('cm.custStatus',15);
	         $result = $this->db->order_by('sum','DESC')->limit(4)->get()->result();
		
		return $result;
	}

	public function recentArticles(){
		
		return $this->db->select("artTitle,artSummary,artImage,artID")
		->from('article')
		->where('artStatus',1)
		->order_by('artID','DESC')->limit(4)->get()->result();
		
	}
	public function recentCourses(){
		
		return $this->db->select("ecTitle,ecDescription,ecImage,ecID,slug")
		->from('eduCourse')
		->where('ecStatus',1)->where('ecStatus',1)
		->order_by('ecID','DESC')->limit(4)->get()->result();
		
	}
	public function newsletter_subs($email){
			
			 $count = $this->db->get_where('newsletterSubscription', array('nlsEmail' => $email),1);
		                   
		       if ($count->num_rows()== 0)
		      {
		      $data=array( 
		      		'nlsID' => '',
		                'nlsEmail' => $email
		        );
		      	$this->db->insert('newsletterSubscription',$data);
			echo 0;
			}
			else echo 1;			
			}
	
}
	



?>