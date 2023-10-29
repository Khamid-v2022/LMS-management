<?php 

class PasswordHistory_m extends CI_Model {
    private $table = 'password_update_history';

    public function update($info, $where){
        $this->db->where($where);
        $this->db->update($this->table, $info);
    }

    public function insert($info) {
        $this->db->insert($this->table, $info);
        return $this->db->insert_id();
    }
}