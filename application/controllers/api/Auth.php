<?php
/**
* 
*/

require APPPATH . 'libraries/REST_Controller.php';
class Auth extends REST_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('validation/model','mod');
	}

	function log_get(){
		$username = $this->get('u');
		$password = $this->get('key');

		$login=$this->mod->get_login_status($username, $password);

		if($login==true){
			 $this->response(array('status'=>true,'error'=>'','response'=>$this->mod->get_who($username)), REST_Controller::HTTP_OK);
		}else{

			$this->response(array('status'=>false,'error'=>'Access Rescticted','response'=>"Gagal"), REST_Controller::HTTP_OK);
		}
	}

	function registrasi_post(){
		$username=$this->post('u');
		$password=$this->post('p');
		$fullname=$this->post('f');

		$cek_data=$this->mod->cek_sudahada($username);
		if($cek_data==true){
			$this->response(array('status'=>true,'error'=>'Data '. $username .' Sudah Ada'),REST_Controller::HTTP_OK);
		}else{
			$arrayName = array('username' => $username,
								'password' => sha1($password),
								'fullname' => $fullname
			 );
			$this->db->insert('tbl_user',$arrayName);
			$this->response(array('status'=>true,'error'=>'Berhasil Menyimpan data '. $username),
					REST_Controller::HTTP_OK);
		}
	}

	
}