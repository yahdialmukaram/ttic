<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_cetak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{
		
	}

	public function printDataHargaBarang()
	{
		$data['title']='print data harga barang';
		$data['dataHarga']=$this->model->getHArga();
		$mpdf = new Mpdf\Mpdf(['format'=>'Legal']);
        $mpdf->AddPage('L');
        $cetak= $this->load->view('admin/v_print_data_harga',$data, true);
        $mpdf->WriteHtml($cetak);
        $mpdf->Output();
	}
	
	public function tampilLaporanPerbulan()
	{
		// $vtanggal = $this->input->post('vtanggal');
		// $data['title']='print data harga barang';
		// $mpdf = new Mpdf\Mpdf(['format'=>'Legal']);
		// $mpdf->AddPage('L');
		// $data ['dataHarga']= $this->model->tampilLaporanPerbulan($vtanggal);
		// $cetak = $this->load->view('admin/v_print_data_perbulan', $data, true);
		// $mpdf->WriteHtml($cetak);
		// $mpdf->Output();
		$vtanggal=$this->input->post('vtanggal');
		$data['title']='print data harga barang';
		$data['dataHarga']=$this->model->tampilLaporanPerbulan($vtanggal);
		$this->load->view('admin/v_print_data_pertanggal',$data); 
		
	}
	
	public function cetakPertanggal()
	{
		// ob_start();
		$bulan = $this->input->post('bulan');
		$data['title']='print data harga pertanggal';		
		$data['dataHarga'] = $this->model->getHargaPertanggal($bulan);
		// echo json_encode($data);
		$mpdf = new Mpdf\Mpdf(['format'=>'Legal']);
        $mpdf->AddPage('L');
		$cetak = $this->load->view('admin/v_print_data_pertanggal', $data, true);
		$mpdf->WriteHtml($cetak);
        $mpdf->Output();
		
	}
	
	public function filter($id)
	{
		$data['dataHarga'] = $this->model->getHargaPertanggal($id);
		// $data ['dataHarga'] = $this->db->get_where('tb_harga',['id_harga'=>$id])->result_array();
		$this->load->view('admin/v_harga', $data);
		
	}

}

/* End of file C_cetak.php */


?>
