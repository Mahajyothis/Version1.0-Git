<?php
class comment_notification_c extends ci_controller
{
    public function index(){}
    public function display_comments()
    {
        $this->load->model('comment_notification_m');
        $cust_id = $this->input->post('cust_id');
        $datas = $this->comment_notification_m->comments_notify($cust_id);
        foreach($datas as $all_data)
        {
            echo $all_data->uaDescription;

        }

    }

}
?>