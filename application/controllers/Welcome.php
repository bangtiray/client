<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');

		$this->load->view('daftar');
	}
	function daftar(){
		$email =$this->input->post('email');
		if ($email == ""){
			$status["status"]=false;
		}else{
			$status["status"]=true;

			$create=sha1($email . date('Ymd His'));
			$arrayName = array('email' =>$email ,'token'=>$create);
			$this->db->insert('bitok', $arrayName);

	
			  $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://mail.email.co.id',
                  'smtp_port' => 465,
                  'smtp_user' => 'noreply@email.co.id', // change it to yours
                  'smtp_pass' => '******', // change it to yours
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE
                );
                 $this->load->library('email', $config);
                $this->email->from('gausahbales@zialagiaza.com', 'MOHON DOA KESEHATAN UNTUK DEVELOPER');
                 $this->email->to($email);
                $data['token']=$create;
              
                $this->email->subject('Notifikasi no Toket eeh Token');
                  $body = $this->load->view('template',$data,TRUE);
                $this->email->message($body);

                $this->email->send();
		}
		echo json_encode($status);
	}
}
