<?php
class Batt extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_batt');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_batt->get_all_batt();
		}
		else{
			$x['data']=$this->m_batt->get_all_battid($idwitel);
		}
		$this->load->view('admin/cme/v_batt2',$x);
	}
	
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_batt->get_batt_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_batt2',$x);
	}

	function add_batt(){
		$this->load->view('admin/cme/v_add_batt');
	}
	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_batt->get_batt_by_kode($kode);
		$this->load->view('admin/cme/v_edit_batt',$x);
	}
	function simpan_batt(){
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
			$this->m_batt->simpan_batt($data, 'cme_batt');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/batt');
	}
	
	function update_batt(){
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
	 
		$this->m_batt->update_batt($where,$data,'cme_batt');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/batt');
	}

	function hapus_batt(){
		$kode=$this->input->post('kode');
		$this->m_batt->hapus_batt($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/batt');
	}

}