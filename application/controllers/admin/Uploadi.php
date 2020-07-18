<?php
class Uploadi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->library('upload');
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('admin/v_upload', array('error' => ' ' ));
	}
	public function do_uploadi(){
		$config['upload_path']          = './assets/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('admin/v_upload_sukses', $data);
		}
	}

}