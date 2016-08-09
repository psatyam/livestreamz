<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Content extends CI_Controller{
	
    function __construct()
    {
            parent::__construct();
            $this->user=$this->session->userdata('user');
    }

    function home(){
    	$this->load->model('user_model');
        $data['page_title']='Home';
        $data['page']='home';
        $this->load->view('frontend/page',$data);
    }
    function account(){
    	$this->load->model('user_model');
        $data['page_title']='My Account';
        $data['heading']='Dashboard';
        $data['sub_heading']='Dashboard';
        $data['page']='dashboard';
        $this->load->view('account/page',$data);
    }
    function accountOrg(){
    	$this->load->model('user_model');
        $this->load->model('organization_model');
        $status_array=$this->organization_model->getOrgByUserId($this->user['int_user_id']);
//        print_r($status_array);exit;
        if($status_array!=NULL)
        $data['orgData']=$status_array[0];
        $data['page_title']='My Account';
        $data['heading']='Organization';
        $data['page']='organization';
        $data['sub_heading']='Your Organization Details';
        $this->load->view('account/page',$data);
    }
    function orgSave(){
    	$this->load->model('user_model');
    	$this->load->model('organization_model');
        $formdata=$this->input->post();
        $status_array=FALSE;
            $orgId=$formdata['int_organization_id'];
            unset($formdata['int_organization_id']);
        if(isset($orgId)&&$orgId){
            $status_array=$this->organization_model->updateOrg($formdata,$orgId);
        }else{
            $status_array=$this->organization_model->saveOrg($formdata);
        }
        redirect('content/accountOrg', 'refresh');
        
    }

    
}


?>