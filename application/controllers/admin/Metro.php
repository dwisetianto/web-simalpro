<?php
class Metro extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_metro');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_metro->get_all_metro();
		}
		else{
			$x['data']=$this->m_metro->get_all_metroid($idwitel);
		}

		$this->load->view('admin/v_metro2',$x);
	}
	function add_metro(){
		$this->load->view('admin/v_add_metro');
	}
	function cat(){
		$kode=$this->uri->segment(4);
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_metro->get_metro_by_cat($kode);
		}
		else{
			$x['data']=$this->m_metro->get_metro_by_catid($kode,$idwitel);
		}
		
		$this->load->view('admin/v_metro2',$x);
	}

	function view(){
		$kode=$this->uri->segment(4);
		$lokasi=$this->session->userdata('lokasi');
		//$lokasi=$this->uri->segment(5);
		$x['data']=$this->m_metro->get_metro_by_lokasi($lokasi,$kode);
		$this->load->view('admin/v_metro2',$x);
	}

	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_metro->get_metro_by_kode($kode);
		$this->load->view('admin/v_edit_metro',$x);
	}
	
	function simpan_metro(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'kelompok' => $this->input->post('kelompok'),
				'lokasi' => $this->input->post('lokasi'),
				'idwitel' => $idwitel,
				'nama_ne' => $this->input->post('nama_ne'),
				'merk' => $this->input->post('merk'),
				'type' => $this->input->post('type'),
				'status' => $this->input->post('status'),
				'ip_address' => $this->input->post('ip_address'),
				'ruangan' => $this->input->post('ruangan'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_metro->simpan_metro($data, 'tbl_metro');
			echo $this->session->set_flashdata('msg','success');
			switch ($this->input->post('kelompok')) {
			    case "METRO ETHERNET":
					redirect('admin/metro/cat/1');
					break;
			    case "E1 CES":
					redirect('admin/metro/cat/1');
					break;
			    case "IP BACKBONE":
					redirect('admin/metro/cat/2');
					break;
			    case "ONE NETWORK":
					redirect('admin/metro/cat/3');
					break;
			    case "IP BROADBAND":
					redirect('admin/metro/cat/4');
					break;
			    case "DATA NETWORK":
					redirect('admin/metro/cat/5');
					break;
			    default:
					redirect('admin/metro/cat/1');
			}
	}
	
	function update_metro(){
		$data = array(
				'kelompok' => $this->input->post('kelompok'),
				'lokasi' => $this->input->post('lokasi'),
				'nama_ne' => $this->input->post('nama_ne'),
				'merk' => $this->input->post('merk'),
				'type' => $this->input->post('type'),
				'status' => $this->input->post('status'),
				'ip_address' => $this->input->post('ip_address'),
				'ruangan' => $this->input->post('ruangan'),
				'keterangan' => $this->input->post('keterangan')
		);

		$where = array(
			'no' => $this->input->post('kode')
		);
	 
		$this->m_metro->update_metro($where,$data,'tbl_metro');
		echo $this->session->set_flashdata('msg','info');
			switch ($this->input->post('kelompok')) {
			    case "METRO ETHERNET":
					redirect('admin/metro/cat/1');
					break;
			    case "E1 CES":
					redirect('admin/metro/cat/1');
					break;
			    case "IP BACKBONE":
					redirect('admin/metro/cat/2');
					break;
			    case "ONE NETWORK":
					redirect('admin/metro/cat/3');
					break;
			    case "IP BROADBAND":
					redirect('admin/metro/cat/4');
					break;
			    case "DATA NETWORK":
					redirect('admin/metro/cat/5');
					break;
			    default:
					redirect('admin/metro/cat/1');
			}
	}

	function hapus_metro(){
		$kode=$this->input->post('kode');
		$this->m_metro->hapus_metro($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/metro/cat/1');
	}

}