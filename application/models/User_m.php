<?php 

class User_m extends CI_Model {
    private $table = 'users';

    public function getInfo($where = NULL){
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->row_array();
    }

    public function getList($where = NULL) {
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->result_array();
    }

    public function update($info, $where){
        $this->db->where($where);
        $this->db->update($this->table, $info);
    }

    public function insert($info) {
        $this->db->insert($this->table, $info);
        return $this->db->insert_id();
    }
}