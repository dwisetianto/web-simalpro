<?php
class M_ac extends CI_Model{

	function get_all_ac(){
		$hsl=$this->db->query("SELECT * FROM cme_ac ORDER BY lokasi");
		return $hsl;
	} 

	function get_all_acid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_ac where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	}
	
	function simpan_ac($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_ac_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_ac WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_ac_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_ac WHERE lokasi NOT LIKE 'STO %' ORDER BY nama_perangkat"); 
		else $hsl=$this->db->query("SELECT * FROM cme_ac WHERE lokasi='$lokasi' ORDER BY nama_perangkat");
		return $hsl;
	}

	function get_ac_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_ac WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel' ORDER BY nama_perangkat"); 
		else $hsl=$this->db->query("SELECT * FROM cme_ac WHERE lokasi='$lokasi' and idwitel='$idwitel' ORDER BY nama_perangkat");
		return $hsl;
	}

	function update_ac($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_ac($kode){
		$hsl=$this->db->query("DELETE FROM cme_ac WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_ac(){
		$hsl=$this->db->query("SELECT cme_ac.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_ac ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_acid($idwitel){
		$hsl=$this->db->query("SELECT cme_ac.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_ac where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_ac_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_ac.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_ac ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	function get_ac_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_ac.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_ac where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}