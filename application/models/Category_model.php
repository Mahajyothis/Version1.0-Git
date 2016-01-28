<?php

class Category_model extends CI_model{

	public function __construct()
	{
		parent::__construct();
if(empty($this->session->userdata['language'])) $this->session->set_userdata('language','english');
    $this->language = '_'.$this->session->userdata['language'];
    if($this->session->userdata['language'] == 'english') $this->language = '';
	}

	public function getCategories($limit="",$offset=""){
		$q 	= $this->db->select("c.id,c.name".$this->language." as name,icon")->from("category c");		
		return $this->db->order_by("c.name", "asc")->limit($limit,$offset)->get();
	}

	public function totalCategory(){

		$this->db->select("*")->from('category c');
		return $this->db->count_all_results();
	}
	
	public function category_exist($id){
		$q 	= $this->db->select("*")->from("category")->where('id', $id)->get();
		return $q;
	}

	public function getCategory($id){
		$q 	= $this->db->select("c.id,c.name".$this->language." as name,icon")->from("category")->where('id',$id)->get()->row();
		return $q;
	}
		
	public function updateCategory($id){

		$data = array(
			'name' => $this->input->post('name')
		);

		$q = $this->db->where('id',$id)->update('category',$data); 

		if($q){
			return 1;
		}

	}

	public function addCategory($imageName=''){

		$data = array(
			'name' => $this->input->post('name')
		);

		return $this->db->insert('category', $data);

	}


	public function getCategoryAjax($name){
		
		$search_term = $name;
		$query = $this->db->select('name')->from('category')->like('name',$search_term,'after')->limit(10,0)->get();		
		return $query;
	}

	public function deleteCategory($id){
		
		return $this->db->where('id', $id)->delete('category'); 
			
	}

}