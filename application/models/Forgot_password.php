<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Model
{
	function __construct()
	{
		      parent::__construct();
		   
		      $email= $this->input->get('forgotemail');
		      //Check wheather the email is already exist or not
                      $query1 = $this->db->get_where('email', array('emailID' => $email),1);
                   
       if ($query1->num_rows()== 1)
      {
             //Generate randaom variable as a temperoryy password 
           $rs= "MAVRF".rand(10000,99999);
           //update the temperory password into the database
           
          	 $crypt_options = array(
		'cost' => 12
		);
		$hashedPassword = password_hash($rs, PASSWORD_BCRYPT,$crypt_options);
           
           $sql='UPDATE `accessmaster` am  LEFT JOIN `email` e ON(e.`custID`=am.`custID`) SET am.`accPWD`="'.$hashedPassword .'" WHERE e.`emailID`="'.$email.'"';
           $query = $this->db->query($sql);
           
	  $joomla=$this->db->select('cm.joomlaID')->from('customermaster cm')->join('email e', 'e.custID=cm.custID')->where('e.emailID',$email)->get()->result_array();
          //now we will send an email
          
           $config = array(
                
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    ); 
              $this->load->library('email',$config);
              $this->email->from('info@mahajyothis.in', 'Mahajyothis');
              $this->email->to($email);
              $this->email->subject('PASSWORD RESET FROM MAHAJYOTHIS');
              $this->email->message('<div class="container" style="margin:0 auto;width: 640px;margin-top:100px;">
				<div class="head" style="width:640px; height:150px;background-image: url(http://version.mahajyothis.net/assets/img/forgot.png);">
				<h3 id="first" style="color:white;margin-left:20px;padding:0;font-family: arial;font-size: 18px;padding-top: 22px;">Action required:</h3>
				<h1 id="second" style="color:white;	margin-left:20px;padding:0;	font-family: arial;	font-size: 24px;">Please verify your email address .</h1>
				</div>
					<p id="para" style="color:#676767;margin-top:12px;padding-left:20px;font-family: arial;	line-height: 24px;">					
					Dear user,<br></p>
					<p id="para" style="color:#676767;margin-top:12px;padding-left:20px;font-family: arial;	line-height: 24px;">					
					You recently requested a password reset.<br>
					<br>
					
					To change your Mahajyothis password, click here or paste the following <br> 
					 linkinto your browser:<a href="http://version.mahajyothis.net/">https://version.mahajyothis.net</a>
					<br>
					The link will expire in 24 hours, so be sure to use it right away.<br>					
					<b>Password:</b>'.$rs.'<br>
					Thanks for using,
					</p>
					<h2 id="tit" style="margin-top:12px;padding-left:20px;"><b>Mahajyothis ltd<b><h2>
					<h6 id="under" style="font-size: 9px;margin-top: -25px;">Enlightening by the inheritance of india<h6>
					<div class="footer" style="height:30px;	background-color:#8A8A8A;margin-top:-19px;"></div>
			</div>			' );

              $this->email->send();
              $data=array(
              'password' => $rs,
              'joomlaID' => $joomla[0]['joomlaID']
              );
                
           echo json_encode($data);
            
              } else {
              $data=array(
              'password' => 0,
              'joomlaID' => 0
              
              );
                
           echo json_encode($data);
              }             
         }
        
         }
	
	 
	
	