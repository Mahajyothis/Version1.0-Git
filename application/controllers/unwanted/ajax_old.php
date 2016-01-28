<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ajax extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->database();
		$this->load->model('Discussions_model');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index(){
            $data['all']= $this->Discussions_model->get_discussions();
			$data['titleHead'] = 'Discussions';
			$data['totalDis'] =    $this->Discussions_model->discussions_total();
			$data['page_name'] = 'discussions';
			$this->load->view('discussions',$data);
	}
	
	public function add()
    {
       
            $data['custID']        = $this->input->post('userID');
            $data['titleDis']    = $this->input->post('titleDis');
            $data['bodyDis']         = $this->input->post('bodyDis');
            $data['privacy']     = $this->input->post('privacy');
			$data['dDate']       = time();
            $status = $this->Discussions_model->insert_discussions($data); 
			//$this->db->insert('discussions', $data);
            //$inset_id = mysql_insert_id();
           //echo $status;
            redirect(base_url() . 'discussions', 'refresh');

    }
	
	public function my_discussions(){
	        $user = $this->session->userdata('profile_data');
			//print_r($user[0]['custID']);exit;
            $data['all']= $this->Discussions_model->get_discussions($user[0]['custID']);
			$data['totalDis'] =    $this->Discussions_model->discussions_total_with_custID($user[0]['custID']);
			$data['titleHead'] = 'My Discussions';
			$data['page_name'] = 'discussions';
			$this->load->view('discussions',$data);
	}
	
	public function autoload(){
	        $data['all']= $this->Discussions_model->get_discussions();
			$data['totalDis'] =    $this->Discussions_model->discussions_total();
			$data['titleHead'] = 'Public Discussions';
			$data['page_name'] = 'discussions';
			$this->load->view('discussions',$data);
	}
	
	
	
	
}	


?>
