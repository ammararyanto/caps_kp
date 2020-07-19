<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['tittle'] = "Candra Apple Solution | Service Apple,iPhone,iPad,iPod,Mac";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/home');
        $this->load->view('pengunjung/template/footer');
    }
    public function cari_nota()
    {
        $data['tittle'] = 'Tracking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Nota_model');

        // $id_nota        = $this->input->post('cari_nota', TRUE);

        // $data['nota'] = $this->nota_model->cari_nota($id_nota);
        $id_transaksi = $this->input->post('cari_nota');
        if ($id_transaksi) {
            $data['detail'] = $this->Nota_model->cariNota($id_transaksi);
            $data['transaksi'] = $this->Nota_model->getNotaByID($id_transaksi);
        }

        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/cari_nota', $data);
        $this->load->view('pengunjung/template/footer');
    }
}
