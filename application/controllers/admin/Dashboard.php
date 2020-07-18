<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->library('session');
	}
	function index(){
			$idwitel = $this->session->userdata('witel');
			if($idwitel==0) {
				$this->load->view('admin/v_dashboard2');
			}
			else{
				$this->load->view('admin/v_dashboard',$idwitel);
			}
			$this->session->set_userdata('lokasi', '');
	
	}
	function witel(){
		$this->session->set_userdata('witel', $this->input->post('lokasi'));
		$idwitel = $this->session->userdata('lokwitel'); 
		$this->load->view('admin/v_dashboard',$idwitel);
	}
	function map(){
		$this->session->set_userdata('lokasi', $this->input->post('lokasi'));
		redirect('admin/sto'); 
	}
}