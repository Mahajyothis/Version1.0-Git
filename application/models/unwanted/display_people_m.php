<?php
class display_people_m extends ci_model
{
    public function get_peoples($user_cust_id)
    {
        /*
     $query = $this->db->query("
                                select
                                cust.custID, cust.custName,
                                pp.photoID, pp.photo,
                                uf.custID as userfollowing_id
                                from
                                customermaster cust
                                JOIN
                                personalphoto pp
                                on
                                pp.custID=cust.custID

                                JOIN userfollowing uf
                                ON
                                uf.cID=pp.custID
                                where uf.custID=$user_cust_id
                                ");
        */
       return $this->db->select('cust.custID, cust.custName,
                                pp.photoID, pp.photo,
                                uf.custID as userfollowing_id')
                                ->from('customermaster cust')
                                ->join('personalphoto pp','pp.custID=cust.custID','INNER')
                                ->join('userfollowing uf','uf.cID=pp.custID','INNER')
                                ->where('uf.custID',$user_cust_id)->get()->result();


    }
}
?>