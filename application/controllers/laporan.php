<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sales_order_model');
    }

    public function index()
    {
        $data['laporan'] = $this->sales_order_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');

        $data['laporan'] = $this->sales_order_model->filter($awal, $akhir);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
}