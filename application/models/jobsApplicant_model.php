<?php

class JobsApplicant_model extends CI_Model {

    public $table = "tab_job_applications";

    function user_model() {
        parent::__construct();
    }

    public function saveApplicant($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    public function updateApplicant($data, $id) {
        $this->db->where('int_job_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }
    
    public function getApplicantById($int_applied_by,$jobId) {
        $sql="SELECT * FROM ".$this->table." WHERE int_applied_by = $int_applied_by AND int_job_id = $jobId";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function getApplicantByJobId($jobId) {
        $sql="SELECT a.*,b.*,c.int_selection_type FROM ".$this->table." AS a ";
        $sql.="LEFT JOIN tab_users AS b ON a.int_applied_by=b.int_user_id";
        $sql.=" LEFT JOIN tab_job_selections as c ON a.int_application_id = c.int_application_id ";
                $sql.="WHERE a.int_job_id = $jobId";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getJobsByUserId($userId) {
        $sql = "SELECT a.*,b.txt_name AS org_name,c.txt_name AS user_name FROM " . $this->table . " AS a ";
        $sql.="LEFT JOIN tab_organizations AS b ON a.int_organization_id=b.int_organization_id ";
        $sql.="LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ";
        $sql.="WHERE a.int_user_id = $userId ORDER BY a.dt_expire ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getJobs($limit = NULL) {
        $sql = "SELECT a.*,b.txt_name AS org_name,c.txt_name AS user_name FROM " . $this->table . " AS a ";
        $sql.="LEFT JOIN tab_organizations AS b ON a.int_organization_id=b.int_organization_id ";
        $sql.="LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ";
        $sql.="ORDER BY a.dt_expire ASC";
//        $sql = "SELECT a.*,c.txt_name AS user_name FROM " . $this->table . " AS a LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ORDER BY a.dt_expire ASC";
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

}
