<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Model', 'model');

        
    }
    
    
    public function index()
    {
        $data['title']='Beranda';
        $this->load->view('user/header', $data);
        $this->load->view('user/dashboard');
        $this->load->view('user/footer');
        
    }
    
	public function informasiHarga()
	{
		$data['title'] = 'info harga';
		$data['dataHarga'] = $this->model->getHarga();
		$this->load->view('user/header', $data);
		$this->load->view('user/v_informasi_harga', $data);
		$this->load->view('user/footer');
		
		
	}

    // public function informasi()
    // {
    //     $data['title']='Informasi';

    //     $this->load->library('pagination');
    //     $config['base_url'] = site_url('c_user/informasi'); //site url
    //     $config['total_rows'] = $this->model_user->total_row_berita(); //total row
    //     $config['per_page'] = 5; //show record per halaman
    //     $config["uri_segment"] = 3; // uri parameter
    //     $choice = $config["total_rows"] / $config["per_page"];
    //     $config["num_links"] = floor($choice);
    //     $config['first_link'] = 'First';
    //     $config['last_link'] = 'Last';
    //     $config['next_link'] = 'Next';
    //     $config['prev_link'] = 'Prev';
    //     $config['full_tag_open'] = '<div class="center_5 clearfix"><nav><ul class="  ">';
    //     $config['full_tag_close'] = '</ul></nav></div>';
    //     $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['num_tag_close'] = '</span></li>';
    //     $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    //     $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
    //     $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
    //     $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['prev_tagl_close'] = '</span>Next</li>';
    //     $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['first_tagl_close'] = '</span></li>';
    //     $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    //     $config['last_tagl_close'] = '</span></li>';

    //     $this->pagination->initialize($config);
    //     $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //     //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.
    //     $data['data'] = $this->model_user->get_berita_list($config["per_page"], $data['page']);

    //     $data['pagination'] = $this->pagination->create_links();


    //     $data['berita'] = $this->model_user->get_berita();
    //     $this->load->view('user/header', $data);
    //     $this->load->view('user/informasi', $data);
    //     $this->load->view('user/footer');
        
    // }
    // public function ditails_informasi($id)
    // {
    //     $data['title']='Ditails informasi';
    //     $data['ditails_informasi'] = $this->model_user->get_ditails($id);
    //     $this->load->view('user/header', $data);
    //     $this->load->view('user/ditails_informasi', $data);
    //     $this->load->view('user/footer');
        
    // }
    // public function blog()
    // {
    //     $data['title']='Blog';
        
    //     //konfigurasi pagination
    //     $this->load->library('pagination');
    //     $config['base_url'] = site_url('c_user/blog'); //site url
    //     $config['total_rows'] = $this->model->total_row_berita(); //total row
        
    //     // $config['total_rows'] = $this->db->count_all('table_berita'); //total row
    //     $config['per_page'] = 6;  //show record per halaman
    //     $config["uri_segment"] = 3;  // uri parameter
    //     $choice = $config["total_rows"] / $config["per_page"];
    //     $config["num_links"] = floor($choice);

    //      // Membuat Style pagination untuk BootStrap v4
    //     $config['first_link']       = 'First';
    //     $config['last_link']        = 'Last';
    //     $config['next_link']        = 'Next';
    //     $config['prev_link']        = 'Prev';
    //     $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    //     $config['full_tag_close']   = '</ul></nav></div>';
    //     $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    //     $config['num_tag_close']    = '</span></li>';
    //     $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    //     $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    //     $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    //     $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    //     $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    //     $config['prev_tagl_close']  = '</span>Next</li>';
    //     $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    //     $config['first_tagl_close'] = '</span></li>';
    //     $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    //     $config['last_tagl_close']  = '</span></li>';

    //     $this->pagination->initialize($config);
    //     $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //      //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
    //      $data['data'] = $this->model->get_blog_list($config["per_page"], $data['page']);           
    //      $data['pagination'] = $this->pagination->create_links();
      

    //     // $data ['berita'] = $this->model->get_data('table_berita','id_berita','DESC')->result_array();
    //     $this->load->view('user/header', $data);
    //     $this->load->view('user/blog', $data);
    //     $this->load->view('user/footer');
	// 	// echo json_encode($data);
        
    // }
    // public function ditails_blog($id)
    // {
    //     $data['title']='Ditails blog';
    //     $data ['ditails_berita'] = $this->model->ditails_berita($id);
    //     $this->load->view('user/header', $data);
    //     $this->load->view('user/ditails_blog', $data);
    //     $this->load->view('user/footer');
        
    // }
    public function contact()
    {
        $data['title'] = 'kontak pengaduan/saran';
        $this->load->view('user/header', $data);
        $this->load->view('user/contact');
        $this->load->view('user/footer');
        
    }

    public function send_saran()
    {
        $insert = [
            'nama'=>htmlspecialchars($this->input->post('nama', true)),
            'email'=>htmlspecialchars($this->input->post('email', true)),
            'subject'=>htmlspecialchars($this->input->post('subject', true)),
            'message'=>htmlspecialchars($this->input->post('message', true))
        ];
        $this->model_user->save_saran('table_saran',$insert);
        $this->session->set_flashdata('success', 'Saran anda berhasil di kirim');
        
        redirect('c_user/contact');
     
    }


}


?>
