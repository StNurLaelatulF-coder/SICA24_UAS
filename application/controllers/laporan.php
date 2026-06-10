<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

<<<<<<< HEAD
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    // =========================
    // LAPORAN SALES ORDER
    // =========================
    public function sales_order()
    {
        $this->db->select('sales_order.*, pelanggan.nama_pelanggan');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan');

        $data['laporan'] = $this->db->get()->result();
=======
        $this->load->model('sales_order_model');
    }

    public function index()
    {
        $data['laporan'] = $this->sales_order_model->get_all();
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
<<<<<<< HEAD
        $this->load->view('laporan/sales_order', $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        redirect('laporan/sales_order');
=======
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
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
    }
}