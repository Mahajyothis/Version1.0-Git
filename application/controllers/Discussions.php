<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Discussions extends CI_Controller{

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('profile_data')) redirect('');
        $this->load->model('Discussions_model');
        $this->load->helper('form');
        $this->load->library("pagination");
        $this->Common_model->checkLogin();
        $this->load->model('Language_model');
    }

    public function index(){

        /* Pagging configurations */
        $config = array();
        $config["base_url"] = base_url() . "discussions/index";
        $config["total_rows"] = $this->Discussions_model->discussions_total();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['titleHead'] = 'Discussions';
        $data['totalDis'] =    $this->Discussions_model->discussions_total();
        $data['page_name'] = 'discussions';
        $data['redirect_page'] = 'discussions';
        $data["all"] = $this->Discussions_model->get_discussions(0,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data["hidden"] = $this->Discussions_model->getting_hidden_discussions();
        
        $page_name = 'discussions';
        
        $data['lang'] = $this->Language_model->LangCompatible($page_name);
        //-----------------------------------------------------------------------------------
        $did = $this->input->get("did");
        $data['total_likes'] = $this->Discussions_model->get_likes_discussions($did);
        //-----------------------------------------------------------------------------------
        
        $this->load->view('discussions/discussions',$data);
    }

   	public function add()
    {
       
            $data['custID']  = $this->input->post('custID');
            $data['titleDis']  = trim($this->input->post('titleDis'));
            $data['bodyDis']  = trim($this->input->post('bodyDis'));
            $data['category'] = $this->input->post('category');
            $data['privacy']     = $this->input->post('privacy');
            $data['dDate']   = date("Y-m-d H:i:s");
			$data['slug']   = url_title($this->input->post('titleDis'), 'dash', TRUE);
			
            $status = $this->Discussions_model->insert_discussions($data);
          
		    echo $status;
		    
		     /* Create activity log */
		$this->log_array = array(
		'pid'	=> $status,
		'module'	=> 'Discussions',
		'action'	=> 'Create new discussion',
		'table'	=> 'discussions',
		'comments'	=> ''
		);
		$this->Common_model->create_log($this->log_array);
		
		 /* Create activity log */
	
    }

    public function own(){
    

        $user = $this->session->userdata('profile_data');

        /* Pagging configurations */
        $config = array();
        $config["base_url"] = base_url() . "discussions/own";
        $config["total_rows"] = $this->Discussions_model->discussions_total_with_custID($user[0]['custID']);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['redirect_page'] = 'my_discussions';
        $data['titleHead'] = 'My Discussions';
        $data['page_name'] = 'discussions';
        $data['totalDis'] =    $this->Discussions_model->discussions_total_with_custID($user[0]['custID']);

        $data['all']= $this->Discussions_model->get_discussions($user[0]['custID'],$config["per_page"], $page);
        
        $page_name = 'discussions';
        
        $data['lang'] = $this->Language_model->LangCompatible($page_name);
        
        
        
        $data["links"] = $this->pagination->create_links();
        //-----------------------------------------------------------------------------------
        $did = $this->input->get("did");
        $data['total_likes'] = $this->Discussions_model->get_likes_discussions($did);
        //-----------------------------------------------------------------------------------


        $this->load->view('discussions/discussions',$data);



    }

    public function public_discussions(){



        /* Pagging configurations */
        $config = array();
        $config["base_url"] = base_url() . "discussions/public_discussions";
        $config["total_rows"] = $this->Discussions_model->discussions_total();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['totalDis'] =    $this->Discussions_model->discussions_total();
        $data['titleHead'] = 'Public Discussions';
        $data['page_name'] = 'discussions';
        $data['redirect_page'] = 'public_discussions';
        $data["all"] = $this->Discussions_model->get_discussions(0,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $data["hidden"] = $this->Discussions_model->getting_hidden_discussions();

        //-----------------------------------------------------------------------------------
        $did = $this->input->get("did");
        $data['total_likes'] = $this->Discussions_model->get_likes_discussions($did);
        
        $page_name = 'discussions';
        
        $data['lang'] = $this->Language_model->LangCompatible($page_name);
        //-----------------------------------------------------------------------------------

        $this->load->view('discussions/discussions',$data);

    }


    public function view(){

        $url = explode('-',$this->uri->segment(3));
        $id = $url[0];
        
         $dis_exists_checking = $this->Discussions_model->dis_exists_checking($id);
        
        if($dis_exists_checking == 0)
        {
        	redirect('discussions');
        }
        else
        {
        
	        $data['results'] = $this->Discussions_model->get_discussions_by_id($id);
	        
	        if(($data['results'][0]->custID == $this->session->userdata['profile_data'][0]['custID']) || ($data['results'][0]->privacy == 1))
	        {
	        
	        $data['results'] = $this->Discussions_model->get_discussions_by_id($id);
	        
	        //-----------------------------------------------------
	        $data['all_discussions'] = $this->Discussions_model->display_comments();
	
	
	
	        $id = $this->uri->segment(3);
	        $iid = explode("-",$id);
	        $iiid = $iid[0];
	
	        $query = $this->db->query("SELECT
	                                    *
	                                    FROM
	                                    customermaster cust
	                                   left join
	                                    personalphoto pp
	                                    on pp.custID=cust.custID
	
	                                   left join
	                                    useraction tdm
	                                    on tdm.custID=cust.custID
	                                    where tdm.catID=$iiid order by uaID desc");
	        $data['total_d']= $query->num_rows();
	
	        $data['total_views'] = $this->Discussions_model->views($id);
		$data['comments'] = $this->Discussions_model->comments($id);
		$data['total_likes'] = $this->Discussions_model->likes($id);
		$data['liked'] = $this->Discussions_model->liked($id);
		
		$page_name = 'discussions';
	        
	        $data['lang'] = $this->Language_model->LangCompatible($page_name);
	
		//---------------------Rohitdutta--------------------------------------------------
		$data['total_discussion_comments'] = $this->Discussions_model->total_count_comments();
		
		//-----------------------------------------------------
	       $this->load->view('discussions/view_discussion',$data);
	       
	       }
	        else
	        {
	          redirect('discussions');
	        }
	        
	}

       

    }



    public function delete()
    {
        
		$id = $this->input->post('id');
       
        	$res = $this->Discussions_model->delete_discussion($id);
        
		echo $res;
    }

     public function update()
	{
		$id = $this->input->post('id');
		
		$data['titleDis']    = trim($this->input->post('titleDis'));
        $data['bodyDis']         = trim($this->input->post('bodyDis'));
        $data['category']         = $this->input->post('category');
        $data['privacy']     = $this->input->post('privacy');
		$data['slug']   = url_title($this->input->post('titleDis'), 'dash', TRUE);
		
		$res  = $this->Discussions_model->update_discussion($data,$id);
		
		echo $res;
	
		
	}

    public function update_visableStatus()
    {
        
		 $id = $this->input->post('id');
			
		    if($this->Discussions_model->hidden_dis_checking($id) == 0)
			{
		      $res = $this->Discussions_model->makeHiddenDis($id);
		      echo $res;
		    }
	
    }





    public function discussions_like()
    {
        $this->Discussions_model->insert_discussion_like();
    }
    public function discussions_likes_html()
    {
        $this->load->view("discussions_like");
    }
    public function get_discussions_likes()
    {
        $this->Discussions_model->get_likes_discussions();
    }


    public function comment_on_discussion()
    {
        $this->Discussions_model->store_comment();

    }
   /* public function get_all_coments()
    {

        $datas = $this->Discussions_model->display_comments();
        foreach($datas as $all_datas)
        {
            echo "<table>";
            echo "<tr><td>";
            echo "<p>".$all_datas->uaDescription."</p>";
            echo "</td></tr>";
            echo "</table>";
        }
    }*/
    public function display_commentssss()
    {
        
        
        $discussion_id = $this->input->get("did");
        $datas=$this->Discussions_model->display_comments_two();
        foreach($datas as $all_datas)
        {
            echo '<div id="singlecomment_'.$all_datas->uaID.'">';
            echo " <div class='display_comment' id='margin'><p style='margin:14px 15px 4px;font-size: 13px;'>";
            
			
			if(ISSET($all_datas->photo)){
				echo "<img class='pro-disc-1' src=/uploads/".$all_datas->photo.">";
			}
			else{
				echo "<img class='pro-disc-1' src='/uploads/profile.png'>";
			}
		    echo "</p>";
			
            echo '<div class="custname-disc-1" style=""><p id="update_com_'.$all_datas->uaID.'">'.$all_datas->uaDescription.'</p></div><span>';
            if($this->session->userdata['profile_data'][0]['custID'] == $all_datas->custID)
					 {
					 
                                    echo '<a href="javascript:void(0);" style="color:#46b8da;cursor:pointer;" data-commentidedit="'.$all_datas->uaID.'" data-comment="'.$all_datas->uaDescription.'" data-toggle="modal" class="editComment" data-target="#editComment">
                                        <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        
                                        <a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="'.$discussion_id.'" data-commentid="'.$all_datas->uaID.'" class="deleteComment" data-toggle="modal" data-target="#deleteComment"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
                                        
                                        }
                                        else if($this->session->userdata['profile_data'][0]['custID'] == $all_datas->uID)
                                        {
                                        	echo '<a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="'.$discussion_id.'" data-commentid="'.$all_datas->uaID.'" class="deleteComment2" data-toggle="modal" data-target="#deleteComment2"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
                                        }
                                        echo '</span>';



           
           
            echo "</div></div>";   
        }


        /*$did = $this->input->get("did");
        $query = $this->db->query("select comment_id from useraction WHERE catID = $did");
        $total= $query->num_rows();
        //echo "<input type='text' name='total' id='total' value=".$total.">";
        echo $total;*/



    }
    /*
    public function display_more_comments()
    {
        $datas=$this->Discussions_model->display_comments_more();
        foreach($datas as $all_datas)
        {
            echo "<table class='dsplay_ccc' style=' border: 1px solid #ccc;margin: 1%; width: 35%;border-radius:20px'>";
            echo "<tr><td>";
            echo "<img src='/uploads/$all_datas->photo' width='10%' style='margin:1%;
       width: 32px;
    height: 32px;
    border-radius: 50px;'>";

            echo "$all_datas->uaDescription";
            echo "</td></tr>";
            echo "</table>";
        }
    }*/
   /* public function display_more_comments()
    {
        $datas=$this->Discussions_model->display_comments_more();
        foreach($datas as $all_datas)
        {
            
            echo '<div id="singlecomment_'.$all_datas->uaID.'">';
            echo "<table style=' border:margin: 1%;margin-bottom:10px; width: 100%;'>";
            echo "<tr><td>";
			
			if(ISSET($all_datas->photo)){
				echo "<img class='pro-disc-1' src=/uploads/".$all_datas->photo.">";
			}
			else{
				echo "<img class='pro-disc-1' src='/uploads/profile.png'>";
			}
		
            echo '<div class="custname-disc-1" style="margin-left:4.1%"><p id="update_com_'.$all_datas->uaID.'">'.$all_datas->uaDescription.'</p></div><span>';
            if($this->session->userdata['profile_data'][0]['custID'] == $all_datas->custID)
					 {
					 
                                    echo '<a href="javascript:void(0);" style="color:#46b8da;cursor:pointer;" data-commentidedit="'.$all_datas->uaID.'" data-comment="'.$all_datas->uaDescription.'" data-toggle="modal" class="editComment" data-target="#editComment">
                                        <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        
                                        <a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-commentid="'.$all_datas->uaID.'" class="deleteComment" data-toggle="modal" data-target="#deleteComment"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
                                        
                                        }
                                        echo '</span>';



            echo "</td></tr>";
            echo "</table>";
            echo "</div>";   
            }
    }
    */
    
      public function display_more_comments()
     {


  	$discussion_id = $this->input->get("discussion_id");
        
        $datas=$this->Discussions_model->display_comments_more();
        foreach($datas as $all_datas)
        {
            
            echo '<div id="singlecomment_'.$all_datas->uaID.'">';
            echo " <div class='display_comment' id='margin'><p style='margin:14px 15px 4px;font-size: 13px;'>";
            
			
			if(ISSET($all_datas->photo)){
				echo "<img class='pro-disc-1' src=/uploads/".$all_datas->photo.">";
			}
			else{
				echo "<img class='pro-disc-1' src='/uploads/profile.png'>";
			}
		    echo "</p>";
			
            echo '<div class="custname-disc-1" style=""><p id="update_com_'.$all_datas->uaID.'">'.$all_datas->uaDescription.'</p></div><span>';
            if($this->session->userdata['profile_data'][0]['custID'] == $all_datas->custID)
					 {
					 
                                    echo '<a href="javascript:void(0);" style="color:#46b8da;cursor:pointer;" data-commentidedit="'.$all_datas->uaID.'" data-comment="'.$all_datas->uaDescription.'" data-toggle="modal" class="editComment" data-target="#editComment">
                                        <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        
                                        <a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="'.$discussion_id.'" data-commentid="'.$all_datas->uaID.'" class="deleteComment" data-toggle="modal" data-target="#deleteComment"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
                                        
                                        }
                                        else if($this->session->userdata['profile_data'][0]['custID'] == $all_datas->uID)
                                        {
                                        	echo '<a href="javascript:void(0);" style="color:#FF8F00;cursor:pointer;" data-d="'.$discussion_id.'" data-commentid="'.$all_datas->uaID.'" class="deleteComment2" data-toggle="modal" data-target="#deleteComment2"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>';
                                        }
                                        echo '</span>';



           
           
            echo "</div></div>";   
            }
    }

 public function search()
	   {
	                
	                
	                $page_name = 'discussions';
                        $data['lang'] = $this->Language_model->LangCompatible($page_name);
	                
			$data['titleHead'] = 'Discussions';
			$data['totalDis'] =    $this->Discussions_model->discussions_total();
			$data['page_name'] = 'discussions';
			$data['redirect_page'] = 'discussions';
            $data["all"] = $this->Discussions_model->get_search();
            $data["links"] = $this->pagination->create_links();
		    $data["hidden"] = $this->Discussions_model->getting_hidden_discussions();
			$this->load->view('discussions/search_discussions',$data);
	   }
	   public function comment_count(){
	    
	   $id=$this->input->get('id_discussion');
	   //$comment_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='DISCUSSION' AND `catID`='$id' AND `raAction`='COMMENT' ";
	   $comment_count="SELECT count(uaID) as total_comments FROM `useraction` WHERE `catID` = '$id'  and `uaCategory`='DISCUSSION' ";
	   $comment = $this->db->query($comment_count)->result_array();
	   echo $comment[0]['total_comments'];
	   
	   }
	    public function like_count(){
	    
	   $id=$this->input->get('id_discussion');
$comment_count="SELECT COUNT(`catID`) AS `total_likes` FROM `recentactivity` WHERE `raCategory`='DISCUSSION' AND `catID`='$id' AND `raAction`='LIKE' ";
		$comment = $this->db->query($comment_count)->result_array();
		echo $comment[0]['total_likes'];
	   
	   }
	   
	   
	   public function getOneDiscussion(){

		
		 $id = $this->input->post('id');
		 
		 $results = $this->Discussions_model->get_discussions_by_id($id);
			
	    header("content-type:application/json");
		echo json_encode($results);exit;
			
		//	$this->load->view('read_thread',$data);
		
	}
	
	
	//-----------------------Rohitdutta------------------------------
	public function delete_single_discussion_comment()
	{
		$id = $this->input->post("commentd_id");

		$this->Discussions_model->delete_single_discussion_comment_by_id($id);
		
	}
	public function delete_single_discussion_comment1()
	{
		$id = $this->input->post("commentd_id");

		$this->Discussions_model->delete_single_discussion_comment_by_id1($id);
		
	}
	public function get_single_discussion_comment()
	{
		$id = $this->input->post("comment_id");

		
		//$comment_value = $this->input->post("comment_value");

		
		$get_results = $this->Discussions_model->display_single_discussion_comment_by_id($id);
		
		

		
		header("content-type:application/json");
		echo json_encode($get_results);
		exit;
		
		
		
		
	}
	public function update_single_discussion_comment()
	{
		$comment_id = $this->input->post('comment_id');
		
		$comment_value = $this->input->post('comment_value');
		
                $results = $this->Discussions_model->update_single_discussion_comment_by_id($comment_id,$comment_value);
                
                header("content-type:application/json");
		echo json_encode($results);exit;
	}
	//----------------------------------------------------------------



}


?>