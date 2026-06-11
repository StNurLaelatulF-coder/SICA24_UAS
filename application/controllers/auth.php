<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }
    public function proses_login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->auth_model->cek_login($username, $password);

    if($user)
    {
        $this->session->set_userdata([
            'login'   => TRUE,
            'id_user' => $user->id_user,
            'nama'    => $user->nama,
            'role'    => $user->role
        ]);

        redirect('dashboard');
    }
    else
    {
        $this->session->set_flashdata(
            'error',
            'Username atau Password salah'
        );

        redirect('auth');
    }
}

    public function logout()
{
        $this->session->sess_destroy();
        redirect('auth');
}
}