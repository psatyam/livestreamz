<?php

class Events_model extends CI_Model {

    public $table = "tab_events";

    function user_model() {
        parent::__construct();
    }

    public function saveEvents($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function updateEvents($data, $id) {
        $this->db->where('int_event_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function getEventsByUserId($userId) {
        $sql = "SELECT a.*,b.txt_name,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_organizations AS b ON a.int_organization_id = b.int_organization_id LEFT JOIN tab_users AS c ON a.int_added_by = c.int_user_id WHERE int_added_by = $userId ORDER BY ts_datetime ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
