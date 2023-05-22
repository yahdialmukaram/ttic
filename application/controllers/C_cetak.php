<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_cetak extends CI_Controller
{

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
        $data['title'] = 'print data harga barang';
        $data['dataHarga'] = $this->model->getHarga();
        $mpdf = new Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->AddPage('L');
        $cetak = $this->load->view('admin/v_print_data_harga', $data, true);
        $mpdf->WriteHtml($cetak);
        $mpdf->Output();
    }

    public function cetakPerbulan()
    {
        // ob_start();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulan = strlen($bulan) == 1 ? '0' . $bulan : $bulan;
        $date = $bulan . '-' . $tahun;
        $data = [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->model->getHargaPerbulan($date),
        ];
        $data['title'] = 'print data harga pertanggal';
        $data['printPerbulan'] = $this->model->getHargaPerbulan($date);
        // echo json_encode($data);
        $mpdf = new Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->AddPage('L');
        $cetak = $this->load->view('admin/v_print_data_perbulan', $data, true);
        $mpdf->WriteHtml($cetak);
        $mpdf->Output();

    }
    public function cetakPertahun()
    {
        // ob_start();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulan = strlen($bulan) == 1 ? '0' . $bulan : $bulan;
        $date = $bulan . '-' . $tahun;
        $data = [
            'bulan' => $bulan,
            'tahun' => $tahun,
            // 'laporan' => $this->model->getHargaPerbulan($date),
        ];
        $data['title'] = 'print data harga pertanggal';
        $data['printPertahun'] = $this->model->getHargaPertahun($date);
        // echo json_encode($data);
        $mpdf = new Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->AddPage('L');
        $cetak = $this->load->view('admin/v_print_data_pertahun', $data, true);
        $mpdf->WriteHtml($cetak);
        $mpdf->Output();

    }

    // public function filter($id)
    // {
    //     $data['dataHarga'] = $this->model->getHargaPertanggal($id);
    //     // $data ['dataHarga'] = $this->db->get_where('tb_harga',['id_harga'=>$id])->result_array();
    //     $this->load->view('admin/v_harga', $data);

    // }

}

/* End of file C_cetak.php */
