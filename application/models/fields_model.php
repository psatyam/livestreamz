<?php
class Fields_model extends CI_Model{

	public $table="tab_fields";


	function fields_model(){
		parent::__construct();
	}

	function allDirectorylist(){
		$sql="select * from ".$this->table." where 1 ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function allActiveDirectorylist(){
		$sql="select * from ".$this->table." where int_is_active=1 ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function fieldsadd(){
		$formdata=$this->input->post();
		extract($formdata);
		$data=array(
			'txt_field_name'=>$txt_field_name,
			'txt_description'=>$txt_description,
			'int_is_active'=>1
			);
		$this->db->insert($this->table,$data);
		$field_id=$this->db->insert_id();

		if($_FILES['cover_image']['name']!=''){
			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["cover_image"]["name"]);		
				$filename=$field_id;
				$imgtype=$_FILES["cover_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="directory_media/".$file_name;
				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);
				// $data['txt_cover_image']=$filepath;					
				
				$data1=array(
						'txt_cover_image'=>$filepath
						);
				$this->db->where('int_field_id',$field_id);
				$this->db->update($this->table,$data1);
			}
		}
	}

	function fieldedit(){		
		$formdata=$this->input->post();
		extract($formdata);
		$data=array(
			'txt_field_name'=>$txt_field_name,
			'txt_description'=>$txt_description
			);
		if($_FILES['cover_image']['name']!=''){
			if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg")|| ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")){
				$ext=explode(".",$_FILES["cover_image"]["name"]);		
				$filename=$int_field_id;
				$imgtype=$_FILES["cover_image"]["type"];
				$file_name=$filename.".".$ext[count($ext)-1];
				$filepath="directory_media/".$file_name;
				move_uploaded_file($_FILES['cover_image']['tmp_name'],$filepath);
				$data['txt_cover_image']=$filepath;
			}
		}
		$this->db->where('int_field_id',$int_field_id);
		$this->db->update($this->table,$data);
	}

	function directorydelete($id){
		$this->db->delete($this->table,array('int_field_id'=>$id));
	}

	FUNCTION getFieldDetail($id){
		$sql="select * from ".$this->table." where int_field_id=".$id;
		$query=$this->db->query($sql);
		$result=$query->row_array();
		return $result;
	}

}

?>