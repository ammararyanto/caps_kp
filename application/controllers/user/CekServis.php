<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekServis extends CI_Controller
{

    public function index()
    {
        $data['tittle'] = 'Cek Status Servis';


        $this->load->model('Landing_model');
        $id_transaksi = $this->input->post('cari_nota');
        if ($id_transaksi) {
            $data['detail'] = $this->Landing_model->cariNota($id_transaksi);
            $data['transaksi'] = $this->Landing_model->getNotaByID($id_transaksi);
        } else {
            $data['detail'] = $this->Landing_model->cariNota(0101010);
            $data['transaksi'] = $this->Landing_model->cariNota(0101010);
        }

        $this->load->view('pengunjung/header', $data);
        $this->load->view('pengunjung/cekServis', $data);
        $this->load->view('pengunjung/footer', $data);
    }
}
