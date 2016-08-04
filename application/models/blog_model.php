<?php

class Blog_model extends CI_Model{

	public $table="tab_blogs";
	public $table_comment="tab_comments";

	function blog_model(){
		parent::__construct();
	}


	function getAllBlogs(){
		$sql="select * from ".$this->table." where 1 order by dt_created_on asc ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function addBlog(){
		$sess_array=$this->session->userdata('user');
		extract($this->input->post());
		// print_r($sess_array);die();
		$data=array(
			'txt_title'=>$txt_title,
			'txt_description'=>$txt_description,
			'int_user_id'=>($sess_array['int_user_id'])?$sess_array['int_user_id']:$sess_array['int_artist_id'],
			'int_is_publish'=>($int_is_publish)?$int_is_publish:0,
			'dt_created_on'=>date('Y-m-d')
			);
		$this->db->insert($this->table,$data);
		$blog_id=$this->db->insert_id();

		if($_FILES['cover_image']['name']!=''){
			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["cover_image"]["name"]);		
				$filename=$blog_id;
				$imgtype=$_FILES["cover_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="blog_media/".$file_name;
				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);
				// $data['txt_cover_image']=$filepath;					
				
				$data1=array(
						'txt_media_url'=>$filepath,
						'int_media_type'=>1
						);
				$this->db->where('int_blog_id',$blog_id);
				$this->db->update($this->table,$data1);
			}
		}

	}

	function blogedit(){
		$sess_array=$this->session->userdata('user');
		extract($this->input->post());
		// print_r($sess_array);die();
		$data=array(
			'txt_title'=>$txt_title,
			'txt_description'=>$txt_description,
			'int_is_publish'=>($int_is_publish)?$int_is_publish:0,
			);
		if($_FILES['cover_image']['name']!=''){
			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["cover_image"]["name"]);		
				$filename=$int_blog_id;
				$imgtype=$_FILES["cover_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="blog_media/".$file_name;
				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);
				// $data['txt_cover_image']=$filepath;					
				
				$data['txt_media_url']=$filepath;
				
			}
		}

		$this->db->where('int_blog_id',$int_blog_id);
		$this->db->update($this->table,$data);
	}

	function getBlogComments($id){
		$sql="select a.*,b.txt_fname,b.txt_lname,b.txt_profile_image from ".$this->table_comment." a left join tab_artists b on a.int_user_id=b.int_artist_id where int_blog_id=".$id." order by dt_created_on asc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function getBlogDetail($id){
		$sql="select a.*,b.txt_fname,b.txt_lname,b.txt_profile_image from ".$this->table." a left join tab_artists b on a.int_artist_id=b.int_artist_id where int_blog_id=".$id;
		$query=$this->db->query($sql);
		$result=$query->row_array();
		return $result;
	}

	function blogdelete($id){
		$this->db->delete($this->table_comment,array('int_blog_id'=>$id));
		$this->db->delete($this->table,array('int_blog_id'=>$id));
	}

	function addComment(){
		$sess_array=$this->session->userdata('user');
		extract($this->input->post());
		$formdata=$this->input->post();
		$data=array(
			'txt_comment'=>$formdata['txt_message'],
			'int_blog_id'=>$formdata['int_blog_id'],
			'int_user_id'=>($sess_array['int_artist_id'])?$sess_array['int_artist_id']:0,
			'dt_created_on'=>date('Y-m-d H:i:s')
			);
		$this->db->insert($this->table_comment,$data);
	}


}

?>