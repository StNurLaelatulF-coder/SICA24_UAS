<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('detail_order_model');

        $role = $this->session->userdata('role');

        if($role != 'admin' && $role != 'sales')
        {
            redirect('dashboard');
        }
    }

    // =========================
    // LIST DETAIL ORDER
    // =========================
    public function index()
    {
        $data['detail'] = $this->detail_order_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('detail_order/index', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function tambah()
{
    $this->db->select('sales_order.*, pelanggan.nama_pelanggan');

    $this->db->from('sales_order');

    $this->db->join(
        'pelanggan',
        'pelanggan.id_pelanggan = sales_order.id_pelanggan',
        'left'
    );

    $data['order'] = $this->db->get()->result();

    $data['produk'] = $this->db->get('produk')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('detail_order/tambah', $data);
    $this->load->view('templates/footer');
}

    // =========================
    // SIMPAN DETAIL ORDER
    // =========================
    public function simpan()
    {
        $data = [
            'id_order'  => $this->input->post('id_order'),
            'id_produk' => $this->input->post('id_produk'),
            'qty'       => $this->input->post('qty')
        ];

        $this->detail_order_model->insert($data);

        $this->update_total_order($data['id_order']);

        redirect('detail_order');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $data['detail'] = $this->detail_order_model->get_by_id($id);
        $data['order']  = $this->db->get('sales_order')->result();
        $data['produk'] = $this->db->get('produk')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('detail_order/edit', $data);
        $this->load->view('templates/footer');
    }

    // =========================
    // UPDATE DETAIL ORDER
    // =========================
    public function update($id)
    {
        $data = [
            'id_order'  => $this->input->post('id_order'),
            'id_produk' => $this->input->post('id_produk'),
            'qty'       => $this->input->post('qty')
        ];

        $this->detail_order_model->update($id, $data);

        $this->update_total_order($data['id_order']);

        redirect('detail_order');
    }

    // =========================
    // HAPUS DETAIL ORDER
    // =========================
    public function hapus($id)
    {
        // ambil data sebelum delete
        $detail = $this->detail_order_model->get_by_id($id);
        $id_order = $detail->id_order;

        $this->detail_order_model->delete($id);

        $this->update_total_order($id_order);

        redirect('detail_order');
    }

    // =========================
    // HITUNG TOTAL SALES ORDER
    // =========================
    public function update_total_order($id_order)
    {
        $this->db->select_sum('subtotal');
        $this->db->from('detail_order');
        $this->db->where('id_order', $id_order);
        $total = $this->db->get()->row()->subtotal;

        // kalau null, jadi 0
        if ($total == null) {
            $total = 0;
        }

        $this->db->where('id_order', $id_order);
        $this->db->update('sales_order', [
            'total' => $total
        ]);
    }
}