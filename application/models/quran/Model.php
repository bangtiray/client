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

	function get_surah(){
		$this->db->select('suranames.chapterid, suranames.suraname as suraname, suranames_id.suraname as suraname_id');
		$this->db->from('suranames');
		$this->db->join('suranames_id', 'suranames_id.chapterid = suranames.chapterid');
		$query = $this->db->get();
		//$query=$this->db->get('suranames');
		if($query->num_rows() >0 ){
			return $query->result_array();
		}
	}
	function get_quran(){
		
		$this->db->select('quran.suraid, quran.verseid as ayat, quran.ayahtext as quran, trans.ayahtext as terjemah');
		$this->db->from('quran');
		$this->db->join('trans', 'quran.suraid = trans.suraid and quran.verseid = trans.verseid');
		$query = $this->db->get();
		if($query->num_rows() >0 ){
			return $query->result_array();
		}
	}
	function cek_token($token){
		$arrayName = array('token' => $token);

		$this->db->where($arrayName);
		$this->db->limit(1);
		$query=$this->db->get('bitok');

		return($query->num_rows() >0 ) ? $query->row() : FALSE;
	}
}