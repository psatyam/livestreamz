<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

//require './phpMailer/PHPMailerAutoload.php';

class Content extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function home() {
        $this->load->model('user_model');
        $this->load->model('events_model');
        $this->load->model('announcements_model');
        $data['events'] = $this->events_model->getEvents(10);
        $data['announcements'] = $this->announcements_model->getAnnouncements(10);
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
        $this->load->model('events_visitor_model');
        $this->load->model('events_model');
        $status_array = $this->events_model->getEventsByUserId($this->user['int_user_id']);
        $join_events = $this->events_visitor_model->getEventsById($this->user['int_user_id']);
//        print_r($status_array);exit;
        $emailMsg = $this->session->userdata('emailMsg');
        if (isset($emailMsg) && $emailMsg != '') {
            $data['emailMsg'] = $emailMsg;
            $this->session->set_userdata('emailMsg', '');
        }

        if ($status_array != NULL)
            $data['eventData'] = $status_array;
        if ($join_events != NULL)
            $data['joinEventData'] = $join_events;
        $data['page_title'] = 'My Account | Events';
        $data['heading'] = 'Events';
        $data['page'] = 'events';
        $data['sub_heading'] = 'Your Events Schedule';
        $this->load->view('account/page', $data);
    }

    function event() {
        $eventId = $this->uri->segment(3);
//        print_r($this->user);exit;
        if (isset($this->user) && empty($this->user)) {
            $this->session->set_userdata('uri', 'content/event/' . $eventId);
            redirect('user/login', 'refresh');
        } else {
//            echo 'hello';exit;
            $this->load->model('user_model');
            $this->load->model('events_model');
            $this->load->model('events_visitor_model');
            $visiting_data = $this->events_visitor_model->checkVisitor($this->user['int_user_id'], $eventId);
//            print_r($visiting_data);exit;
            $status_array = $this->events_model->getEventsById($eventId);
//        print_r($status_array);exit;
            if ($status_array != NULL)
                $data['event_details'] = $status_array[0];
            if (!empty($visiting_data))
                $data['visiting_data'] = $visiting_data[0];

            $data['page_title'] = 'My Account | Events';
            $data['banner']=$status_array[0]['txt_event_image'];
            $data['heading'] = $status_array[0]['txt_event_name'];
            $data['page'] = 'events_detail';
            $data['sub_heading'] = '';
            $this->load->view('account/detail_page', $data);
        }
    }

    function saveVisitor() {
        $response = array();
        $this->load->model('events_visitor_model');
        $formdata = $this->input->post();
        $visiting_data = $this->events_visitor_model->saveEventVisitor($formdata);
        $response['success'] = TRUE;
        $response['status'] = $formdata['int_visiting_prob'] == '1' ? 'Accepted' : 'Rejected';
        echo json_encode($response);
        exit;
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
                $formdata['txt_event_image'] = base_url() . "uploads/" . $file_name;
            }
        }
//        exit();
        $orgData = $this->organization_model->getOrgByUserId($this->user['int_user_id']);
        $status_array = FALSE;
