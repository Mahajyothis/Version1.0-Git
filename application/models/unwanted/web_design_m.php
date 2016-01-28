<?php
class web_design_m extends ci_model
{
    public function __construct()
    {
        $query = $this->db->query("select * from post");
        print_r($query->result());
    }
}
?>