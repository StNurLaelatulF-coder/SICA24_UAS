<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $role = $this->session->userdata('role');

        if($role != 'admin' && $role != 'manager')
        {
            redirect('dashboard');
        }

        $this->load->model('Laporan_model');
    }

    public function index()
    {   
        $this->load->model('Sales_model');
        $this->load->model('Produk_model');

        $data['sales'] = $this->Sales_model->get_all();
        $data['produk'] = $this->Produk_model->get_all();

        $data['laporan'] = $this->Laporan_model->get_laporan(
            $this->input->get('id_sales'),
            $this->input->get('id_produk'),
            $this->input->get('tanggal_awal'),
            $this->input->get('tanggal_akhir')
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $data['laporan'] = $this->Laporan_model->get_laporan(
            $this->input->get('id_sales'),
            $this->input->get('id_produk'),
            $this->input->get('tanggal_awal'),
            $this->input->get('tanggal_akhir')
        );

        $this->load->view('laporan/cetak', $data);
    }
}