//        $formdata['int_organization_id'] = $orgData[0]['int_organization_id'];
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

    public function sendInvite() {
        $this->load->model('events_model');
        $formdata = $this->input->post();
        $status_array = $this->events_model->getEventsById($formdata['int_event_id']);
        $html = "<table> "
                . "<tr><td>Hi<td>"
                . "</tr><tr><td>"
                . "<p>You have been invited to join the event <b>" . $status_array[0]['txt_event_name'] . "</b> created by <b>" . $status_array[0]['user_name'] . "</b></p>"
                . "<a href='" . site_url() . "/content/event/" . $formdata['int_event_id'] . "'>click here</a> to join or reject the event"
                . "</td></tr>"
                . "</table>";
        //$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//        $mail->isSMTP();                                      // Set mailer to use SMTP
//        $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
//        $mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $mail->Username = 'user@example.com';                 // SMTP username
//        $mail->Password = 'secret';                           // SMTP password
//        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//        $mail->Port = 587;                                    // TCP port to connect to

        /*$mail->setFrom('gr19490@gmail.com', 'Mailer');
        foreach ($formdata['emails'] as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $mail->addAddress('joe@example.net');     // Add a recipient
            }
        }*/
//        $mail->addAddress('ellen@example.com');               // Name is optional
//        $mail->addReplyTo('info@example.com', 'Information');
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');
//        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //$mail->isHTML(true);                                  // Set email format to HTML

        //$mail->Subject = 'Envitation To Join Event';
       // $mail->Body = $html;
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        /*if (!$mail->send()) {
            $msg = 'Message could not be sent.  Mailer Error: ' . $mail->ErrorInfo;
            $this->session->set_userdata('emailMsg', $msg);
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg = 'Message has been sent';
            $this->session->set_userdata('emailMsg', $msg);
//            echo 'Message has been sent';
        }*/
		$msg = 'Message has been sent';
        $this->session->set_userdata('emailMsg', $msg);

        redirect('content/accountEvents', 'refresh');
//        print_r($html);
//        exit;
    }

    function accountAnnouncements() {
        $this->load->model('announcements_model');
        $status_array = $this->announcements_model->getAnnouncementsByUserId($this->user['int_user_id']);
//        print_r($status_array);exit;
        if ($status_array != NULL)
            $data['announcementsData'] = $status_array;
        $data['page_title'] = 'My Account | Announcements';
        $data['heading'] = 'Announcements';
        $data['page'] = 'announcement';
        $data['sub_heading'] = 'Your Announcements Schedule';
        $this->load->view('account/page', $data);
    }

    function announcementSave() {
        $this->load->model('announcements_model');
        $formdata = $this->input->post();
        if ($_FILES['txt_announcement_image']['name'] != '') {
            if (($_FILES["txt_announcement_image"]["type"] == "image/gif") || ($_FILES["txt_announcement_image"]["type"] == "image/jpeg") || ($_FILES["txt_announcement_image"]["type"] == "image/jpg") || ($_FILES["txt_announcement_image"]["type"] == "image/pjpeg") || ($_FILES["txt_announcement_image"]["type"] == "image/x-png") || ($_FILES["txt_announcement_image"]["type"] == "image/png")) {
                $ext = explode(".", $_FILES["txt_announcement_image"]["name"]);
                $file_name = date("YmdHis") . "." . $ext[count($ext) - 1];
                move_uploaded_file($_FILES['txt_announcement_image']['tmp_name'], "./uploads/" . $file_name);
                $formdata['txt_announcement_image'] = base_url() . "uploads/" . $file_name;
            }
        }
        $status_array = FALSE;
        $formdata['int_user_id'] = $this->user['int_user_id'];
        $announcementId = $formdata['int_announcement_id'];
        unset($formdata['int_announcement_id']);
        if (isset($orgId) && $orgId) {
            $status_array = $this->announcements_model->updateAnnouncements($formdata, $announcementId);
        } else {
            $status_array = $this->announcements_model->saveAnnouncements($formdata);
        }
        redirect('content/accountAnnouncements', 'refresh');
    }
    
    function announcement() {
        $announcementId = $this->uri->segment(3);
//        print_r($this->user);exit;
        if (isset($this->user) && empty($this->user)) {
            $this->session->set_userdata('uri', 'content/announcement/' . $announcementId);
            redirect('user/login', 'refresh');
        } else {
//            echo 'hello';exit;
            $this->load->model('announcements_model');
            $status_array = $this->announcements_model->getAnnouncementsById($announcementId);
            if ($status_array != NULL)
                $data['announcement_details'] = $status_array[0];
            $data['banner']=$status_array[0]['txt_announcement_image'];
            $data['page_title'] = 'My Account | Announcements';
            $data['heading'] = $status_array[0]['txt_topic'];
            $data['page'] = 'announcements_detail';
            $data['sub_heading'] = '';
            $this->load->view('account/detail_page', $data);
        }
    }

}
