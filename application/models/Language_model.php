<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Language_model extends CI_Model
{
  
  function __construct()
  {
    parent::__construct();
  
  }

  public function LangCompatible($page,$lang=NULL)
  { 
    //if(!empty($lang)) $this->session->set_userdata('language',$lang);
    if(!empty($this->session->userdata['language'])) $lang_comp = $this->session->userdata['language'];
    else $lang_comp='english';
    $row = $this->db->select('lPhase,'.$lang_comp.'')->from('language')
    ->join('page','page.pID = language.lPageID')
    ->where('page.pName',$page)->get()->result();
    
    foreach($row as $result){
    $value[$result->lPhase] = $result->$lang_comp;
    }    
    return $value;    
  }

  public function getAllLanguages()
  {
    $results = $this->db->list_fields('language');
    array_pop($results);
    unset($results[0]);
    unset($results[1]);
    unset($results[2]);
    return $results;
  }
  
  public function getLanguageLabels()
  {
    return $this->db->select('language,label')->from('languageLabel')->get();
  }

  public function updateLanguage($language)
  {
    return $this->db->where('custID',$this->session->userdata['profile_data'][0]['custID'])->update('accessmaster',array('site_language'=>$language));
  }

}