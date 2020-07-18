<?php
class M_systemis extends CI_Model{
	private $db2;

	function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('db_sbs', TRUE);
    }

	function get_all_systemis(){
		$hsl=$this->db->query("SELECT * FROM tbl_systemis ORDER BY lokasi");
		return $hsl;
	} 

	function get_all_denah(){
		$hsl=$this->db->query("SELECT * FROM tbl_konfig ORDER BY lokasi");
		return $hsl;
	} 
	function get_all_denah_sbs(){
		//$db2 = $this->load->database('db_sbs', TRUE);
		$hsl = $this->db2->query("SELECT * FROM tbl_konfig ORDER BY lokasi");
		//$hsl=$db2->query("SELECT * FROM tbl_konfig ORDER BY lokasi");
		return $hsl;
	}

	function simpan_systemis($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_systemis_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_systemis WHERE no_urut='$kode'");
		return $hsl;
	}

	function get_systemis_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_systemis WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM tbl_systemis WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function get_denah_by_lokasi($lokasi){
		$hsl=$this->db->query("SELECT * FROM tbl_konfig WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function update_systemis($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function update_systemis_tanpa_img($tro_id,$judul,$isi,$user_nama){
		$hsl=$this->db->query("UPDATE tbl_systemis SET port_judul='$judul',port_deskripsi='$isi',port_author='$user_nama' WHERE no_urut='$tro_id'");
		return $hsl;
	}

	function hapus_systemis($kode){
		$hsl=$this->db->query("DELETE FROM tbl_systemis WHERE no_urut='$kode'");
		return $hsl;
	}

	function hapus_denah($kode){
		$hsl=$this->db->query("DELETE FROM tbl_konfig WHERE no_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_systemis(){
		$hsl=$this->db->query("SELECT tbl_systemis.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_systemis ORDER BY no_urut DESC");
		return $hsl;
	}

	function get_systemis_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_systemis.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_systemis ORDER BY no_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	//=====================//
	function get_all_systemisid($idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_systemis where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 

	function get_all_denahid($idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_konfig where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 

	function get_systemis_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_systemis WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel' "); 
		else $hsl=$this->db->query("SELECT * FROM tbl_systemis WHERE lokasi='$lokasi' and idwitel='$idwitel' ");
		return $hsl;
	}

	function get_denah_by_lokasiid($lokasi,$idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_konfig WHERE lokasi='$lokasi' and idwitel='$idwitel' ");
		return $hsl;
	}

	//Frontend
	function get_systemisid($idwitel){
		$hsl=$this->db->query("SELECT tbl_systemis.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_systemis where idwitel='$idwitel' ORDER BY no_urut DESC");
		return $hsl;
	}

	function get_systemis_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT tbl_systemis.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_systemis where idwitel='$idwitel' ORDER BY no_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}