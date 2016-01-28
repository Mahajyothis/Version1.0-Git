<?php

class Events_model extends CI_model{

	public function __construct()
	{
		parent::__construct();
		//$this->updateEventStatus();
if(empty($this->session->userdata['language'])) $this->session->set_userdata('language','english');
    $this->language = '_'.$this->session->userdata['language'];
    if($this->session->userdata['language'] == 'english') $this->language = '';
	}


	public function getEvents($type='all',$limit=10,$offset=0){
	
		$this->db->select("e.*,c.custName,c.custID as ide,CONCAT(p.perdataFirstName, ' ', p.perdataLastName) AS perdataFullName,(SELECT raMessage FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`=e.`id`  AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' AND (raMessage ='JOINED' OR raMessage ='May be Join') ) AS `raMessage`",FALSE)
			->from('events e')
			->join('customermaster c','c.custID=e.custID')
			->join('personaldata p','p.custID=e.custID','LEFT OUTER');
			if($type == 'all')	{
				
				$this->db->where('e.type',0);
				$this->db->or_where('(e.type=1 AND e.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].'))',NULL, FALSE);
				
			}
			if($type == 'own')	{
				
			$this->db->where('e.custID',$this->session->userdata['profile_data'][0]['custID'])
			;}
			if($type == 'public'){
		$this->db->where('e.type',0);}
			if($type == 'private'){
				
				$this->db->where('e.type = 1 AND e.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].' )',NULL,FALSE);
			}

			if($type == 'interested')	{
				
				$this->db->where('e.id IN ( SELECT eventID FROM `event_status` WHERE `status`=1 AND `custID`='.$this->session->userdata['profile_data'][0]['custID'].')',NULL,FALSE);
			
			}
			if($this->input->get('event'))	$this->db->like('e.name',$this->input->get('event'));
			if($this->input->get('sort_by')) {
				$sort_cond = 'e.'.$this->input->get('sort_by');
				$this->db->order_by($sort_cond,$this->input->get('order_by'));
			} 
			
