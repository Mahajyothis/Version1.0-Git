<?php
class comment_notification_m extends ci_model
{
    public function comments_notify($cust_id)
    {
        //$comments = $this->db->query('select * from useraction order by uaID desc limit 0,1');
        /*$comments = $this->db->query('SELECT * FROM `useraction` ua
                                      left join recentactivity ra
                                      on(ua.`custID`=ra.CustID)
                                      order by uaID desc limit 0,1');
        */
        $comments = $this->db->query("SELECT * FROM useraction ua
                                      where custID = $cust_id
                                      order by uaID desc limit 0,1");
        return $comments->result();
    }
}
?>