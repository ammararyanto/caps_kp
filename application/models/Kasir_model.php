<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_model extends CI_Model
{
    public function fetch($query)
    {
        $this->db->select('*');
        $this->db->from("stok");
        $this->db->where('stok_barang >= 1');
        $this->db->where('id_tipepenjualan', 2);
        $this->db->limit(20);
        if ($query != '') {
            $this->db->where('stok_barang >= 1');
            $this->db->where('id_tipepenjualan', 2);
            $this->db->like("nama_barang", $query);
            $this->db->or_like("id_barang", $query);
        }
        return $this->db->get();
    }

    public function getNotaToday()
    {
        $this->db->select('tanggal_taransaksi');
        $this->db->from("transaksi");
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1000);
        return $this->db->get()->result_array();
    }

    public function getProduct()
    {
        $this->db->select("*");
        $this->db->from('product');
        return $this->db->get()->result_array();
    }

    public function inputPelanggan($id_pelanggan, $is_member)
    {
        $nomor = $this->input->post('no_hp', true);
        $no_hp = ltrim($nomor, 0);
        $data = [
            "id" => '',
            "id_member" => $id_pelanggan,
            "is_member" => $is_member,
            "nama_pelanggan" => $this->input->post('nama', true),
            "no_hp" =>  $no_hp,
            "alamat" => $this->input->post('alamat', true)
        ];
        $this->db->insert('pelanggan', $data);
    }

    public function tambahTransaksi(
        $total_barang,
        $total_transaksi,
        $id_pelanggan,
        $id_user,
        $sPembayaran,
        $sPengerjaan,
        $tanggal_diambil
    ) {
        $data = [
            "id_transaksi"          => $this->input->post('id_transaksi', true),
            "id_user"               => $id_user,
            "id_pelanggan"          => $id_pelanggan,
            "id_teknisi"            => $id_user,
            "tanggal_taransaksi"    => date('Y-m-d H:i:s', $this->input->post('tanggal_transaksi', true)),
            "tanggal_diambil"       => $tanggal_diambil,
            "platform"              => $this->input->post('platform_id', true),
            "total_barang"          => $total_barang,
            "diskon"                => $this->input->post('diskon', true),
            "disc_status"           => $this->input->post('discnom', true),
            "is_cash"               => $this->input->post('is_cash'),
            "cash"                  => $this->input->post('uang_cash', true),
            "change_nominal"        => $this->input->post('kembalian', true),
            "total"                 => $total_transaksi,
            "grand_total"           => $this->input->post('totalpdiskon', true),
            "status_pembayaran"     => $sPembayaran,
            "stasus_pengerjaan"     => $sPengerjaan
        ];

        $this->db->insert('transaksi', $data);
    }

    public function checklist($data)
    {
        $this->db->insert('transaksi_checklist', $data);
    }

    public function servisBaru(
        $id_pelanggan,
        $id_user,
        $sPembayaran,
        $sPengerjaan,
        $tanggal_diambil
    ) {
        $data = [
            "id_transaksi"          => $this->input->post('id_transaksi', true),
            "id_user"               => $id_user,
            "id_pelanggan"          => $id_pelanggan,
            "id_teknisi"            => $id_user,
            "id_device"             => $this->input->post('id_device', true),
            "tanggal_taransaksi"    => $this->input->post('tanggal_transaksi', true),
            "tanggal_diambil"       => $tanggal_diambil,
            "platform"              => $this->input->post('platform_id', true),
            "total_barang"          => 0,
            "diskon"                => 0,
            "disc_status"           => 0,
            "is_cash"               => 0,
            "cash"                  => 0,
            "change_nominal"        => 0,
            "total"                 => 0,
            "grand_total"           => 0,
            "status_pembayaran"     => $sPembayaran,
            "stasus_pengerjaan"     => $sPengerjaan
        ];
        $this->db->insert('transaksi', $data);
    }

    public function logTransaksi(
        $sPembayaran,
        $sPengerjaan,
        $id_user
    ) {
        $data = [
            "id" => '',
            "id_transaksi"      => $this->input->post('id_transaksi', true),
            "datetime"          => time(),
            "sPembayaran"       => $sPembayaran,
            "sPengerjaan"       => $sPengerjaan,
            "id_user"           => $id_user
        ];

        $this->db->insert('log_transaksi', $data);
    }

    public function logPembayaran($id_transaksi,  $datetime, $pembayaran, $sPengerjaan, $id_user)
    {
        $data = [
            "id" => '',
            "id_transaksi"      => $id_transaksi,
            "datetime"          => $datetime,
            "sPembayaran"       => $pembayaran,
            "sPengerjaan"       => $sPengerjaan,
            "id_user"           => $id_user
        ];
        $this->db->insert('log_transaksi', $data);
    }

    public function updatePembayaran($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    public function getTransaksiByID($id_transaksi)
    {
        $this->db->select('transaksi.* ,pelanggan.*, product_platform.*, product.*, user.id, user.name');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->join('user', 'user.id=transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_member = transaksi.id_pelanggan');
        $this->db->join('product_platform', 'product_platform.id = transaksi.platform');
        $this->db->join('product', 'product.id = product_platform.product_id');
        return $query = $this->db->get()->row_array();
    }
}
