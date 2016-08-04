<?php  (defined('BASEPATH')) OR exit('No direct script access allowed');

class Content extends CI_Controller{
	
    function __construct()
    {
            parent::__construct();
    }

    function home(){
    	$this->load->model('user_model');
        $data['page_title']='Home';
        $data['page']='home';
        $this->load->view('frontend/page',$data);
    }

    
}


?>