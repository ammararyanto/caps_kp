<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
    }

    public function index()
    {
        $data['tittle'] = "Teknisi";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $today = time();

        $this->load->model('Nota_model');
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();

        $data['belumDicek'] = $this->Nota_model->servisBelumDikerjakanCount(1);
        $data['menungguKonfirmasi'] = $this->Nota_model->getAllServisByTeknisiCount(2, $data['user']['id']);
        $data['sudahKonfirmasi'] = $this->Nota_model->getAllServisByTeknisiCount(3, $data['user']['id']);
        $data['daftarServisan'] = $this->Nota_model->getAllServisByTeknisiCount(4, $data['user']['id']);

        $data['daftarTeknisi'] = $this->Nota_model->getAllUser();
        $data['cancelHariIni'] = $this->Nota_model->servisHariIniCountByStatus(6);
        $data['selesaiHariIni'] = $this->Nota_model->servisHariIniCountByStatus(5);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisi', $data);
        $this->load->view('admin/footer');
    }

    public function riwayatSemuaServisSelesai()
    {
        $sPengerjaan = 0;
        $data['tittle'] = "Daftar Semua Servis Selesai";
        $data['iconTitle'] = "fa-calendar-alt";
        $data['viewColour'] = "dark";

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_teknisi = $data['user']['id'];

        $data['sPengerjaan'] = $sPengerjaan;
        $this->load->model('Nota_model');
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();
        $data['nota'] = $this->Nota_model->getAllRiwayatServisByTeknisi($id_teknisi, $data['timeStart'], $data['timeEnd']);

        $countServisAll = 0;
        for ($x = 5; $x <= 8; $x++) {
            $z = $this->Nota_model->getAllServisanTeknisiCount($x, $id_teknisi, $data['timeStart'], $data['timeEnd']);
            $countServisAll = $countServisAll + $z;
        }

        $data['countServisanAll'] = $countServisAll;
        $data['countServisan5'] = $this->Nota_model->getAllServisanTeknisiCount(5, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan6'] = $this->Nota_model->getAllServisanTeknisiCount(6, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan7'] = $this->Nota_model->getAllServisanTeknisiCount(7, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan8'] = $this->Nota_model->getAllServisanTeknisiCount(8, $id_teknisi, $data['timeStart'], $data['timeEnd']);



        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiRiwayatList', $data);
        $this->load->view('admin/footer');
    }

    public function riwayatServisSelesai()
    {
        $sPengerjaan = 5;
        $data['tittle'] = "Daftar Servis Selesai Hari Ini";
        $data['iconTitle'] = "fa-calendar-check";
        $data['viewColour'] = "";

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_teknisi = $data['user']['id'];

        $data['sPengerjaan'] = $sPengerjaan;
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->getAllServisanTeknisi($sPengerjaan, $id_teknisi);
        $data['list_SPengerjaan'] = $this->Nota_model->getAllStatusPengerjaan();

        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();

        $countServisAll = 0;
        for ($x = 5; $x <= 8; $x++) {
            $z = $this->Nota_model->getAllServisanTeknisiCount($x, $id_teknisi, $data['timeStart'], $data['timeEnd']);
            $countServisAll = $countServisAll + $z;
        }

        $data['countServisanAll'] = $countServisAll;
        $data['countServisan5'] = $this->Nota_model->getAllServisanTeknisiCount(5, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan6'] = $this->Nota_model->getAllServisanTeknisiCount(6, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan7'] = $this->Nota_model->getAllServisanTeknisiCount(7, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan8'] = $this->Nota_model->getAllServisanTeknisiCount(8, $id_teknisi, $data['timeStart'], $data['timeEnd']);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/teknisiRiwayatHome', $data);
            $this->load->view('admin/footer');
        } else {
            $this->riwayatServisStatusByDate();
        }
    }

    public function riwayatServisStatus($sPengerjaan)
    {
        if ($sPengerjaan == 5) {
            $data['tittle'] = "Daftar Servis Selesai (Belum Diambil)";
            $data['iconTitle'] = "fa-calendar-check";
            $data['viewColour'] = "danger";
        } else if ($sPengerjaan == 6) {
            $data['tittle'] = "Daftar Servis Batal (Belum Diambil)";
            $data['iconTitle'] = "fa-calendar-times";
            $data['viewColour'] = "danger";
        } else if ($sPengerjaan == 7) {
            $data['tittle'] = "Daftar Servis Selesai (Diambil)";
            $data['iconTitle'] = "fa-calendar-check";
            $data['viewColour'] = "success";
        } else if ($sPengerjaan == 8) {
            $data['tittle'] = "Daftar Servis Batal (Diambil)";
            $data['iconTitle'] = "fa-calendar-times";
            $data['viewColour'] = "success";
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');

        $id_teknisi = $data['user']['id'];
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();

        $data['sPengerjaan'] = $sPengerjaan;
        $data['nota'] = $this->Nota_model->getRiwayatServisanByPengerjaan($sPengerjaan, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $countServisAll = 0;
        for ($x = 5; $x <= 8; $x++) {
            $z = $this->Nota_model->getAllServisanTeknisiCount($x, $id_teknisi, $data['timeStart'], $data['timeEnd']);
            $countServisAll = $countServisAll + $z;
        }
        $data['countServisanAll'] = $countServisAll;
        $data['countServisan5'] = $this->Nota_model->getAllServisanTeknisiCount(5, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan6'] = $this->Nota_model->getAllServisanTeknisiCount(6, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan7'] = $this->Nota_model->getAllServisanTeknisiCount(7, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan8'] = $this->Nota_model->getAllServisanTeknisiCount(8, $id_teknisi, $data['timeStart'], $data['timeEnd']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiRiwayatList', $data);
        $this->load->view('admin/footer');
    }

    public function riwayatServisStatusByDate()
    {
        if (empty($this->input->post('tanggalAwal')) || empty($this->input->post('tanggalAkhir')) || empty($this->input->post('id_sPengerjaan'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button> Anda tidak mengisi form dibawah ini dengan lengkap, mohon isi dengan lengkap sebelum ingin menampilkan data</div>');
            redirect('admin/teknisi/riwayatServisSelesai');
        } else {
            $sPengerjaan = $this->input->post('id_sPengerjaan');
            $tanggalAwal = str_replace("-", "", $this->input->post('tanggalAwal'));
            $tanggalAkhir = str_replace("-", "", $this->input->post('tanggalAkhir'));
        }

        if ($sPengerjaan == 5) {
            $data['tittle'] = "Daftar Servis Selesai (Belum Diambil)";
            $data['iconTitle'] = "fa-calendar-check";
            $data['viewColour'] = "danger";
        } else if ($sPengerjaan == 6) {
            $data['tittle'] = "Daftar Servis Batal (Belum Diambil)";
            $data['iconTitle'] = "fa-calendar-times";
            $data['viewColour'] = "danger";
        } else if ($sPengerjaan == 7) {
            $data['tittle'] = "Daftar Servis Selesai (Diambil)";
            $data['iconTitle'] = "fa-calendar-check";
            $data['viewColour'] = "success";
        } else if ($sPengerjaan == 8) {
            $data['tittle'] = "Daftar Servis Batal (Diambil)";
            $data['iconTitle'] = "fa-calendar-times";
            $data['viewColour'] = "success";
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_teknisi = $data['user']['id'];

        $data['sPengerjaan'] = $sPengerjaan;
        $this->load->model('Nota_model');
        $data['timeStart'] = $tanggalAwal;
        $data['timeEnd'] = $tanggalAkhir;
        $data['nota'] = $this->Nota_model->getRiwayatServisanByPengerjaan($sPengerjaan, $id_teknisi, $data['timeStart'], $data['timeEnd']);

        $data['countServisan5'] = $this->Nota_model->getAllServisanTeknisiCount(5, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan6'] = $this->Nota_model->getAllServisanTeknisiCount(6, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan7'] = $this->Nota_model->getAllServisanTeknisiCount(7, $id_teknisi, $data['timeStart'], $data['timeEnd']);
        $data['countServisan8'] = $this->Nota_model->getAllServisanTeknisiCount(8, $id_teknisi, $data['timeStart'], $data['timeEnd']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiRiwayatList', $data);
        $this->load->view('admin/footer');
    }

    public function lihatDetailOper($id_kerusakan)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Nota_model');
        $this->load->model('Gudang_model');

        $data_notif = [
            'notif_read'    => 1
        ];

        $this->db->where('id_TrnsCmnt', $id_kerusakan);
        $this->db->where('id_UComment', $data['user']['id']);
        $this->db->update('notif_comment', $data_notif);

        $data['daftarTeknisi'] = $this->Nota_model->getAllTeknisi();

        $data['transaksi'] = $this->Nota_model->getNotaByID($id_kerusakan);
        $data['detail'] = $this->Nota_model->getDetailTransaksiById($id_kerusakan);
        $data['jml_detail'] = count($data['detail']);
        $transaksi = $data['transaksi']['id'];
        $data['checklist'] = $this->Gudang_model->getChecklist($transaksi);
        $data['checklist_data'] = $this->Nota_model->getTransaksiCheckListId($id_kerusakan);
        $id_komentar = $data['checklist_data']['id_komentar'];
        $data['komentar']   = $this->Nota_model->getKomentarAllId($id_komentar);
        $data['tittle'] = "Kerusakan " . $data['transaksi']['nama_pelanggan'];

        $data['nama_teknisi'] = $this->Nota_model->getNamaTeknisi($data['transaksi']['id_teknisi']);

        $this->form_validation->set_rules('id_teknisi', 'Opsi Teknisi Pengganti', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/teknisiOperDetail', $data);
            $this->load->view('admin/footer');
        } else {
            $id_transaksix = $this->input->post('id_transaksi');
            $datetime = time();
            $id_teknisi = $this->input->post('id_teknisi');
            $pembayaran = 1;
            $sPengerjaan = $data['transaksi']['stasus_pengerjaan'];

            $this->Nota_model->createLogPengerjaan($id_transaksix, $datetime, $pembayaran, $sPengerjaan, $id_teknisi);

            $this->db->set('id_teknisi', $id_teknisi);
            $this->db->where('id_transaksi', $id_transaksix);
            $this->db->update('transaksi');

            $this->session->set_flashdata('message_oper', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button> Servisan atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b>
            sudah dialihkan kepada teknisi <b>' . $this->Nota_model->getNamaTeknisi($id_teknisi) . '</b> </div>');
            redirect('admin/teknisi');
        }
    }

    public function teknisiCek()
    {
        $data['tittle'] = "Perlu dicek";
        $data['iconTitle'] = "fa-clipboard-check";
        $data['viewColour'] = "info";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sPengerjaan'] = 1;
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->servisBelumDikerjakan($data['sPengerjaan']);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiList', $data);
        $this->load->view('admin/footer');
    }

    public function menungguKonfirmasi()
    {
        $data['tittle'] = "Menunggu Konfirmasi";
        $data['iconTitle'] = "fa-phone";
        $data['viewColour'] = "info";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sPengerjaan'] = 2;
        $this->load->model('Nota_model');
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();
        $data['nota'] = $this->Nota_model->getAllServisanTeknisi($data['sPengerjaan'], $data['user']['id']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiList', $data);
        $this->load->view('admin/footer');
    }

    public function sudahKonfirmasi()
    {
        $data['tittle'] = "Sudah dikonfirmasi";
        $data['iconTitle'] = "fa-user-check";
        $data['viewColour'] = "info";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['sPengerjaan'] = 3;

        $this->load->model('Nota_model');
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();
        $data['nota'] = $this->Nota_model->getAllServisanTeknisi($data['sPengerjaan'], $data['user']['id']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiList', $data);
        $this->load->view('admin/footer');
    }

    public function lihatDetail($id_kerusakan)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Nota_model');
        $this->load->model('Gudang_model');

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
        $this->load->view('admin/teknisiDetailKeruskan', $data);
        $this->load->view('admin/footer');
    }

    public function actionTeknisiDetail()
    {
        $this->load->model('Nota_model');
        $this->load->model('Stok_model');
        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $idTerpilih = implode(',', $this->input->post('terpilih[]'));
        $idTerpilihArray = explode(',', $idTerpilih);
        $idTerpilihCount = count($idTerpilihArray);
        $idTransaksi = $this->input->post('id_transaksi');

        $action = $this->input->post('action');
        if ($action == 'selesai') {
            for ($x = 0; $x < $idTerpilihCount; $x++) {
                $this->Nota_model->updateStatusDetailTransaksi($idTerpilihArray[$x], 1, $user['id']);

                $this->db->select();
                $this->db->where('id', $idTerpilihArray[$x]);
                $this->db->from('transaksi_detail');
                $barangTerpilih = $this->db->get()->row_array();

                $stok = $this->Stok_model->getStokBarang($barangTerpilih['id_barang']);
                $this->Stok_model->updateStokBerkurang($barangTerpilih['id_barang'], $stok, $barangTerpilih['quantity']);
            }
        } else if ($action == 'batal') {
            for ($x = 0; $x < $idTerpilihCount; $x++) {
                $this->Nota_model->updateStatusDetailTransaksi($idTerpilihArray[$x], 2, $user['id']);

                // $this->db->select();
                // $this->db->where('id', $idTerpilihArray[$x]);
                // $this->db->from('transaksi_detail');
                // $barangTerpilih = $this->db->get()->result_array();

                // $stok = $this->Stok_model->getStokBarang($barangTerpilih[0]['id_barang']);
                // $this->Stok_model->updateStokBertambah($barangTerpilih[0]['id_barang'], $stok, $barangTerpilih[0]['quantity']);
            }
        } else {
            echo 'ADA YANG SALAH';
        }

        redirect('admin/teknisi/lihatDetail/' . $idTransaksi);
    }

    public function daftarServisan()
    {
        $data['tittle'] = "Daftar Antrian Servis";
        $data['iconTitle'] = "fa-clipboard-list";
        $data['viewColour'] = "info";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['sPengerjaan'] = 4;

        $this->load->model('Nota_model');
        $data['timeStart'] = $this->Nota_model->getAwalBulan();
        $data['timeEnd'] = $this->Nota_model->getAkhirBulan();
        $data['nota'] = $this->Nota_model->getAllServisanTeknisi($data['sPengerjaan'], $data['user']['id']);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiList', $data);
        $this->load->view('admin/footer');
    }

    public function servisHariIni($sPengerjaan)
    {
        if ($sPengerjaan == 5) {
            $data['tittle'] = "Daftar Servis Selesai Hari Ini";
            $data['iconTitle'] = "fa-calendar-check";
            $data['viewColour'] = "success";
        } else if ($sPengerjaan == 6) {
            $data['tittle'] = "Daftar Servis Batal Hari Ini";
            $data['iconTitle'] = "fa-calendar-times";
            $data['viewColour'] = "danger";
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sPengerjaan'] = $sPengerjaan;
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->getServisHariIniByPengerjaan($sPengerjaan);

        // var_dump($data['nota']);
        // exit();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiListStatus', $data);
        $this->load->view('admin/footer');
    }

    public function servisSelesaiTeknisi($id_teknisi)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $namaTeknisi = $data['user']['name'];

        $data['tittle'] = "Servis Selesai Hari Ini [" . $namaTeknisi . "]";
        $data['iconTitle'] = "fa-user";
        $data['viewColour'] = "primary";

        $data['sPengerjaan'] = 5;
        $this->load->model('Nota_model');
        $sPengerjaan = 5;
        $data['nota'] = $this->Nota_model->getSelesaiHariIniById($id_teknisi);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/teknisiList', $data);
        $this->load->view('admin/footer');
    }

    public function statusUpdate()
    {

        $this->load->model('Nota_model');
        $this->load->model('Kasir_model');
        $this->load->model('Stok_model');

        $id_transaksi =  $this->uri->segment('4');
        $datetime =  time();
        $pembayaran =  $this->uri->segment('6');
        $sPengerjaan = $this->uri->segment('7');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Kasir_model->getTransaksiByID($id_transaksi);
        $data['items'] = $this->Nota_model->getDetailTransaksiById($id_transaksi);

        $sPengerjaanU = 0;

        if ($data['transaksi']['stasus_pengerjaan'] >= 5) {
            $teknisi = $data['transaksi']['id_teknisi'];
        } else {
            $teknisi = $data['user']['id'];
        }
        if ($sPengerjaan == 1) {
            if ($data['transaksi']['stasus_pengerjaan'] == 4) {
                $sPengerjaanU = 5;
                $id_transaksi = $data['transaksi']['id_transaksi'];
                $this->Nota_model->updateTanggalSelesai($id_transaksi);
                $servis_selesai = $this->Nota_model->getDetailTransaksiByIdSelesai($id_transaksi);

                $total = 0;
                foreach ($servis_selesai as $ss) :
                    $total = $total + $ss['total_harga'];
                endforeach;

                $transaksi = [
                    "grand_total" => $total,
                    "total" => $total
                ];
                $this->db->where('id_transaksi', $id_transaksi);
                $this->db->update('transaksi', $transaksi);

                // foreach ($data['items'] as $items) {

                //     $id_stok = $items['id_barang'];
                //     $upstok['stokdt'] = $this->Stok_model->getStokByID($id_stok);

                //     $pengurangan_stok = $upstok['stokdt']['stok_barang'] - $items['quantity'];
                //     $this->Stok_model->updateStok($id_stok, $pengurangan_stok);
                // }
            } else {
                $sPengerjaanU = 4;
            }
        } elseif ($sPengerjaan == 0) {
            $sPengerjaanU = 6;
            $kerusakan = $this->Nota_model->getDetailTransaksiByIdCancel($id_transaksi);

            foreach ($kerusakan as $rusak) :
                $this->Nota_model->updateStatusDetailTransaksi($rusak['id'], 2, $data['user']['id']);
            // $stok = $this->Stok_model->getStokBarang($rusak['id_barang']);
            // $this->Stok_model->updateStokBertambah($rusak['id_barang'], $stok, $rusak['quantity']);
            endforeach;
            $sPembayaran = 3;
            $transaksi = [
                "grand_total" => 0,
                "total" => 0,
                "status_pembayaran" => $sPembayaran
            ];
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $transaksi);
            $this->Nota_model->updateTanggalSelesai($id_transaksi);
        }

        $this->Nota_model->logPengerjaan($id_transaksi,  $datetime, $pembayaran, $sPengerjaanU, $teknisi);

        if ($sPengerjaanU == 4) {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        servis atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b> diteruskan ke daftar <b> Sedang Dikerjakan </b></div>');
            redirect('admin/teknisi/daftarServisan');
        } elseif ($sPengerjaanU == 5) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        servis atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b> diteruskan daftar <b> Selesai(Belum Diambil) </b> </div>');
            redirect('admin/teknisi/daftarServisan');
        } elseif ($sPengerjaan == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        servis atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b> berhasil <b>Dibatalkan</b></div>');
            redirect('admin/teknisi/daftarServisan');
        }
    }

    public function ubahKerusakan($id_transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $teknisi = $data['user']['id'];

        $this->load->model('Kasir_model');
        $this->load->model('Stok_model');
        $this->load->model('Nota_model');
        $id_user = $data['user']['id'];
        $data['tipe_penjualan'] = 1;

        $data['transaksi'] = $this->Kasir_model->getTransaksiByID($id_transaksi);
        $data['tittle'] = "Ubah Kerusakan " . $data['transaksi']['nama_pelanggan'];

        $data['product'] = $this->Kasir_model->getProduct();
        $data['detailTransaksiCount'] = $this->Nota_model->getDetailTransaksiCount($id_transaksi);
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Perubahan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/teknisiUbahKerusakan', $data);
            $this->load->view('admin/footer');
        } else {
            $this->load->model('Nota_model');

            $data['detail_transaksi'] = $this->Nota_model->getDetailTransaksiById($id_transaksi);

            $total_barang = 0;

            foreach ($data['detail_transaksi'] as $detailTrs) {
                $total_barang = $detailTrs['quantity'] + $total_barang;
            }

            $datetime =  time();
            $pembayaran =  $data['transaksi']['status_pembayaran'];
            $sPengerjaan = $this->input->post('konfirmasi');

            $this->Nota_model->logPengerjaan($id_transaksi,  $datetime, $pembayaran, $sPengerjaan, $teknisi);

            $data['items'] = $this->Nota_model->getDetailTransaksiById($id_transaksi);
            $total_transaksi = 0;
            foreach ($data['items'] as $items) {
                $total_transaksi = $items['total_harga'] + $total_transaksi;
            }
            $data = [
                "total_barang"  => $total_barang,
                "total"         => $total_transaksi,
                "grand_total"   => $total_transaksi
            ];
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $data);
            $transaksi = $this->Kasir_model->getTransaksiByID($id_transaksi);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Servis atas nama <b>' . $transaksi['nama_pelanggan'] . '</b>  Sudah Diteruskan Untuk Konfirmasi</div>');
            redirect('admin/teknisi/menungguKonfirmasi');
        }
    }

    public function tambahKerusakan($id_transaksi)
    {
        $user = $this->db->select('id, name')->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_teknisi = $user['id'];
        //$teknisi = $data['user']['id'];

        $this->load->model('Nota_model');
        $this->load->model('Stok_model');

        $total_harga = $_POST['product_price'] * $_POST['qty'];
        $data = array(
            "id_transakasi"     => $id_transaksi,
            "id"                => '',
            "id_barang"         => $_POST["product_id"],
            "harga"             => $_POST["product_price"],
            "quantity"          => $_POST["qty"],
            "total_harga"       => $total_harga,
            "tanggal_transaksi" => time(),
            "id_teknisi" => $id_teknisi
        );

        // $id_barang = $_POST["product_id"];
        // $qty = $_POST["qty"];
        // $stok = $this->Stok_model->getStokBarang($id_barang);
        // $this->Stok_model->updateStokBerkurang($id_barang, $stok, $qty);


        $this->db->insert('transaksi_detail', $data);
        echo $this->tampilIsiKerusakan($id_transaksi);
    }

    public function muatKeranjang($id_transaksi)
    {
        echo $this->tampilIsiKerusakan($id_transaksi);
    }

    public function tampilIsiKerusakan($id_transaksi)
    {
        $this->load->model('Nota_model');
        $data['items'] = $this->Nota_model->getDetailTransaksiById($id_transaksi);
        $total_transaksi = 0;
        foreach ($data['items'] as $items) {
            $total_transaksi = $items['total_harga'] + $total_transaksi;
        }
        $output = '';
        $output .= '<table class="table table-sm table-borderless">
        <thead>
            <tr>
                <th scope="col">ID&nbspBarang</th>
                <th scope="col">Nama&nbspBarang</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Sub&nbspTotal</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>';
        $count = 0;
        foreach ($data['items'] as $items) {
            $count++;
            if ($items['status'] == 1 || $items['status'] == 2) {
                $hidden = ' hidden';
            } else {
                $hidden = ' ';
            }
            $output .= '<tr class="mt-3">
            <td>' . $items['id_barang'] . '</td>
            <td>' . $items['nama_barang'] . '</td>
            <td>' . $items['harga'] . '</td>
            <td>' . $items['quantity'] . '</td>
            <td>' . $items['total_harga'] . '</td>
            <td align="center"><button type="button" name="remove" id="' . $items['id'] . '" class="btn btn-sm btn-danger remove hapus_itemtek" data-toggle="tooltip" ' . $hidden . '><i class="fas fa-fw fa-trash-alt"></i></button></td>
        </tr>';
        }
        $output .= '</tbody>
        </table>
        <h6 class="font-weight-bold">Total ' . rupiah($total_transaksi) . '</h6>
        <input type="hidden" class="form-control ml-2 total_trstek" id="total_trstek" name="total_trstek" value="' . $total_transaksi . '">';
        if ($count == 0) {
            $output = '<h3>Kerusakan kosong</h3>';
        }
        return $output;
    }

    public function hapusItem($id_transaksi)
    {
        $this->load->library("cart");
        $id_detailtransaksi = $_POST["row_id"];
        $this->load->model('Nota_model');
        $this->load->model('Stok_model');

        // $data_detail_tranksaksi = $this->Stok_model->getBarangCanceled($id_detailtransaksi);

        // $stok = $this->Stok_model->getStokBarang($data_detail_tranksaksi['id_barang']);
        // $this->Stok_model->updateStokBertambah($data_detail_tranksaksi['id_barang'], $stok, $data_detail_tranksaksi['quantity']);

        $this->Nota_model->deleteDetailTransaksiByID($id_detailtransaksi);
        echo $this->tampilIsiKerusakan($id_transaksi);
    }

    public function fetch()
    {
        $output = '';
        $query = '';
        $tipe_penjualan = 1;
        $this->load->model('Stok_model');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Stok_model->getStokByTransaksiPenjualan($query, $tipe_penjualan);

        if ($data->num_rows() > 0) {
            $nmbr = 0;
            foreach ($data->result() as $row) {
                $nmbr = $nmbr + 1;
                $output .= '<div class="col-md-4 mt-3">
        <div class="card" style="width: auto;">
            <img src="' . base_url() . '/image/barang/' . $row->foto . '" class="card-img-top" alt="...">
            <div class="card-body p-1" >
                <h5 class="card-title">' . $row->nama_barang . '</h5>
                <p class="card-text">Stok (' . $row->stok_barang . ')<br>
                    ' . rupiah($row->harga_jual) . '
                </p>
                <div class="row pr-4">
                            <div class="col-md-9">
                            <input type="number" name="qty" class="form-control form-control-sm qty" id="' . $row->id_barang . '" placeholder="qty">

                            </div>
                            <div class="col-md-3 pr-4">
                            <button type="button" onclick="tambahKerusakan(' . $nmbr . ')" class="btn btn-sm btn-primary btn_add' . $nmbr . '" name="btn_add" data-productname="' . $row->nama_barang . '" data-price="' . $row->harga_jual . '" data-productid="' . $row->id_barang . '"><i class="fas fa-fw fa-plus"></i> </button>

                            </div>
                        </div>
            </div>
        </div>
    </div>';
            }
        } else {
            $output .= '<h3 class="m-3">Tidak dapat ditemukan</h3>';
        }
        echo $output;
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

    public function simpan_checklistSelesai($id_komentar)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $url = $this->input->post('url');
        $date = time();
        $checklistdata = implode(',', $this->input->post('checklist_selesai[]'));

        $data = [
            'checklist_akhir'   => $checklistdata,
            'datetime'          => $date
        ];

        $this->db->where('id_komentar', $id_komentar);
        $this->db->update('transaksi_checklist', $data);

        redirect($url);
    }
}
