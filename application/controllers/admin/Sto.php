<?php
class Sto extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_sto');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper(array('url','download'));
	}


	function index(){
		//$this->session->set_userdata('lokasi', $this->input->post('lokasi'));
		if($this->session->userdata('lokasi') != '') {
			$x['data']=$this->m_sto->get_sto_by_lokasi($this->session->userdata('lokasi'));
			$this->load->view('admin/v_sto2',$x);
		}
		else {
			redirect('admin/dashboard'); 
		}
	}

    function view_sto(){
        $x['data']=$this->m_sto->get_all_sto();
        $this->load->view('admin/v_sto3',$x);
    }

	function simpan_denah(){
		$config['upload_path'] = './assets/denah/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 2048; //max size
		$this->load->library('upload');
		$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('denah'))
            {
            	echo $this->session->set_flashdata('msg','warning');
            	redirect('admin/sto');
            }
            else
            {
            	$denah = $this->upload->data();
            	$data = array(
            		'lokasi' => $this->input->post('lokasi'),
            		'nama_file' => $denah['file_name']
            	);

            	$this->m_sto->simpan($data, 'tbl_denah');
            	echo $this->session->set_flashdata('msg','success');
            	redirect('admin/sto');
            }
				
	}



	function update_landing(){
		$config['upload_path'] = './assets/gedung/'; //path folder
		$config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 2048; //max size
		$this->load->library('upload');
		$this->upload->initialize($config);

		if(!empty($_FILES['foto']['name']))
		{
            if ( ! $this->upload->do_upload('foto'))
            {
            	echo $this->session->set_flashdata('msg','warning');
            	redirect('admin/sto');
            }
            else
            {
            	$denah = $this->upload->data();
            	$data = array(
            		'embed' => $this->input->post('embed'),
            		'koordinat' => $this->input->post('koordinat'),
            		'foto' => $denah['file_name']
            	);

				$where = array(
					'no_urut' => $this->input->post('kode')
				);
	 
				$this->m_sto->update($where,$data,'tbl_landing');
            	echo $this->session->set_flashdata('msg','update_foto');
            	redirect('admin/sto');
            }
        } else {
            	$data = array(
            		'embed' => $this->input->post('embed'),
            		'koordinat' => $this->input->post('koordinat')
            	);

				$where = array(
					'no_urut' => $this->input->post('kode')
				);
	 
				$this->m_sto->update($where,$data,'tbl_landing');
            	echo $this->session->set_flashdata('msg','update_foto');
            	redirect('admin/sto');
        }				
	}

	public function download($nomor){	
		$x=$this->m_sto->get_nama($nomor);
		$b=$x->row_array();	
		force_download('assets/denah/'.$b['nama_file'],NULL);
	}

	public function hapus($nomor){
		$this->m_sto->hapus_denah($nomor);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/sto');
	}
	
	public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] ='./excel/';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('admin/sto/view_sto');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'idsto' => $row['A'],
                                    'idwitel'      => $row['B'],
                                    'nama_sto'      => $row['C'],
                                    'kode_sto'      => $row['D']
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tbl_sto', $data);
            //delete file from server
            //unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('admin/sto/view_sto');

        }
    }
}