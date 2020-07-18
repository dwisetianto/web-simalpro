<?php
class M_batt extends CI_Model{

	function get_all_batt(){
		$hsl=$this->db->query("SELECT * FROM cme_batt ORDER BY lokasi");
		return $hsl;
	}

	function get_all_battid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_batt where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_batt($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_batt_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_batt WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_batt_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_batt WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_batt WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function get_batt_by_lokasiid($lokasi, $idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_batt WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_batt WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	function update_batt($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_batt($kode){
		$hsl=$this->db->query("DELETE FROM cme_batt WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_batt(){
		$hsl=$this->db->query("SELECT cme_batt.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_batt ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_battid(){
		$hsl=$this->db->query("SELECT cme_batt.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_batt where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_batt_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_batt.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_batt ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	function get_batt_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_batt.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_batt where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}