<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
        $this->load->library("cart");
        $this->load->library("pdf");
        $this->load->model('Nota_model');
    }

    public function index()
    {
        $data['tittle'] = "Kasir";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['omset'] = $this->Nota_model->getNotaDiambil();
        $data['nota_hariini'] = $this->Nota_model->getNota();
        $data['nota_cancel'] = $this->Nota_model->getNotaCancel();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/kasir', $data);
        $this->load->view('admin/footer');
    }

    public function penjualanBaru()
    {
        $data['tittle'] = "Penjualan Baru";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kasir_model');
        $this->load->model('Stok_model');
        $id_user = $data['user']['id'];

        $data['product'] = $this->Kasir_model->getProduct();

        $data['stok'] = $this->Stok_model->getStok();

        $data['notacount'] = $this->Kasir_model->getNotaToday();

        $this->form_validation->set_rules('id_transaksi', 'Id Nota', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Telfon', 'required|trim|min_length[10]|max_length[14]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Jenis Device', 'required|trim');
        $this->form_validation->set_rules('platform_id', 'Tipe Device', 'required|trim');
        $this->form_validation->set_rules('is_cash', 'Tipe Pembayaran', 'required|trim');
        $this->form_validation->set_rules('uang_cash', 'Tunai', 'required|trim');
        $this->form_validation->set_rules('kembalian', 'Tunai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/kasirPenjualan', $data);
            $this->load->view('admin/footer');
        } else {
            if ($this->input->post('id_member') == '') {
                $dtm = $this->input->post('tanggal_transaksi');
                $id_pelanggan = $dtm + 123;
                $is_member = 0;
            } else {
                $id_pelanggan = $this->input->post('id_member');
                $is_member = 1;
                // jika sudah member tidak input data untuk sementara input data karena eror
            }

            $total_barang = 0;
            foreach ($this->cart->contents() as $items) {
                $total_barang = $total_barang + $items['qty'];
            }

            $total_transaksi = $this->cart->total();
            if ($this->input->post('submit') == 0) {
                // $sPembayaran = 1;
                $sPengerjaan = 1;
                $tanggal_diambil = 0;

                $nominal_kembalian = $this->input->post('kembalian');
                $grand_total = $this->input->post('totalpdiskon');
                $nominal = $grand_total + ($nominal_kembalian);
                if ($nominal > 0 && $nominal < $grand_total) {
                    // dp
                    $sPembayaran = 2;
                } elseif ($nominal > $grand_total || $nominal_kembalian == 0) {
                    // tidak
                    $sPembayaran = 99;
                } elseif ($nominal == 0) {
                    // tidak
                    $sPembayaran = 1;
                } elseif ($nominal <= $grand_total) {
                    // tidak
                    $sPembayaran = 1;
                }
            } else {
                $sPembayaran = 99;
                $sPengerjaan = 99;
                $tanggal_diambil = date('Y-m-d H:i:s', $this->input->post('tanggal_transaksi', true));
            }

            $this->Kasir_model->tambahTransaksi(
                $total_barang,
                $total_transaksi,
                $id_pelanggan,
                $id_user,
                $sPembayaran,
                $sPengerjaan,
                $tanggal_diambil
            );
            $this->Kasir_model->inputPelanggan($id_pelanggan, $is_member);

            $this->Kasir_model->logTransaksi($sPembayaran, $sPengerjaan, $id_user);

            foreach ($this->cart->contents() as $items) {
                if ($this->input->post('submit') == 0) {
                    $teknisi = 0;
                } else {
                    $teknisi = $id_user;
                }
                $data = [
                    "id"                    => '',
                    "id_transakasi"         => $this->input->post('id_transaksi', true),
                    "id_barang"             => $items['id'],
                    "quantity"              => $items['qty'],
                    "harga"                 => $items['price'],
                    "total_harga"           => $items['subtotal'],
                    "id_teknisi"            => $teknisi,
                    "tanggal_transaksi"     => $this->input->post('tanggal_transaksi', true)
                ];
                $this->db->insert('transaksi_detail', $data);

                $id_stok = $items['id'];
                $upstok['stokdt'] = $this->Stok_model->getStokByID($id_stok);

                $pengurangan_stok = $upstok['stokdt']['stok_barang'] - $items['qty'];

                if ($this->input->post('submit') == 0) {
                } else {
                    $this->Stok_model->updateStok($id_stok, $pengurangan_stok);
                }
            }

            if ($this->input->post('submit') == 0) {
                $this->cart->destroy();
                redirect('admin/kasir/cetakNota/' . $this->input->post('id_transaksi', true));
            } elseif ($this->input->post('submit') == 1) {
                $this->cart->destroy();
                redirect('admin/kasir/cetakNota/' . $this->input->post('id_transaksi', true));
            }
        }
    }

    public function servisBaru()
    {
        $data['tittle'] = "Form Pengecekan Device";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kasir_model');
        $this->load->model('Stok_model');
        $id_user = $data['user']['id'];
        $data['product'] = $this->Kasir_model->getProduct();

        $data['stok'] = $this->Stok_model->getStok();

        $data['notacount'] = $this->Kasir_model->getNotaToday();

        $this->form_validation->set_rules('id_transaksi', 'Id Nota', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Telfon', 'required|trim|numeric|min_length[10]|max_length[14]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('product_id', 'Jenis Device', 'required|trim');
        $this->form_validation->set_rules('platform_id', 'Tipe Device', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/kasirServis', $data);
            $this->load->view('admin/footer');
        } else {
            if ($this->input->post('id_member') == '') {
                $dtm = $this->input->post('tanggal_transaksi');
                $timeStampDTM = strtotime($dtm);
                $id_pelanggan = $timeStampDTM + 123;
                $is_member = 0;
            } else {
                $id_pelanggan = $this->input->post('id_member');
                $is_member = 1;
                // $this->Kasir_model->inputPelanggan($id_pelanggan, $is_member);
                // jika sudah member tidak input data untuk sementara input data karena eror
            }
            if ($this->input->post('checklist[]') == true) {
                $checklistdata = implode(',', $this->input->post('checklist[]'));
            } else {
                $checklistdata = '';
            }

            $datacheck = [
                'id_komentar'           => '',
                'id_parent'             => '0',
                'id_transaksi'          => $this->input->post('id_transaksi'),
                'id_sender'             => $id_user,
                'checklist_awal'        => $checklistdata,
                'checklist_akhir'       => '',
                'isi_komentar'          => $this->input->post('komentar'),
                'datetime'              =>  $timeStampDTM
            ];

            // input checklist
            $this->Kasir_model->checklist($datacheck);

            $sPembayaran        = 1; //belum dibayar
            $sPengerjaan        = 1; //check
            $tanggal_diambil    = 0;

            // input servis
            $this->Kasir_model->servisBaru(
                $id_pelanggan,
                $id_user,
                $sPembayaran,
                $sPengerjaan,
                $tanggal_diambil
            );

            $this->Kasir_model->inputPelanggan($id_pelanggan, $is_member);

            // input log transaksi
            $this->Kasir_model->logTransaksi($sPembayaran, $sPengerjaan, $id_user);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button> 
        Data sudah di input dan serahkan device ke teknisi untuk di proses </div>');
            redirect('admin/kasir/servisBaru');
        }
    }

    // dropdown berantai
    public function platformSelect()
    {
        // Ambil data id_gawai yang dikirim via ajax post
        $product_id = $this->input->post('product_id');

        $this->load->model('Product_model');
        $tipe_gawai = $this->Product_model->getProductbyId($product_id);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih</option>";

        foreach ($tipe_gawai as $data) {
            $lists .= "<option value='" . $data['id'] . "'>" . $data['platform'] . "</option>"; // Tambahkan tag option ke variabel $lists
        }


        $callback = array('platform_id' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    // checklist
    public function cheklistSelect()
    {
        // Ambil data id_gawai yang dikirim via ajax post
        $product_id = $this->input->post('product_id');

        $this->load->model('Gudang_model');
        $checklist = $this->Gudang_model->getChecklist($product_id);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $output = '';

        foreach ($checklist as $chk) {
            $output .= '<div class="col-md-6">
         <div class="custom-control custom-checkbox mb-3">
             <input type="checkbox" class="custom-control-input" name="checklist[]" id="checklist' . $chk['id'] . '" value="' . $chk['id'] . '">
             <label class="custom-control-label" for="checklist' . $chk['id'] . '">' . $chk['nama_checklist'] . '</label>
         </div>
     </div>';
        }

        $calbacklist = array('checklist' => $output);
        echo json_encode($calbacklist);
    }


    public function tambahKeranjang()
    {
        $this->load->library("cart");
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "price" => $_POST["product_price"],
            "qty" => $_POST["qty"]
        );
        $this->cart->insert($data);
        echo $this->tampilIsiKeranjang();
    }

    public function muatKeranjang()
    {
        echo $this->tampilIsiKeranjang();
    }

    public function tampilIsiKeranjang()
    {
        $this->load->library("cart");
        $total_transaksi = $this->cart->total();
        $output = '';
        $output .= '<table class="table table-sm table-borderless">
        <thead>
            <tr>
                <th scope="col">Id&nbspBarang</th>
                <th scope="col">Nama&nbspBarang</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Sub&nbspTotal</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>';
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $count++;
            $output .= '<tr>
            <td>' . $items['id'] . '</td>
            <td>' . $items['name'] . '</td>
            <td>' . $items['price'] . '</td>
            <td>' . $items['qty'] . '</td>
            <td>' . $items['subtotal'] . '</td>
            <td align="center"><button type="button" name="remove" id="' . $items['rowid'] . '" class="btn btn-sm btn-danger remove hapus_item" data-toggle="tooltip"><i class="fas fa-fw fa-trash-alt"></i></button></td>
        </tr>';
        }
        $output .= '</tbody>
        </table>
        <h6 class="font-weight-bold">Total ' . rupiah($total_transaksi) . '</h6>
        <input type="hidden" class="form-control ml-2 total_trs" id="total_trs" name="total_trs" value="' . $total_transaksi . '">';
        if ($count == 0) {
            $output = '<h3>Keranjang kosong</h3>';
        }
        return $output;
    }

    public function hapusItem()
    {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid'     => $row_id,
            'qty'       => 0
        );
        $this->cart->update($data);
        echo $this->tampilIsiKeranjang();
    }

    public function ubahBayar($id_transaksi)
    {
        echo $this->tampilIsiKerusakan($id_transaksi);
    }

    public function tampilIsiKerusakan($id_transaksi)
    {
        $this->load->model('Nota_model');
        $data['items'] = $this->Nota_model->getDetailTransaksiByIdSelesai($id_transaksi);
        $total_transaksi = 0;
        foreach ($data['items'] as $items) {
            $total_transaksi = $items['total_harga'] + $total_transaksi;
        }
        $output = '';
        $output .= '<table class="table table-borderless mt-0" width="100%">
        <thead>
            <tr>
                <th scope="col">ID&nbspBarang</th>
                <th scope="col">Nama&nbspBarang</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Sub&nbspTotal</th>
            </tr>
        </thead>
        <tbody>';
        $count = 0;
        foreach ($data['items'] as $items) {
            $count++;
            $output .= '<tr>
            <td>' . $items['id_barang'] . '</td>
            <td>' . $items['nama_barang'] . '</td>
            <td>' . $items['harga'] . '</td>
            <td>' . $items['quantity'] . '</td>
            <td>' . $items['total_harga'] . '</td>
        </tr>';
        }
        $output .= '</tbody>
        </table>
        <h6 class="font-weight-bold ml-2">Total ' . rupiah($total_transaksi) . '</h6>
        <input type="hidden" class="form-control ml-2 total_trs" id="total_trs" name="total_trs" value="' . $total_transaksi . '">';
        if ($count == 0) {
            $output = '<div class="alert alert-info mt-1 mx-3" role="alert"><b>Informasi!</b> Tidak Ada Servis Kerusakan Yang Ditambahkan</div>';
        }
        return $output;
    }

    public function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('Kasir_model');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Kasir_model->fetch($query);

        if ($data->num_rows() > 0) {
            $nmbr = 0;
            foreach ($data->result() as $row) {
                $nmbr = $nmbr + 1;
                $output .= '<div class="col-md-3 mt-3">
        <div class="card" style="width: auto;">
            <img src="' . base_url() . '/image/barang/' . $row->foto . '" class="card-img-top" alt="...">
            <div class="card-body p-1">
                <h5 class="card-title">' . $row->nama_barang . '</h5>
                <p class="card-text">Stok<br>' . $row->stok_barang . '<br>
                    ' . rupiah($row->harga_jual) . '
                </p>
                <input type="number" name="qty" class="form-control form-control-sm qty" id="' . $row->id_barang . '" placeholder="qty">
                <button type="button" onclick="tambahKeranjang(' . $nmbr . ')" class="btn btn-sm btn-primary mt-1 btn_add' . $nmbr . '" name="btn_add" data-productname="' . $row->nama_barang . '" data-price="' . $row->harga_jual . '" data-productid="' . $row->id_barang . '"><i class="fas fa-fw fa-plus"></i> </button>
            </div>
        </div>
    </div>';
            }
        } else {
            $output .= '<h3 class="m-3">Tidak dapat ditemukan</h3>';
        }
        echo $output;
    }

    public function belumDiambil()
    {
        $data['tittle'] = "Belum Diambil";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->notaBelumDiambil();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/notaList', $data);
        $this->load->view('admin/footer');
    }

    public function notaDiambil()
    {
        $data['tittle'] = "Nota Diambil";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->notaDiambil();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/notaList', $data);
        $this->load->view('admin/footer');
    }

    public function notaSemua()
    {
        $data['tittle'] = "Semua Nota";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->getNotaAll();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/notaList', $data);
        $this->load->view('admin/footer');
    }

    public function Bayar($id_transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id'];

        $this->load->model('Kasir_model');
        $this->load->model('Stok_model');
        $this->load->model('Nota_model');
        $id_user = $data['user']['id'];
        $data['tipe_penjualan'] = 1;

        $data['transaksi'] = $this->Kasir_model->getTransaksiByID($id_transaksi);
        // var_dump($data['transaksi']);
        $data['tittle'] = "Ubah Kerusakan " . $data['transaksi']['nama_pelanggan'];

        $data['product'] = $this->Kasir_model->getProduct();
        $data['detailTransaksiCount'] = $this->Nota_model->getDetailTransaksiCount($id_transaksi);

        $data['kurang_pembayaran'] = $data['transaksi']['total'] - $data['transaksi']['diskon'] - $data['transaksi']['cash'];
        if ($data['transaksi']['diskon'] > 0) {
            $data['hidden_disc'] = ' hidden';
        } elseif ($data['transaksi']['cash'] > 0) {
            $data['hidden_disc'] = ' hidden';
        } else {
            $data['hidden_disc'] = '';
        }

        if ($data['transaksi']['status_pembayaran'] == 99) {
            $data['ambil_hidden'] = '';
            $data['pembayaran_hidden'] = ' hidden';
        } elseif ($data['transaksi']['status_pembayaran'] == 3) {
            $data['ambil_hidden'] = ' ';
            $data['pembayaran_hidden'] = ' hidden';
        } elseif ($data['transaksi']['stasus_pengerjaan'] == 6 || $data['transaksi']['stasus_pengerjaan'] == 8) {
            $data['ambil_hidden'] = ' ';
            $data['pembayaran_hidden'] = ' hidden';
        } else {
            $data['ambil_hidden'] = ' hidden';
            $data['pembayaran_hidden'] = '';
        }

        if ($data['transaksi']['stasus_pengerjaan'] >= 7) {
            $data['ambil_hidden'] = ' hidden';
        }

        $this->form_validation->set_rules('diskon', 'Tipe Pembayaran', 'required|trim');
        $this->form_validation->set_rules('is_cash', 'Tipe Pembayaran', 'required|trim');
        $this->form_validation->set_rules('uang_cash', 'Tunai', 'required|trim');
        $this->form_validation->set_rules('kembalian', 'Tunai', 'required|trim');
        $this->form_validation->set_rules('discnom', 'Tipe diskon', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar', $data);
            $this->load->view('admin/kasirUbahPembayaran', $data);
            $this->load->view('admin/footer');
        } else {

            $datetime =  time();
            if ($this->input->post('submit') == 0) {
                $cash_dibayar = $this->input->post('uang_cash', true);
                $cash_terbayar = $data['transaksi']['cash'];
                $cash_total = $cash_dibayar + $cash_terbayar;
                $total = $this->input->post('total_trs', true);

                $disc_tipe = $this->input->post('discnom', true);
                if ($disc_tipe == 0) {
                    $diskon = $this->input->post('diskon', true);
                } elseif ($disc_tipe == 1) {
                    $persen = $this->input->post('diskon', true);
                    $diskon = $data['transaksi']['total'] * $persen / 100;
                }
                $grand_total = $total - $diskon;


                if ($cash_total == 0) {
                    $sPengerjaan = $data['transaksi']['stasus_pengerjaan'];
                    $sPembayaran = 1;
                    $tanggal_diambil = '0000-00-00 00:00:00';
                } else if ($cash_total < $grand_total) {
                    $sPengerjaan = $data['transaksi']['stasus_pengerjaan'];
                    $sPembayaran = 2;
                    $tanggal_diambil = '0000-00-00 00:00:00';
                } else if ($cash_total >= $grand_total) {
                    $sPengerjaan = $data['transaksi']['stasus_pengerjaan'];
                    $sPembayaran = 99;
                    $tanggal_diambil = '0000-00-00 00:00:00';
                }

                $updatedt = [
                    "diskon"                => $diskon,
                    "disc_status"           => $this->input->post('discnom', true),
                    "is_cash"               => $this->input->post('is_cash'),
                    "cash"                  => $cash_total,
                    "change_nominal"        => $this->input->post('kembalian', true),
                    "total"                 => $this->input->post('total_trs', true),
                    "grand_total"           => $grand_total,
                    "tanggal_diambil"       => $tanggal_diambil,
                    "status_pembayaran"     => $sPembayaran,
                    "stasus_pengerjaan"     => $sPengerjaan
                ];
            } elseif ($this->input->post('submit') == 1) {
                if ($data['transaksi']['stasus_pengerjaan'] == 6) {
                    $sPengerjaan = 8;
                    $tanggal_diambil = date('Y-m-d H:i:s', $datetime);
                    $sPembayaran = 3;
                } elseif ($data['transaksi']['stasus_pengerjaan'] == 5) {
                    $sPengerjaan = 7;
                    $tanggal_diambil = date('Y-m-d H:i:s', $datetime);
                    $sPembayaran = 99;
                }
                $updatedt = [
                    "tanggal_diambil"       => $tanggal_diambil,
                    "stasus_pengerjaan"     => $sPengerjaan
                ];
            }

            $this->Kasir_model->logPembayaran($id_transaksi,  $datetime, $sPembayaran, $sPengerjaan, $id_user);
            $this->Kasir_model->updatePembayaran($id_transaksi, $updatedt);

            if ($this->input->post('submit') == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button> Terima Kasih, Pembayaran pada transaksi atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b> telah <b>berhasil</b> </div>');
                redirect('admin/kasir/belumDiambil');
            } elseif ($this->input->post('submit') == 1) {
                if ($data['transaksi']['stasus_pengerjaan'] == 6) {
                    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button> Terima Kasih, Pengambilan Device pada transaksi atas nama <b>' . $data['transaksi']['nama_pelanggan'] . '</b> telah <b>berhasil</b> </div>');
                    redirect('admin/kasir/belumDiambil/');
                } elseif ($data['transaksi']['stasus_pengerjaan'] == 5) {
                    redirect('admin/kasir/cetakNota/' . $this->input->post('id_transaksi', true));
                    // $this->cetakNota($this->input->post('id_transaksi', true));
                }
            }
        }
    }

    public function cetakNota($id_Transaksi)
    {
        $data['tittle'] = "Belum Diambil";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $data['nota'] = $this->Nota_model->getNotaByID($id_Transaksi);
        $data['item'] = $this->Nota_model->getDetailTransaksiByIdSelesai($id_Transaksi);
        $this->load->view('admin/cetakNota', $data);

        // $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        // <button type="button" class="close" data-dismiss="alert">&times;</button> Terima Kasih, Pengambilan Device pada transaksi atas nama <b>' . $data['nota']['nama_pelanggan'] . '</b> telah <b>berhasil</b> </div>');
        // redirect('admin/kasir/belumDiambil');
    }

    public function detailKerusakan($id_Transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Nota_model');
        $this->load->model('Gudang_model');

        $data_notif = [
            'notif_read'    => 1
        ];

        $this->db->where('id_TrnsCmnt', $id_Transaksi);
        $this->db->where('id_UComment', $data['user']['id']);
        $this->db->update('notif_comment', $data_notif);

        $data['transaksi'] = $this->Nota_model->getNotaByID($id_Transaksi);
        $data['detail'] = $this->Nota_model->getDetailTransaksiById($id_Transaksi);
        $transaksi = $data['transaksi']['id'];
        $data['checklist'] = $this->Gudang_model->getChecklist($transaksi);
        $data['checklist_data'] = $this->Nota_model->getTransaksiCheckListId($id_Transaksi);
        $id_komentar = $data['checklist_data']['id_komentar'];
        $data['komentar']   = $this->Nota_model->getKomentarAllId($id_komentar);

        $data['tittle'] = "Kerusakan " . $data['transaksi']['nama_pelanggan'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/kasirDetailKerusakan', $data);
        $this->load->view('admin/footer');
    }

    public function komentarTransaksi($id_komentar)
    {
        $this->load->model('Nota_model');

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['checklist_data'] = $this->Nota_model->getKomentar($id_komentar);

        $id_sender = $data['user']['id'];
        $checkdataid = $data['checklist_data']['id_transaksi'];

        $url = $this->input->post('url');
        $komentar = $this->input->post('komentar');

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
        $this->Nota_model->inputKomentar($datakomentar);

        redirect($url);
    }
}
