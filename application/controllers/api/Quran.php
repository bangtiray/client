<?php
/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';
class Quran extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('quran/model','mod');
	
	}

	function Surah_get(){
		$token = $this->get('token');
		$valid = $this->mod->cek_token($token);
		if ($token==""){
			$this->response(array('status'=>false,'error' =>'Invalid Aktifitas, Silahkan Daftar Token Dulu'),REST_Controller::HTTP_OK);
		}else if($valid==true){
			$this->response(array('status'=>true,'response'=>$this->mod->get_surah()), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status'=>false,'error' =>'Invalid Activity'),REST_Controller::HTTP_OK);
		}
	}
	function Quran_get(){
		$token = $this->get('token');
		$valid = $this->mod->cek_token($token);
		if ($token==""){
			$this->response(array('status'=>false,'error' =>'Invalid Aktifitas, Silahkan Daftar Token Dulu'),REST_Controller::HTTP_OK);
		}else if($valid==true){
			$this->response(array('status'=>true,'response'=>$this->mod->get_quran()), REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status'=>false,'error' =>'Invalid Activity'),REST_Controller::HTTP_OK);
		}
	}
}