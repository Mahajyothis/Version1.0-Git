<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Newsletter_subscription extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		}
			public function newsletter_subs($email){
			
			 $count = $this->db->get_where('email', array('emailID' => $email, 'status' => 1),1);
		                   
		       if ($count->num_rows()== 0)
		      {
		      $data=array( 
		                'status' => 1
		        );
		        $this->where('emailID',$email);
			$this->update('email',$data);
			}
						
			}
}