<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_m extends MY_Model
{
	public function __construct() {
        parent::__construct('posts');
    }	

	public function get_list_by_page($user_id, $limit, $offset){
		$sql = "SELECT `p`.*, `u`.`full_name`, `mj`.`job_name` AS `my_job`, `lj`.`job_name` AS `looking_job`, COUNT(`c`.`id`) AS `comment_count`
		FROM `posts` `p` 
		LEFT JOIN `users` `u` ON `u`.`id` = `p`.`user_id`
		LEFT JOIN `jobs` `mj` ON `mj`.`id` = `p`.`my_job_id`
		LEFT JOIN `jobs` `lj` ON `lj`.`id` = `p`.`looking_job_id`
		LEFT JOIN `comments` `c` ON `c`.`post_id` = `p`.`id` ";
		if($user_id){
			$sql .= " WHERE `u`.`id` = " . $user_id;
		}
		$sql .= " GROUP BY `p`.`id`
		ORDER BY `p`.`created_at` DESC
		LIMIT " . $limit . " OFFSET " . $offset;
		$result = $this->db->query($sql);
		return $result->result_array();
	}	

	public function get_post($id){
		$sql = "SELECT `p`.*, `u`.`full_name`, `mj`.`job_name` AS `my_job`, `lj`.`job_name` AS `looking_job`, COUNT(`c`.`id`) AS `comment_count`
		FROM `posts` `p` 
		LEFT JOIN `users` `u` ON `u`.`id` = `p`.`user_id`
		LEFT JOIN `jobs` `mj` ON `mj`.`id` = `p`.`my_job_id`
		LEFT JOIN `jobs` `lj` ON `lj`.`id` = `p`.`looking_job_id`
		LEFT JOIN `comments` `c` ON `c`.`post_id` = `p`.`id`
		WHERE `p`.`id` = " . $id . "
		GROUP BY `p`.`id`
		ORDER BY `p`.`created_at` DESC
		";
		$result = $this->db->query($sql);
		return $result->row_array();
	}	
}

?>