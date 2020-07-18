<?php
class M_transport extends CI_Model{

	function get_all_transport(){
		$hsl=$this->db->query("SELECT link, count(*) AS jumlah FROM tbl_temp GROUP BY link");
		return $hsl;
	}

	function get_all_transportid($idwitel){
		$hsl=$this->db->query("SELECT link, count(*) AS jumlah FROM tbl_temp where idwitel='$idwitel' GROUP BY link");
		return $hsl;
	}

	function get_transport_by_lokasi($lokasi){
		$lokasi2;
		switch ($lokasi) {
		    case 'STO BABAD':
		        $lokasi2 = 'BBA';
		        break;
		    case 'STO BAMBE':
		        $lokasi2 = 'BBE';
		        break;
		    case 'STO BRONDONG':
		        $lokasi2 = 'BRD';
		        break;
		    case 'STO BALONGPANGGANG':
		        $lokasi2 = 'BPD';
		        break;
		    case 'STO BAWEAN':
		        $lokasi2 = 'BWN';
		        break;
		    case 'STO BANYUURIP':
		        $lokasi2 = 'BYU';
		        break;
		    case 'STO CERME':
		        $lokasi2 = 'CME';
		        break;
		    case 'STO DUDUKSAMPEYAN':
		        $lokasi2 = 'DDS';
		        break;
		    case 'STO GRESIK':
		        $lokasi2 = 'GSK';
		        break;
		    case 'STO KEBALEN':
		        $lokasi2 = 'KBL';
		        break;
		    case 'STO KEDAMEAN':
		        $lokasi2 = 'KDM';
		        break;
		    case 'STO KENJERAN':
		        $lokasi2 = 'KJR';
		        break;
		    case 'STO KALIANAK':
		        $lokasi2 = 'KLA';
		        break;
		    case 'STO KANDANGAN':
		        $lokasi2 = 'KNN';
		        break;
		    case 'STO KAPASAN':
		        $lokasi2 = 'KPS';
		        break;
		    case 'STO KARANGPILANG':
		        $lokasi2 = 'KRP';
		        break;
		    case 'STO LAKARSANTRI':
		        $lokasi2 = 'LKS';
		        break;
		    case 'STO LAMONGAN':
		        $lokasi2 = 'LMG';
		        break;
		    case 'STO MERGOYOSO':
		        $lokasi2 = 'MGO';
		        break;
		    case 'STO PONGANGAN':
		        $lokasi2 = 'POG';
		        break;
		    case 'STO SUKODADI':
		        $lokasi2 = 'SKD';
		        break;
		    case 'STO SEDAYU':
		        $lokasi2 = 'SDY';
		        break;
		    case 'STO TANDES':
		        $lokasi2 = 'TDS';
		        break;
		    default:
		        $lokasi2 = '';//kalau bisa sih ngerti yg non sto itu apa aja
		}
		if($lokasi2 != '') {
				$hsl=$this->db->query("SELECT link, count(*) AS jumlah FROM tbl_temp WHERE link LIKE '%$lokasi2%' GROUP BY link");
			} else {
				$hsl=$this->db->query("SELECT link, count(*) AS jumlah FROM tbl_temp WHERE link LIKE '%bjo%' OR link LIKE '%kyo%' OR link LIKE '%spj%' OR link LIKE '%tn%' OR link LIKE '%kdg%' OR link LIKE '%grd%' OR link LIKE '%kml%' OR link LIKE '%mr%' OR link LIKE '%mnr%' OR link LIKE '%rkt%' OR link LIKE '%tmr%' OR link LIKE '%skd%' GROUP BY link");
			}
		return $hsl;
	}	

	function get_transport_by_project($link,$project){
		$hsl=$this->db->query("SELECT * FROM tbl_tproject WHERE link='$link' and project='$project'");
		return $hsl;
	}

	function get_transport_by_link($link){
		$hsl=$this->db->query("SELECT * FROM tbl_temp WHERE link='$link'");
		return $hsl;
	}

	function get_transport($no_urut){
		$hsl=$this->db->query("SELECT * from tbl_temp, isi_core where tbl_temp.no_urut='$no_urut' and tbl_temp.no_urut=isi_core.idkabel");
		return $hsl;
	}
	
	function get_transport_cable($no_urut){
		$hsl=$this->db->query("SELECT * FROM tbl_temp WHERE no_urut='$no_urut'");
		return $hsl;
	}

	function simpan_transport($data, $table){
		$this->db->insert($table,$data);
	}
	
