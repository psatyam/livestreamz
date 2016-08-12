<?php

class Announcements_model extends CI_Model {

    public $table = "tab_announcements";

    function user_model() {
        parent::__construct();
    }

    public function saveAnnouncements($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function updateAnnouncements($data, $id) {
        $this->db->where('int_announcement_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function getAnnouncementsByUserId($userId) {
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id WHERE a.int_user_id = $userId ORDER BY a.ts_datetime ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getAnnouncements($limit = NULL) {
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ORDER BY a.ts_datetime ASC";
        if ($limit != NULL)
            $sql.=" LIMIT $limit";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getAnnouncementsById($Id) {
        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id WHERE int_announcement_id = $Id ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
