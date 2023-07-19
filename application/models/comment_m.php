<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_m extends MY_Model
{	
	public function __construct() {
        parent::__construct('comments');
    }	

    public function get_comments($post_id){
        $sql = "SELECT `c`.*, `u`.`full_name`
        FROM `comments` `c`
        LEFT JOIN `users` `u` ON `u`.`id` = `c`.`user_id`
        WHERE `c`.`post_id` = " . $post_id . "
        ORDER BY `c`.`created_at`
        ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }   
}

?>