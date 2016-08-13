<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

//require './phpMailer/PHPMailerAutoload.php';

class Jobs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }
    
    function index() {
//        $this->load->model('user_model');
//        $this->load->model('events_visitor_model');
        $this->load->model('jobs_model');
        $this->load->model('skill_model');
        $status_array = $this->jobs_model->getJobsByUserId($this->user['int_user_id']);
        $data['skills'] = $this->skill_model->fetch();
//        $join_events = $this->events_visitor_model->getEventsById($this->user['int_user_id']);
//        print_r($status_array);exit;
//        $emailMsg = $this->session->userdata('emailMsg');
//        if (isset($emailMsg) && $emailMsg != '') {
//            $data['emailMsg'] = $emailMsg;
//            $this->session->set_userdata('emailMsg', '');
//        }

        if ($status_array != NULL)
            $data['jobData'] = $status_array;
//        if ($join_events != NULL)
//            $data['joinEventData'] = $join_events;
        $data['page_title'] = 'My Account | Jobs';
        $data['heading'] = 'Jobs';
        $data['page'] = 'jobs';
        $data['sub_heading'] = 'Your Jobs Schedule';
        $this->load->view('account/page', $data);
    }

    function job() {
        $jobId = $this->uri->segment(3);
//        print_r($this->user);exit;
        if (isset($this->user) && empty($this->user)) {
            $this->session->set_userdata('uri', 'jobs/job/' . $jobId);
            redirect('user/login', 'refresh');
        } else {
//            echo 'hello';exit;
            $this->load->model('jobs_model');
            $this->load->model('events_model');
            $this->load->model('events_visitor_model');
//            $visiting_data = $this->events_visitor_model->checkVisitor($this->user['int_user_id'], $eventId);
//            print_r($visiting_data);exit;
            $status_array = $this->jobs_model->getJobsById($jobId);
//        print_r($status_array);exit;
            if ($status_array != NULL)
                $data['job_details'] = $status_array[0];
//            if (!empty($visiting_data))
//                $data['visiting_data'] = $visiting_data[0];

            $data['page_title'] = 'My Account | Jobs';
//            $data['banner']=$status_array[0]['txt_event_image'];
            $data['heading'] = $status_array[0]['txt_title'];
            $data['page'] = 'jobs_detail';
            $data['sub_heading'] = '';
            $this->load->view('account/detail_page', $data);
        }
    }

   
    function jobSave() {
        $this->load->model('jobs_model');
        $this->load->model('organization_model');
        $formdata = $this->input->post();
//        if ($_FILES['txt_event_image']['name'] != '') {
//            if (($_FILES["txt_event_image"]["type"] == "image/gif") || ($_FILES["txt_event_image"]["type"] == "image/jpeg") || ($_FILES["txt_event_image"]["type"] == "image/jpg") || ($_FILES["txt_event_image"]["type"] == "image/pjpeg") || ($_FILES["txt_event_image"]["type"] == "image/x-png") || ($_FILES["txt_event_image"]["type"] == "image/png")) {
//                $ext = explode(".", $_FILES["txt_event_image"]["name"]);
//                $file_name = date("YmdHis") . "." . $ext[count($ext) - 1];
//                move_uploaded_file($_FILES['txt_event_image']['tmp_name'], "./uploads/" . $file_name);
//                $formdata['txt_event_image'] = base_url() . "uploads/" . $file_name;
//            }
//        }
//        exit();
//        print_r($formdata);exit;
        $orgData = $this->organization_model->getOrgByUserId($this->user['int_user_id']);
        $status_array = FALSE;
        $formdata['int_organization_id'] = $orgData[0]['int_organization_id'];
        $formdata['dt_added'] = date('Y-m-d H:i:s');
        $formdata['int_added_by'] = $this->user['int_user_id'];
        $formdata['int_user_id'] = $this->user['int_user_id'];
        $formdata['txt_skills'] = json_encode($formdata['txt_skills']);
        $jobId = $formdata['int_job_id'];
        unset($formdata['int_job_id']);
        if (isset($orgId) && $orgId) {
            $status_array = $this->jobs_model->updateJobs($formdata, $jobId);
        } else {
            $status_array = $this->jobs_model->saveJobs($formdata);
        }
        redirect('jobs', 'refresh');
    }

   

   
}
