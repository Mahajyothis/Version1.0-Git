<?php

class Calendar extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            
           $this->load->helper('url');
$this->load->library('session');
      }

      public function Calen()
      {
    $this->load->view('calendar');
    
             //$this->load->model('calendar_process');
   }    
}