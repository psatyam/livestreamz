<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Content extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function home() {
        $this->load->model('user_model');
        $data['page_title'] = 'Home';
        $data['page'] = 'home';
        $this->load->view('frontend/page', $data);
    }

    function account() {
        $this->load->model('user_model');
        $data['page_title'] = 'My Account';
        $data['heading'] = 'Dashboard';
        $data['sub_heading'] = 'Dashboard';
        $data['page'] = 'dashboard';
        $this->load->view('account/page', $data);
    }

    function accountOrg() {
        $this->load->model('user_model');
        $this->load->model('organization_model');
        $status_array = $this->organization_model->getOrgByUserId($this->user['int_user_id']);
//        print_r($status_array);exit;
        if ($status_array != NULL)
            $data['orgData'] = $status_array[0];
        $data['page_title'] = 'My Account | Organization';
        $data['heading'] = 'Organization';
        $data['page'] = 'organization';
        $data['sub_heading'] = 'Your Organization Details';
        $this->load->view('account/page', $data);
    }

    function orgSave() {
        $this->load->model('user_model');
        $this->load->model('organization_model');
        $formdata = $this->input->post();
        $status_array = FALSE;
        $orgId = $formdata['int_organization_id'];
        unset($formdata['int_organization_id']);
        if (isset($orgId) && $orgId) {
            $status_array = $this->organization_model->updateOrg($formdata, $orgId);
        } else {
            $status_array = $this->organization_model->saveOrg($formdata);
        }
        redirect('content/accountOrg', 'refresh');
    }

    function accountEvents() {
        $this->load->model('user_model');
        $this->load->model('organization_model');
        $this->load->model('events_model');
        $status_array = $this->events_model->getEventsByUserId($this->user['int_user_id']);
//        print_r($status_array);exit;
        if ($status_array != NULL)
            $data['eventData'] = $status_array;
        $data['page_title'] = 'My Account | Events';
        $data['heading'] = 'Events';
        $data['page'] = 'events';
        $data['sub_heading'] = 'Your Events Schedule';
        $this->load->view('account/page', $data);
    }

    function eventSave() {
        $this->load->model('user_model');
        $this->load->model('organization_model');
        $this->load->model('events_model');
        $formdata = $this->input->post();
        if ($_FILES['txt_event_image']['name'] != '') {
            if (($_FILES["txt_event_image"]["type"] == "image/gif") || ($_FILES["txt_event_image"]["type"] == "image/jpeg") || ($_FILES["txt_event_image"]["type"] == "image/jpg") || ($_FILES["txt_event_image"]["type"] == "image/pjpeg") || ($_FILES["txt_event_image"]["type"] == "image/x-png") || ($_FILES["txt_event_image"]["type"] == "image/png")) {
                $ext = explode(".", $_FILES["txt_event_image"]["name"]);
                $file_name = date("YmdHis") . "." . $ext[count($ext) - 1];
                move_uploaded_file($_FILES['txt_event_image']['tmp_name'], "./uploads/" . $file_name);
                $formdata['txt_event_image'] = base_url()."uploads/" .$file_name;
            }
        }
//        exit();
        $orgData = $this->organization_model->getOrgByUserId($this->user['int_user_id']);
        $status_array = FALSE;
        $formdata['int_organization_id'] = $orgData[0]['int_organization_id'];
        $formdata['dt_added'] = date('Y-m-d H:i:s');
        $formdata['int_added_by'] = $this->user['int_user_id'];
//        $formdata['ts_datetime'] = strtotime($formdata['ts_datetime']);
        $eventId = $formdata['int_event_id'];
        unset($formdata['int_event_id']);
        if (isset($orgId) && $orgId) {
            $status_array = $this->events_model->updateEvents($formdata, $eventId);
        } else {
            $status_array = $this->events_model->saveEvents($formdata);
        }
        redirect('content/accountEvents', 'refresh');
    }

}

?>