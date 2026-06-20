<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }
    }

   public function index()
{
    $data['total_produk'] = $this->db->count_all('produk');
    $data['total_pelanggan'] = $this->db->count_all('pelanggan');
    $data['total_sales_order'] = $this->db->count_all('sales_order');
    $data['total_sales'] = $this->db->count_all('sales');

    $data['draft'] = $this->db
        ->where('status','draft')
        ->count_all_results('sales_order');

    $data['dikirim'] = $this->db
        ->where('status','dikirim')
        ->count_all_results('sales_order');

    $data['selesai'] = $this->db
        ->where('status','selesai')
        ->count_all_results('sales_order');

    $data['dibatalkan'] = $this->db
        ->where('status','dibatalkan')
        ->count_all_results('sales_order');

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
}

}