			return $this->db->order_by('id','DESC')->limit($limit,$offset)->get()->result();
	
	}


	public function getUsers($id='',$type='join',$limit=20,$offset=0){

		$this->db->select("cm.custID,cm.custName,ph.photo,CONCAT(pd.perdataFirstName, ' ', pd.perdataLastName) AS perdataFullName",FALSE)
			->from('customermaster cm')		
			->join('personaldata pd','pd.custID=cm.custID','LEFT OUTER')	
			->join('personalphoto ph','ph.custID=cm.custID','LEFT OUTER')
			->where('cm.custStatus',15);
			if($type=='join') $this->db->where('cm.custID IN ( SELECT custID FROM `event_status` WHERE `status`=1 AND `eventID`='.$id.')',NULL,FALSE);
			else if($type=='maybe') $this->db->where('cm.custID IN ( SELECT custID FROM `event_status` WHERE `status`=2 AND `eventID`='.$id.')',NULL,FALSE);
			if($this->input->get('name'))	$this->db->like('cm.custName',$this->input->get('name'));
			return $this->db->order_by('custName','ASC')->limit($limit,$offset)->get()->result();
	
	}

	public function getEventDashboardCounts(){
	
		return $this->db->query('SELECT
				(SELECT count(*) FROM events WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].') as own_events,
				(SELECT count(*) FROM events WHERE custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].')) as network_events,
				(SELECT count(*) FROM events WHERE custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].')) as invited_events,
				(SELECT count(*) FROM event_status WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].' AND status = 1) as going_events,
				(SELECT count(*) FROM event_status WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].' AND status = 2) as maybe_events

			')->row();
	
	}

	public function createPost($image='',$postType=0){
		$ins_data = array(
			'custID' => $this->session->userdata['profile_data'][0]['custID'],
			'event_id' => $this->input->post('event_id'),
			'description' => trim($this->input->post('postContent')),
			'created' => $this->config->item('global_datetime'),
			);
		if($postType) $ins_data['postType'] = $postType;
		if($image) $ins_data['file'] = $image;
		else $ins_data['file'] = $this->input->post('postImage');
		if($this->db->insert('event_posts',$ins_data)) return $this->db->insert_id();
		return 0;
	}

	public function updatePost($id){
		$ins_data = array(
			'description' => trim($this->input->post('postContent')),
			'file' => $this->input->post('postImage'),
			'updated' => $this->config->item('global_datetime'),
			);
		return $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID'])->where('id',$id)->update('event_posts',$ins_data);
	}

	
	public function changeStatus(){
		$date = date('Y-m-d');
		$this->db->query("UPDATE `events` SET `status`= ".$this->input->post('status')." WHERE  id=".$this->input->post('event_id')." AND end_date > '$date'" );
		return ($this->db->affected_rows()) ? 1 : 0;
	}

	public function updateEventStatus(){
		$date = date('Y-m-d');
		$this->db->query("UPDATE `events` SET `status`= 0 WHERE  status=1 AND end_date < '$date'  ");
	}

	public function totalEvents($type='all'){
		$this->db->select("*")->from('events e');
			if($type == 'all')	{
				$this->db->where('e.type',0);
				$this->db->or_where('(e.type=1 AND e.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].'))',NULL, FALSE);
				
			}
			if($type == 'own')	$this->db->where('e.custID',$this->session->userdata['profile_data'][0]['custID']);
			if($type == 'public')	$this->db->where('e.type',0);
			if($type == 'private')	{
				$this->db->where('e.type = 1 AND e.custID IN ( SELECT custID as uid FROM userfollowing WHERE cID = '.$this->session->userdata['profile_data'][0]['custID'].' UNION SELECT cID as uid FROM userfollowing WHERE custID = '.$this->session->userdata['profile_data'][0]['custID'].' )',NULL,FALSE);
			}
			if($type == 'interested')	$this->db->where('e.type',1);
			if($this->input->get('event'))	$this->db->like('e.name',$this->input->get('event'));
			//$this->db->where('e.end_date >=', $this->config->item('global_datetime'));
			return $this->db->count_all_results();

	}

	public function event_exist($id,$check_owner=false){
		$this->db->select("*")->from('events')->where('id', $id);
		if($check_owner) $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID']);
		return $this->db->get();
	}

	public function getEvent($id,$publicEvent=false){
		$q 	= $this->db->select("p.*,c.custName,ph.photo,a.addrCountry,CONCAT(pd.perdataFirstName, ' ', pd.perdataLastName) AS perdataFullName,			
			( SELECT GROUP_CONCAT('',c.id) FROM event_category_map cm INNER JOIN category c ON cm.catID = c.id WHERE cm.eventID = '".$id."' ) as eventCategory,
			( SELECT GROUP_CONCAT('',c.name$this->language) FROM event_category_map cm INNER JOIN category c ON cm.catID = c.id WHERE cm.eventID = '".$id."' ) as eventCategoryNames
			",FALSE)->from('events p')
			->join('customermaster c','c.custID=p.custID')			
			->join('personaldata pd','pd.custID=c.custID','LEFT OUTER')
			->join('personalphoto ph','ph.custID=p.custID','LEFT OUTER')
			->join('address a','a.custID=p.custID','LEFT OUTER')
			->where('p.id', $id)->get()->row();
		return $q;
	}

	public function getEventPosts($id){
		$q 	= $this->db->select("p.*,c.custName,c.custID,ph.photo,CONCAT(pd.perdataFirstName, ' ', pd.perdataLastName) AS perdataFullName,
			(SELECT COUNT(`catID`)  FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`=p.`id` AND `raAction`='LIKE' ) AS `total_likes`,
			(SELECT catID FROM `recentactivity` WHERE `raCategory`='EVENT' AND `catID`=p.`id` AND `raAction`='LIKE' AND `custID`='".$this->session->userdata['profile_data'][0]['custID']."' ) AS `liked`,
			(SELECT COUNT(`uaID`)  FROM `useraction` WHERE `uaCategory`='EVENT' AND `catID`=p.`id`) AS `total_comments`
		
		",FALSE)->from('event_posts p')
			->join('customermaster c','c.custID=p.custID')
			->join('personaldata pd','pd.custID=c.custID','LEFT OUTER')
			->join('personalphoto ph','ph.custID=p.custID','LEFT OUTER')
			->where('p.event_id', $id)->order_by('id','DESC')->get()->result();
		
		if(!empty($q)){
		$query="";
		foreach($q as $row){
			if($query!="") $query.= ' UNION ';
			
			$query.="(SELECT pp.`photo` ,ua.`uaDescription`,cm.`custID`,cm.`custName`,ua.`uaID`,ua.`catID` FROM `useraction` ua
					LEFT JOIN `customermaster` cm ON(cm.`custID`=ua.`custID`)
					LEFT JOIN `personalphoto` pp ON(pp.`custID` = cm.`custID`)
					WHERE ua.`uaCategory`='EVENT' AND ua.`catID`='".$row->id."' ORDER BY ua.`uaID` DESC  LIMIT 4)
					";
			
			}
		}

			if(!empty($query)) $post_comments = $this->db->query($query)->result();
			$i=0;
			foreach($q as $post_array){
			foreach($post_comments as $comments){
				if($post_array->id === $comments->catID){
					$q[$i]->comments[] = array(
						'comment'	=> $comments->uaDescription,
						'photo'	=> $comments->photo,
						'custID'	=> $comments->custID,
						'custName'	=> $comments->custName,
						'uaID'	=> $comments->uaID,
						'catID'	=> $comments->catID
					);
				
				}
			
			}
			$i++;
			
			}	
					return $q;
		}
	
	public function updateEvent($id){

		if(!empty($_FILES['banner']['name'])){			
			$banner = $this->upload_image('banner',EVENTS,true);
			if(!empty($banner['img_error'])){
				return $banner;
			}
		}

		$end_date = '0000-00-00 00:00:00';
		$start_date = $this->input->post('start_date').' '.date("H:i:s", strtotime($this->input->post('start_time')));
		if($this->input->post('end_date')) $end_date = $this->input->post('end_date');
		if($this->input->post('end_date') && $this->input->post('end_time')) $end_date .= ' '.date("H:i:s", strtotime($this->input->post('end_time')));

		$data = array(
			'name' 			=> trim($this->input->post('name')),
			'description' 	=> trim($this->input->post('description')),
			'venue' 		=> $this->input->post('venue'),
			'place' 		=> $this->input->post('place'),
			'type' 			=> $this->input->post('type'),
			'start_date' 	=> $start_date,
			'end_date' 		=> $end_date,
			'updated_on' 	=> $this->config->item('global_datetime'),
		);

		if(!empty($banner)) {
			$data['banner'] = $banner;
			// unlik old pics
			$this->unlinkImages($id);
			
		}
				
		$q = $this->db->where('id',$id)->update('events',$data); 

		// ------ MAP EVENTS AND CATEGORIES ------ //
			$this->db->where('eventID',$id)->delete('event_category_map'); // DELETE OLD EVENT TAG MAP
			if($eventCategory = $this->input->post('category')){
				foreach ($eventCategory as $key => $value) {
					$ins_map_cats[] = array('eventID' => $id,'catID' => $value);
				}
				if(!empty($ins_map_cats)) $this->db->insert_batch('event_category_map',$ins_map_cats);
			}
		// ------ MAP ARTICLE AND CATEGORIES ENDS HERE------ //

		if($q){			
			return 1;
		}
		return 0;

	}
	public function addEvent($public_event = false){
		
		$banner = 0;
		if(!empty($_FILES['banner']['name'])){
			$banner = $this->upload_image('banner',EVENTS,true);
			if(!empty($banner['img_error']))
			return $banner;
		}

		$end_date = '0000-00-00 00:00:00';
		$start_date = $this->input->post('start_date').' '.date("H:i:s", strtotime($this->input->post('start_time')));
		if($this->input->post('end_date')) $end_date = $this->input->post('end_date');
		if($this->input->post('end_date') && $this->input->post('end_time')) $end_date .= ' '.date("H:i:s", strtotime($this->input->post('end_time')));

		$data = array(
			'custID' 		=> $this->session->userdata['profile_data'][0]['custID'],
			'name' 			=> trim($this->input->post('name')),
			'description' 	=> trim($this->input->post('description')),
			'venue' 		=> $this->input->post('venue'),
			'place' 		=> $this->input->post('place'),
			'type' 			=> $this->input->post('type'),
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,	
			'banner' 		=>   $banner,
			'created_on' 	=> $this->config->item('global_datetime'),
		);
		
		$q = $this->db->insert('events', $data);
		if($q){
			$id = $this->db->insert_id();

			// ------ CREATE ACTIVITY LOG ------ //
			$this->log_array = array(
					'pid'		=> $id,
					'module'	=> 'Event',
					'action'	=> 'create',
					'table'		=> 'events',
					'comments'	=> ''
				);
			$this->Common_model->create_log($this->log_array);
			/// ------ CREATE ACTIVITY LOG ENDS HERE ------ //

			// ------ MAP EVENTS AND CATEGORIES ------ //
				if($eventCategory = $this->input->post('category')){
					foreach ($eventCategory as $key => $value) {
						$ins_map_cats[] = array('eventID' => $id,'catID' => $value);
					}
					if(!empty($ins_map_cats)) $this->db->insert_batch('event_category_map',$ins_map_cats);
				}
			// ------ MAP ARTICLE AND CATEGORIES ENDS HERE------ //
		}


$e="SELECT * FROM `events` WHERE `id`!='' ORDER BY `id` DESC LIMIT 1";
		$c=$this->db->query($e);
		$val=$c->result_array();
		
		return 1;
	}


	public function deleteEvent($id,$publicEvent=0){
		$this->unlinkImages($id);
		$q = $this->db->where('id', $id)->where('custID', $this->session->userdata['profile_data'][0]['custID'])->delete('events'); 
		return $q;
	}

	public function deleteEventPost($id){
		$this->unlinkPostImages($id);
		$q = $this->db->where('id', $id)->where('custID', $this->session->userdata['profile_data'][0]['custID'])->delete('event_posts'); 
		return $q;
	}

	public function getSinglePost($id)
	{   
		
		return $this->db->select('p.*')->from('event_posts p')
		->where('p.id',$id)
		->where('p.custID',$this->session->userdata['profile_data'][0]['custID'])
		->get()->row();
	}



	private function unlinkImages($id){
		$banner_res = $this->db->select('banner')->from('events')->where('id',$id)->where('custID', $this->session->userdata['profile_data'][0]['custID'])->get()->row();
			if($banner_res && $banner_res->banner != 'default-event.png' && file_exists(EVENTS.$banner_res->banner)){
				@unlink(EVENTS.$banner_res->banner);
				@unlink(EVENTS.'thumbs/'.$banner_res->banner);
			}
	}

	private function unlinkPostImages($id){
		$banner_res = $this->db->select('file')->from('event_posts')->where('id',$id)->where('custID', $this->session->userdata['profile_data'][0]['custID'])->get()->row();
			if($banner_res && $banner_res->file != 'default-event.png' && file_exists(EVENTS.'post/'.$banner_res->file)){
				@unlink(EVENTS.'post/'.$banner_res->file);
				@unlink(EVENTS.'post/'.'thumbs/'.$banner_res->file);
			}
	}

	

	public function upload_image($field_name,$upload_path,$thumb=false){

		if($_FILES[$field_name]['error'] == 0){
			//upload and update the file
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['max_size'] = '1000'; 
			$config['max_width'] = '1024'; 
			$config['max_height'] = '850'; 
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
	
	
	function event_status($id){
		
		 $profile_row = $this->session->userdata('profile_data');
		
		$event="SELECT * FROM `event_status` WHERE `eventID`='$id' AND `custID`='".$profile_row['0']['custID']."' ";
		$result = $this->db->query($event);
		
		return $result;
	}
	
	function event_activity(){
		$profile_row = $this->session->userdata('profile_data');
		$sel="SELECT * FROM `event_status` es 
		LEFT JOIN `events` e ON(e.`id`=es.`eventID`)
		LEFT JOIN `customermaster` cm ON(cm.`custID`=es.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`)
		WHERE es.`custID`='".$profile_row['0']['custID']."' ORDER BY es.`esID` DESC LIMIT 4
		";
		$event=$this->db->query($sel);
		return $event;
	}
	
	function event_notifi(){
		$profile_row = $this->session->userdata('profile_data');
		$sel="SELECT cm.`custID`,pp.`photo`,e.`name`,es.`status`,e.`start_date`,CONCAT(pd.`perdataFirstName`,'',pd.`perdataLastName`) as perdataFullName,e.`id` FROM `event_status`es LEFT JOIN `events` e ON(e.`id`=es.`eventID`) 
		LEFT JOIN `customermaster` cm ON(cm.`custID`=es.`custID`)
		LEFT JOIN `personalphoto` pp ON(pp.`custID`=cm.`custID`) 
		LEFT JOIN `personaldata` pd ON(pd.`custID`=cm.`custID`) 
		WHERE es.`status`=1 AND e.`custID`='".$profile_row['0']['custID']."' ORDER BY es.`esID` DESC LIMIT 5 ";
		
		return $this->db->query($sel);
	
	 
	}
}