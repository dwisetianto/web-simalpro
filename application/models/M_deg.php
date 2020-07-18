<?php
class M_deg extends CI_Model{

	function get_all_deg(){
		$hsl=$this->db->query("SELECT * FROM cme_deg ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_deg($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_deg_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_deg WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_deg_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_deg WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_deg WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function update_deg($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_deg($kode){
		$hsl=$this->db->query("DELETE FROM cme_deg WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_deg(){
		$hsl=$this->db->query("SELECT cme_deg.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_deg ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_deg_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_deg.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_deg ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
//=============//
	function get_all_degid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_deg where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 

	function get_deg_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_deg WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel' "); 
		else $hsl=$this->db->query("SELECT * FROM cme_deg WHERE lokasi='$lokasi' and idwitel='$idwitel' ");
		return $hsl;
	}

	//Frontend
	function get_degid($idwitel){
		$hsl=$this->db->query("SELECT cme_deg.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_deg where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_deg_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_deg.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_deg where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}