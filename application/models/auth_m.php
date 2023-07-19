<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends MY_Model
{
	public function __construct() {
        parent::__construct('users');
    }					
	
	// public function insert_item($req) {
	// 	$this->db->insert($this->table, $req);
	// 	return $this->db->insert_id();
	// }

	// public function get_item($where = NULL){
	// 	if($where)
	// 		$this->db->where($where);
	// 	return $this->db->get($this->table)->row_array();
	// }

	// public function update_info($info, $where){
	// 	$this->db->where($where);
	// 	$this->db->update($this->table, $info);
	// }
}

?>