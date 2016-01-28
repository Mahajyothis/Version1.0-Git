<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discussions_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }




    public function insert_discussions($data)
    {
        $this->db->insert('discussions',$data);
        return true;
    }

    public function get_discussions($custID,$limit, $start)
    {
        if($custID == 0)
        {
            $query = $this->db->query('
			SELECT d.*,p.photo,c.custName 
			FROM discussions d
			LEFT JOIN personalphoto p ON d.custID=p.custID
			LEFT JOIN customermaster c ON d.custID=c.custID
			WHERE d.privacy = 1
			AND d.id_dis NOT IN (SELECT id_dis FROM hidediscussions hd WHERE hd.custID = '.$this->session->userdata['profile_data'][0]['custID'].')
			ORDER BY d.id_dis DESC
			LIMIT '.$start.','.$limit.'
			');
            /*$this->db->select('d.*,p.photo,c.custName');
            $this->db->from('discussions d');
            $this->db->join('personalphoto p','d.custID=p.custID','LEFT OUTER');
            $this->db->join('customermaster c','d.custID=c.custID','LEFT OUTER');
            //$this->db->join('hidediscussions hd','hd.custID=c.custID','LEFT OUTER');
            $this->db->where('d.privacy',1);
            //$this->db->where('hd.id_dis <> ', 'd.id_dis');
            $this->db->limit($limit, $start);
            $this->db->order_by("d.id_dis", "desc");
            $q=$this->db->get();*/
            return $query->result();
        }
        else
        {
            $this->db->select('d.*,p.photo,c.custName');
            $this->db->from('discussions d');
            $this->db->join('personalphoto p','d.custID=p.custID','LEFT OUTER');
            $this->db->join('customermaster c','d.custID=c.custID','LEFT OUTER');
            $this->db->where('d.custID',$custID);
            $this->db->limit($limit, $start);
            $this->db->order_by("d.id_dis", "desc");
            $q=$this->db->get();
            return $q->result();
        }

    }

    public function delete_discussion($id)
    {
        $this->db->where('id_dis', $id);
        $this->db->delete('discussions');
        return true;
    }

    function discussions_total()
    {
        $sql = "SELECT * FROM discussions d where d.privacy=1 AND d.id_dis NOT IN (SELECT id_dis FROM hidediscussions hd WHERE hd.custID = '".$this->session->userdata['profile_data'][0]['custID']."')";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function discussions_total_with_custID($custID)
    {
        $sql = "SELECT * FROM discussions where custID=$custID";
        $query = $this->db->query($sql);
        return $query->num_rows();

    }

    public function update_discussion($data,$id)
    {
        $this->db->where('id_dis', $id);
        $this->db->update('discussions',$data);
        return true;
    }

    public function get_discussions_by_id($id)
    {

        $this->db->select('d.*,p.photo,c.custName');
        $this->db->from('discussions d');
        $this->db->join('personalphoto p','d.custID=p.custID','LEFT OUTER');
        $this->db->join('customermaster c','d.custID=c.custID','LEFT OUTER');
        $this->db->where('d.id_dis', $id);
        $q=$this->db->get();
        return $q->result();
    }

    public function update_discussion_visibility($data,$id)
    {
        $this->db->where('id_dis', $id);
        $this->db->update('discussions',$data);
        return true;
    }

    public function makeHiddenDis($id)
    {
        $ins_data = array(
            'custID' => $this->session->userdata['profile_data'][0]['custID'],
            'id_dis' => $id,
        );

        if($this->db->insert('hidediscussions',$ins_data)) return $this->db->insert_id();
        return 0;
    }
public function views($id){
	
	$views="SELECT * FROM `views` WHERE `custID`='".$this->session->userdata['profile_data'][0]['custID']."'  AND `catID`='$id'";
	return $this->db->query($views);
	
}
    public function hidden_dis_checking($id)
    {
        $custID = $this->session->userdata['profile_data'][0]['custID'];
        $sql = "SELECT * FROM hidediscussions where id_dis=$id AND custID=$custID";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getting_hidden_discussions()
    {
        $custID = $this->session->userdata['profile_data'][0]['custID'];

        $this->db->select('*');
        $this->db->from('hidediscussions');
        $this->db->where('custID',$custID);
        $q=$this->db->get();
        return $q->result();
    }

    public function insert_discussion_like()
    {
        $custid = $this->input->get("custid");
        $page = $this->input->get("page");
        $cat = $this->input->get("cat");
        $act = $this->input->get("act");
        $did = $this->input->get("did");
		$uid = $this->input->get("uid");


        $query = $this->db->query("insert into recentactivity values('','$page','$cat','$act','$did','$uid','$custid','Likes',1,now())");
		
        if($query)
        {
            return true;
        }
        else false;
    }
    public function get_likes_discussions()
    {
        //$didno = $this->input->get("didno");
        $query = $this->db->query("SELECT count(*) as tot_likes FROM recentactivity WHERE raCategory!=''");
        return $query->result();
    }

    public function store_comment()
    {
        $custid = $this->input->get("custid");
        $comment = $this->input->get("comment");
        $did = $this->input->get("did");

        $query = $this->db->query("insert into temp_discussion_coment values('',$custid,$did,'$comment')");
		
		
		
        if($query)
            return true;
        else
            return false;

        $this->db->query("insert into temp_d values('','$comment')");


    }
    public function display_comments()
    {

        //$user_row = $this->session->userdata('profile_data');
        //$custID = $user_row['0']['custID'];

        $did = $this->input->get("did");

        //$query = $this->db->query("select * from useraction where id_dis=$did");
        $id = $this->uri->segment(3);
        $iid = explode("-",$id);
        $iiid = $iid[0];
        //$query = $this->db->query("select * from useraction where id_dis=$iiid");



        $query = $this->db->query("SELECT
                                    cust.custID,cust.custName,
                                    pp.photoID,pp.photo,
                                    tdm.uaDescription
                                    FROM
                                    customermaster cust
                                    join
                                    personalphoto pp
                                    on pp.custID=cust.custID

                                    join
                                    useraction tdm
                                    on tdm.custID=pp.custID
                                    where tdm.catID=$iiid");


        return $query->result();
    }
    public function display_comments_two()
    {

        $did = $this->input->get("did");
           //modified------------------
        $id = $this->uri->segment(3);
        $iid = explode("-",$id);
        $iiid = $iid[0];
        //modified------------------
        //$query = $this->db->query("select * from useraction where catID=$did");



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
                                    where tdm.catID=$did order by uaID desc limit 0,4");//modified------------------



        return $query->result();
    }
    public function display_comments_more()
    {
        $did = $this->input->get("did");

        $inc = $this->input->get("inc");


        $query = $this->db->query("SELECT
                                    cust.custID,cust.custName,
                                    pp.photoID,pp.photo,
                                    tdm.uaDescription
                                    FROM
                                    customermaster cust
                                    join
                                    personalphoto pp
                                    on pp.custID=cust.custID

                                    join
                                    useraction tdm
                                    on tdm.custID=cust.custID
                                    where tdm.catID=$did order by uaID desc limit $inc,4");//modified------------------


        return $query->result();
    }
	
	 public function get_search() {
     
	 $match = $this->input->get('search');
     
/*
   	 $this->db->like('titleDis',$match);
     $this->db->or_like('bodyDis',$match);
     $this->db->or_like('category',$match);
     $query = $this->db->get('discussions');
     return $query->result();
	 
	 */
	  $query = $this->db->query('
			SELECT d.*,p.photo,c.custName 
			FROM discussions d
			LEFT JOIN personalphoto p ON d.custID=p.custID
			LEFT JOIN customermaster c ON d.custID=c.custID
			WHERE d.privacy = 1 AND (d.titleDis LIKE "%'.$match.'%"  OR d.bodyDis LIKE "%'.$match.'%" OR d.category LIKE "%'.$match.'%")
			AND d.id_dis NOT IN (SELECT id_dis FROM hidediscussions hd WHERE hd.custID = '.$this->session->userdata['profile_data'][0]['custID'].')
			ORDER BY d.id_dis DESC
			');
			return $query->result();
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>