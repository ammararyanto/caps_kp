<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounting_model extends CI_Model

{
    public function performace()
    {
        $this->db->select('id_teknisi');
        $this->db->distinct();
        $this->db->from('transaksi_detail');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getTeknisiByID($id_teknisi)
    {
        $this->db->select('name,id');
        $this->db->where('id', $id_teknisi);
        $this->db->from('user');
        return $this->db->get()->row_array();
    }

    public function getDetailByTeknisi($teknisi)
    {
        $this->db->select('transaksi_detail.id_barang,transaksi_detail.tanggal_transaksi,stok.fee_teknisi');
        $this->db->from('transaksi_detail');
        $this->db->where('id_teknisi', $teknisi);
        $this->db->order_by('id', 'DESC');
        $this->db->join('stok', 'stok.id_barang=transaksi_detail.id_barang');
        return $this->db->get()->result_array();
    }
}
