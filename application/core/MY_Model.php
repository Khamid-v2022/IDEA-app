<?php

class MY_Model extends CI_Model
{
    protected $table;                    //Admin table
    
    public function __construct($table_name) {
        parent::__construct();
        $this->table = $table_name;
    }

    public function get_list($where = NULL){
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->result_array();
    }

    public function add_item($req){
        $this->db->insert($this->table, $req);
        return $this->db->insert_id();
    }

    public function get_item($where = NULL){
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->row_array();
    }

    public function update_item($info, $where){
        $this->db->where($where);
        $this->db->update($this->table, $info);
    }

    public function delete_item($where){
        $this->db->where($where);
        $this->db->delete($this->table);
    }

    public function get_total_count($where=NULL){
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->num_rows();
    }
}

?>