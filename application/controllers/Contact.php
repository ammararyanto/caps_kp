<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function index()
    {
        $data['tittle'] = "Contact | Candra Apple Solution";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/contact');
        $this->load->view('pengunjung/template/footer');
    }
}
