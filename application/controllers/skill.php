<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Skill extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('skill_model');
        $this->load->model('sector_model');
        $user = $this->session->userdata('user');
        if (!isset($user) || $user == '' || $user['int_user_group'] != 1) {
            redirect('user/login', 'refresh');
            die();
        }
    }

    public function index() {
        $data["page"] = "sectorGrid";
        $data["data"] = $this->skill_model->fetch();
        $data["sectors"] = $this->sector_model->fetch();
        $this->load->view('admin/page', $data);
    }

    public function add() {
        $response = array();
        try {
            if ($this->input->post()) {
                $data = $this->input->post();
//                print_r($data);exit;
                if (!isset($data['txt_skill_name']) || !$data['txt_skill_name'])
                    throw new Exception('Please Enter Name');
                if (!isset($data['int_sector_id']) || !$data['int_sector_id'])
                    throw new Exception('Please Select Sector');
//                $data['dt_added'] = date('Y-m-d');
                $user = $this->session->userdata('user');
//                $data['int_aded_by'] = $user['int_user_id'];
                if (isset($data['int_skill_id']) && $data['int_skill_id']) {
                    $id = $data['int_skill_id'];
                    unset($data['int_skill_id']);
                    $this->db->where('int_skill_id', $id);
                    $this->db->update('tab_skills', $data);
                    $response['success'] = TRUE;
                    $response['msg'] = 'Updated Successfully';
                } else {
                    if (isset($data['int_skill_id']) && !$data['int_skill_id']) {
                        unset($data['int_skill_id']);
                    }
                    $status_array = $this->skill_model->add($data);
                    if ($status_array) {
                        $response['success'] = TRUE;
                        $response['msg'] = 'Added Successfully';
                    } else {
                        throw new Exception('Somthing wrong please try again');
                    }
                }
            } else {
                throw new Exception('Please enter product name');
            }
        } catch (Exception $exc) {
            $response['success'] = False;
            $response['msg'] = $exc->getMessage();
        }
        echo json_encode($response);
        exit();
    }

    public function delete() {
        $data = $this->input->post();
        $this->db->where('int_skill_id', $data['int_skill_id']);
        $this->db->delete('tab_skills');
        $response['success'] = TRUE;
        $response['msg'] = 'Deleted Successfully';
        echo json_encode($response);
        exit();
    }

}
