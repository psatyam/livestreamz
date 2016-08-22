<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

//require './phpMailer/PHPMailerAutoload.php';

class Blogs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->library("pagination");
    }

    function index() {
        $this->load->model('blog_model');
        $config["base_url"] = base_url() . "blog/index/";
        $config["total_rows"] = $this->blog_model->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

//        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $status_array = $this->blog_model->getAllBlogs($this->user['int_user_id'], $config["per_page"], $page);
//        echo '<pre>';print_r($status_array);exit;
//        $data["links"] = $this->pagination->create_links();
        if ($page <= $config["total_rows"]-3)
            $data['nextLink'] = $config["base_url"] . ($page + $config["per_page"]);
        if ($page != 0)
            $data['prvLink'] = $config["base_url"] . ($page - $config["per_page"]);

        if ($status_array != NULL)
            $data['blogData'] = $status_array;
//        if ($join_events != NULL)
//            $data['joinEventData'] = $join_events;
        $data['page_title'] = 'My Account | Blogs';
        $data['heading'] = 'Blogs';
        $data['page'] = 'blogs';
        $data['sub_heading'] = 'Your Blogs';
        $this->load->view('account/page', $data);
    }

    function blog() {
        $jobId = $this->uri->segment(3);
//        print_r($this->user);exit;
//        if (isset($this->user) && empty($this->user)) {
//            $this->session->set_userdata('uri', 'jobs/job/' . $jobId);
//            redirect('user/login', 'refresh');
//        } else {
//            echo 'hello';exit;
            $this->load->model('blog_model');
            $blog_data = $this->blog_model->getBlogDetail($jobId);
//            print_r($visiting_data);exit;
            $comment_array = $this->blog_model->getBlogComments($jobId);
//                        echo '<pre>';
//        print_r($comment_array);exit;
            if ($blog_data != NULL)
                $data['blog_details'] = $blog_data;
            if (!empty($comment_array))
                $data['comment_data'] = $comment_array;

            $data['page_title'] = 'My Account | Blogs';
//            $data['banner']=$status_array[0]['txt_event_image'];
            $data['heading'] = $blog_data['txt_title'];
            $data['page'] = 'blog_detail';
            $data['sub_heading'] = '';
            $this->load->view('account/detail_page', $data);
//        }
    }

    function addComment() {
        $this->load->model('blog_model');
        $commentId = $this->blog_model->addComment();
        $commentdata = $this->blog_model->getComments($commentId);
//        print_r($commentdata[0]);exit;
      
        echo json_encode($commentdata[0]);
        exit();
    }

    function blogSave() {
        $this->load->model('blog_model');
        $orgData = $this->blog_model->addBlog();
        redirect('blogs', 'refresh');
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
