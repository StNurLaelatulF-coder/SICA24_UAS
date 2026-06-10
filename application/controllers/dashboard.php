<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['total_produk'] = $this->db->count_all('produk');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_order'] = $this->db->count_all('sales_order');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}