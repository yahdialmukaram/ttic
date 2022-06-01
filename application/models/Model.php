<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function getUser()
	{
		$this->db->from('tb_user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result_array();
	}

	public function addAdmin($data)
	{
		$this->db->insert('tb_user', $data);	
	}
	public function deleteUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tb_user');
	}
	public function getBarang()
	{
		$this->db->from('tb_barang');
		$this->db->order_by('id_barang','desc');
		return $this->db->get()->result_array();
	}

	public function addBarang($data)
	{
		$this->db->insert('tb_barang', $data);
	}
	public function addHarga($table, $data)
	{
		$this->db->insert($table, $data);	
	}
	public function getHarga()
	{
		$this->db->from('tb_harga');
		$this->db->order_by('id_harga', 'desc');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
		return $this->db->get()->result_array();
	}
	public function getHargaHistori()
	{
		$this->db->from('tb_harga');
		$this->db->order_by('id_harga', 'desc');
		// $this->db->join('tb_harga', 'tb_harga.id_harga = tb_histori.id_harga', 'left');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
		return $this->db->get()->result_array();
	}
	// public function addHargaTerakhir($table, $data)
	// {
	// 	$this->db->insert($table, $data);
	// }


	public function deleteHarga($id)
	{
		$this->db->where('id_harga',$id);
		$this->db->delete('tb_harga');
		
	}

	public function findDataHarga($table,$reference,$id)
	{
		$this->db->from($table);
		$this->db->where($reference, $id);
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
		return $this->db->get()->row_array();
	}

	public function updateharga($id,$data)
	{
		$this->db->where('id_harga',$id);
		$this->db->update('tb_harga', $data);		
	}
	

}

/* End of file Model.php */


?>
