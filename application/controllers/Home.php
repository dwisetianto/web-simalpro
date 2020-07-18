<?php 
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
	}
	function index(){
		redirect('administrator');
	}
}