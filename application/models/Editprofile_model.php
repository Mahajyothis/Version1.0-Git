<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editprofile_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 $this->load->library('session');
	}

	function edit_profile(){

		$inpId = $this->input->post('inpId');
		$inpVal = $this->input->post('inpValue');
		$cid = $this->session->userdata['profile_data'][0]['custID'];

		if($inpId == 'uname'){
			$sql = "UPDATE `customermaster` SET `custName`='$inpVal' WHERE  `custID`='$cid' ";
			$this->update_joomla('usernmae',$inpVal);
		}
		else if($inpId == 'upasswd'){
		
		$crypt_options = array(
		'cost' => 12
		);
		$new_password= password_hash($inpVal, PASSWORD_BCRYPT,$crypt_options);
		
			$sql = "UPDATE `accessmaster` SET `custID`='$cid',`accPWD`='$new_password' WHERE  `custID`='$cid' ";
		}
		
		$query = $this->db->query($sql);

		return $this->db->affected_rows();

	}
	
	function new_pic(){
		$inpId = $this->input->post('inpId');
		$inpVal = $this->input->post('inpValue');
		$cid = $this->session->userdata['profile_data'][0]['custID'];

         $filepath = $_SERVER['DOCUMENT_ROOT']."/uploads/";
		 $name = $this->session->userdata['profile_data'][0]['custID'].'_'.$_FILES['profile_pic']['name'];
		 $size = $_FILES['profile_pic']['size'];
		 $photo_type = $_FILES['profile_pic']['type'];
		

		$tmp = $_FILES['profile_pic']['tmp_name'];
		
		  $upload_image = $filepath .basename($_FILES['profile_pic']['name']);
			 
		    $thumbnail = $filepath .'small_' .$name ;
		    $actual = $filepath .$name ;
		
		    $newwidth = "200"; 
		    $newheight = "200";
		
		if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_image )) 
		    {
		     
		        exec('convert '.$upload_image .' -resize '.$newwidth.'x'.$newheight.'^ '.$thumbnail);
		        rename($upload_image , $actual);
		     /*   unlink("uploads/".$this->session->userdata['profile_data'][0]['photo']);
		        unlink("uploads/small_".$this->session->userdata['profile_data'][0]['photo']);
		        $data=array(
		        'photo' => $name
		        );
		       $this->session->set_userdata("profile_data[0]['photo']",$name); */
			echo "uploaded".$_SERVER['DOCUMENT_ROOT'];
		}
		
		
		
		else{
			echo "not_uploaded";
		}		

		$sql_11 = "UPDATE `personaldata` SET `PerdataProfPict`='$name' WHERE  `custID`='$cid'";
		$this->db->query($sql_11);

		$sql_22 = "UPDATE `personalphoto` SET `photo`='$name' WHERE `custID`='$cid'";
		$this->db->query($sql_22);
		$this->update_joomla('avatar',$name);
		echo  $this->db->affected_rows();
	}
	
	private function update_joomla($type,$value){
		$CI =   &get_instance();
		$this->db2 = $CI->load->database('blog', TRUE);
		if($type == 'usernmae'){
			return $this->db2->where('id',$this->session->userdata['profile_data'][0]['joomlaID'])->update(BLOG_DB_PREFIX.'_users',array('username'=>$value));
		}
		else if($type == 'avatar'){	
			$exist_res = $this->db2->select('count(*) as exist')->from(BLOG_DB_PREFIX.'_easyblog_users')->where('id',$this->session->userdata['profile_data'][0]['joomlaID'])->get()->row();	
			if($exist_res->exist)
				return $this->db2->where('id',$this->session->userdata['profile_data'][0]['joomlaID'])->update(BLOG_DB_PREFIX.'_easyblog_users',array('avatar'=>$value));
			else
				return $this->db2->insert(BLOG_DB_PREFIX.'_easyblog_users',array('id'=>$this->session->userdata['profile_data'][0]['joomlaID'],'avatar'=>$value)); 	
		}
	}
}




?>