<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

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
        $this->db->order_by('id_barang', 'desc');
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
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
        return $this->db->get()->result_array();
    }
    // public function addHargaTerakhir($table, $data)
    // {
    //     $this->db->insert($table, $data);
    // }

    public function deleteHarga($id)
    {
        $this->db->where('id_harga', $id);
        $this->db->delete('tb_harga');

    }

	public function updatePassword($id,$data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('tb_user', $data);
	}

	public function findData($table,$reference,$id)
	{
		$this->db->from($table);
		$this->db->where($reference, $id);
		
		return $this->db->get()->row_array();
		
		
	}
	public function findDataBarang()
	{
		$dataBarang = $this->db->get('tb_barang');
		if ($dataBarang->num_rows() > 0) {
			return $dataBarang->num_rows();
		}else {
			return 0;
		}
	}
	public function findDataUser()
	{
		$dataUser = $this->db->get('tb_user');
		if ($dataUser->num_rows() > 0) {
			return $dataUser->num_rows();
		}else {
			return 0;
		}
	}
	public function findDataHargaBarang()
	{
		$dataHarga = $this->db->get('tb_harga');
		if ($dataHarga->num_rows() > 0) {
			return $dataHarga->num_rows();
		}else {
			return 0;
		}
	}

    public function findDataHarga($table, $reference, $id)
    {
        $this->db->from($table);
        $this->db->where($reference, $id);
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
        return $this->db->get()->row_array();
    }

    public function updateharga($id, $data)
    {
        $this->db->where('id_harga', $id);
        $this->db->update('tb_harga', $data);
    }
    // model use for update table
    public function updateData($table, $reference, $id, $object)
    {
        $this->db->where($reference, $id);
        $this->db->update($table, $object);
    }
    // model use for insert to database
    public function insertData($table, $object)
    {
        $this->db->insert($table, $object);
        return $this->db->insert_id();

    }
    public function getHistoryHarga($id_barang)
    {
        $this->db->from('tb_histori');
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('id_histori', 'desc');

        return $this->db->get()->result();

    }

	public function tampilLaporanPerbulan($vtanggal)
	{
		$vbulan = date('m',strtotime($vtanggal));
		$this->db->select('*');
		$this->db->from('tb_harga');
		$this->db->where('month(tgl_input)', $vbulan);
		$this->db->where('year(tgl_input)', $vtanggal);
		// $this->db->order_by('id_harga', 'desc');
        // $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
		
		return $this->db->get()->result_array();
		
	}
	public function getHargaPertanggal($id)
	{		
		$this->db->from('tb_harga');
		// $this->db->query('select * from tb_harga where SUBSTRING(FROM_UNIXTIME(tgl_awal),1,4) ='.$tgl_awal.' order by id desc');
		// $this->db->where('tgl_input >=', $this->input->post('tgl_awal'));
		$this->db->where('id_harga', $id);
		
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
		return $this->db->get()->result_array();
	}

}

/* End of file Model.php */
