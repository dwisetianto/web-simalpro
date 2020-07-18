<?php
class Event extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_event');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		redirect('admin/dashboard');
	}

	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_event->get_event_by_lokasi($lokasi);
		$this->load->view('admin/v_event2',$x);
	}
	
	function simpan_event(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        //$config['height']= 400;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

							$data = array(
								'lokasi' => $this->input->post('xjudul'),
								'unit' => $this->input->post('xunit'),
								'keterangan' => $this->input->post('xket'),
								'foto' => $gbr['file_name']
							);

							$this->m_event->simpan_event($data, 'tbl_event');
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/event');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/event');
	                }
	                 
	            }else{
					redirect('admin/event');
				}
				
	}
	
	function update_event(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        //$config['height']= 400;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $data = array(
								'lokasi' => $this->input->post('xjudul'),
								'unit' => $this->input->post('xunit'),
								'keterangan' => $this->input->post('xket'),
								'foto' => $gbr['file_name']
							);

							$where = array(
								'id_event' => $this->input->post('kode')
							);

							$images=$this->input->post('gambar');
							$path='./assets/images/'.$images;
							unlink($path);

							$this->m_event->update_event($where, $data, 'tbl_event');
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/event');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/event');
	                }
	                
	            }else{


	                        $data = array(
								'lokasi' => $this->input->post('xjudul'),
								'unit' => $this->input->post('xunit'),
								'keterangan' => $this->input->post('xket')
							);

							$where = array(
								'id_event' => $this->input->post('kode')
							);

							$this->m_event->update_event($where, $data, 'tbl_event');

							echo $this->session->set_flashdata('msg','info');
							redirect('admin/event');
	            } 

	}

	function hapus_event(){
		$kode=$this->input->post('kode');

		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);

		$this->m_event->hapus_event($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/event');
	}

}