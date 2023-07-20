<?php

class MY_Controller extends CI_Controller {
    
    public $data;

    public function __construct() {
        parent::__construct();
        // date_default_timezone_set('America/Los_Angeles');
        if(!isset($this->session->user_data) || !$this->session->user_data['is_loggedin']){
            redirect('sign_in');
            return;
        }
    }

    public function generate_json($msg, $status = true){
        $resp['status'] = $status;
        $resp['msg'] = $msg;
        echo json_encode($resp);
    }

    public function getTimeAgo($date)
    {
        $timestamp = strtotime($date);  
       
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "s ago ";
        }
    }

}