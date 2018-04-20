<?php
/**
* 
*/
class Model extends CI_Model
{
	
	function __construct()
	{
		parent ::__construct();
	}
	function get_login_status($username, $password){
		$arrayName = array('username' => $username,'password'=>sha1($password));

		$this->db->where($arrayName);
		$this->db->limit(1);
		$query=$this->db->get('tbl_user');

		return($query->num_rows() >0 ) ? $query->row() : FALSE;
	}
	function cek_sudahada($id){

		$this->db->where('username',$id);
		$query=$this->db->get('tbl_user');
		return($query->num_rows() >0 ) ? $query->row() : FALSE;
	}

	function get_who($id){
		$this->db->select('username,fullname');
		$this->db->where('username',$id);
		$query=$this->db->get('tbl_user');

		if($query->num_rows() >0 ){
			return $query->result_array();
		}
	}
	
}