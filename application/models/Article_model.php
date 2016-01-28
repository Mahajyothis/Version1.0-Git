<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->where_conditon = array();
		$this->where_conditon_str = '';
if(empty($this->session->userdata['language'])) $this->session->set_userdata('language','english');
    $this->language = '_'.$this->session->userdata['language'];
    if($this->session->userdata['language'] == 'english') $this->language = '';
	}

	public function get_tags(){
		$results = array();
		$db_results = $this->db->select('tagName')->from('hash_tags')->get()->result();
		if($db_results){
			foreach ($db_results as $key => $value) {
				$results[] = $value->tagName;
			}
		}
		return  $results;
	}

	public function totalArticles($type='',$id=''){
		$this->db->select("*")->from('article a');
			switch ($type) {
				case 'latest':
				case 'archived':
					$this->db->where('a.artStatus',1);
					break;
				case 'draft':
					$this->db->where('a.artStatus',0);
					break;
				case 'category':
					$this->db->where(' a.artStatus= 1 AND artID IN (SELECT artID FROM article_category_map WHERE catID = '.$id.')',NULL,FALSE);					
					break;				
				default:
					$this->db->where('a.artStatus',1);		
					break;
			}
			if($this->input->get('article'))	$this->db->like('s.artName',$this->input->get('article'));
			//$this->db->where('e.end_date >=', $this->config->item('global_datetime'));
			return $this->db->count_all_results();

	}

	public function get_article($id,$check_owner=false,$getActivities=false){
		$activity_select = '';
		if($getActivities) $activity_select = '
			, ( SELECT count(*) FROM `recentactivity` WHERE `raCategory`=\'ARTICLE\' AND `catID`='.$id.' AND `raAction`=\'LIKE\' AND `custID`='.$this->session->userdata['profile_data']['0']['custID'].') as liked,
			( SELECT COUNT(`catID`) FROM `recentactivity` WHERE `raCategory`=\'ARTICLE\' AND `catID`='.$id.' AND `raAction`=\'LIKE\' ) AS `totallikes`,
			( SELECT COUNT(`catID`) FROM `useraction` WHERE `uaCategory`=\'ARTICLE\' AND `catID`='.$id.' AND `uaAction`=\'COMMENT\') AS `total_comments`
		';

		if($check_owner) $this->where_conditon_str = ' AND a.artCustID ='.$this->session->userdata['profile_data'][0]['custID'];
		return $this->db->query('
			SELECT a.*,
			( SELECT GROUP_CONCAT(" ",t.tagName) FROM article_tag_map m INNER JOIN hash_tags t ON m.tagID = t.tagID WHERE m.artID = '.$id.' ) as artTags,
			( SELECT GROUP_CONCAT("",c.id) FROM article_category_map cm INNER JOIN category c ON cm.catID = c.id WHERE cm.artID = '.$id.' ) as artCategory,
			( SELECT GROUP_CONCAT("",c.name'.$this->language.') FROM article_category_map cm INNER JOIN category c ON cm.catID = c.id WHERE cm.artID = '.$id.' ) as artCategoryNames
			'.$activity_select.'
			FROM article a
			WHERE a.artID = '.$id
			.$this->where_conditon_str
			)->row();
	}

	public function get_categorised_article($type='',$id='',$limit=10,$offset=0){
		$order_condition = ' ORDER BY a.artID DESC';
		switch ($type) {
			case 'latest':
				$condition = ' AND a.artStatus= 1';
				break;
			case 'draft':
				$condition = ' AND a.artStatus= 0';
				break;
			case 'archived':
				$condition = ' AND a.artStatus= 1';
				$order_condition = ' ORDER BY a.artID ASC';
				break;	
			case 'category':
				$condition = ' AND a.artStatus= 1 AND artID IN (SELECT artID FROM article_category_map WHERE catID = '.$id.')';					
				break;				
			default:
				$condition = ' AND a.artStatus= 1';			
				break;
		}
		return $this->db->query('
			SELECT a.*,
			( SELECT GROUP_CONCAT("",c.name'.$this->language.') as name FROM article_category_map cm INNER JOIN category c ON cm.catID = c.id WHERE cm.artID = a.artID ) as artCategory
			FROM article a
			WHERE 1 '.$condition.$order_condition.' LIMIT '.$offset.','.$limit
			)->result();
	}

	public function check_draft(){
		$this->where_conditon = array('artStatus' => 0, 'artCustID' => $this->session->userdata['profile_data'][0]['custID']);
		return $this->db->select('*')->from('article')->where($this->where_conditon)->get()->num_rows();
	}

	

	public function create_article(){

			// ----- Upload Image ------
			$banner = 0;
			/*if(!empty($_FILES['artImage']['name'])){
				$banner = $this->upload_image('artImage',ARTICLES,false);
				if(!empty($banner['img_error']))
				return $banner;
			}*/
			// ----- Upload Image Ends here ----
			if($artImagePath = $this->input->post('artImage')){
				$artImagePathArray = explode('/',$artImagePath);
				$banner = end($artImagePathArray);
			}
			$data = array(
				'artCustID' => $this->session->userdata['profile_data'][0]['custID'],
				'artTitle' => $this->input->post('artTitle'),
				'artSummary' => $this->input->post('artSummary'),
				'artDesc' => $this->input->post('artDesc'),
				'artStatus' => $this->input->post('artStatus'),
				'artImage' => $banner,
				'artCreated'	=> $this->config->item('global_datetime')
			);
			if(empty($data['artSummary'])) $data['artSummary'] = substr(strip_tags($this->input->post('artDesc')),0,300); // If no summary take first 300 characters of description
			if($this->input->post('doSaveDraft')) $data['artStatus'] = 0; // set status 0 If saving to draft 

			// ----- Creating hash tags ------
			$tag_res = $this->crate_tags();
			$insert_tags = $tag_res['insert_tags'];
			$total_tags = $tag_res['total_tags'];
			// ----- Creating tags ends here ------

		    // ------ Insert article and hash tags to db --- //
			if($data){
				$this->db->insert('article',$data);
				$article_id = $this->db->insert_id();
				if(!empty($insert_tags)) $this->db->insert_batch('hash_tags',$insert_tags);
			}
			// ------ Insert article and hash tags to db ends here --- //
			// ------ MAP ARTICLE AND TAGS ------ //
			$article_tags_res = $this->db->select('tagID')->from('hash_tags')->where_in('tagName',$total_tags)->get()->result();
			if($article_tags_res){
				foreach ($article_tags_res as $key => $value) {
					$ins_map[] = array('artID' => $article_id,'tagID' => $value->tagID);
				}
				if(!empty($ins_map)) $this->db->insert_batch('article_tag_map',$ins_map);
			}
			// ------ MAP ARTICLE AND TAGS ENDS HERE------ //
			// ------ MAP ARTICLE AND CATEGORIES ------ //
			if($artCategory = $this->input->post('artCategory')){
				foreach ($artCategory as $key => $value) {
					$ins_map_cats[] = array('artID' => $article_id,'catID' => $value);
				}
				if(!empty($ins_map_cats)) $this->db->insert_batch('article_category_map',$ins_map_cats);
			}
			// ------ MAP ARTICLE AND CATEGORIES ENDS HERE------ //
			return 1;


	}

	public function edit_article($id){

			

			$data = array(
				'artTitle' => $this->input->post('artTitle'),
				'artSummary' => $this->input->post('artSummary'),
				'artDesc' => $this->input->post('artDesc'),
				'artStatus' => $this->input->post('artStatus'),
				'artUpdated'	=> $this->config->item('global_datetime')
			);
			if(empty($data['artSummary'])) $data['artSummary'] = substr(strip_tags($this->input->post('artDesc')),0,300); // If no summery take first 300 characters of description

			// ----- Creating hash tags ------
			$tag_res = $this->crate_tags();
			$insert_tags = $tag_res['insert_tags'];
			$total_tags = $tag_res['total_tags'];
			// ----- Creating tags ends here ------

	        // ----- Upload Image ------
			/*$banner = 0;
			if(!empty($_FILES['artImage']['name'])){
				$banner = $this->upload_image('artImage',ARTICLES,false);
				if(!empty($banner['img_error'])) return $banner;
				else {
					$data['artImage'] = $banner;
					$this->unlinkImages($id);
				}
			}*/
			if($artImagePath = $this->input->post('artImage')){
				$artImagePathArray = explode('/',$artImagePath);
				$data['artImage'] = end($artImagePathArray);
				$this->unlinkImages($id);
			}
			// ----- Upload Image Ends here ----

		    // ------ Insert article and hash tags to db --- //
			if($data){
				$this->db->where('artID',$id)->update('article',$data);
				if(!empty($insert_tags)) $this->db->insert_batch('hash_tags',$insert_tags);
			}
			// ------ Insert article and hash tags to db ends here --- //
			// ------ MAP ARTICLE AND TAGS ------ //
			$this->db->where('artID',$id)->delete('article_tag_map'); // DELETE OLD ARTICLE TAG MAP
			$article_tags_res = $this->db->select('tagID')->from('hash_tags')->where_in('tagName',$total_tags)->group_by('tagName')->get()->result();
			if($article_tags_res){
				foreach ($article_tags_res as $key => $value) {
					$ins_map[] = array('artID' => $id,'tagID' => $value->tagID);
				}
				if(!empty($ins_map)) $this->db->insert_batch('article_tag_map',$ins_map);
			}
			// ------ MAP ARTICLE AND TAGS ENDS HERE------ //
			// ------ MAP ARTICLE AND CATEGORIES ------ //
			$this->db->where('artID',$id)->delete('article_category_map'); // DELETE OLD ARTICLE TAG MAP
			if($artCategory = $this->input->post('artCategory')){
				foreach ($artCategory as $key => $value) {
					$ins_map_cats[] = array('artID' => $id,'catID' => $value);
				}
				if(!empty($ins_map_cats)) $this->db->insert_batch('article_category_map',$ins_map_cats);
			}
			// ------ MAP ARTICLE AND CATEGORIES ENDS HERE------ //
			return 1;


	}

	private function crate_tags1(){
			$insert_tags = $total_tags = array();
			$saved_tags_array = $this->get_tags(); // Get saved tags from db
			$total_tags = $new_tags_array = explode(',', $this->input->post('tagName'));
			$new_tags_array = array_diff($new_tags_array, $saved_tags_array);
			if($new_tags_array){
				foreach ($new_tags_array as $key => $value) {
					if($value) $insert_tags[] = array('tagName' => trim($value));
				}
			}

			$common_phrases = array('the','be','to','of','and','a','in','that','have','I','it','for','not','on','with','he','as','you','do','at','this','but','his','by','from','they','we','say','her','she','or','an','will','my','one','all','would','there','their','what','so','up','out','if','about','who','get','which','go','me','when','make','can','like','no','just','him','know','take','into','your','good','some','could','them','see','other','than','then','now','only','come','its','over','also','after','how','our','well','even','want','because','any','these','give','most','us');

			$content = strip_tags($this->input->post('artDesc'));
			$array_content = array_count_values(str_word_count($content,2));
			arsort($array_content); 
			$array_content = array_diff($array_content, $new_tags_array);
			$array_content = array_diff($array_content, $common_phrases);
			foreach ($array_content as $key => $value) {
				if($value > 5 && !in_array($key, $common_phrases)) {
					if(!in_array($key, $saved_tags_array)) $insert_tags[] = array('tagName' => $key);
					$total_tags[] = $key;
				}
			}
			$ret_res['insert_tags'] = $insert_tags;
			$ret_res['total_tags'] = array_unique($total_tags);
			return $ret_res;
	}

	private function crate_tags(){
			$insert_tags = $total_tags = array();
			$saved_tags_array = $this->get_tags(); // Get saved tags from db
			$total_tags = $new_tags_array = array_unique(explode(',', $this->input->post('tagName')));
			$new_tags_array = array_diff($new_tags_array, $saved_tags_array);
			if($new_tags_array){
				foreach ($new_tags_array as $key => $value) {
					if($value) $insert_tags[] = array('tagName' => trim($value));
				}
			}
			/*
			$common_phrases = array('the','The','be','to','of','and','a','in','that','have','I','it','for','not','on','with','he','as','you','do','at','this','but','his','by','from','they','we','say','her','she','or','an','will','my','one','all','would','there','their','what','so','up','out','if','about','who','get','which','go','me','when','make','can','like','no','just','him','know','take','into','your','good','some','could','them','see','other','than','then','now','only','come','its','over','also','after','how','our','well','even','want','because','any','these','give','most','us','is');

			$content = strip_tags($this->input->post('artDesc'));

			$array_content = array_count_values(array_diff(str_word_count($content,2), $common_phrases));

			arsort($array_content); 
			foreach ($array_content as $key => $value) {
				if($value > 5) {
					if(!in_array($key, $saved_tags_array) && !in_array($key, $insert_tags)) $insert_tags[] = array('tagName' => $key);
					$total_tags[] = trim($key);
				}
			}*/
			$ret_res['insert_tags'] = $insert_tags;
			$ret_res['total_tags'] = array_unique($total_tags);
			return $ret_res;
	}

	public function deleteArticle($id){
		$this->unlinkImages($id);
		$q = $this->db->where('artID', $id)->where('artCustID', $this->session->userdata['profile_data'][0]['custID'])->delete('article'); 
		return $q;
	}

	private function unlinkImages($id){
		$banner_res = $this->db->select('artImage')->from('article')->where('artID',$id)->where('artCustID', $this->session->userdata['profile_data'][0]['custID'])->get()->row();
			if($banner_res && $banner_res->artImage != 'default-article.png' && file_exists(ARTICLES.$banner_res->artImage)){
				@unlink(ARTICLES.$banner_res->artImage);
				@unlink(ARTICLES.'thumbs/'.$banner_res->artImage);
			}
	}

	public function upload_image($field_name,$upload_path,$thumb=false){

		if($_FILES[$field_name]['error'] == 0){
			//upload and update the file
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['max_size'] = '1000'; 
			$config['max_width'] = '950'; 
			$config['max_height'] = '400'; 
			$config['min_width'] = '450'; 
			$config['min_height'] = '300'; 
			$config['overwrite'] = false;
			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload($field_name))
			{
				$ret_data['img_error'] = $this->upload->display_errors('', '');
			}
			elseif($thumb)
			{
				
				//Image Resizing
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$config['new_image'] = $this->upload->upload_path.'thumbs/'.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 350;
				$config['height'] = 230;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){
					$ret_data['img_error'] = $this->upload->display_errors('', '');
					$this->image_lib->display_errors('', '');
				}
				
			}
			if(!empty($ret_data)) return $ret_data;
			return $this->upload->file_name;
		}
	}
	/*public function comments($id)
    {
		
		$select_comment="SELECT * FROM `useraction` ua 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`='$id' AND ua.`uaCategory`='ARTICLE' ORDER BY ua.`uaID` DESC LIMIT 4
		";
		$select_com = $this->db->query($select_comment);
	
		return $select_com;
		
		
	}
	function liked($id){
		
		$cat="ARTICLE";
		
		 $profile_row = $this->session->userdata('profile_data');
		
		$likeed="SELECT * FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='LIKE' AND `custID`='".$profile_row['0']['custID']."' ";
		$liked_process = $this->db->query($likeed);
		
		
		return $liked_process;
	}
	function user_likes($id){
		
		$cat="ARTICLE";
		
		
		$like_count="SELECT COUNT(`catID`) AS `totallikes` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='LIKE' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		return $like_row;
	}
	function user_comments($id){
		
		$cat="ARTICLE";
		
		
		$like_count="SELECT COUNT(`catID`) AS `total_comments` FROM `recentactivity` WHERE `raCategory`='$cat' AND `catID`='$id' AND `raAction`='COMMENT' ";
		$like = $this->db->query($like_count);
		$like_row=$like->result_array();
		
		return $like_row;
	}*/

	public function update_comment()
    {
    	$update_data = array(
    			//'uaDescription'	=> trim($this->input->post('comment')),
    			'uaDescription'	=> preg_replace("/\n/", "<br />", trim($this->input->post('comment'))),
    		);

    	$where_data = array(
    			'uaID'	=> $this->input->post('id'),
    			'uID'	=> $this->session->userdata['profile_data']['0']['custID'],
    			'uaCategory'	=> 'ARTICLE',
    			'uaACtion'	=> 'COMMENT',
    		);
    	return $this->db->where($where_data)->update('useraction',$update_data);
    }

    public function delete_comment()
    {
    	$where_data = array(
    			'uaID'	=> $this->input->post('id'),
    			'uID'	=> $this->session->userdata['profile_data']['0']['custID'],
    			'uaCategory'	=> 'ARTICLE',
    			'uaACtion'	=> 'COMMENT',
    		);
    	return $this->db->where($where_data)->delete('useraction');
    }

    //--------------------Rohitdutta----------------------------------------------

    public function view_limit_comments()
    {


        $article_id=$this->input->get('id_article');


        $select_comment="SELECT * FROM `useraction` ua
		LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
		WHERE ua.`catID`= $article_id AND ua.`uaCategory`='ARTICLE' ORDER BY ua.`uaID` DESC limit 4
		";
        $select_com = $this->db->query($select_comment);

        return $select_com->result();
    }
    public function view_comments($articleId,$commentLastId = '',$comment_limit = 4)
    {
        $whereArray = array(
        		'catID'			=> $articleId,
        		'uaCategory'	=> 'ARTICLE'
        	);

        $this->db->select('ua.uaID,ua.uaDescription,c.custID,c.custName,ph.photo,CONCAT(p.perdataFirstName, " ", p.perdataLastName) AS perdataFullName',FALSE)
        ->from('useraction ua')
        ->join('customermaster c','c.custID=ua.custID')
		->join('personaldata p','p.custID=c.custID','LEFT OUTER')
		->join('personalphoto ph','ph.custID=c.custID','LEFT OUTER')
        ->where($whereArray);
        if($commentLastId) $this->db->where('uaID <',$commentLastId);
        return $this->db->order_by('ua.uaID','DESC')->limit($comment_limit)->get();
    }

    public function view_total_comments($articleId,$commentLastId = '')
    {
        $whereArray = array(
        		'catID'			=> $articleId,
        		'uaCategory'	=> 'ARTICLE'
        	);
        $this->db->select('*')->from('useraction')->where($whereArray);
        if($commentLastId) $this->db->where('uaID <',$commentLastId);
        return $this->db->count_all_results();
    }
    //--------------------------------------------------------------------------
	
	
	
	

}




?>