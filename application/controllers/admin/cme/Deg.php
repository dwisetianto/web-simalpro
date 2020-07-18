<?php
class Deg extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_deg');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_deg->get_all_deg();
		}
		else{
			$x['data']=$this->m_deg->get_all_degid($idwitel);
		}
		
		$this->load->view('admin/cme/v_deg2',$x);
	}
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_deg->get_deg_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_deg2',$x);
	}
	function add_deg(){
		$this->load->view('admin/cme/v_add_deg');
	}
	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_deg->get_deg_by_kode($kode);
		$this->load->view('admin/cme/v_edit_deg',$x);
	}
	function simpan_deg(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'idwitel' => $idwitel,
				'nama_perangkat' => $this->input->post('nama'),
				'merk_perangkat' => $this->input->post('merk'),
				'type_perangkat' => $this->input->post('type'),
				'nomor_seri' => $this->input->post('seri'),
				'kapasitas_tps' => $this->input->post('tps'),
				'kapasitas_tpk' => $this->input->post('tpk'),
				'satuan' => $this->input->post('satuan'),
				'jumlah' => $this->input->post('jumlah'),
				'tahun_operasional' => $this->input->post('operasi'),
				'usia' => $this->input->post('usia'),
				'status' => $this->input->post('status'),
				'fungsi' => $this->input->post('fungsi'),
				'keterangan' => $this->input->post('keterangan'),
			);
			$this->m_deg->simpan_deg($data, 'cme_deg');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/deg');
	}
	
	function update_deg(){
		$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'nama_perangkat' => $this->input->post('nama'),
				'merk_perangkat' => $this->input->post('merk'),
				'type_perangkat' => $this->input->post('type'),
				'nomor_seri' => $this->input->post('seri'),
				'kapasitas_tps' => $this->input->post('tps'),
				'kapasitas_tpk' => $this->input->post('tpk'),
				'satuan' => $this->input->post('satuan'),
				'jumlah' => $this->input->post('jumlah'),
				'tahun_operasional' => $this->input->post('operasi'),
				'usia' => $this->input->post('usia'),
				'status' => $this->input->post('status'),
				'fungsi' => $this->input->post('fungsi'),
				'keterangan' => $this->input->post('keterangan'),
		);

		$where = array(
			'nomor_urut' => $this->input->post('kode')
		);
	 
		$this->m_deg->update_deg($where,$data,'cme_deg');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/deg');
	}

	function hapus_deg(){
		$kode=$this->input->post('kode');
		$this->m_deg->hapus_deg($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/deg');
	}

}