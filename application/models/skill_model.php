<?php

class Skill_model extends CI_Model {

    public $table = "tab_skills";

    public function __construct() {
        parent::__construct();
    }

    public function add($param) {
        return $this->db->insert($this->table, $param);
    }
    
    public function fetch() {
        
        $sql = "SELECT a.*,b.txt_sector_name FROM " . $this->table . " AS a LEFT JOIN tab_sectors AS b ON a.int_sector_id = b.int_sector_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
