<?php

class Yourcharecter extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            
           $this->load->helper('url');
$this->load->library('session');
      }

      public function Charecter()
      {
    $this->load->model('Charecter_process');
    
            
   }    
}