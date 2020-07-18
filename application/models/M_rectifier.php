<?php
class M_rectifier extends CI_Model{

	function get_all_rectifier(){
		$hsl=$this->db->query("SELECT * FROM cme_rectifier ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_rectifier($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_rectifier_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_rectifier WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_rectifier_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_rectifier WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_rectifier WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function update_rectifier($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_rectifier($kode){
		$hsl=$this->db->query("DELETE FROM cme_rectifier WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_rectifier(){
		$hsl=$this->db->query("SELECT cme_rectifier.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_rectifier ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_rectifier_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_rectifier.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_rectifier ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	//================//
	function get_all_rectifierid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_rectifier where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 
	
	function get_rectifier_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_rectifier WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_rectifier WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	//Frontend
	function get_rectifierid($idwitel){
		$hsl=$this->db->query("SELECT cme_rectifier.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_rectifier where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_rectifier_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_rectifier.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_rectifier where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}