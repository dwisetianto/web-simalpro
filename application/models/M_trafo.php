<?php
class M_trafo extends CI_Model{

	function get_all_trafo(){
		$hsl=$this->db->query("SELECT * FROM cme_trafo ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_trafo($data, $table){
		$this->db->insert($table,$data);
		return $hsl;
	}

	function get_trafo_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_trafo WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_trafo_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_trafo WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_trafo WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function update_trafo($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_trafo($kode){
		$hsl=$this->db->query("DELETE FROM cme_trafo WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_trafo(){
		$hsl=$this->db->query("SELECT cme_trafo.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_trafo ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_trafo_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_trafo.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_trafo ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	//=============//
	function get_all_trafoid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_trafo where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 
	
	function get_trafo_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_trafo WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel' "); 
		else $hsl=$this->db->query("SELECT * FROM cme_trafo WHERE lokasi='$lokasi' and idwitel='$idwitel' ");
		return $hsl;
	}

	//Frontend
	function get_trafoid($idwitel){
		$hsl=$this->db->query("SELECT cme_trafo.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_trafo where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_trafo_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_trafo.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_trafo where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}