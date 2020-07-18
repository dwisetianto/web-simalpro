<?php
class Ac extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_ac');
		$this->load->model('m_witel');
		$this->load->library('upload');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_ac->get_all_ac();
		}
		else{
			$x['data']=$this->m_ac->get_all_acid($idwitel);
		}
		$this->load->view('admin/cme/v_ac2',$x);
	}

	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_ac->get_ac_by_lokasi($lokasi);
		$this->load->view('admin/cme/v_ac2',$x);
	}

	function add_ac(){
		$this->load->view('admin/cme/v_add_ac');
	}

	function get_edit(){
		$kode=$this->uri->segment(5);
		$x['data']=$this->m_ac->get_ac_by_kode($kode);
		$this->load->view('admin/cme/v_edit_ac',$x);
	}
	function simpan_ac(){
		$idwitel = $this->session->userdata('witel');
//		$nama_witel = $this->m_witel->get_witel_by_id($idwitel);
//		foreach ($nama_witel->result_array() as $key) {
//			$wit = $key['idwitel'];
//		}
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
			$this->m_ac->simpan_ac($data, 'cme_ac');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/cme/ac');
	}
	
	function update_ac(){
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
	 
		$this->m_ac->update_ac($where,$data,'cme_ac');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/cme/ac');
	}

	function hapus_ac(){
		$kode=$this->input->post('kode');
		$this->m_ac->hapus_ac($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/cme/ac');
	}

}