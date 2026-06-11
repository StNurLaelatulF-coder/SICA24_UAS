<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct()
{
    parent::__construct();

    if(!$this->session->userdata('login'))
    {
        redirect('auth');
    }

    if($this->session->userdata('role') != 'admin')
    {
        redirect('dashboard');
    }

    $this->load->model('sales_model');
}

    public function index()
    {
        $data['sales'] = $this->sales_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sales/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah()
{
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales/tambah');
    $this->load->view('templates/footer');
}

public function simpan()
{
    $data = [
        'nama_sales' => $this->input->post('nama_sales'),
        'telepon'    => $this->input->post('telepon'),
        'email'      => $this->input->post('email'),
        'alamat'     => $this->input->post('alamat')
    ];

    $this->sales_model->insert($data);

    redirect('sales');
}

public function edit($id)
{
    $data['sales'] = $this->sales_model->get_by_id($id);

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('sales/edit', $data);
    $this->load->view('templates/footer');
}

public function update($id)
{
    $data = [
        'nama_sales' => $this->input->post('nama_sales'),
        'telepon'    => $this->input->post('telepon'),
        'email'      => $this->input->post('email'),
        'alamat'     => $this->input->post('alamat')
    ];

    $this->sales_model->update($id, $data);

    redirect('sales');
}

public function hapus($id)
{
    $this->sales_model->delete($id);

    redirect('sales');
}
}