<?php

class Events_visitor_model extends CI_Model {

    public $table = "tab_event_visitors";

    function user_model() {
        parent::__construct();
    }

    public function saveEventVisitor($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function updateEvents($data, $id) {
        $this->db->where('int_event_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function checkVisitor($visitorId,$eventId) {
        $sql = "SELECT * FROM ".$this->table." WHERE int_visitor_id = $visitorId AND int_event_id = $eventId";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getEventsById($Id) {
        $sql = "SELECT a.int_visiting_prob,c.*,b.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_events AS c ON a.int_event_id = c.int_event_id LEFT JOIN tab_users AS b ON c.int_added_by = b.int_user_id WHERE a.int_visitor_id = $Id ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
