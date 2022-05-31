<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model','model');
		date_default_timezone_set('Asia/Jakarta');
		//Do your magic here
		if ($this->session->userdata('level') !== 'admin' or 
		$this->session->userdata('logged_in') !== true
		) {
	$this->session->set_flashdata('error', 'Anda tidak punya akses untuk menu admin');
	redirect('c_login');
	}
	}
	

	public function index()
	{
		$title['title'] ='home';
		$this->load->view('admin/header',$title);
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function v_data_user()
	{
		$title['title']='data admin';
		$data['user'] = $this->model->getUser();
		$this->load->view('admin/header',$title);
		$this->load->view('admin/v_data_user', $data);
		$this->load->view('admin/footer');
	}
	
	public function addAdmin()
	{
		$insert = [
			'username'=> $this->input->post('username'),
			'email'=> $this->input->post('email'),
			'password'=> md5($this->input->post('password')),
			'waktu' => date('d-m-Y, H:i:s'),
			'level'=> $this->input->post('level'),
		];
		$this->model->addAdmin($insert);
		$this->session->set_flashdata('success', 'data admin telah ditambahkan');
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
			'nama_barang'=> $this->input->post('nama_barang'),
			'satuan'=> $this->input->post('satuan'),
			// 'harga_sebelumnya'=> $this->input->post('harga_sebelumnya'),
			// 'harga_sekarang'=> $this->input->post('harga_sekarang'),
			// 'perubahan'=> $this->input->post('perubahan'),
			// 'keterangan'=> $this->input->post('keterangan'),
			'tanggal' => date('d-m-Y, H:i:s'),
		];
		$this->model->addBarang($insert);
		$this->session->set_flashdata('success', 'data barang telah ditambahkan');
		return redirect('c_admin/v_data_barang');
		
	}
	
	public function v_data_barang()
	{
		$title['title']='data barang';
		$data['dataBarang'] = $this->model->getBarang();
		$this->load->view('admin/header',$title);
		$this->load->view('admin/v_data_barang', $data);
		$this->load->view('admin/footer');
	}
	public function v_harga()
	{
		$title['title']='harga barang';
		$data['dataBarang'] = $this->model->getBarang();
		$data['dataHarga'] = $this->model->getHarga();
		$this->load->view('admin/header',$title);
		$this->load->view('admin/v_harga', $data);
		$this->load->view('admin/footer');
	}
	public function addHarga()
	{
		$insert = [
			'tgl_input' => date('d-m-Y, H:i:s'),
			'id_barang'=> $this->input->post('id_barang'),
			'id_barang'=> $this->input->post('id_barang'),
			'harga'=> $this->input->post('harga'),
		];
		$this->model->addHarga('tb_harga',$insert);
		$this->session->set_flashdata('success', 'data harga telah ditambahkan');
		return redirect('c_admin/v_harga');
		// var_dump($insert);
	}
	
	// public function addHargaTerakhir()
	// {
	// 	$insert =[
	// 		'tgl_input' => date('d-m-Y, H:i:s'),
	// 		'id_barang'=> $this->input->post('id_barang'),
	// 		'id_harga'=> $this->input->post('id_harga'),
	// 		'harga_terakhir'=> $this->input->post('harga_terakhir'),
			
	// 	];
	// 	$this->model->addHargaTerakhir('tb_histori',$insert);
	// 	$this->session->set_flashdata('success', 'disimpan');
	// 	return redirect('c_admin/v_data_kelola_harga');
		
	// }
	
	public function deleteHarga()
	{
		$id = $this->input->post('id');
		$this->model->deleteHarga($id);
		$this->session->set_flashdata('success', 'data harga berhasil di hapus');
		return redirect('c_admin/v_harga');
	}
	
	public function v_data_kelola_harga()
	{
		$title['title'] = 'data kelola harga barang';
		// $data['dataBarang'] = $this->model->getBarang();
		// $data ['dataHarga'] =$this->model->getHarga();
		$data ['hargaHistori'] =$this->model->getHargaHistori();
		$this->load->view('admin/header', $title);
		$this->load->view('admin/v_data_kelola_harga', $data);
		$this->load->view('admin/footer');
		
	}

	public function getDataharga()
	{
		$id = $this->input->post('id');
		$data = $this->model->findDataHarga('tb_harga','id_harga',$id);
		echo json_encode($data);	
	}

	public function updateHarga()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_barang'=>$this->input->post('nama_barang'),
			'satuan'=>$this->input->post('satuan'),
			'harga'=>$this->input->post('harga'),	
		];
		$this->model->updateHarga($id, $data);
		$this->session->set_flashdata('success', 'data harga berhasil di update');
		return redirect('c_admin/v_data_kelola_harga');
		
	}
	

}

/* End of file Controllername.php */



?>
