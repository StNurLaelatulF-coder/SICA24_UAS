<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('sales_order_model');

        $role = $this->session->userdata('role');

        if($role != 'admin' && $role != 'sales')
        {
        redirect('dashboard');
}
    }

    public function index()
    {
        $data['order'] = $this->sales_order_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
{
    $data['pelanggan'] = $this->db->get('pelanggan')->result();
    $data['sales']     = $this->db->get('sales')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales_order/tambah',$data);
    $this->load->view('templates/footer');
}

public function simpan()
{
    $data = [
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'id_sales'     => $this->input->post('id_sales'),
        'tanggal'      => $this->input->post('tanggal'),
        'total'        => $this->input->post('total'),
        'status'       => $this->input->post('status')
    ];

    $this->sales_order_model->insert($data);

    redirect('sales_order');
}

public function edit($id)
{
    $data['order'] = $this->sales_order_model->get_by_id($id);
    $data['pelanggan'] = $this->db->get('pelanggan')->result();
    $data['sales'] = $this->db->get('sales')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales_order/edit',$data);
    $this->load->view('templates/footer');
}

public function update($id)
{
    $data = [
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'id_sales'     => $this->input->post('id_sales'),
        'tanggal'      => $this->input->post('tanggal'),
        'total'        => $this->input->post('total'),
        'status'       => $this->input->post('status')
    ];

    $this->sales_order_model->update($id,$data);

    redirect('sales_order');
}

public function hapus($id)
{
    $this->sales_order_model->delete($id);

    redirect('sales_order');
}
}