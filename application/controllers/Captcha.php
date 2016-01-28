<?php

class Captcha extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->Common_model->checkLogin();
	}

	public function get_captcha(){
		//session_start();
		$random_alpha = md5(rand());
		$captcha_code = substr($random_alpha, 0, 6);
		$this->session->set_userdata(array('captcha_code' => $captcha_code));
		$target_layer = imagecreatetruecolor(70,30);
		$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
		imagefill($target_layer,0,0,$captcha_background);
		$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
		imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
		header("Content-type: image/jpeg");
		imagejpeg($target_layer);
	}

	public function check(){
		$res = 0;
		if($this->input->post('captcha') && ( $this->input->post('captcha') == $this->session->userdata("captcha_code"))){
			$res = 1;
		}
		echo json_encode($res);exit;
	}
}