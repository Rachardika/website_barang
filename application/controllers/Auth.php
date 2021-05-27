<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('auth/logout');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Website Barang';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
            //echo 'auth/index';
            //$this->load->view('welcome_message');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'id_role' => $user['id_role'],
                    'nip' => $user['nip']
                ];
                $this->session->set_userdata($data);
                if ($user['id_role'] == 1) {
                    redirect('user');
                } else {
                    redirect('kepala');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ada</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('hasil');
        $this->session->unset_userdata('keyword');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah keluar</div>');
        redirect('auth');
    }
}
