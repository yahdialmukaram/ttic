<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_login','model_login');
        // $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');  

    }

    
    // public function welcome()
    // {
    //     $this->load->view('admin/welcome');
        
    // }
    public function index()
    {
        // $data['data_masyarakat'] = $this->model->find_data_masyarakat();
        // $data['data_paslon'] = $this->model->find_data_paslon();
        // $data['data_laki'] = $this->model->find_data('table_masyarakat','jenis_kelamin','Laki Laki')->num_rows();
        // $data['data_perempuan'] = $this->model->find_data('table_masyarakat','jenis_kelamin','Perempuan')->num_rows();
		// $data['dpt_memilih'] = $this->model->hitung_dpt('sudah');
		// $data['dpt_belum_memilih'] = $this->model->hitung_dpt('belum');
        // $paslon= $this->model->get_paslon();

        $data['title']='Halaman Login';
        $this->load->view('admin/login', $data);
    }
    public function login_user()
    {
        $judul['title']='Halaman Login';
        $this->load->view('admin/login', $judul);
    }
    public function aksi_login()
    {
        //ambil username dan passwor dari database
        $email = $this->input->post('email');  
        // $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

        //cek data ke databse ada atau tida data username
        $cek_username = $this->model_login->cek_login($email, hash('md5', $password));
        //jika tidak ada kembali ke login dan beri aler
        if ($cek_username->num_rows() == '0') { //jika username di hitung sama dengan 0
            //beri aler dengan flashdata
            $this->session->set_flashdata('error', 'maaf username dan password salah');
            redirect('c_login');

            //jika ada buat sesi login
        } else {
            $result = $cek_username->row_array(); //ambil satu data dari database
            //buat array untuk session
            $ses_data = [
                'id_user' => $result['id_user'],
                'username' => $result['username'],
                'email' => $result['email'],
                'level' => $result['level'],
                'logged_in' => true,
            ];
            //set buat sessionnya
            $this->session->set_userdata($ses_data);
            //arahkan sesuai level user
            if ($this->session->userdata('level') == 'admin') {
                
                redirect('c_admin');
            }elseif ($this->session->userdata('level')=='pimpinan') {
                
                redirect('c_admin');
                
            }elseif ($this->session->userdata('level')=='petugas') {
                
                redirect('c_admin');
                
            
            }

        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('c_login');
    }

    // public function registrasi_user()
    // {
    //     $email = $this->input->post('email');
    //     $check_email = $this->model_login->check_email($email);
    //     if ($check_email > 0) {
    //         $this->session->set_flashdata('error', 'Email Sudah Terdaftar di Sistem');
    //         redirect('c_login');
            
    //     }
        
    //     $this->form_validation->set_rules('username','username','required|max_length[255]');
    //     $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]');
    //     $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
      
    //     if ($this->form_validation->run()== true) {
    //         $data = [
    //             'username' => $this->input->post('username'),
    //             'email' => $this->input->post('email'),
    //             'password' =>hash('md5', $this->input->post('password')),
    //             'waktu' => date('d-m-Y, H:i:s'),
    //             'level' => 'siswa',
    //              ];
    //         $this->model_login->registrasi_User($data);
    //         $this->session->set_flashdata('success', 'Proses Pendaftaran User Berhasil Silahkan Login');
    //         redirect('c_login');
    //     }else {
    //         $this->session->set_flashdata('error', 'siswa tidak terdaftar');
    //         redirect('c_login');
    //     }
    // }

}
