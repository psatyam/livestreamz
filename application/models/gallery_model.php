<?php

class Gallery_model extends CI_Model {

    public $table = "tab_gallery";

    function user_model() {
        parent::__construct();
    }

    public function save($data,$userId) {
        $this->db->insert($this->table."_$userId", $data);
        return true;
    }

    public function updateJobs($data, $id) {
        $this->db->where('int_job_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function getGalleryByUserId($userId) {
        $sql = "SELECT a.*FROM " . $this->table . "_$userId AS a ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getGallery($userId,$limit = NULL) {
        $sql = "SELECT a.* FROM " . $this->table . "_$userId AS a ";
        if ($limit != NULL)
            $sql.=" LIMIT $limit";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getJobsById($Id) {
        $sql = "SELECT a.*,b.txt_name AS org_name,c.txt_name AS user_name FROM " . $this->table . " AS a ";
        $sql.="LEFT JOIN tab_organizations AS b ON a.int_organization_id=b.int_organization_id ";
        $sql.="LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ";
        $sql.="WHERE a.int_job_id = $Id ORDER BY a.dt_expire ASC";
//        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id WHERE int_event_id = $Id ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    public function getJobsByQuery($param) {
        $sql = "SELECT a.*,b.txt_name AS org_name,c.txt_name AS user_name FROM " . $this->table . " AS a ";
        $sql.="LEFT JOIN tab_organizations AS b ON a.int_organization_id=b.int_organization_id ";
        $sql.="LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ";
        $sql.="WHERE a.txt_title ILIKE '%$param%' OR a.txt_skills ILIKE '%$param%' ORDER BY a.dt_expire ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}
