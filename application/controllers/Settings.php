<?php

class Settings extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
           $this->Common_model->checkLogin();
            
      }

      public function Setting_get()
      {
      
    $this->load->model('setting_process');
     // $this->load->view('settings');
          
   }    
}