	function update_transport($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_transport($kode){
		$hsl=$this->db->query("DELETE FROM tbl_temp WHERE no_urut='$kode'");
		return $hsl;
	}

	function hapus_tproject($kode){
		$hsl=$this->db->query("DELETE FROM tbl_tproject WHERE no_urut='$kode'");
		return $hsl;
	}

	function get_all_isp(){
		$hsl=$this->db->query("SELECT dwdm, lokasi, count(*) AS jumlah FROM tbl_isp GROUP BY dwdm, lokasi");
		return $hsl;
	}

	function get_isp_by_lokasi($lokasi){
		$hsl=$this->db->query("SELECT dwdm, lokasi, count(*) AS jumlah FROM tbl_isp WHERE lokasi='$lokasi' GROUP BY dwdm");
		return $hsl;
	}

	function get_isp_by_dwdm($lokasi,$dwdm){
		$hsl=$this->db->query("SELECT jenis, count(*) AS jumlah FROM tbl_isp WHERE lokasi='$lokasi' and dwdm='$dwdm' GROUP BY jenis");
		return $hsl;
	}

	function get_isp_by_jenis($lokasi,$dwdm,$jenis){
		$hsl=$this->db->query("SELECT * FROM tbl_isp WHERE lokasi='$lokasi' and dwdm='$dwdm' and jenis='$jenis'");
		return $hsl;
	}
	
	function hapus_isp($kode){
		$hsl=$this->db->query("DELETE FROM tbl_isp WHERE no_urut='$kode'");
		return $hsl;
	}

	//================================//
	

	function get_all_ispid($idwitel){
		$hsl=$this->db->query("SELECT dwdm, lokasi, count(*) AS jumlah FROM tbl_isp where idwitel='$idwitel' GROUP BY dwdm, lokasi");
		return $hsl;
	}

	function get_isp_by_lokasiid($lokasi,$idwitel){
		$hsl=$this->db->query("SELECT dwdm, lokasi, count(*) AS jumlah FROM tbl_isp WHERE lokasi='$lokasi' and idwitel='$idwitel' GROUP BY dwdm");
		return $hsl;
	}

	function get_isp_by_dwdmid($lokasi,$dwdm,$idwitel){
		$hsl=$this->db->query("SELECT jenis, count(*) AS jumlah FROM tbl_isp WHERE lokasi='$lokasi' and dwdm='$dwdm' and idwitel='$idwitel' GROUP BY jenis");
		return $hsl;
	}

	function get_isp_by_jenisid($lokasi,$dwdm,$jenis,$idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_isp WHERE lokasi='$lokasi' and dwdm='$dwdm' and idwitel='$idwitel' and jenis='$jenis'");
		return $hsl;
	}

	function add_link($no_urut,$no_link,$link,$merk,$idwitel){
		$hsl=$this->db->query("INSERT INTO osp_pakai (no_urut,no_link,link,merk,idwitel) VALUES ('$no_urut', '$no_link', '$link', '$merk', '$idwitel')");
		return $hsl;
	}

	function update_link($no_urut,$no_link,$idwitel,$node1,$node2){
		$hsl=$this->db->query("UPDATE osp_pakai SET node1='$node1', node2='$node2' WHERE no_urut='$no_urut' AND no_link='$no_link'");
		return $hsl;
	}

	function get_core_link($no_urut,$merk,$idwitel){
		$hsl=$this->db->query("SELECT * FROM osp_pakai WHERE no_urut='$no_urut' and merk='$merk'");
		//$hsl=$this->db->query("SELECT * FROM osp_pakai WHERE no_urut='$no_urut' and idwitel='$idwitel'");
		return $hsl;
	}

	function get_core($idkabel,$idcores){
		$hsl=$this->db->query("SELECT * FROM isi_core, tbl_temp WHERE isi_core.idkabel='$idkabel' and isi_core.idcores='$idcores' and isi_core.idkabel=tbl_temp.no_urut");
		//$hsl=$this->db->query("SELECT * FROM osp_pakai WHERE no_urut='$no_urut' and idwitel='$idwitel'");
		return $hsl;
	}

	function get_history_core($idcores){
		$hsl=$this->db->query("SELECT * FROM isi_core,history_core where isi_core.idcores='$idcores' and isi_core.idcores=history_core.idcores");
		return $hsl;
	}

	function hapus_link($kode){
		$hsl=$this->db->query("DELETE FROM osp_pakai WHERE idkabel='$kode'");
		return $hsl;
	}

	function hapus_core($kode){
		$hsl=$this->db->query("DELETE FROM isi_core WHERE idcores='$kode'");
		return $hsl;
	}

	function n_core($kode){
		$hsl=$this->db->query("SELECT kap_core, kap_idle, rusak FROM tbl_temp WHERE no_urut='$kode'");
		return $hsl;
	}

	function n_pakai($kode){
		$hsl=$this->db->query("SELECT count(*) as n FROM `osp_pakai` where no_urut='$kode' and length(node1)>0");
		return $hsl->result_array();
	}

	function n_link($kode){
		$hsl=$this->db->query("SELECT count(*) as n FROM `osp_pakai` where no_urut='$kode'");
		return $hsl->result_array();
	}

	function update_n($no_urut,$npakai,$nkosong,$nlink){
		$hsl=$this->db->query("UPDATE tbl_temp SET kap_core='$nlink', kap_terpakai='$npakai', kap_idle='$nkosong' WHERE no_urut='$no_urut'");
		return $hsl;
	}

	function maxid($id,$table){
		$hsl=$this->db->query("SELECT max($id) as max FROM $table");
		return $hsl->result_array();
	}
}