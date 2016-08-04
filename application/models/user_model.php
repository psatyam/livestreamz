<?php
class User_model extends CI_Model{

	public $table="tab_users";

	function user_model(){
		parent::__construct();
	}

	function checkemail($email){
		$sql="select txt_email from ".$this->table." where txt_email='".$email."'";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function verifyUser($data){
		extract($data);
		$password=md5($txt_password);
		$sql="select * from ".$this->table." where txt_username='".$txt_username."' and txt_password='".$password."'  ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result[0];
	}
	
	

	function allArtistlist(){
		$sql="select a.* from ".$this->table_artist." a where 1 ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	

	function registerUser($formdata){
		extract($formdata);
		$data=array(
			'txt_email'=>$txt_email,
			'txt_username'=>$txt_username,
			'txt_password'=>md5($txt_password),
			'txt_name'=>$txt_name,
			'txt_cell_no'=>$txt_phone,
			'int_user_group'=>2
			);
		$this->db->insert($this->table,$data);
	}

	

	function allMemberlist(){
		$sql="select a.* from ".$this->table." a where int_user_type=3 ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}


	function getUserDetails($user){
		$sql="select * from ".$this->table." where int_user_id=$user";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}



	function memberdelete($id){
		$this->db->delete($this->table,array('int_user_id'=>$id,'int_user_type'=>3));
	}

	

	function update($data,$userid)
	{
		if($data['old_password']!=$data['txt_password'])
		{
			$password=md5($data['txt_password']);
		}
		else
		{
			$password=$data['old_password'];
		}
		$extra_query='';
		if($data['file_name']!='')
		{
			$extra_query=",txt_profile_image='".$data['file_name']."'";
		}
		$sql="update ".$this->table." set txt_name='".$data['txt_name']."', txt_password='$password', txt_email='".$data['txt_email']."'".$extra_query." where int_user_id=".$userid."";
		$query=$this->db->query($sql);
		$sql_sel="select * from ".$this->table." where int_user_id=".$userid."";
		$query=$this->db->query($sql_sel);
		$result=$query->result_array();
		$this->session->set_userdata('user', $result[0]);
		return $query?1:0;
	}
}

?>