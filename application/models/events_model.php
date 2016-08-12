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
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_added_by = c.int_user_id WHERE a.int_added_by = $userId ORDER BY a.ts_datetime ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getEvents($limit = NULL) {
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_added_by = c.int_user_id ORDER BY a.ts_datetime ASC";
        if ($limit != NULL)
            $sql.=" LIMIT $limit";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getEventsById($Id) {
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_added_by = c.int_user_id WHERE int_event_id = $Id ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
