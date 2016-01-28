<?php

class Business extends CI_Controller {
	//CONSTRUCTOR
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Basicprofile_process');
	}

	public function whatsapp(){
		$this->load->model('Language_model');
	        $page='bussiness_module';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
			
		$this->load->view('business_services/whatsapp_popup',$data);
	}
	
	public function hangout(){
	
		$this->load->view('business_services/hangout_popup');
	}
	
	public function skype(){
		$this->load->view('business_services/skype_popup');
	}
	
	public function textmessage(){
		$this->load->model('Language_model');
	        $page='bussiness_module';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		
		$this->load->view('business_services/textMessage_popup',$data);
	}
	
	public function email($id){
		$this->load->model('Language_model');
		
	        $page='bussiness_module';
		$data=array();
		$data['lang'] = $this->Language_model->LangCompatible($page,$lang="");
		$data['userData'] = $this->Basicprofile_process->getUserDataBS($id);
		$this->load->view('business_services/email_popup',$data);
	}
	
	public function send_text_msg(){

		// Replace with your username
		$user = $this->config->item('TMUsername');

		// Replace with your API KEY (We have sent API KEY on activation email, also available on panel)
		$apikey = $this->config->item('TMAPI'); 

		// Replace if you have your own Sender ID, else donot change
		$senderid  =  $this->config->item('TMSenderID'); 

		// Replace with the destination mobile Number to which you want to send sms
		$mobile  =  $this->input->post('reciepient'); 

		// Replace with your Message content
		$message   =  $this->input->post('message'); 
		$message = urlencode($message);

		// For Plain Text, use "txt" ; for Unicode symbols or regional Languages like hindi/tamil/kannada use "uni"
		$type   =  "txt";

		$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $output = curl_exec($ch);      
		    curl_close($ch); 

		// Display MSGID of the successful sms push
		echo $output;
	
	}
	
	public function send_email(){
	
		$message   =  $this->input->post('message'); 
		$to =  $this->input->post('reciepient'); 
		$subject =  $this->input->post('subject'); 
		if($to && $message) {
			$this->sendEmail($to,$subject,$message);
			$mailId = $this->Basicprofile_process->storeMails($to,$subject,$message);
			// ------ CREATE ACTIVITY LOG ------ //
				$this->log_array = array(
						'pid'		=> $mailId,
						'module'	=> 'Business Service Email',
						'action'	=> 'mail',
						'table'		=> 'business_service_mails',
						'comments'	=> ''
					);
				$this->Common_model->create_log($this->log_array);
				/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //
		}
		echo 1;
		exit;
	
	
	}
	
	public function send_whatsapp_msg(){

		if(!empty($_FILES['image']['name'][0])){
			$this->upload_files('image');
			exit;
		}

		if(!empty($_FILES['audio']['name'][0])){

			$this->upload_files('audio');
		}

		if(!empty($_FILES['video']['name'][0])){

			$this->upload_files('video');
			exit;
		}

		if($this->input->post('doSend')){

			require_once 'business_services/whatsapp/vendor/autoload.php';
			$username = $this->config->item('WhatsAppNumber'); //Mobile Phone prefixed with country code so for india it will be 91xxxxxxxx
			$password = $this->config->item('WhatsAppPassword');
			 
			$w = new WhatsProt($username, 'Mahajyothis', "Mahajyothis", true); //Name your application by replacing "WhatsApp Messaging"
			$w->connect();
			$w->loginWithPassword($password);
			 
			$target = $this->input->post('reciepient'); //Target Phone,reciever phone
			$message = $this->input->post('message');
			$location = $this->input->post('location');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			 
			$w->SendPresenceSubscription($target); //Let us first send presence to user
			if($latitude && $longitude) {
				$w->sendBroadcastLocation($target,$latitude,$longitude,$location ); // Send Location
			}

			if($message) $w->sendMessage($target,$message ); // Send Message

			$this->send_files($w,$target);

			echo json_decode(1);
			exit;

			}
	}


	public function send_files($w,$target){
		if(!empty($this->session->userdata['profile_data'])){
		  	$folders = array('image','audio','video');
		  	foreach ($folders as $type) {
		  		$func = 'sendBroadcast'.ucfirst($type);
		  		$dir_name = $type.'_'.$this->session->userdata['profile_data'][0]['custID'];
			  	$dir_path = 'business_services/whatsapp/media/'.$dir_name;
			  	if (is_dir($dir_path)) {
			        if ($dh = opendir($dir_path)){
					    while (($file = readdir($dh)) !== false){
					      if(file_exists($dir_path.'/'.$file)){
					      	$w->$func($target,$dir_path.'/'.$file,false,0,"",$type.' Test');
					      } 
					    }
					    closedir($dh);
					}
					$this->deleteDir($dir_path);
			    }
		  	}  
	  	}  
	    
	}

	public function upload_files($type){
		$result = 0;
	    if(!empty($_FILES[$type])){

				$dir_name = $type.'_'.$this->session->userdata['profile_data'][0]['custID'];
				$dir_path = 'business_services/whatsapp/media/'.$dir_name;
				$func = 'sendBroadcast'.ucfirst($type);

				if (is_dir($dir_path)) $this->deleteDir($dir_path);
				// Create a directory
				mkdir($dir_path);

				foreach($_FILES[$type]["error"] as $key => $error) {
				    if ($error == UPLOAD_ERR_OK) { 	
				        $tmp_name = $_FILES[$type]["tmp_name"][$key];
				        $name = $_FILES[$type]["name"][$key];
				        move_uploaded_file($tmp_name, $dir_path.'/'.$name);
				    }
				}
				$result = 0;
			}
			echo $result;exit;
	}

	public static function deleteDir($dirPath) {
	    if (! is_dir($dirPath)) {
	        throw new InvalidArgumentException("$dirPath must be a directory");
	    }
	    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
	        $dirPath .= '/';
	    }
	    $files = glob($dirPath . '*', GLOB_MARK);
	    foreach ($files as $file) {
	        if (is_dir($file)) {
	            self::deleteDir($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($dirPath);
	}

	private function sendEmail($to,$subject,$msg){
		$headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $from = $this->session->userdata['profile_data']['0']['emailID'];
            $headers .= "From: $from\n";

            $mailbody = '<html>
                        <head>
                        <title>HTML email</title>
                        </head>
                        <body>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
                          <tr>
                            <td><table style="border:5px solid #367fa9;width:600;background:#FFFFFF" cellspacing="0" cellpadding="0" align="center">           
                                <tr>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="10%">&nbsp;</td>
                                        <td width="80%" align="left" valign="top">
                                          <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">' .

                                        $msg
                                        . '</font></td>
                                        <td width="10%">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td></td>
                                          </tr>
                                        </table></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></body>
                        </html>';
            mail($to, $subject, $mailbody, $headers);
	}
	
	
}
/* End of file */
?>