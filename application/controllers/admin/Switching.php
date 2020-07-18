<?php
class Switching extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_switching');
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_switching->get_all_switching();
		}
		else{
			$x['data']=$this->m_switching->get_all_switchingid($idwitel);
		}
		$this->load->view('admin/v_switching',$x);
	}
	function add_switching(){
		$this->load->view('admin/v_add_switching');
	}
	function simpan_switching(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'idwitel' => $idwitel,
				'nama_perangkat' => $this->input->post('nama_perangkat'),
				'type' => $this->input->post('type'),
				'fungsi' => $this->input->post('fungsi'),
				'kap_terpasang_sst' => $this->input->post('kap_terpasang_sst'),
				'kap_terpasang_pra' => $this->input->post('kap_terpasang_pra'),
				'kap_terpakai_sst' => $this->input->post('kap_terpakai_sst'),
				'kap_terpakai_pra' => $this->input->post('kap_terpakai_pra'),
				'tgl_integrasi' => $this->input->post('tgl_integrasi'),
				'keterangan' => $this->input->post('keterangan')
			);

			$this->m_switching->simpan_switching($data, 'tbl_switching');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/switching');
	}
	
	function update_switching(){
		$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'nama_perangkat' => $this->input->post('nama_perangkat'),
				'type' => $this->input->post('type'),
				'fungsi' => $this->input->post('fungsi'),
				'kap_terpasang_sst' => $this->input->post('kap_terpasang_sst'),
				'kap_terpasang_pra' => $this->input->post('kap_terpasang_pra'),
				'kap_terpakai_sst' => $this->input->post('kap_terpakai_sst'),
				'kap_terpakai_pra' => $this->input->post('kap_terpakai_pra'),
				'tgl_integrasi' => $this->input->post('tgl_integrasi'),
				'keterangan' => $this->input->post('keterangan')
		);

		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_switching->update_switching($where,$data,'tbl_switching');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/switching');
	}

	function hapus_switching(){
		$kode=$this->input->post('kode');
		$this->m_switching->hapus_switching($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/switching');
	}

}