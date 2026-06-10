<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('Detail_order_model');
    }

    // =========================
    // INDEX (LIST PILIH ORDER)
    // =========================
    public function index()
    {
        $data['orders'] = $this->db->get('sales_order')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('detail_order/index', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // DETAIL PER ORDER
    // =========================
    public function lihat($id_order)
    {
        $data['order'] = $this->db->get_where('sales_order', [
            'id_order' => $id_order
        ])->row();

        $data['produk'] = $this->db->get('produk')->result();

        $this->load->model('Detail_order_model');
        $data['detail'] = $this->Detail_order_model->get_by_order($id_order);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('detail_order/lihat', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // SIMPAN DETAIL
    // =========================
    public function simpan()
    {
        $id_produk = $this->input->post('id_produk');
        $qty       = $this->input->post('qty');

        $produk = $this->db->get_where('produk', [
            'id_produk' => $id_produk
        ])->row();

        $subtotal = $produk->harga * $qty;

        $data = [
            'id_order'  => $this->input->post('id_order'),
            'id_produk' => $id_produk,
            'qty'       => $qty,
            'subtotal'  => $subtotal
        ];

        $this->Detail_order_model->insert($data);

        redirect('detail_order/lihat/'.$data['id_order']);
    }

    // =========================
    // HAPUS DETAIL
    // =========================
    public function hapus($id_detail, $id_order)
    {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('detail_order');

        redirect('detail_order/lihat/'.$id_order);
    }
}