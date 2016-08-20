<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

require './phpMailer/PHPMailerAutoload.php';

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
            $this->load->model('jobsApplicant_model');
            $application_data = $this->jobsApplicant_model->getApplicantById($this->user['int_user_id'], $jobId);
//            print_r($visiting_data);exit;
            $status_array = $this->jobs_model->getJobsById($jobId);
            if ($this->user['int_user_id'] == $status_array[0]['int_user_id']) {
                
                $allApplicants = $this->jobsApplicant_model->getApplicantByJobId($jobId);
                $data['allApplicants'] = $allApplicants;
            }
//            echo '<pre>';
//        print_r($allApplicants);exit;
            if ($status_array != NULL)
                $data['job_details'] = $status_array[0];
            if (!empty($application_data))
                $data['application_data'] = $application_data[0];

            $data['page_title'] = 'My Account | Jobs';
//            $data['banner']=$status_array[0]['txt_event_image'];
            $data['heading'] = $status_array[0]['txt_title'];
            $data['page'] = 'jobs_detail';
            $data['sub_heading'] = '';
            $this->load->view('account/detail_page', $data);
        }
    }
    
    function selection(){
        $formdata = $this->input->post();
        $formdata['dt_selection']=  date('Y-m-d');
        $this->db->insert('tab_job_selections', $formdata);
        $response['success']=TRUE;
        $response['selection']=$formdata['int_selection_type'];
//        print_r($formdata);exit;
        echo json_encode($response);exit();
        
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

//    public function sendInvite() {
//        $this->load->model('events_model');
//        $formdata = $this->input->post();
//        $status_array = $this->events_model->getEventsById($formdata['int_event_id']);
//        $html = "<table> "
//                . "<tr><td>Hi<td>"
//                . "</tr><tr><td>"
//                . "<p>You have been invited to join the event <b>" . $status_array[0]['txt_event_name'] . "</b> created by <b>" . $status_array[0]['user_name'] . "</b></p>"
//                . "<a href='" . site_url() . "/content/event/" . $formdata['int_event_id'] . "'>click here</a> to join or reject the event"
//                . "</td></tr>"
//                . "</table>";
//        $mail = new PHPMailer;
//
////$mail->SMTPDebug = 3;                               // Enable verbose debug output
////        $mail->isSMTP();                                      // Set mailer to use SMTP
////        $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
////        $mail->SMTPAuth = true;                               // Enable SMTP authentication
////        $mail->Username = 'user@example.com';                 // SMTP username
////        $mail->Password = 'secret';                           // SMTP password
////        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
////        $mail->Port = 587;                                    // TCP port to connect to
//
//        $mail->setFrom('gr19490@gmail.com', 'Mailer');
//        foreach ($formdata['emails'] as $email) {
//            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//                $mail->addAddress('joe@example.net');     // Add a recipient
//            }
//        }
////        $mail->addAddress('ellen@example.com');               // Name is optional
////        $mail->addReplyTo('info@example.com', 'Information');
////        $mail->addCC('cc@example.com');
////        $mail->addBCC('bcc@example.com');
////        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//        $mail->isHTML(true);                                  // Set email format to HTML
//
//        $mail->Subject = 'Envitation To Join Event';
//        $mail->Body = $html;
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//        if (!$mail->send()) {
//            $msg = 'Message could not be sent.  Mailer Error: ' . $mail->ErrorInfo;
//            $this->session->set_userdata('emailMsg', $msg);
////            echo 'Message could not be sent.';
////            echo 'Mailer Error: ' . $mail->ErrorInfo;
//        } else {
//            $msg = 'Message has been sent';
//            $this->session->set_userdata('emailMsg', $msg);
////            echo 'Message has been sent';
//        }
//
//        redirect('content/accountEvents', 'refresh');
////        print_r($html);
////        exit;
//    }

    public function jobApply() {
        $this->load->model('jobsApplicant_model');
        $formdata = $this->input->post();
        if ($_FILES['txt_cv_path']['name'] != '') {
//            if (($_FILES["txt_cv_path"]["type"] == "image/gif") || ($_FILES["txt_cv_path"]["type"] == "image/jpeg") || ($_FILES["txt_cv_path"]["type"] == "image/jpg") || ($_FILES["txt_event_image"]["type"] == "image/pjpeg") || ($_FILES["txt_event_image"]["type"] == "image/x-png") || ($_FILES["txt_event_image"]["type"] == "image/png")) {
            $ext = explode(".", $_FILES["txt_cv_path"]["name"]);
            $file_name = date("YmdHis") . "." . $ext[count($ext) - 1];
            move_uploaded_file($_FILES['txt_cv_path']['tmp_name'], "./uploads/" . $file_name);
            $formdata['txt_cv_path'] = "uploads/" . $file_name;
//            }
        }
        $formdata['int_applied_by'] = $this->user['int_user_id'];
        $formdata['dt_applied'] = date('Y-m-d');
        $status_array = $this->jobsApplicant_model->saveApplicant($formdata);
        redirect('jobs/job/' . $formdata['int_job_id'], 'refresh');
    }

}
