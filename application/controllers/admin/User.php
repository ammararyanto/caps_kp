<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Profil Saya";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function edit()
    {
        $data['tittle'] = "Ubah Profil";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/userEdit', $data);
            $this->load->view('admin/footer');
        } else {

            $name = $this->input->post('name');
            $emai = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']          = './image/profile/';
                $config['allowed_types']        = 'gif|jpg|png|JPG';
                $config['max_size']             = 6291;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'image/profile/' . $old_image);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Foto profil anda berhasil diubah</div>');
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Foto profil anda gagal diubah karena format gambar tidak sesuai</div>');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $emai);
            $this->db->update('user');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated</div>');
            redirect('admin/user');
        }
    }

    public function changepassword()
    {
        $data['tittle'] = "Ubah Password";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Conform New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/userChangepassword', $data);
            $this->load->view('admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Current Password</div>');
                redirect('admin/user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'>
                    New password can't be the same as current password</div>");
                    redirect('admin/user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Change</div>');
                    redirect('admin/user/changepassword');
                }
            }
        }
    }

    public function userNotification()
    {
        $this->load->model('User_model');
        $data['tittle'] = "Notifikasi";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notif'] = $this->User_model->getNotif($data['user']['id']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/userNotification', $data);
        $this->load->view('admin/footer');
    }

    public function userKomentar($idnota)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $this->load->model('Gudang_model');

        $data_notif = [
            'notif_read'    => 1
        ];

        $this->db->where('id_TrnsCmnt', $idnota);
        $this->db->where('id_UComment', $data['user']['id']);
        $this->db->update('notif_comment', $data_notif);

        $data['transaksi'] = $this->Nota_model->getNotaByID($idnota);
        $data['detail'] = $this->Nota_model->getDetailTransaksiById($idnota);
        $transaksi = $data['transaksi']['id'];
        $data['checklist'] = $this->Gudang_model->getChecklist($transaksi);
        $data['checklist_data'] = $this->Nota_model->getTransaksiCheckListId($idnota);
        $id_komentar = $data['checklist_data']['id_komentar'];
        $data['komentar']   = $this->Nota_model->getKomentarAllId($id_komentar);

        $data['tittle'] = "Kerusakan " . $data['transaksi']['nama_pelanggan'];



        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/userKomentar', $data);
        $this->load->view('admin/footer');
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
