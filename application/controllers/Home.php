<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  
  public function index()
  {
  $this->load->model('home_model');
  $this->load->model('Language_model');
  $page='maha_home';
  $data=array();
  $data['recentblogs'] = $this->home_model->recentblogs();
  $data['personalities'] = $this->home_model->personalities();
  $data['recentarticles'] = $this->home_model->recentArticles();
  $data['recentcourses'] = $this->home_model->recentCourses();
  $data['lang'] = $this->Language_model->LangCompatible($page);
  $data['languageLabels'] = $this->Language_model->getLanguageLabels()->result();
	if(MOBILE_SITE) {
		$data['logo_login_part'] = $this->load->view('modules/logo-login',$data,TRUE);
		$this->load->view('modules/header',$data);
		$this->load->view('home',$data);
		$this->load->view('modules/footer',$data);
	}
	else $this->load->view('home',$data);
  }

  public function index_mobile()
  {
$data['page_name']='maha_home';
    $this->load->model('Language_model');
    $data['lang'] = $this->Language_model->LangCompatible($data['page_name'],array('title'));
	
    $this->load->view('modules/header',$data);
    $this->load->view('home_wall',$data);
  }

  public function set_language()
  {
    $this->load->model('Language_model');
    if($this->input->post('lang')){
         $this->session->set_userdata('language',$this->input->post('lang'));
         if($this->input->post('store')) $this->Language_model->updateLanguage($this->input->post('lang')); 
    }
    echo 1;exit;
  }
  public function profile()
  {
  
    $this->load->view('profile');
  }
  public function verify($verificationText=NULL){
  

    $this->load->model('verify_model');
    $id=$this->uri->segment(4);
    
    $this->session->set_userdata('cont_id',$id);
    
    $no_row = $this->verify_model->userEmail_verification($verificationText,$id);
    
    //echo $_SESSION['id'];
    //$this->load->view('home');
    
    redirect('');
    
  }
  public function newsletter(){
    $this->load->model('home_model');
      return  $this->home_model->newsletter_subs($this->input->post('sub_email'));
 	     }
  
}