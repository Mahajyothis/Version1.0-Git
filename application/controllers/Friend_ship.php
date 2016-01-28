<?php

class Friend_ship extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            
           $this->load->helper('url');
$this->load->library('session');
      }

      public function Friendship()
      {
      
    $this->load->model('friendshipmeter');
    
            
   }    
}