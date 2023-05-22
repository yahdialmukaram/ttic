<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'model');
        date_default_timezone_set('Asia/Jakarta');
        //Do your magic here
        if (
		// this->session->userdata('level') !== 'admin' or
            $this->session->userdata('logged_in') !== true
        ) {
            $this->session->set_flashdata('error', 'Anda tidak punya akses untuk menu ini silahkan login');
            redirect('c_login');
        }
	
    }

    public function index()
    {
        $title['title'] = 'home';
        $this->load->view('admin/header', $title);
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function v_data_user()
    {
        $title['title'] = 'data admin';
        $data['user'] = $this->model->getUser();
        $this->load->view('admin/header', $title);
        $this->load->view('admin/v_data_user', $data);
        $this->load->view('admin/footer');
    }

    public function addAdmin()
    {
        $insert = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'waktu' => date('d-m-Y, H:i:s'),
            'level' => $this->input->post('level'),
        ];
        $this->model->addAdmin($insert);
        $this->session->set_flashdata('success', 'data user telah ditambahkan');
        return redirect('c_admin/v_data_user');

    }

    public function deleteUser()
    {
        $id = $this->input->post('id');
        $this->model->deleteUser($id);
        $this->session->set_flashdata('success', 'data user telah di hapus');
        redirect('c_admin/v_data_user');
    }
    public function addBarang()
    {
        $insert = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            // 'harga_sebelumnya'=> $this->input->post('harga_sebelumnya'),
            // 'harga_sekarang'=> $this->input->post('harga_sekarang'),
            // 'perubahan'=> $this->input->post('perubahan'),
            // 'keterangan'=> $this->input->post('keterangan'),
            'tanggal' => date('d-m-Y'),
            // 'tanggal' => date('d-m-Y, H:i:s'),
        ];
        $this->model->addBarang($insert);
        $this->session->set_flashdata('success', 'data barang telah ditambahkan');
        return redirect('c_admin/v_data_barang');

    }

    public function v_data_barang()
    {
        $title['title'] = 'data barang';
		$data['kodeBarangOtomatis'] = $this->model->kodeBarangOtomatis();
        $data['dataBarang'] = $this->model->getBarang();
        $this->load->view('admin/header', $title);
        $this->load->view('admin/v_data_barang', $data);
        $this->load->view('admin/footer');
    }
    public function v_harga()
    {
        $title['title'] = 'harga barang';
        $data['dataBarang'] = $this->model->getBarang();
        $data['dataHarga'] = $this->model->getHarga();
        $this->load->view('admin/header', $title);
        $this->load->view('admin/v_harga', $data);
        $this->load->view('admin/footer');
    }
	public function filter($id)
	{
		$data['dataHarga'] = $this->model->getHargaPertanggal($id);
		// $data ['dataHarga'] = $this->db->get_where('tb_harga',['id_harga'=>$id])->result_array();
		$this->load->view('admin/v_harga', $data);
		
	}
    public function addHarga()
    {
		$id_barang = $this->input->post('id_barang');
		$checkBarang = $this->model->checkBarang($id_barang);
		if ($checkBarang > 0 ) {
			$this->session->set_flashdata('error', 'harga barang ini sudah anda input');
			return redirect('c_admin/v_harga');
		}
		
		$insert = [
			'tgl_input' => date('d-m-Y'),
            'id_barang' => $this->input->post('id_barang'),
            'id_barang' => $this->input->post('id_barang'),
            'harga' => $this->input->post('harga'),
        ];
        $this->model->addHarga('tb_harga', $insert);
        $this->session->set_flashdata('success', 'data harga telah ditambahkan');
        return redirect('c_admin/v_harga');
        // var_dump($insert);
    }

	public function deleteBarang()
	{
		$id =$this->input->post('id');
		$this->model->deleteBarang($id);
		$this->model->deleteHarga($id);
		$this->model->deleteKelolaHarga($id);
		$this->session->set_flashdata('success', 'data berhasil di hapus');
		return redirect('c_admin/v_data_barang');		
	}

    public function deleteHarga()
    {
        $id = $this->input->post('id');
        $this->model->deleteHarga($id);
		$this->model->deleteKelolaHarga($id);
        $this->session->set_flashdata('success', 'data harga berhasil di hapus');
        return redirect('c_admin/v_harga');
    }
   
	public function deleteKelolaHarga()
    {
        $id = $this->input->post('id');
        $this->model->deleteKelolaHarga($id);
        $this->session->set_flashdata('success', 'data harga berhasil di hapus');
        return redirect('c_admin/v_data_kelola_harga');
    }

    public function v_data_kelola_harga()
    {
        $title['title'] = 'data kelola harga barang';
        // $data['dataBarang'] = $this->model->getBarang();
        $data ['dataHarga'] =$this->model->getHarga();
        // $data['hargaHistori'] = $this->model->getHargaHistori();
        $this->load->view('admin/header', $title);
        $this->load->view('admin/v_data_kelola_harga', $data);
        $this->load->view('admin/footer');

    }

    public function getDataharga()
    {
        $id = $this->input->post('id');
        $data = $this->model->findDataHarga('tb_harga', 'id_harga', $id);
        echo json_encode($data);
    }

    public function updateHarga()
    {
        $id = $this->input->post('id');
        $data = [
            // 'id_barang' => $this->input->post('id_barang'),
            // 'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
        ];
        $this->model->updateHarga($id, $data);
        $this->session->set_flashdata('success', 'data harga berhasil di update');
        return redirect('c_admin/v_harga');

    }
    // use for update new price
    public function updateHargaBarang()
    {
        $id_barang = $this->input->post('id_barang');
        $harga = $this->input->post('harga');
        $this->form_validation->set_rules('harga', 'Harga Sekarang', 'trim|required|numeric', [
            'required' => 'Harga Sekarang harus diisi',
            'numeric' => 'Harga Sekarang harus berupa angka',
        ]);

        if ($this->form_validation->run() == false) {
            $respon = [
                'status' => 'validation_failed',
                'errors' => $this->form_validation->error_array(),
            ];
        } else {
            $this->model->updateData('tb_harga', 'id_barang', $id_barang, ['harga' => $harga]);
            $insertHistory = [
                'id_barang' => $id_barang,
                'harga_terakhir' => $harga,
                'created_at' => date('Y-m-d, H:i:s'),
            ];
            $this->model->insertData('tb_histori', $insertHistory);
            $respon = [
                'status' => 'sucess',
                'message' => 'data berhasil di update',
            ];
        }
        echo json_encode($respon);
    }
    public function getHistoryHarga()
    {
        $id_barang = $this->input->post('id_barang');
        $histori = $this->model->getHistoryHarga($id_barang);
        $respon = [
            'status' => 'success',
            'data' => $histori,
        ];
        echo json_encode($respon);
    }

	public function diagram()
	{
        $data ['dataBarang'] = $this->model->findDataBarang();
        $data ['dataHarga'] = $this->model->findDataHargaBarang();
        $data ['dataUser'] = $this->model->findDataUser();
	    // $data['laki_laki'] = $this->model->find_data('table_siswa','jenis_kalamin','laki Laki');
        // $data['perempuan'] = $this->model->find_data('table_siswa','jenis_kelamin','perempuan');
		// $response=[$data['dataBarang'],$data['dataHarga'],$data['laki_laki'], $data['perempuan']];
		$response=[$data['dataBarang'],$data['dataHarga'],$data['dataUser']];
		echo json_encode($response);
	}

	public function getDataPassword()
	{
		$id = $this->input->post('id');
		$data = $this->model->findData('tb_user','id_user',$id);
		echo json_encode($data);
		
	}

	public function updatePassword()
	{
		$id = $this->input->post('id');
		$data = [
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password'=> md5($this->input->post('password')),
		];
		$this->model->updatePassword($id,$data);
		$this->session->set_flashdata('success', 'password berhasil di ubah');
		return redirect('c_admin/v_data_user');
		
	}


}

/* End of file Controllername.php */
