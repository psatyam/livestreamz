<?php

class Sector_model extends CI_Model {

    public $table = "tab_sectors";

    public function __construct() {
        parent::__construct();
    }

    public function add($param) {
        return $this->db->insert($this->table, $param);
    }
    
    public function fetch() {
        
        $sql = "SELECT * FROM " . $this->table . " ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
