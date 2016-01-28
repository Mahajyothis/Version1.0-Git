<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Main_search extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	
			}
			function mainsearchresult($cat,$q){
				
				switch ($cat) {
	    case "Article":
	        $select="SELECT DISTINCT a.`artTitle` as Title,a.`artSummary` as description,a.`artImage` as photo,a.`artID` as ID FROM `article` a 
		  LEFT JOIN `article_tag_map` atm ON(atm.`artID`=a.`artID`)
		  LEFT JOIN `hash_tags` ht ON(ht.`tagID`=atm.`tagID`)
		  WHERE ht.`tagName` LIKE '%$q%' OR a.`artTitle` LIKE '%$q%'";
	        break;
	    
	    case "events":
	   $select="SELECT DISTINCT e.`name` as Title,e.`description` as description,e.`banner` as photo,e.`id` as ID FROM `events` e 
		   WHERE e.`name` LIKE '%$q%' OR e.`description` LIKE '%$q%'";
	  break;
	   case "group":
	 $select="SELECT DISTINCT mg.`grp_name` as Title,mg.`grp_description` as description,mg.`grp_cover` as photo,mg.`grp_id` as ID FROM `mahagroups` mg
		  
	  WHERE mg.`grp_name` LIKE '%$q%' OR mg.`grp_description` LIKE '%$q%'";
	  break;
	  case "forum";
	  $select="SELECT DISTINCT m.`titleQue` as Title,m.`bodyQue` as description,m.`id_que` as ID FROM `mahaforum` m 
	  
	  WHERE m.`titleQue` LIKE '%$q%' OR m.`bodyQue` LIKE '%$q%'";
	  break;
	  case "post";
	  $select="SELECT DISTINCT a.`artTitle`,a.`artSummary`,a.`artImage`,a.`artID` FROM `article` a 
	  LEFT JOIN `article_tag_map` atm ON(atm.`artID`=a.`artID`)
	  LEFT JOIN `hash_tags` ht ON(ht.`tagID`=atm.`tagID`)
	  WHERE ht.`tagName` LIKE '%$q%' OR a.`artTitle` LIKE '%$q%'";
	  break;
	  case "discussion";
	  $select="SELECT DISTINCT d.`titleDis` as Title,d.`bodyDis` as description,d.`id_dis` as ID FROM `discussions` d 
	  
	  WHERE d.`titleDis` LIKE '%$q%' OR d.`bodyDis` LIKE '%$q%'";
	  break;
	  case "user";
	  
	   $u = explode(" ", $q);
	  if(!empty($u[1])){
				$select="SELECT pd.`perdataFirstName` as Title,pp.`photo` as photo ,cm.`custID` as ID,pfd.`profDesignation` as description  FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)			   
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) 
				WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[1]%') AND pd.`custID`!='0' "; 
				}
				else{
				$select="SELECT (pd.`perdataFirstName`)  as Title,pp.`photo` as photo ,cm.`custID` as ID,pfd.`profDesignation` as description  FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			        LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) 
				WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[0]%') AND pd.`custID`!='0'"; 
				}
				 break;
			         default:
       
			}
				  $row=$this->db->query($select);
				  return $row;
				
			}
			public function searchuser($q){
			
				 $u = explode(" ", $q);
			        if(!empty($u[1])){
				$select="SELECT pd.`perdataFirstName` as Title,pp.`photo` as photo ,cm.`custID` as ID,pfd.`profDesignation` as description  FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)			   
				LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) 
				WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[1]%') AND pd.`custID`!='0' "; 
				}
				else{
				$select="SELECT (pd.`perdataFirstName`)  as Title,pp.`photo` as photo ,cm.`custID` as ID,pfd.`profDesignation` as description  FROM `customermaster` cm 
				LEFT JOIN `accessmaster` am ON(am.`custID`=cm.`custID`) 
				LEFT JOIN `email` e ON(e.`custID`=cm.`custID`) 
				LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
				LEFT JOIN `profdata` pfd ON(pfd.`custID` = cm.`custID`)
				LEFT JOIN `personaldata` pd ON(pd.`custID` = cm.`custID`)
			        LEFT JOIN `address` ad ON(ad.`custID`=cm.`custID`) 
				WHERE (pd.`perdataFirstName` LIKE '%$u[0]%' OR pd.`perdataLastName` LIKE '%$u[0]%') AND pd.`custID`!='0'"; 
				}
				$row=$this->db->query($select);
			        return $row;
				
			}
			
			function searchforum($q){
			
			 $select="SELECT DISTINCT m.`titleQue` as Title,m.`bodyQue` as description,m.`id_que` as ID,m.`slug` FROM `mahaforum` m 
		  	  	  WHERE m.`titleQue` LIKE '%$q%' OR m.`bodyQue` LIKE '%$q%'";
				  $row=$this->db->query($select);
		 		  return $row;
			}
			function searchdiscussion($q){
			 $select="SELECT DISTINCT d.`titleDis` as Title,d.`bodyDis` as description,d.`id_dis` as ID FROM `discussions` d 
			  	  WHERE d.`titleDis` LIKE '%$q%' OR d.`bodyDis` LIKE '%$q%'";
				  $row=$this->db->query($select);
			  	  return $row;
			}
			function searchevents($q){
			 $select="SELECT DISTINCT e.`name` as Title,e.`description` as description,e.`banner` as photo,e.`id` as ID FROM `events` e 
			  	  WHERE e.`name` LIKE '%$q%' OR e.`description` LIKE '%$q%'";
			  	  $row=$this->db->query($select);
			  	  return $row;
			}
			function searchgroup($q){
			$select="SELECT DISTINCT mg.`grp_name` as Title,mg.`grp_description` as description,mg.`grp_cover` as photo,mg.`grp_id` as ID FROM `mahagroups` mg
		  	 	 WHERE mg.`grp_name` LIKE '%$q%' OR mg.`grp_description` LIKE '%$q%'";
			         $row=$this->db->query($select);
			  	 return $row;
			}
			
			function searcharticle($q){
				 $select="SELECT DISTINCT a.`artTitle` as Title,a.`artSummary` as description,a.`artImage` as photo,a.`artID` as ID FROM `article` a 
					  LEFT JOIN `article_tag_map` atm ON(atm.`artID`=a.`artID`)
					  LEFT JOIN `hash_tags` ht ON(ht.`tagID`=atm.`tagID`)
					  WHERE ht.`tagName` LIKE '%$q%' OR a.`artTitle` LIKE '%$q%'";
				  	  $row=$this->db->query($select);
				  	  return $row;
			}
			function searchblog($q){
				 $con=mysqli_connect("localhost","i1377917_jos1","L&tm8PaEjM02((1","i1377917_jos1");
				 $select="SELECT DISTINCT p.`title` as Title,p.`image` as photo,p.`id` as ID,p.`permalink` as link  FROM `jos_easyblog_post` p 
					  JOIN `jos_easyblog_post_tag` pt ON(pt.`post_id`=p.`id`)
					  JOIN `jos_easyblog_tag` t ON(t.`id`=pt.`tag_id`)
					  WHERE t.`title` LIKE '%$q%' OR p.`title` LIKE '%$q%'";
					  $row=mysqli_query($con,$select);
					  return $row;
			}
			public function home_search($q){
			
			$my_data=str_replace("'", "", $q);		
						/*** query the database ***/
						
						$select ="SELECT DISTINCT pd.`perdataFirstName`,pd.`perdataLastName`,pp.`photo`,prd.`profDesignation`,a.`addrState`,a.`addrCity`,a.`addrPostCode`,cm.`custID` FROM customermaster cm
						LEFT JOIN `personaldata` pd ON(pd.custID=cm.custID)
						LEFT JOIN `profdata` prd ON(prd.`custID`=pd.`custID`)
						LEFT JOIN `address` a ON(a.`custID`=pd.`custID`)
						LEFT JOIN `personalphoto` pp ON(pp.`custID`=pd.`custID`)
						WHERE pd.`perdataFirstName` LIKE '%$my_data%' OR pd.`perdataLastName` LIKE '%$my_data%'  ORDER BY pd.`perdataFirstName` ASC LIMIT 5";
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");
                                                 $result=$this->db->query($select);
                                                 
						return $result->result();
			
			}
			
			
			
			
	
}




?>