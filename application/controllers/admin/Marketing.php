<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Marketing";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['menungguKonfirmasi'] = $this->Nota_model->servisBelumDikerjakanCount(2);
        $data['belumDiambil'] = $this->Nota_model->notaBelumDiambilCount();
        $data['omset'] = $this->Nota_model->getNotaDiambil();
        $data['nota_hariini'] = $this->Nota_model->getNota();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/marketing', $data);
        $this->load->view('admin/footer');
    }

    public function harusKonfirmasi()
    {
        $data['tittle'] = "Harus di Konfirmasi";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sPengerjaan'] = 2;
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->servisBelumDikerjakan($data['sPengerjaan']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/marketingPerluKonfirmasi', $data);
        $this->load->view('admin/footer');
    }

    public function belumDiambil()
    {
        $data['tittle'] = "Belum Diambil";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sPengerjaan'] = 99;
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->notaCancelDone();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/marketingPerluKonfirmasi', $data);
        $this->load->view('admin/footer');
    }

    public function lihatDetail($id_kerusakan)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Gudang_model');
        $this->load->model('Nota_model');

        $data_notif = [
            'notif_read'    => 1
        ];

        $this->db->where('id_TrnsCmnt', $id_kerusakan);
        $this->db->where('id_UComment', $data['user']['id']);
        $this->db->update('notif_comment', $data_notif);

        $data['transaksi'] = $this->Nota_model->getNotaByID($id_kerusakan);
        $data['detail'] = $this->Nota_model->getDetailTransaksiById($id_kerusakan);
        $data['jml_detail'] = count($data['detail']);
        $transaksi = $data['transaksi']['id'];
        $data['checklist'] = $this->Gudang_model->getChecklist($transaksi);
        $data['checklist_data'] = $this->Nota_model->getTransaksiCheckListId($id_kerusakan);
        $id_komentar = $data['checklist_data']['id_komentar'];
        $data['komentar']   = $this->Nota_model->getKomentarAllId($id_komentar);
        $data['tittle'] = "Detail Transaksi " . $data['transaksi']['nama_pelanggan'];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/marketingDetailKeruskan', $data);
        $this->load->view('admin/footer');
    }


    public function konfirmasi($id_transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['transaksi'] = $this->Nota_model->getNotaByID($id_transaksi);

        $datetime =  time();
        $pembayaran =  $data['transaksi']['status_pembayaran'];
        $sPengerjaan = 3;
        $id_user = $data['user']['id'];

        $this->Nota_model->logPengerjaan($id_transaksi,  $datetime, $pembayaran, $sPengerjaan, $id_user);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            ' . $data['transaksi']['nama_pelanggan'] . ' Sudah Diteruskan Untuk Dikerjakan</div>');
        redirect('admin/marketing/harusKonfirmasi');
    }

    public function komentar($id_komentar)
    {
        $this->load->model('Nota_model');
        $this->load->model('User_model');

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['checklist_data'] = $this->Nota_model->getKomentar($id_komentar);

        $id_sender = $data['user']['id'];
        $checkdataid = $data['checklist_data']['id_transaksi'];

        $url = $this->input->post('url');
        if (empty($this->input->post('komentar'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button> 
            Anda belum menuliskan komentar </div>');
            redirect($url);
        }
        $komentar = $this->input->post('komentar');
        $todaydt    = date('Y-m-d H:i:s');

        $datakomentar = [
            'id_komentar'       => '',
            'id_parent'         => $id_komentar,
            'id_transaksi'      => $checkdataid,
            'id_sender'         => $id_sender,
            'checklist_awal'    => '',
            'checklist_akhir'   => '',
            'isi_komentar'      => $komentar,
            'datetime'          => time()
        ];

        $commenter = $this->User_model->getId_commenter($checkdataid);
        $cek_komentar = $this->User_model->getWhoComment($checkdataid);
        $belum_komen = $this->User_model->belumKomen($data['user']['id'], $checkdataid);

        foreach ($commenter as $cmntr) {
            if ($cmntr['id_sender'] != $data['user']['id']) {
                //input data atau ubah data yg sudah ada
                $cek_komen_notif = $this->User_model->notif_Comment($checkdataid, $cmntr['id_sender']);
                // var_dump($cek_komen_notif);
                // exit();
                if ($cek_komen_notif != null) {
                    $data_notif = [
                        'notif_read'        => 0,
                        'NR_dateupdate'       => $todaydt
                    ];

                    $this->db->where('id_TrnsCmnt', $checkdataid);
                    $this->db->where('id_UComment', $cmntr['id_sender']);
                    $this->db->update('notif_comment', $data_notif);
                } else {
                    $data_notif = [
                        'id_Ncomment'       => '',
                        'id_TrnsCmnt'       => $checkdataid,
                        'id_UComment'       => $cmntr['id_sender'],
                        'notif_read'        => 0,
                        'NR_dateupdate'       => $todaydt
                    ];

                    $this->db->insert('notif_comment', $data_notif);
                }
            } else {
                //do nothing
            }
        }


        if ($belum_komen != null) {
            foreach ($commenter as $cmntr) {
                $id_commenter[] = $cmntr['id_sender'];
            }
        } else {
            foreach ($commenter as $cmntr) {
                $id_commenter[] = $cmntr['id_sender'];
            }
            $id_commenter[] = $data['user']['id'];
        }

        $id_commenter = implode(',', $id_commenter);


        if ($cek_komentar != null) {
            $datawhokomen = [
                'id_commenter'      => $id_commenter
            ];
            $this->db->where('id_Tcomment', $checkdataid);
            $this->db->update('who_comment', $datawhokomen);
        } else {
            $datawhokomen = [
                'id_Tcomment'       => $checkdataid,
                'id_commenter'      => $id_commenter
            ];
            $this->db->insert('who_comment', $datawhokomen);
        }
        $this->Nota_model->inputKomentar($datakomentar);

        redirect($url);
    }
}
