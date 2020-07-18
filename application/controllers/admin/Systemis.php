<?php
class Systemis extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_systemis');
		$this->load->library('upload');
		$this->load->helper(array('url','download'));
	}

	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_systemis->get_all_systemis();
		}
		else{
			$x['data']=$this->m_systemis->get_all_systemisid($idwitel);
		}
		$this->load->view('admin/v_systemis',$x);
	}
	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_systemis->get_systemis_by_lokasi($lokasi);
		$this->load->view('admin/v_systemis2',$x);
	}

	function denah(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_systemis->get_denah_by_lokasi($lokasi);
		$this->load->view('admin/v_denah',$x);
	}

	function all_denah(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0) {
			$x['data']=$this->m_systemis->get_all_denah();
		}
		else {
			$x['data']=$this->m_systemis->get_all_denahid($idwitel);
		}
		
		$this->load->view('admin/v_denah',$x);
	}

	function download(){
		$lokasi = $this->session->userdata('lokasi');

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$lokasi.xls");

		$x['data']=$this->m_systemis->get_denah_by_lokasi($lokasi);
		$this->load->view('admin/v_report',$x);
	}

	function dldenah($nomor){	
		$x=$this->db->query("SELECT * FROM tbl_dkatalis WHERE no_urut='$nomor'");
		$b=$x->row_array();	
		force_download('assets/dkatalis/'.$b['file'],NULL);
	}

	function add_systemis(){
		$this->load->view('admin/v_add_systemis');
	}
	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_systemis->get_systemis_by_kode($kode);
		$this->load->view('admin/v_edit_systemis',$x);
	}
	function simpan_systemis(){
			$idwitel = $this->session->userdata('witel');
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'idwitel' => $idwitel,
				'nama' => $this->input->post('nama'),
				'ip_adress' => $this->input->post('ip_adress'),
				'datel' => $this->input->post('datel'),
				'ruang' => $this->input->post('ruang'),
				'lantai' => $this->input->post('lantai'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_systemis');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/systemis');
	}
	
	function update_systemis(){
		$data = array(
				'nama' => $this->input->post('nama'),
				'ip_adress' => $this->input->post('ip_adress'),
				'lokasi' => $this->input->post('lokasi'),
				'datel' => $this->input->post('datel'),
				'ruang' => $this->input->post('ruang'),
				'lantai' => $this->input->post('lantai'),
				'keterangan' => $this->input->post('keterangan')
		);

		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'tbl_systemis');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/systemis');
	}

	function hapus_systemis(){
		$kode=$this->input->post('kode');
		$this->m_systemis->hapus_systemis($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/systemis');
	}

	function simpan_denah(){
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'nama_catalyst' => $this->input->post('nama_catalyst'),
				'port' => $this->input->post('port'),
				'arah' => $this->input->post('arah'),
				'ruang' => $this->input->post('ruang'),
				'lantai' => $this->input->post('lantai'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_konfig');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/systemis/denah');
	}


	function simpan_denah2(){
		$config['upload_path'] = './assets/dkatalis/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 2048; //nama yang terupload nantinya
		$this->load->library('upload');
		$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('file'))
            {
            	echo $this->session->set_flashdata('msg','warning');
            	redirect('admin/systemis/denah');
            }
            else
            {
            	$denah = $this->upload->data();
            	$data = array(
            		'lokasi' => $this->input->post('lokasi'),
            		'file' => $denah['file_name']
            	);

            	$this->m_systemis->simpan_systemis($data, 'tbl_dkatalis');
            	echo $this->session->set_flashdata('msg','success');
            	redirect('admin/systemis/denah');
            }
	}

	function update_denah2(){
		$config['upload_path'] = './assets/dkatalis/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 2048; //nama yang terupload nantinya
		$this->load->library('upload');
		$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('file'))
            {
            	echo $this->session->set_flashdata('msg','warning');
            	redirect('admin/systemis/denah');
            }
            else
            {
            	$denah = $this->upload->data();
            	$data = array(
            		'lokasi' => $this->input->post('lokasi'),
            		'file' => $denah['file_name']
            	);

				$where = array(
					'no_urut' => $this->input->post('kode')
				);
	 
				$this->m_systemis->update_systemis($where,$data,'tbl_dkatalis');
            	echo $this->session->set_flashdata('msg','success');
            	redirect('admin/systemis/denah');
            }
	}


	function update_denah(){
		$data = array(
				'nama_catalyst' => $this->input->post('nama_catalyst'),
				'port' => $this->input->post('port'),
				'arah' => $this->input->post('arah'),
				'ruang' => $this->input->post('ruang'),
				'lantai' => $this->input->post('lantai'),
				'keterangan' => $this->input->post('keterangan')
		);

		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'tbl_konfig');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/systemis/denah');
	}

	function hapus_denah(){
		$kode=$this->input->post('kode');
		$this->m_systemis->hapus_denah($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/systemis/denah');
	}

}