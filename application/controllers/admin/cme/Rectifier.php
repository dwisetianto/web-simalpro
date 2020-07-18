<?php
class Rectifier extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_rectifier');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_rectifier->get_all_rectifier();
		}
		else{
			$x['data']=$this->m_rectifier->get_all_rectifierid($idwitel);
		}
		
		$this->load->view('admin/cme/v_rectifier2',$x);
	}
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_rectifier->get_rectifier_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_rectifier2',$x);
	}
	function add_rectifier(){
		$this->load->view('admin/cme/v_add_rectifier');
	}
	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_rectifier->get_rectifier_by_kode($kode);
		$this->load->view('admin/cme/v_edit_rectifier',$x);
	}
	function simpan_rectifier(){
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
			$this->m_rectifier->simpan_rectifier($data, 'cme_rectifier');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/rectifier');
	}
	
	function update_rectifier(){
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
	 
		$this->m_rectifier->update_rectifier($where,$data,'cme_rectifier');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/rectifier');
	}

	function hapus_rectifier(){
		$kode=$this->input->post('kode');
		$this->m_rectifier->hapus_rectifier($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/rectifier');
	}

}