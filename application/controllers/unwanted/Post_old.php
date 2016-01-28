<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('profile_data')) redirect('');

		$this->load->library('upload');
		$this->load->library('image_lib'); 

		$this->load->model('Post_model');
		$this->load->helper('form');
		$this->load->library('custom_function');
	}

	public function index($type=''){
			$data = array(
				'title' => 'Post',
				'page_name' => 'post',
				'type' => $type,

			);
            $data['results']= $this->Post_model->get_data($type);
			$data['post_commants'] = $this->Post_model->user_comments();
			$data['total_likes'] = $this->Post_model->user_likes();
			$data['total_comments'] = $this->Post_model->total_comments();
			$this->load->view('post/post.php',$data);
	}

	public function create(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost') && $this->input->post('postContent')) {
		   $results = $this->Post_model->createPost();
		   
		}
		echo $results;exit;
	}

	public function upload_status_image(){
		if(!empty($_FILES['statusImage'])){

            $config  = array();
            //$config['allowed_types'] = 'gif|jpg|png|jpeg';      
            $config['upload_path']   = 'uploads/post/';
            $this->upload->initialize($config);
            $fileNames = array();
            if($this->upload->do_multi_upload('statusImage')){
                $files     = $this->upload->get_multi_upload_data();
                $fileCount = count($files);
                for($i=0;$i<$fileCount;$i++){
                    $fileNames[] = $files[$i]['file_name'];
                }
            }else{
            	echo $this->upload->display_errors('', '');
            	exit;
            }

            $newFileNames = array();
            foreach($fileNames as $file){
                $filename       = rand(1111,9999).'_'.round(microtime(true));
                $ext            = pathinfo($file,PATHINFO_EXTENSION);
                $newFileName    = $filename.'.'.$ext;
                $newFileNames[] = $newFileName;
                rename('uploads/post/'.$file,'uploads/post/'.$newFileName);
            }

            $config = array();

            foreach($newFileNames as $photo){
				$config['image_library']  = 'gd2';
				$config['source_image']   = 'uploads/post/'.$photo;
				$config['new_image']      =  'uploads/post/thumbnails/';
				$config['create_thumb']   = TRUE;
				$config['thumb_marker']   = "";
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 200;
				$config['height']         = 200;
				$this->image_lib->initialize($config); 
				$this->image_lib->resize();

            }

         	$implodedPhotos = implode(',',$newFileNames);
         	echo $implodedPhotos;


            exit;
        }
	}

	public function upload_image($field_name,$upload_path,$thumb=false){

		if($_FILES[$field_name]['error'] == 0){
			//upload and update the file
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['max_size'] = '1000'; 
			$config['max_width'] = '1920'; 
			$config['max_height'] = '1280'; 
			$config['overwrite'] = false;
			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload($field_name))
			{
				$ret_data['error'] = $this->upload->display_errors('', '');
			}
			elseif($thumb)
			{
				
				//Image Resizing
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['new_image'] = $this->upload->upload_path.'thumbs/'.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 270;
				$config['height'] = 420;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){
					$ret_data['error'] = $this->upload->display_errors('', '');$this->image_lib->display_errors('', '');
				}
				
			}
			if(!empty($ret_data)) return 0;
			return $this->upload->file_name;
		}
	}

	public function delete(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('deletePost') && $this->input->post('id')) {
		   $results = $this->Post_model->deletePost();
		   
		}
		echo $results;exit;
	}

	public function get_post(){
		$results = array();
		if ($this->input->is_ajax_request() && $this->input->post('getPost') && $this->input->post('id')) {
		   $results = $this->Post_model->getSinglePost($this->input->post('id'));
		   
		}
		header("content-type:application/json");
		echo json_encode($results);exit;
	}
	
	public function update(){
		$results = 0;
		if ($this->input->is_ajax_request() && $this->input->post('doPost') && $this->input->post('postContent')) {
		   $results = $this->Post_model->updatePost($this->input->post('id'));
		   
		}
		echo $results;exit;
	}

   public function display_comments()
    {
        $datas['data']=$this->Post_model->user_comments();
        foreach($datas['data'] as $all)
        {

            echo "<div class='display_comm' id='margin' style='border-bottom: 1px dashed'><p><img src='/uploads/$all->photo' height='25px' width='25px' style='margin:5%'><b>$all->uaDescription</b></p></div>";
        }

    }




}	


?>
