<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar_process extends CI_Model
{
		function __construct()
	{
		parent::__construct();
		 $this->load->database();
		// $this->load->library('session');
}
function index(){
//Select National Events
$langquery="SELECT * FROM `internationalcalendar` "; 
$langresult= $this->db->query($langquery);
}}
