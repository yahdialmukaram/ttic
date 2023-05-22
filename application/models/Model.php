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
    public function kodeBarangOtomatis()
    {
        $this->db->select('RIGHT(tb_barang.kode_barang,2) as kode_barang', false);
        $this->db->order_by('kode_barang', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_barang');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "KD" . "5" . $tgl . $batas; //format kode
        return $kodetampil;

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

    public function deleteBarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('tb_barang');
    }

    public function deleteKelolaHarga($id)
    {
        $this->db->where('id_histori', $id);
        $this->db->delete('tb_histori');
    }

    public function checkBarang($id)
    {
        $this->db->select('id_barang');
        $this->db->from('tb_harga');
        $this->db->where('id_barang', $id);
        return $this->db->get()->num_rows();

    }

    public function updatePassword($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }

    public function findData($table, $reference, $id)
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
        } else {
            return 0;
        }
    }
    public function findDataUser()
    {
        $dataUser = $this->db->get('tb_user');
        if ($dataUser->num_rows() > 0) {
            return $dataUser->num_rows();
        } else {
            return 0;
        }
    }
    public function findDataHargaBarang()
    {
        $dataHarga = $this->db->get('tb_harga');
        if ($dataHarga->num_rows() > 0) {
            return $dataHarga->num_rows();
        } else {
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
        $vbulan = date('m', strtotime($vtanggal));
        $this->db->select('*');
        $this->db->from('tb_harga');
        $this->db->where('month(tgl_input)', $vbulan);
        $this->db->where('year(tgl_input)', $vtanggal);
        return $this->db->get()->result_array();

    }
    // public function getHargaPertanggal($bulan, $tahun)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_harga');
    //     $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
    //     $this->db->where('MONTH(tgl_input)', $bulan);
    //     $this->db->where('YEAR(tgl_input)', $tahun);
    //     return $this->db->get()->result_array();
    // }
    public function getHargaPerbulan($date)
    {
        $this->db->select('');
        $this->db->from('tb_harga');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
        $this->db->where('substr(tgl_input,4,7)', $date);
        return $this->db->get()->result_array();
    }
    public function getHargaPertahun($date)
    {
        $this->db->select('');
        $this->db->from('tb_harga');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_harga.id_barang', 'left');
        $this->db->where('substr(tgl_input,6,7)', $date);
        return $this->db->get()->result_array();
    }

}

/* End of file Model.php */
