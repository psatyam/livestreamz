<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	
    function __construct()
    {
            parent::__construct();
            $user=$this->session->userdata('user');
            if(!isset($user) || $user=='' || $user['int_user_group']!=1){
                redirect('user/login', 'refresh');  
                die();
            }
    }
    
   
    function index(){
        $data['page_title']='Dashboard';
        $data['page']='dashboard';
        $this->load->view('admin/page',$data);
    }
    
    function addDirectory(){
        $this->load->model('fields_model');
        $this->form_validation->set_rules('txt_field_name', 'Title', 'required');
        if($this->form_validation->run())
        {		
            $this->fields_model->fieldsadd();
            redirect('/admin/manageDirectory/', 'refresh');
        }
        else
        {
            $data['page_title']='Industry Directory';
            $data['page']='directory_add';
            $this->load->view('admin/page',$data);
        }	
    }
    
    function manageDirectory(){
        $this->load->model('fields_model');
        $data['list']=$this->fields_model->allDirectorylist();
//        echo "<pre>";print_r($data);die();
        $data['page_title']='Industry Directory';
        $data['page']='directory_manage';
        $this->load->view('admin/page',$data);
    }
    
    function deleteDirectory($id){
        $this->load->model('fields_model');
        if($id){
            $this->fields_model->directorydelete($id);
        }
        redirect('/admin/manageDirectory/', 'refresh');
    }

    function changeDirectoryStatus(){
        if($this->input->post('int_field_id')){
            $data=array(
                'int_is_active'=>($this->input->post('int_status')==1)?$this->input->post('int_status'):0
                );
            $this->db->where('int_field_id',$this->input->post('int_field_id'));
            $this->db->update('tab_fields',$data);
            echo "Success";
        }else{
            echo "Failed";
        }
    }
    
    function editDirectory($id=''){
        $this->load->model('fields_model');
        $this->form_validation->set_rules('int_field_id', 'Field Id', 'required');
        $this->form_validation->set_rules('txt_field_name', 'Title', 'required');
        if($this->form_validation->run())
        {	
            $this->fields_model->fieldedit();
            redirect('/admin/manageDirectory/', 'refresh');
        }
        else
        {
            $data['field_detail']=$this->fields_model->getFieldDetail($id);
            $data['page_title']='Industry Directory';
            $data['page']='directory_edit';
            $this->load->view('admin/page',$data);
        }
    }

    function addArtist(){
        $this->load->model('user_model');
        $this->load->model('location_model');
        $this->load->model('fields_model');
        $this->form_validation->set_rules('txt_email', 'Email', 'required');
        $this->form_validation->set_rules('txt_password', 'Password', 'required');
        $this->form_validation->set_rules('txt_fname', 'First Name', 'required');
        if($this->form_validation->run())
        {       
            // echo "<pre>";print_r($_FILES);die();
            $this->user_model->Artistadd();
            //redirect('/admin/manageArtist/', 'refresh');
        }
        else
        {
            $data['directory']=$this->fields_model->allActiveDirectorylist();
            $data['countries']=$this->location_model->get_all_countries();
            $data['page_title']='Industry Directory';
            $data['page']='artist_add';
            $this->load->view('admin/page',$data);
        }
    }

    function manageArtist(){
        $this->load->model('user_model');
        $data['list']=$this->user_model->allArtistlist();
//        echo "<pre>";print_r($data);die();
        $data['page_title']='Artist';
        $data['page']='artist_manage';
        $this->load->view('admin/page',$data);
    }
    
    function manageMember(){
        $this->load->model('user_model');
        $data['list']=$this->user_model->allMemberlist();
//        echo "<pre>";print_r($data);die();
        $data['page_title']='Member';
        $data['page']='member_manage';
        $this->load->view('admin/page',$data);
    }
    
    function deleteArtist($id){
        $this->load->model('user_model');
        if($id){
            $this->user_model->artistdelete($id);
        }
        redirect('/admin/manageArtist/', 'refresh');
    }

    function deleteMember($id){
        $this->load->model('user_model');
        if($id){
            $this->user_model->memberdelete($id);
        }
        redirect('/admin/manageMember/', 'refresh');
    }
    
    function changeStatus(){
        $this->load->model('user_model');
        $data=array(
                'int_is_active'=>$this->input->post('int_status')
            );
        $this->db->where('int_user_id',$this->input->post('int_user_id'));
        $this->db->update('tab_user',$data);
        echo "Success";
    }
    
    function blockArtist(){
        $this->load->model('user_model');
        $data=array(
                'int_is_blocked'=>$this->input->post('int_status')
            );
        $this->db->where('int_artist_id',$this->input->post('int_artist_id'));
        $this->db->update('tab_artists',$data);
        echo "Success";
    }
    
    function getstate(){
        $country_id=$this->input->post('country_id');
        $this->load->model('location_model');
        $data=$this->location_model->getStatesByCountry($country_id);
        echo json_encode($data);
    }
    
    function getCities(){
        $state_id=$this->input->post('state_id');
        $this->load->model('location_model');
        $data=$this->location_model->getCityByState($state_id);
        echo json_encode($data);
    }
    
    
    function manageCountry(){
        $this->load->model('location_model');
        $data['countries']=$this->location_model->get_all_countries();
        $data['page_title']='Countries';
        $data['page']='country_manage';
        $this->load->view('admin/page',$data);
    }
    
    function deleteCountry($id){
        $this->load->model('location_model');
        if($id){
            $this->location_model->countrydelete($id);
        }
        redirect('/admin/manageCountry/', 'refresh');
    }
    
    function manageState(){
        $this->load->model('location_model');
        $data['countries']=$this->location_model->get_all_countries();
        $data['page_title']='State';
        $data['page']='state_manage';
        $this->load->view('admin/page',$data);
    }
    
    function deleteState($id){
        $this->load->model('location_model');
        if($id){
            $this->location_model->statedelete($id);
        }
        redirect('/admin/manageState/', 'refresh');
    }
    
    function manageCity(){
        $this->load->model('location_model');
        $data['countries']=$this->location_model->get_all_countries();
        $data['page_title']='State';
        $data['page']='city_manage';
        $this->load->view('admin/page',$data);
    }
    
    function deleteCity($id){
        $this->load->model('location_model');
        if($id){
            $this->location_model->citydelete($id);
        }
        redirect('/admin/manageCity/', 'refresh');
    }
	

    function addBlog(){
        $this->load->model('blog_model');
        $this->form_validation->set_rules('txt_title', 'Title', 'required');
        $this->form_validation->set_rules('txt_description', 'Description', 'required');
        if($this->form_validation->run()){
            $this->blog_model->addBlog();
            redirect('/admin/addBlog','refresh');
        }else{
            $data['page_title']='Blog';
            $data['page']='addBlog';
            $this->load->view('admin/page',$data);
        }
    }

    function addComment(){
        $this->load->model('blog_model');
        if($this->input->post('int_blog_id') || $this->input->post('txt_message')){
            $this->blog_model->addComment();
            echo "success";
        }else{
            echo "failed";
        }
    }

    function viewBlog($id){
        $this->load->model('blog_model');
        $data['blog']=$this->blog_model->getBlogDetail($id);
        $data['comments']=$this->blog_model->getBlogComments($id);
        $data['page_title']='Blog';
        $data['page']='blog_view';
        $this->load->view('admin/page',$data);
    }

    function editBlog($id=''){
        $this->load->model('blog_model');
        $this->form_validation->set_rules('int_blog_id', 'Blog Id', 'required');
        $this->form_validation->set_rules('txt_title', 'Blog Id', 'required');
        $this->form_validation->set_rules('int_blog_id', 'Blog Id', 'required');
        if($this->form_validation->run())
        {   
            $this->blog_model->blogedit();
            redirect('/admin/manageBlog/', 'refresh');
        }
        else
        {
            $data['blog_details']=$this->blog_model->getBlogDetail($id);
            // print_r($data);die();
            $data['page_title']='Blog';
            $data['page']='editBlog';
            $this->load->view('admin/page',$data);
        }
    }

    function manageBlog(){
        $this->load->model('blog_model');
        $data['list']=$this->blog_model->getAllBlogs();
        $data['page_title']='Blog';
        $data['page']='blog_manage';
        $this->load->view('admin/page',$data);
    }

    function deleteBlog($id){
        $this->load->model('blog_model');
        if($id){
            $this->blog_model->blogdelete($id);
        }
        redirect('/admin/manageBlog/', 'refresh');
    }

    function changeBlogStatus(){
        if($this->input->post('int_blog_id')){
            $data=array(
                'int_is_publish'=>($this->input->post('int_status')==1)?$this->input->post('int_status'):0
                );
            $this->db->where('int_blog_id',$this->input->post('int_blog_id'));
            $this->db->update('tab_blogs',$data);
            echo "Success";
        }else{
            echo "Failed";
        }
    }

}

?>