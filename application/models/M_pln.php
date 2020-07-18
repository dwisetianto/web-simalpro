<?php
class M_pln extends CI_Model{

	function get_all_pln(){
		$hsl=$this->db->query("SELECT * FROM cme_pln ORDER BY lokasi");
		return $hsl;
	}

	function get_all_plnid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_pln where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_pln($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_pln_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_pln WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_pln_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_pln WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_pln WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function get_pln_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_pln WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_pln WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	function update_pln($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_pln($kode){
		$hsl=$this->db->query("DELETE FROM cme_pln WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_pln(){
		$hsl=$this->db->query("SELECT cme_pln.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_pln ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_pln_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_pln.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_pln ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}

	//Frontend
	function get_plnid($idwitel){
		$hsl=$this->db->query("SELECT cme_pln.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_pln where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_pln_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_pln.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_pln where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}