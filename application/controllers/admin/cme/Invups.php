<?php
class Invups extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_invups');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_invups->get_all_invups();
		}
		else{
			$x['data']=$this->m_invups->get_all_invupsid($idwitel);
		}

		$this->load->view('admin/cme/v_invups2',$x);
	}
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_invups->get_invups_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_invups2',$x);
	}
	function add_invups(){
		$this->load->view('admin/cme/v_add_invups');
	}
	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_invups->get_invups_by_kode($kode);
		$this->load->view('admin/cme/v_edit_invups',$x);
	}
	function simpan_invups(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'area' => $this->input->post('area'),
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
			$this->m_invups->simpan_invups($data, 'cme_invups');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/invups');
	}
	
	function update_invups(){
		$data = array(
				'area' => $this->input->post('area'),
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
	 
		$this->m_invups->update_invups($where,$data,'cme_invups');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/invups');
	}

	function hapus_invups(){
		$kode=$this->input->post('kode');
		$this->m_invups->hapus_invups($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/invups');
	}

}