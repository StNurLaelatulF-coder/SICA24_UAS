<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('Sales_order_model');
    }

    // =========================
    // LIST DATA
    // =========================
    public function index()
    {
        $data['orders'] = $this->Sales_order_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // TAMBAH FORM
    // =========================
    public function tambah()
    {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/tambah', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // SIMPAN ORDER
    // =========================
    public function simpan()
    {
        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_sales'     => $this->session->userdata('id_user'),
            'tanggal'      => $this->input->post('tanggal'),
            'total'        => 0, // nanti dihitung dari detail (sementara 0)
            'status'       => 'draft'
        ];

        $this->Sales_order_model->insert($data);

        redirect('sales_order');
    }

    // =========================
    // EDIT ORDER
    // =========================
    public function edit($id)
    {
        $data['order'] = $this->Sales_order_model->get_by_id($id);
        $data['pelanggan'] = $this->db->get('pelanggan')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/edit', $data);
        $this->load->view('templates/footer');

        $data['produk'] = $this->db->get('produk')->result();

        $this->load->model('Detail_order_model');
        $data['detail'] = $this->Detail_order_model->get_by_order($id);
    }

    // =========================
    // UPDATE ORDER
    // =========================
    public function update($id)
    {
        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tanggal'      => $this->input->post('tanggal'),
            'total'        => $this->input->post('total'),
            'status'       => $this->input->post('status')
        ];

        $this->Sales_order_model->update($id, $data);

        redirect('sales_order');
    }

    // =========================
    // HAPUS ORDER
    // =========================
    public function hapus($id)
    {
        $this->Sales_order_model->delete($id);

        redirect('sales_order');
    }
}