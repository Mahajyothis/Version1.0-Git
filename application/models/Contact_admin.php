<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_admin extends CI_Model
{
	function __construct()
	{
		      parent::__construct();
		     }
		     public function index(){
		     
		    
		      $email= $this->input->post('email');
		       $firstname= $this->input->post('firstname');
		         $lastname= $this->input->post('lastname');
		       $subject= $this->input->post('subject');
		      $message= $this->input->post('message');
		     
		       $config = array(
                
	        'mailtype' => 'html',
	        'charset' => 'iso-8859-1',
	        'wordwrap' => TRUE
	    ); 
              $this->load->library('email',$config);
              $this->email->from($email, $firstname);
              $this->email->to('sathish@mahajyothis.in');
              $this->email->subject($subject);
              $this->email->message('
		<body style="margin:0 auto; padding:0">
		<div class="container" style=" margin:0 auto; display:block; width:60%">
		<img src="http://version.mahajyothis.net/assets/img/forgot.png" width="100%">
		<h3><span>Dear</span> <span style="color:#FA881A;"> </span></h3>
		<p class="paragp" style="text-align:justify; text-indent:8%">
		'.$message.'
		</p>
		<div class="flt-rht" style="float:right">
		<h4 style="line-height:0">Regards</h4>
		<p style="line-height:0">'.$firstname.'</p>
		<p  style="line-height:0"></p>
		</div>
		</div>
		</body>' );

              $this->email->send();
		      
		      
		      
		      
		      
		      }
		      }