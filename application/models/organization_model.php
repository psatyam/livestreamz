<?php

class Organization_model extends CI_Model {

    public $table = "tab_organizations";

    function user_model() {
        parent::__construct();
    }

    public function saveOrg($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function updateOrg($data, $id) {
        $this->db->where('int_organization_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function getOrgByUserId($userId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE int_user_of = $userId";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
