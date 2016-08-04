<?php
class Location_model extends CI_Model{
	public $city_table='cities';
        public $state_table='states';
        public $countries_table='countries';
        
    	function Location_model(){
    		parent::__construct();	
    	}
        
        public function get_all_countries() {
            $sql="SELECT * FROM ".$this->countries_table." ";
            $query=$this->db->query($sql);
            return $query->result_array();
        }
        public function get_all_cities() {            
            $sql="SELECT * FROM ".$this->city_table." where 1";
            $query=$this->db->query($sql);
            return $query->result_array();
        }
        public function get_current_cities() {     
            $country_data['current_country']="India";
            $country_data['current_country_id']="101";
            $this->session->set_userdata('current_country',$country_data);
            $country_details=$this->session->userdata('current_country');
            $current_country=$country_details['current_country_id'];
            $sql="SELECT * FROM ".$this->city_table." where state_id In ( Select id from ".$this->state_table." where country_id= ".$current_country.")";
            $query=$this->db->query($sql);
            return $query->result_array();
        }
        
        public function get_current_popular_cities() {
            $country_data['current_country']="India";
            $country_data['current_country_id']="101";
            $this->session->set_userdata('current_country',$country_data);
            $country_details=$this->session->userdata('current_country');
            $current_country=$country_details['current_country_id'];
            $sql="SELECT * FROM ".$this->city_table." where state_id In ( Select id from ".$this->state_table." where country_id= ".$current_country.") and int_is_popular=1";
            $query=$this->db->query($sql);
            return $query->result_array();
        }
        public function getStatesByCountry($param) {
            $sql="SELECT * FROM ".$this->state_table." WHERE country_id = $param";
            $query=$this->db->query($sql);
            return $query->result_array();
        }
        public function getCityByState($param) {
            $sql="SELECT * FROM ".$this->city_table." WHERE state_id = $param";
            $query=$this->db->query($sql);
            return $query->result_array();
        }        
        function countrydelete($id){
            $this->db->delete($this->countries_table, array('id' => $id));
        }
        function statedelete($id){
            $this->db->delete($this->state_table, array('id' => $id));
            $this->db->delete($this->city_table, array('state_id' => $id));
        }
        function citydelete($id){
            $this->db->delete($this->city_table, array('id' => $id));
        }
        
}