<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
    parent::__construct();

    $this->load->library('session');

    if (!$this->session->userdata('logged_in')) {
        redirect('index.php/auth');
    }
}

    public function index()
    {
<<<<<<< HEAD
        $data['total_produk'] = $this->db->count_all('produk');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_order'] = $this->db->count_all('sales_order');

=======
>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }

    
}
