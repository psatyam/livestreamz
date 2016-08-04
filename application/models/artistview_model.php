<?php
class Artistview_model extends CI_Model{

	public $table="tab_artist_views";
	public $table_artist="tab_artists";

	function artistview_model(){
		parent::__construct();
	}


	function getArtistViews($user){
		$last_7_days=date('Y-m-d', strtotime('-7 days'));
		$sql="select dt_date,int_no_of_views from ".$this->table." where int_artist_id=".$user." And  dt_date >='".$last_7_days."' ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}


}

?>