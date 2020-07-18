<?php
class Pln extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_pln');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_pln->get_all_pln();
		}
		else{
			$x['data']=$this->m_pln->get_all_plnid($idwitel);
		}
		
		$this->load->view('admin/cme/v_pln2',$x);
	}
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_pln->get_pln_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_pln2',$x);
	}
	function add_pln(){
		$this->load->view('admin/cme/v_add_pln');
	}
	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_pln->get_pln_by_kode($kode);
		$this->load->view('admin/cme/v_edit_pln',$x);
	}
	function simpan_pln(){
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
			$this->m_pln->simpan_pln($data, 'cme_pln');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/pln');
	}
	
	function update_pln(){
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
	 
		$this->m_pln->update_pln($where,$data,'cme_pln');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/pln');
	}

	function hapus_pln(){
		$kode=$this->input->post('kode');
		$this->m_pln->hapus_pln($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/pln');
	}

}