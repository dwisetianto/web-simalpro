<?php
class Transport extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_transport');
		$this->load->model('m_systemis');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
        $this->load->helper(array('url_helper','html_helper','form'));
	}


	function index(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_transport->get_all_transport();
		}
		else{
			$x['data']=$this->m_transport->get_all_transportid($idwitel);
		}
		
		$this->load->view('admin/v_transport2',$x);
	}

	function view(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_transport->get_transport_by_lokasi($lokasi);
		$this->load->view('admin/v_transport2',$x);
	}

	function link(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['data']=$this->m_transport->get_transport_by_link($link);
		echo $this->session->set_flashdata('link', $link);
		$this->load->view('admin/v_transport4',$x);
	}

	function project(){
		$this->session->keep_flashdata('link');
		if (!$this->input->post('project')) {
			$project = $this->session->flashdata('project');
		} else {
			$project = $this->input->post('project');
		}
		$link = $this->session->flashdata('link');
		$x['link'] = $link;
		$x['project'] = $project;
		$x['data']=$this->m_transport->get_transport_by_project($link,$project);
		echo $this->session->set_flashdata('project', $project);
		$this->load->view('admin/v_transport5',$x);
	}

	function link2(){
		$idwitel = $this->session->userdata('witel');
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$datalink=$this->m_transport->get_transport_by_link($link);
		$x['data']=$this->m_transport->get_transport_by_link($link);
		foreach ($datalink->result_array() as $dl) {
			$merk = $dl['merk'];
			$no_urut = $dl['no_urut'];
		}
		//print_r($no_urut);die;
		$x['core']=$this->m_transport->get_core_link($no_urut,$merk,$idwitel);
		echo $this->session->set_flashdata('link', $link);
		$this->load->view('admin/v_transport4',$x);
	}

	function add_transport(){
		$x['link'] = $this->input->post('link');
		$this->session->keep_flashdata('link');
		$this->load->view('admin/v_add_transport',$x);
	}
	
	function simpan_transport(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'link' => $this->input->post('link'),
				'idwitel' => $this->input->post('witel'),
				'merk' => $this->input->post('merk'),
				'project' => $this->input->post('project'),
				'tahun_operasi' => $this->input->post('tahun_operasi'),
				'type_fiber' => $this->input->post('type_fiber'),
				'type_con' => $this->input->post('type_con'),
				'kap_core' => $this->input->post('kap_core'),
				'kap_terpakai' => $this->input->post('kap_terpakai'),
				'kap_idle' => $this->input->post('kap_idle'),
				'rusak' => $this->input->post('rusak'),
				'sisa_baik' => $this->input->post('sisa_baik'),
				'panjang' => $this->input->post('panjang'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_temp');
		$maxid = $this->m_transport->maxid('no_urut','tbl_temp');
		//print_r($maxid[0]['max']); die;
		for($i=0;$i<$data['kap_core'];$i++) {
			$simpan = $this->m_transport->add_link($maxid[0]['max'],$i,$data['link'],$data['merk'],$data['idwitel']);
		}
			$this->session->keep_flashdata('link');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/transport/link2');				
	}
	
	function update_transport(){
		$data = array(
				'link' => $this->input->post('link'),
				'merk' => $this->input->post('merk'),
				'project' => $this->input->post('project'),
				'tahun_operasi' => $this->input->post('tahun_operasi'),
				'type_fiber' => $this->input->post('type_fiber'),
				'type_con' => $this->input->post('type_con'),
				'kap_core' => $this->input->post('kap_core'),
				'kap_terpakai' => $this->input->post('kap_terpakai'),
				'kap_idle' => $this->input->post('kap_idle'),
				'rusak' => $this->input->post('rusak'),
				'sisa_baik' => $this->input->post('sisa_baik'),
				'panjang' => $this->input->post('panjang'),
				'keterangan' => $this->input->post('keterangan')
		);
 
		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'tbl_temp');
		$this->session->keep_flashdata('link');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/transport/link2');
	}

	function add_ruas(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'nama_ruas' => $this->input->post('ruas'),
				'idwitel' => $this->input->post('witel')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_ruas');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/transport/index');				
	}

	function edit_linkold(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['merk'] = $this->uri->segment(4);
		$x['no_urut'] = $this->uri->segment(5);
		$data = $this->m_transport->get_transport($link,$x['no_urut'],$x['merk']);
		foreach ($data->result_array() as $i){  
                       $x['linknm']=$i['link'];
                       $x['kap_core']=$i['kap_core'];     
                       $x['kap_terpakai']=$i['kap_terpakai'];
                       $x['kap_idle']=$i['kap_idle'];
                       $x['witelid']=$i['idwitel'];
        }
		
		echo $this->session->set_flashdata('link', $link);
		$this->load->view('admin/v_add_transport_link',$x);
	}

	#Add Cores
	function add_core(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['no_kabel'] = $this->uri->segment(4);
		$data = $this->m_transport->get_transport_cable($x['no_kabel']);
		foreach ($data->result_array() as $i){  
                       $x['link']=$i['link'];
                       $x['idlink']=$i['idlink'];
                       $x['idkabel']=$i['no_urut'];
                       $x['merk']=$i['merk'];  
                       $x['witelid']=$i['idwitel'];
        }
		$this->session->keep_flashdata('link');
		$this->load->view('admin/v_add_core',$x);
	}

	#simpan core
	function simpan_core(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'idlink' => $this->input->post('idlink'),
				'idkabel' => $this->input->post('idkabel'),
				'idcore' => $this->input->post('nocore'),
				'user' => $this->input->post('user'),
				'service_name' => $this->input->post('service'),
				'port_service' => $this->input->post('port'),
				'status' => $this->input->post('status')
			);
			$this->m_transport->simpan_transport($data, 'isi_core');
		$idcores = $this->m_transport->maxid('idcores','isi_core');
		//print_r($maxid[0]['max']); die;
		$ket="NEW Add ID Link: ".$this->input->post('idlink')." - ".$this->input->post('merk')." - Core: ".$this->input->post('nocore')." - User: ".$this->input->post('user')." - Service: ".$this->input->post('service')." - Port: ".$this->input->post('port')." - Status: ".$this->input->post('status')."";
		$hist = array(
			'idcores' => $idcores[0]['max'],
			'keterangan' => $ket,
			'idwitel' => $this->input->post('idwitel'),
			'pelaksana' => $this->session->userdata('nama')
		);
		$idkabel = $this->input->post('idkabel');
		$this->m_transport->simpan_transport($hist, 'history_core');
			echo $this->session->set_flashdata('msg','success');
			redirect(base_url().'admin/transport/edit_link/'.$idkabel);				
	}
	#View Cores
	function edit_link(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['no_urut'] = $this->uri->segment(4);
		$x['data'] = $this->m_transport->get_transport($x['no_urut']);
		
		echo $this->session->set_flashdata('link', $link);
		$this->load->view('admin/v_isicore',$x);
	}

	#Edit Cores
	function edit_core(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['idkabel'] = $this->uri->segment(4);
		$x['idcores'] = $this->uri->segment(5);
		$data = $this->m_transport->get_core($x['idkabel'],$x['idcores']);
		foreach ($data->result_array() as $i){  
                       $x['link']=$i['link'];
                       $x['idlink']=$i['idlink'];
                       $x['idkabel']=$i['no_urut'];
                       $x['merk']=$i['merk'];  
                       $x['witelid']=$i['idwitel'];
                       $x['idcore']=$i['idcore'];
                       $x['user']=$i['user'];
                       $x['service_name']=$i['service_name'];
                       $x['port_service']=$i['port_service'];
                       $x['status']=$i['status'];
        }
		$this->session->keep_flashdata('link');
		$this->load->view('admin/v_edit_core',$x);
	}

	#Update Core
	function update_core(){
		$data = array(
				'idlink' => $this->input->post('idlink'),
				'idkabel' => $this->input->post('idkabel'),
				'idcore' => $this->input->post('nocore'),
				'user' => $this->input->post('user'),
				'service_name' => $this->input->post('service'),
				'port_service' => $this->input->post('port'),
				'status' => $this->input->post('status')
		);
 
		$where = array(
			'idcores' => $this->input->post('idcores')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'isi_core');

		$ket="Update ID Link: ".$this->input->post('idlink')." - ".$this->input->post('merk')." - Core: ".$this->input->post('nocore')." - User: ".$this->input->post('user')." - Service: ".$this->input->post('service')." - Port: ".$this->input->post('port')." - Status: ".$this->input->post('status')."";
		$this->session->keep_flashdata('link');
		$hist = array(
			'idcores' => $this->input->post('idcores'),
			'keterangan' => $ket,
			'idwitel' => $this->input->post('idwitel'),
			'pelaksana' => $this->session->userdata('nama')
		);
		$this->m_transport->simpan_transport($hist, 'history_core');

		$this->session->keep_flashdata('link');
		echo $this->session->set_flashdata('msg','info');
		redirect(base_url().'admin/transport/edit_link/'.$this->input->post('idkabel'));
	}

	#View Cores History
	function history_core(){
		if (!$this->input->post('link')) {
			$link = $this->session->flashdata('link');
		} else {
			$link = $this->input->post('link');
		}
		$x['link'] = $link;
		$x['idkabel'] = $this->uri->segment(4);
		$x['idcores'] = $this->uri->segment(5);
		$x['data'] = $this->m_transport->get_history_core($x['idcores']);
		
		echo $this->session->set_flashdata('link', $link);
		$this->load->view('admin/v_history_core',$x);
	}

	function update_osp_pakai(){
		/*$data = array(
				'link' => $this->input->post('link'),
				'merk' => $this->input->post('merk'),
				'project' => $this->input->post('project'),
				'tahun_operasi' => $this->input->post('tahun_operasi'),
				'type_fiber' => $this->input->post('type_fiber'),
				'type_con' => $this->input->post('type_con'),
				'kap_core' => $this->input->post('kap_core'),
				'kap_terpakai' => $this->input->post('kap_terpakai'),
				'kap_idle' => $this->input->post('kap_idle'),
				'rusak' => $this->input->post('rusak'),
				'sisa_baik' => $this->input->post('sisa_baik'),
				'panjang' => $this->input->post('panjang'),
				'keterangan' => $this->input->post('keterangan')
		);
 
		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 */
	
		//$pakai = $this->input->post('pakai');
	/*	$idwitel = $this->input->post('witelid');
		$no_urut = $this->input->post('kode');
		$linknm = $this->input->post('linknm');
		$merk = $this->input->post('merk');
		$n_kap = $this->input->post('ncore');
		$i_kap = $this->input->post('icore');
		for($i=0;$i<$n_kap;$i++) {
			$simpan = $this->m_transport->add_link($no_urut,$i,$linknm,$merk,$idwitel);

		}*/ 
		$node1 = $this->input->post('node1');
		$node2 = $this->input->post('node2');
		$idwitel = $this->session->userdata('witel');
		$no_urut = $this->input->post('kode');
		$n_kap = $this->input->post('ncore');
		$i_kap = $this->input->post('icore');
		for($i=0;$i<$n_kap;$i++) {
			$simpan = $this->m_transport->update_link($no_urut,$i_kap[$i],$idwitel,$node1[$i],$node2[$i]);
		}
		$ncore = $this->m_transport->n_core($no_urut);
		foreach ($ncore->result_array() as $i) {
            $n_core=(int)$i['kap_core'];
            $n_idle=(int)$i['kap_idle'];
            $n_rusak=(int)$i['rusak'];
        }
		$pakai = $this->m_transport->n_pakai($no_urut);
		$jlink = $this->m_transport->n_link($no_urut);
		$npakai = $pakai[0]['n'];
		$nlink = $jlink[0]['n'];
		$n_kosong = $nlink - $npakai - $n_rusak;
		$this->m_transport->update_n($no_urut,$npakai,$n_kosong,$nlink);
		
		//$simpan = $this->m_transport->add_link($no_urut,$n_kap[2],$idwitel);
		//$this->m_systemis->update_systemis($where,$data,'tbl_temp');
		//$this->session->keep_flashdata('link');
		//echo $this->session->set_flashdata('msg','info');
		redirect('admin/transport/index');
	}

	function hapus_core(){
		$idcores=$this->input->post('idcores');
		$idkabel=$this->input->post('idkabel');
		$data = $this->m_transport->get_core($idkabel,$idcores);
		foreach ($data->result_array() as $i){  
                       $link=$i['link'];
                       $idlink=$i['idlink'];
                       $idkabel=$i['no_urut'];
                       $merk=$i['merk'];  
                       $witelid=$i['idwitel'];
                       $idcore=$i['idcore'];
                       $user=$i['user'];
                       $service_name=$i['service_name'];
                       $port_service=$i['port_service'];
                       $status=$i['status'];
        }
		$this->m_transport->hapus_core($idcores);
		$ket="Delete ID Link: ".$idlink." - ".$merk." - Core: ".$idcore." - User: ".$user." - Service: ".$service_name." - Port: ".$port_service." - Status: ".$status."";
		$this->session->keep_flashdata('link');
		$hist = array(
			'idcores' => $this->input->post('idcores'),
			'keterangan' => $ket,
			'idwitel' => $witelid,
			'pelaksana' => $this->session->userdata('nama')
		);
		$this->m_transport->simpan_transport($hist, 'history_core');
		echo $this->session->set_flashdata('msg','success-hapus');
		echo $this->session->set_flashdata('link', $this->input->post('link'));
		redirect(base_url().'admin/transport/edit_link/'.$idkabel);	
	}

	function hapus_link(){
		$kode=$this->input->post('kode');
		$this->m_transport->hapus_link($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		echo $this->session->set_flashdata('link', $this->input->post('link'));
		redirect('admin/transport/link2');
	}
	function hapus_transport(){
		$kode=$this->input->post('kode');
		$this->m_transport->hapus_transport($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		echo $this->session->set_flashdata('link', $this->input->post('link'));
		redirect('admin/transport/link2');
	}

	function simpan_project(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'link' => $this->input->post('link'),
				'idwitel' => $idwitel,
				'project' => $this->input->post('project'),
				'no_core' => $this->input->post('no_core'),
				'service' => $this->input->post('service'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_tproject');
			$this->session->keep_flashdata('link');
			$this->session->keep_flashdata('project');
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/transport/project');				
	}

	function update_project(){
			$data = array(
				'link' => $this->input->post('link'),
				'project' => $this->input->post('project'),
				'no_core' => $this->input->post('no_core'),
				'service' => $this->input->post('service'),
				'keterangan' => $this->input->post('keterangan')
			);
		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'tbl_tproject');
		$this->session->keep_flashdata('link');
		$this->session->keep_flashdata('project');
		echo $this->session->set_flashdata('msg','info');
			redirect('admin/transport/project');				
	}

	function hapus_project(){
		$kode=$this->input->post('kode');
		$this->m_transport->hapus_tproject($kode);
		$this->session->keep_flashdata('link');
		$this->session->keep_flashdata('project');
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/transport/project');
	}

	function isp(){
		$idwitel = $this->session->userdata('witel');
		if($idwitel==0){
			$x['data']=$this->m_transport->get_all_isp();
		}
		else{
			$x['data']=$this->m_transport->get_all_ispid($idwitel);
		}
		
		$this->load->view('admin/v_isp',$x);
	}

	function view_isp(){
		$lokasi = $this->session->userdata('lokasi');
		$x['data']=$this->m_transport->get_isp_by_lokasi($lokasi);
		$this->load->view('admin/v_isp',$x);
	}

	function dwdm_isp(){
		if (!$this->session->userdata('lokasi')) {
			$lokasi = $this->input->post('lokasi');
		} else {
			$lokasi = $this->session->userdata('lokasi');
		}
		if (!$this->input->post('dwdm')) {
			$dwdm = $this->session->flashdata('dwdm');
		} else {
			$dwdm = $this->input->post('dwdm');
		}
		$x['dwdm'] = $dwdm;
		$x['data']=$this->m_transport->get_isp_by_dwdm($lokasi,$dwdm);
		echo $this->session->set_flashdata('dwdm', $dwdm);
		$this->load->view('admin/v_isp2',$x);
	}

	function jenis_isp(){
		$this->session->keep_flashdata('dwdm');
		$lokasi = $this->session->userdata('lokasi');
		if (!$this->input->post('jenis')) {
			$jenis = $this->session->flashdata('jenis');
		} else {
			$jenis = $this->input->post('jenis');
		}
		$x['dwdm'] = $this->session->flashdata('dwdm');
		$x['jenis'] = $jenis;
		$x['data']=$this->m_transport->get_isp_by_jenis($lokasi,$this->session->flashdata('dwdm'),$jenis);
		echo $this->session->set_flashdata('jenis', $jenis);
		$this->load->view('admin/v_isp3',$x);
	}

	function simpan_isp(){
		$idwitel = $this->session->userdata('witel');
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'idwitel' => $idwitel,
				'dwdm' => $this->input->post('dwdm'),
				'jenis' => $this->input->post('jenis'),
				'arah' => $this->input->post('arah'),
				'lamda' => $this->input->post('lamda'),
				'port' => $this->input->post('port'),
				'user' => $this->input->post('user'),
				'otb' => $this->input->post('otb'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->m_systemis->simpan_systemis($data, 'tbl_isp');
			if(!$this->session->flashdata('dwdm')) {
				$this->session->set_flashdata('dwdm',$this->input->post('dwdm'));
			} else {
				$this->session->keep_flashdata('dwdm');
			}
			if(!$this->session->flashdata('jenis')) {
				$this->session->set_flashdata('jenis',$this->input->post('jenis'));
			} else {
				$this->session->keep_flashdata('jenis');
			}
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/transport/jenis_isp');				
	}

	function update_isp(){
			$data = array(
				'lokasi' => $this->input->post('lokasi'),
				'dwdm' => $this->input->post('dwdm'),
				'jenis' => $this->input->post('jenis'),
				'arah' => $this->input->post('arah'),
				'lamda' => $this->input->post('lamda'),
				'port' => $this->input->post('port'),
				'user' => $this->input->post('user'),
				'otb' => $this->input->post('otb'),
				'keterangan' => $this->input->post('keterangan')
			);
		$where = array(
			'no_urut' => $this->input->post('kode')
		);
	 
		$this->m_systemis->update_systemis($where,$data,'tbl_isp');
		$this->session->keep_flashdata('dwdm');
		$this->session->keep_flashdata('jenis');
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/transport/jenis_isp');				
	}

	function hapus_isp(){
		$kode=$this->input->post('kode');
		$this->m_transport->hapus_isp($kode);
		$this->session->keep_flashdata('dwdm');
		$this->session->keep_flashdata('jenis');
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/transport/jenis_isp');
	}

}